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

###### List all categories

Endpoint:
```
GET: {APP_URL}/api/categories/list
```

###### Create a new category

Endpoint:
```
POST: {APP_URL}/api/categories
```

Body:
```
name : string|min:5|unique:categories
```

## Items:
###### List items by category_id

Endpoint:
```
GET: {APP_URL}/api/items/list/{category_id}
```

###### Add new item

Endpoint:
```
POST: {APP_URL}/api/items
```

Body:
```
category_id : required|integer
name : required|ends_with:_item
value : required|numeric|between:10,100.00
quality : required|integer|min:-10|max:50
```

###### Update item

Endpoint:
```
PUT: {APP_URL}/api/items/{item_id}
```

Params:
```
category_id : optional|integer
name : optional|ends_with:_item
value : optional|numeric|between:10,100.00
quality : optional|integer|min:-10|max:50
```

###### Delete all items by category_id

Endpoint:
```
DELETE: {APP_URL}/api/items/destroy/{category_id}
```
