#!/usr/bin/env bash
echo 'This is the deploy.script'
echo 'FTP_USER     '$1
echo 'FTP_PASSWORD '$2
echo 'FTP_SITE     '$3
echo 'FTP_PATH     '$4
echo ftp://$1:$2@$3/$4
curl --ftp-create-dirs -u "$1:$2" -T README.md                               ftp://$3/$4/README.md
curl --ftp-create-dirs -u "$1:$2" -T src/Main.php                            ftp://$3/$4/src/Main.php
curl --ftp-create-dirs -u "$1:$2" -T src/utils/Activator.php                 ftp://$3/$4/src/utils/Activator.php
curl --ftp-create-dirs -u "$1:$2" -T src/utils/Deactivator.php               ftp://$3/$4/src/utils/Deactivator.php
curl --ftp-create-dirs -u "$1:$2" -T vendor/autoload.php                     ftp://$3/$4/vendor/autoload.php
curl --ftp-create-dirs -u "$1:$2" -T vendor/composer/ClassLoader.php         ftp://$3/$4/vendor/composer/ClassLoader.php
curl --ftp-create-dirs -u "$1:$2" -T vendor/composer/autoload_classmap.php   ftp://$3/$4/vendor/composer/autoload_classmap.php
curl --ftp-create-dirs -u "$1:$2" -T vendor/composer/autoload_namespaces.php ftp://$3/$4/vendor/composer/autoload_namespaces.php
curl --ftp-create-dirs -u "$1:$2" -T vendor/composer/autoload_psr4.php       ftp://$3/$4/vendor/composer/autoload_psr4.php
curl --ftp-create-dirs -u "$1:$2" -T vendor/composer/autoload_real.php       ftp://$3/$4/vendor/composer/autoload_real.php
curl --ftp-create-dirs -u "$1:$2" -T vendor/composer/autoload_static.php     ftp://$3/$4/vendor/composer/autoload_static.php
curl --ftp-create-dirs -u "$1:$2" -T bhaa_ee_plugin.php                      ftp://$3/$4/bhaa_ee_plugin.php
curl --list-only -u "$1:$2" ftp://$3/$4/