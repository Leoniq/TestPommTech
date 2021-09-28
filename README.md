# Required
# POMM
```
composer require pomm-project/pomm-bundle 
``` 
[This link](https://packagist.org/packages/pomm-project/model-manager) or [this link](https://github.com/pomm-project/pomm-bundle)

----
# PHINX
```
curl -s https://getcomposer.org/installer | php
php composer.phar require robmorgan/phinx
```
[This link](https://phinx.org/)

----
# .env
```
###> pomm-project/pomm-bundle ###
DB_DRIVER=pgsql
DB_USER=postgres
DB_PASSWORD=admin
DB_HOST=127.0.0.1
DB_PORT=5432
DB_NAME=green
DATABASE_URL=$DB_DRIVER://$DB_USER:$DB_PASSWORD@$DB_HOST:$DB_PORT/$DB_NAME
###< pomm-project/pomm-bundle ###
```
