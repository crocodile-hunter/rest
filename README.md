REST API
=========

The code is written on  PSR-2 coding style, the documentation can be found [here]
The API is built using the laravel framework with the faker library  to generate the data. 

Requirments
----
* PHP > 5.4
* MCrypt PHP Extension
* SQLite PHP Extension
* Openssl PHP Extension for composer
* The project utilizes Composer to manage it’s dependencies.[website]
* Provide write permission to app/storage
* For more information, read http://laravel.com/docs/installation#install-laravel

Installation
----
```sh
clone the repository
Configure sqlite from app/config/database.php
On the document root, run:
- composer install
- php artisan migrate --path=app/database/migrations, if the result is "Nothing to migrate", then run php artisan migrate:reset
- php artisan db:seed
Now run “php artisan serve”. The API is available on  http://localhost:8000
```

Resources
----
* Products - http://localhost:8000/products ( GET | POST | PUT | DELETE )
    Fields to save - SKU, name, merchant, description, price
* Merchants - http://localhost:8000/merchants ( GET | POST )
    Fields to save - name, website, email

Code Structure
----
* Configuration : app/config/database.php
* Routes : app/routes.php
```sh
All routes are defined in this file
``` 
* Database Migration files 
    * app/database/migrate
* Database Seeders
    * app/database/seed
* Models
    * app/models/Product
    * app/models/Merchant
* Controllers
    * app/controllers/APIController
	```sh
	All controllers must extend the APIController. it contains some helper methods that can assist with API responses
	``` 
    * app/controllers/ProductController
    * app/controllers/MerchantController
    * 
[here]:https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[website]:https://getcomposer.org/ 

TEST
----
Run request-test.php to run the method tests. Note, the API does not process JSON as form data. I havent tested it with JSON request objects