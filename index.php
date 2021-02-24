<?php

function runCommand(string $command): void
{
    $output = shell_exec($command);
    echo date('Y-m-d H:i:s - ') . $command . ' : ' . (
        $output ?? 'empty output'
    ) . PHP_EOL;
}

// Clearing RAM
runCommand('npm --prefix /var/www/cron/boosted-scraper stop');

for ($i = 0; $i < 10; $i++) {
    runCommand('pkill chrome');
}

for ($i = 0; $i < 10; $i++) {
    runCommand('pkill node');
}

runCommand('npm --prefix /var/www/cron/boosted-scraper start');

// Clearing caches
runCommand('find /var/www/html/gtts-api/public/cache/ -type f -mtime +7 -name \'*.mp3\' -execdir rm -- \'{}\' \;');
runCommand('find /var/www/html/youtube-video-random-clip-api/public/cache -type f -mtime +7 -execdir rm -- \'{}\' \;');
runCommand('find /var/www/html/youtube-video-random-clip-api/public/video -type f -mtime +7 -execdir rm -- \'{}\' \;');

exit;
