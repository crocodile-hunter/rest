REST API
=========

The code is written on  PSR-2 coding style, the documentation can be found [here]
The API is built using the laravel framework with the faker library  to generate the data. 

Requirments
----
* PHP > 5.3.7
* MCrypt PHP Extension
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
- php artisan migrate
- php artisan db:seed
Now run “php artisan serve”. The API is available on  http://localhost:8000
```

Resources
----
* Products - http://localhost:8000/products ( GET | POST | PUT | DELETE )
* Merchants - http://localhost:8000/merchants ( GET | POST )

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
    * app/controllers/ProductController
    * app/controllers/MerchantController
    * 
[here]:https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[website]:https://getcomposer.org/ 
