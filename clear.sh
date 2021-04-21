#!/bin/bash

pkill chrome
pkill chrome
pkill chrome
pkill chrome

find /var/www/html/gtts-api/public/cache/ -type f -mtime +7 -name '*.mp3' -execdir rm -- '{}' ';'
find /var/www/html/youtube-video-random-clip-api/public/cache -type f -mtime +7 -execdir rm -- '{}' ';'
find /var/www/html/youtube-video-random-clip-api/public/video -type f -mtime +7 -execdir rm -- '{}' ';'
