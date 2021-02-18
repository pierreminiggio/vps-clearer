<?php

function runCommand(string $command): void
{
    echo date('Y-m-d H:i:s - ') . shell_exec($command);
}

runCommand('npm --prefix /var/www/cron/boosted-scraper stop');

for ($i = 0; $i < 10; $i++) {
    runCommand('pkill chrome');
}

for ($i = 0; $i < 10; $i++) {
    runCommand('pkill node');
}

runCommand('npm --prefix /var/www/cron/boosted-scraper start');
