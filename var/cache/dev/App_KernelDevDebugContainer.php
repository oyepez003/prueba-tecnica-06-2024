<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerQdP6CHX\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerQdP6CHX/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerQdP6CHX.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerQdP6CHX\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerQdP6CHX\App_KernelDevDebugContainer([
    'container.build_hash' => 'QdP6CHX',
    'container.build_id' => 'b1940e92',
    'container.build_time' => 1718852013,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerQdP6CHX');
