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

RUN mkdir /db
RUN /usr/bin/sqlite3 /db/test.db

WORKDIR /app
#VOLUME /app/var/

COPY . .

#RUN set -eux; \
#	mkdir -p var/cache var/log; \
#	composer dump-autoload --classmap-authoritative --no-dev; \
#	composer dump-env prod; \
#	composer run-script --no-dev post-install-cmd; \
#	chmod +x bin/console; sync;
