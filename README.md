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

5. Migrate database
```
php artisan migrate
```

6. Serve project
```
php artisan serve
```

7. Run tests
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

Response:
```
{
    "categories": [
        {
            "id": 3,
            "name": "Test 1"
        },
        {
            "id": 4,
            "name": "Test 2"
        }
    ]
}
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

Response:
```
{
    "name": "Test 2",
    "updated_at": "2021-05-24T11:27:27.000000Z",
    "created_at": "2021-05-24T11:27:27.000000Z",
    "id": 4
}
```

## Items:
###### List items by category_id

Endpoint:
```
GET: {APP_URL}/api/items/list/{category_id}
```

Response:
```
{
    "items": [
        {
            "id": 2,
            "category_id": 4,
            "name": "Test_item",
            "value": 50,
            "quality": -10,
            "created_at": "2021-05-24T11:30:33.000000Z",
            "updated_at": "2021-05-24T11:30:33.000000Z"
        },
        {
            "id": 3,
            "category_id": 4,
            "name": "Test_item",
            "value": 50,
            "quality": -10,
            "created_at": "2021-05-24T11:30:40.000000Z",
            "updated_at": "2021-05-24T11:30:40.000000Z"
        }
    ]
}
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

Response:
```
{
    "category_id": "4",
    "name": "Test_item",
    "value": "50",
    "quality": "-10",
    "updated_at": "2021-05-24T11:30:40.000000Z",
    "created_at": "2021-05-24T11:30:40.000000Z",
    "id": 3
}
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

Response:
```
boolean: true or false
```

###### Delete all items by category_id

Endpoint:
```
DELETE: {APP_URL}/api/items/destroy/{category_id}
```

Response:
```
Number of deleted rows, example: 6
```

# Error handling
You can handle errors by response status.

Errors status codes:
[You can find here](https://en.wikipedia.org/wiki/List_of_HTTP_status_codes)
