## Deployment instructions

### Deployment back-end

- `copy back/.env.example back/.env`
- `docker-compose up -d`
- `docker compose run php composer install`
- `docker exec -it api_php_1 sh`
- `php artisan migrate`
- `php artisan db:seed`

### Информация для запросов

// ngrok http 8088

- `Хост: https://bed5-87-117-52-7.ngrok-free.app`
- `Ключ: BFVqAWdPnM('remember_token' User Id '1')`

### Примеры запросов

- `{{protocol}}{{host}}:{{port}}/api/stocks?dateFrom=2023-08-14&dateTo=&page=1&key=&limit=10`
- `{{protocol}}{{host}}:{{port}}/api/sales?dateFrom=2023-08-01&dateTo=2023-09-01&page=1&key=&limit=4`
- `{{protocol}}{{host}}:{{port}}/api/incomes?dateFrom=2023-08-01&dateTo=2023-09-01&page=1&key=&limit=4`
- `{{protocol}}{{host}}:{{port}}/api/orders?dateFrom=2023-07-16&dateTo=2023-08-16&page=1&key=&limit=6`

### Информация для просмотра бд через phpMyAdmin

// ngrok http 8000

- `Хост: https://bed5-87-117-52-7.ngrok-free.app`
- `Сервер: mysql`
- `Пользователь: root`
- `Пароль: 123`
