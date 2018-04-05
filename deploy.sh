#!/usr/bin/env bash
echo 'This is the deploy.script'
echo 'FTP_USER     '$1
echo 'FTP_PASSWORD '$2
echo 'FTP_SITE     '$3
echo 'FTP_PATH     '$4
echo ftp://$1:$2@$3/$4
curl --list-only -u "$1:$2" -v ftp://$3/$4