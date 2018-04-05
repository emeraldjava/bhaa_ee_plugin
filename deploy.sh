#!/usr/bin/env bash
echo 'This is the deploy.script'
echo 'FTP_USER     '.${FTP_USER}.'.'
echo 'FTP_PASSWORD '.${FTP_PASSWORD}.'.'
echo 'FTP_SITE     '.${FTP_SITE}.'.'
echo 'FTP_PATH     '.${FTP_PATH}.'.'
curl --list-only ftp://${FTP_USER}:${FTP_PASSWORD}@${FTP_SITE}/${FTP_PATH}