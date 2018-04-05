#!/usr/bin/env bash
echo 'This is the deploy.script'
echo 'FTP_USER     '$1
echo 'FTP_PASSWORD '$2
echo 'FTP_SITE     '$3
echo 'FTP_PATH     '$4
echo ftp://$1:$2@$3/$4
curl --ftp-create-dirs -v -u "$1:$2" -T README.md ftp://$3/$4/README.md
curl --ftp-create-dirs -v -u "$1:$2" -T src/Main.php ftp://$3/$4/src/Main.php
curl --list-only -v -u "$1:$2" ftp://$3/$4