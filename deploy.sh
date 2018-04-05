#!/usr/bin/env bash
echo 'This is the deploy.script'
echo 'FTP_USER     '${FTP_USER}
echo 'FTP_PW1      '${FTP_PW1}
echo 'FTP_PW2      '${FTP_PW2}
echo 'FTP_PW3      '${FTP_PW3}
PW = "<".${FTP_PW1}."%".${FTP_PW2}."%!".${FTP_PW3}
echo 'PW           '$PW
echo 'FTP_SITE     '${FTP_SITE}
echo 'FTP_PATH     '${FTP_PATH}
curl --list-only ftp://${FTP_USER}:$PW@${FTP_SITE}/${FTP_PATH}