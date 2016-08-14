# ex

- зайти в ```containers```
- выполнить ```docker-compose build``` ```docker-compose up -d```
- зайти в контейнер с PHP ```docker exec -it containers_phpfpm_1 bash```
- в нём зайти в папку с приложением ```cd /var/www/application``` и обновить зависимости ```composer update```
- дать права на папку с картинками куда будут загружаться изображения ```chmod -R 777 public/img```
- готово. Заходите по ```localhost:8000``` или измените порт на какой хотите в файле ```docker-compose.yml```





