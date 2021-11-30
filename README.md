# crt-symfony-1
___
## Установка и запуск приложения
1. Сборка контейнеров `docker-compose build`.
2. Запуск контейнеров `docker-compose up -d`.
3. Посмотреть контейнеры `docker ps`.
4. Зайти внутрь контейнера `docker-compose exec -it container-id`.
   1. `container-id` - это id контейнера, который можно получить с помощью команды `docker-ps`.
5. Остановить все контейнеры `docker-compose down`.
___

### Доступ к главной странице сайта
http://localhost:8080/