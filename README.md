# Introduction
I provide a small API for Gilded Rose Kata refactoring project.

This API is without authentication, in the future we will can add:
* Laravel passport or Sanctum authentication.
* In this project I don't using Repository pattern, but if need this can will be do in the future.
* I added POSTMAN collection into /postman folder, which is in root folder.

# Installation
1. Clone this repository:
```
git clone https://github.com/ramasofficial/kilo-laravel.git
```

2. Install composer
```
composer install
```

3. Create new database & copy .env.example file to .env in root directory and set API_URL and database configuration
```
copy .env.example .env
```

4. Generate php artisan key
```
php artisan key:generate
```

5. Serve project
```
php artisan serve
```

6. Run tests
```
php artisan test
```

# API documentation
## Categories:

1. List all categories

Endpoint:
```
GET: {APP_URL}/api/categories/list
```

2. Create a new category

Endpoint:
```
POST: {APP_URL}/api/categories
```

Body:
```
name : string|min:5|unique:categories
```

## Items:
1. List items by category_id

Endpoint:
```
GET: {APP_URL}/api/items/list/{category_id}
```
