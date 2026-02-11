
### Установка

```bash
clone repo

cp .env.example .env
docker compose up -d --build
docker exec -it apicomm_app 
composer install
php artisan migrate --seed
создать .env

```

### ДОСТУП К БД

#### Host: db

#### Port: 5432

#### DB_NAME: apicomm

#### User: postgres

#### Password: postgres




