## Deployment instructions

### Deployment back-end

- `copy back/.env.example back/.env`
- `docker-compose up -d`
- `docker compose run php composer install`
- `docker exec -it api_php_1 sh`
- `php artisan migrate`
- `php artisan db:seed`

// ngrok http 8088

### Информация для заказчиков

- `Хост: https://e1fb-87-117-56-112.ngrok-free.app`
- `Ключ: SgxBppyXQi`

### Примеры запросов

- `{{protocol}}{{host}}:{{port}}/api/stocks?dateFrom=2023-08-14&dateTo=&page=1&key=&limit=10`
- `{{protocol}}{{host}}:{{port}}/api/sales?dateFrom=2023-08-01&dateTo=2023-09-01&page=1&key=&limit=4`
- `{{protocol}}{{host}}:{{port}}/api/incomes?dateFrom=2023-08-01&dateTo=2023-09-01&page=1&key=&limit=4`
- `{{protocol}}{{host}}:{{port}}/api/orders?dateFrom=2023-07-16&dateTo=2023-08-16&page=1&key=&limit=6`
