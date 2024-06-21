FROM php:8.3-fpm AS build

RUN apt-get update && apt-get install -y --no-install-recommends \
	vim \
	git \
	acl \
	file \
	gettext \
	git \
	sqlite3 \
	libsqlite3-dev \
	&& rm -rf /var/lib/apt/lists/*

RUN curl -sSLf \
-o /usr/local/bin/install-php-extensions \
https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
chmod +x /usr/local/bin/install-php-extensions

RUN install-php-extensions @composer pdo_sqlite apcu intl opcache zip

RUN curl -sS https://get.symfony.com/cli/installer | bash && \
	mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

WORKDIR /app
#VOLUME /app/var/

COPY . .

RUN set -eux
RUN mkdir -p var/cache var/log
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN yes | composer install --no-scripts --ignore-platform-reqs --prefer-dist --optimize-autoloader
RUN composer dump-autoload --classmap-authoritative
RUN chmod +x bin/console; sync;
RUN bin/console lexik:jwt:generate-keypair --skip-if-exists

RUN mkdir /db
RUN /usr/bin/sqlite3 /db/app_data.db ".databases"
RUN chown www-data:www-data -R /db/
RUN php bin/console doctrine:migrations:migrate