<h1> Shop (sf6, php8, DDD) </h1>

# Installation 

Clone the project : 

```
git clone git@github.com:medalibs/shop_sf_ddd.git
cd shop_sf_ddd/
```
Install dependencies :

```
php composer.phar install
```
Up the PostgreSQL database and execute a migration :
```
docker-compose up -d
bin/console doctrine:migrations:migrate
```

Start the symfony server  and go to nelmio api interface http://127.0.0.1:8000/api/doc
```
symfony server:start
```










