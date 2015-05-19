<?php
/**
 * Reload project by update database schema, clear cache, install assets etc.
 */
function doCliAction($description, $command) {
    echo "\n* $description\n$command\n";
    passthru($command);
}
doCliAction('Changing permissions', 'sudo chmod -R 777 app/cache app/logs web/');
doCliAction('Create database schema', 'php app/console doctrine:schema:create');
//doCliAction('Load fixtures to database', 'php app/console doctrine:mongodb:fixtures:load');
doCliAction('Clear cache', 'php app/console cache:clear');
doCliAction('Install assets', 'php app/console assets:install --symlink');
//doCliAction('Create admin user', 'php app/console fos:user:create admin admin@example.com samurai --super-admin');
doCliAction('Changing permissions', 'sudo chmod -R 777 app/cache app/logs web/');
