Commands to run:

docker compose down
docker compose build --no-cache app
docker compose up -d

The image is based on `php:8.3-apache` with Composer and Node installed so you
can run `composer` and `npm` commands inside the `app` container:

```
docker compose exec app composer install
docker compose exec app npm install
```


localhost:8080/en/login

Readme in progress.
