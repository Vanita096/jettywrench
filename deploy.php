<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'Jetty Wrench');

// Project repository
set('repository', 'git@gitlab.com:danszewczyk/jettywrench.com.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

set('http_user', 'apache');

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', [
    'storage/app/media/',
]);


// Hosts

host('184.152.166.209')
    ->port(22)
    ->user('deployer')
    ->identityFile('~/.ssh/deployerkey')
    ->set('deploy_path', '/var/www/jettywrench.com');;

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

task('artisan:db:seed:bouncer', function() {
    run('{{bin/php}} {{release_path}}/artisan db:seed --class=BouncerSeeder');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
after('artisan:migrate', 'artisan:db:seed:bouncer');
after('cleanup', 'artisan:queue:restart');



