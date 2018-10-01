#!/bin/bash

sudo mysql -u root -e "DROP DATABASE sberbank"
sudo mysql -u root -e "CREATE DATABASE sberbank"
sudo mysql -u root -e "GRANT ALL PRIVILEGES ON sberbank.* TO mysql@localhost"
echo 'База данных создана'

sudo chown -R www-data:www-data /var/www/
sudo chmod 777 -R /var/www/sber/
echo 'Права делигированы'

php init
echo 'Приложение инициализировано'

php yii migrate
echo 'Миграции выполнены'



mkdir -p /var/www/sber/backend/web/uploads/
sudo chmod 755 -R /var/www/sber/backend/web/uploads/
echo 'Директория для загрузки файлов создана'

echo 'Инсталяция завершена'