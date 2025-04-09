<?php

namespace Deployer;

require 'recipe/wordpress.php';

// Config

set('repository', 'git@github.com:agence-adeliom/woah-uar-site.git');

set('theme', 'uar');

set('shared_dirs', [
    'web/app/uploads',
    'web/app/languages',
    'web/app/sessions',
]);

set('shared_files', [
    'web/.htaccess',
    '.env',
]);

set('writable_dirs', []);

set('writable_mode', "chmod");
set('writable_recursive', true);

set('bin/composer', function () {
    run("cd {{release_path}} && curl -sS https://getcomposer.org/installer | {{bin/php}}");
    $composer = '{{bin/php}} {{release_path}}/composer.phar';
    return $composer;
});

// Hosts
import('.inventory.yml');

before('deploy:vendors', 'deploy:shared');
after('deploy:update_code', 'deploy:vendors');
after('deploy:failed', 'deploy:unlock');
