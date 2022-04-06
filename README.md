<!-- alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail' -->
## STEPS
```
sail up

sail artisan migrate

sail artisan db:seed --class=RecordSeeder

sail composer install
```
<!-- sail composer require php-open-source-saver/jwt-auth -->

## Examples
```
web:
http://localhost:8080/records

api:
http://localhost:8080/api/v1/register POST (name, email, password)
http://localhost:8080/api/v1/login POST (email, password)
http://localhost:8080/api/v1/records GET (headers: "Authorization: Bearer token_from_login")
http://localhost:8080/api/v1/records/{d} GET (headers: "Authorization: Bearer token_from_login")
```
