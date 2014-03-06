SearchBundle
==========

### Установка

```
composer install
cd Tests
php app/console doctrine:schema:create
php app/console doctrine:fixtures:load --fixtures=Fixtures/DataFixtures/ORM
php app/console server:run 0.0.0.0:8000 --docroot=app
open http://127.0.0.1:8000/api/doc
```
