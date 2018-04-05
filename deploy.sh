#!/usr/bin/env bash
echo 'This is the deploy.script'
echo 'FTP site '.${FTP_SITE}
curl --list-only ftp://${FTP_USER}:${FTP_PASSWORD}@${FTP_SITE}/${FTP_PATH}