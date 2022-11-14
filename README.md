# :bookmark_tabs: Todo List API with JWT Authentication :heavy_check_mark:


<!-- This is built with [Laravel 9 Framework](https://laravel.com/) -->
### Endpoints :pushpin:

<!-- LOGIN -->
#### Login - Endpoint: /api/login
Request body:
```
  {
    "email": "string",
    "password": "string"
  }
```
Response body:
```
  {
    "status": "success",
    "message": "Logged in successfully.",
    "user": {
        "id": 1,
        "name": "Christ John Mercurio",
        "email": "mercs@test.com",
        ...
    },
    "authorization": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9....",
        "type": "bearer"
    }
  }
```
<br>
<!-- REGISTER -->
#### Register - Endpoint: /api/register
Request body:
```
  {
    "name": "string",
    "email": "string",
    "password": "string"
  }
```
Response body:
```
  {
    "status": "success",
    "message": "User created successfully.",
    "user": {
        "name": "Test User 2",
        "email": "test2@email.com",
        ...
    },
    "authorization": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9....",
        "type": "bearer"
    }
  }
```
<br>
<!-- LOG OUT -->
#### Logout - Endpoint: /api/logout
Requires __JWT Authentication Bearer Token__ :heavy_check_mark:

Response body:
```
  {
      "status": "success",
      "message": "Logged out successfully"
  }
```
<br>
<!-- REFRESH BEARER TOKEN -->
#### Refresh Bearer Token - Endpoint: /api/refresh_token
Requires __JWT Authentication Bearer Token__ :heavy_check_mark:

Response body:
```
  {
    "status": "success",
    "message": "Token refreshed successfully",
    "user": {
        "id": 1,
        "name": "Christ John Mercurio",
        "email": "mercs@test.com",
        ...
    },
    "authorization": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9....",
        "type": "bearer"
    }
  }
```
<br>
<!-- GET ALL TODOS -->
#### Get All Todos - Endpoint: /api/todos
Requires __JWT Authentication Bearer Token__ :heavy_check_mark:

Response body:
```
  [
    {
        "id": 1,
        "title": "Task 1",
        "description": "Code in Laravel",
        "status": 2,
        ...
    },
    {
        "id": 2,
        "title": "Task 2 [UPDATED]",
        "description": "Make todo list API with JWT Authentication",
        "status": 3,
        ...
    },
    ...
  ]
```
<br>
<!-- STORE TODO -->
#### Create - Endpoint: /api/todos
Requires __JWT Authentication Bearer Token__ :heavy_check_mark:

Request body:
```
{
    "title": "string",
    "description": "string",
    "status": "boolean" // DEFAULT[0]: Not Started/In progress, TRUE[1]: Completed
}
```
Response body:
```
  {
    "message": "Todo created successfully.",
    "todo": {
        "title": "Task 5",
        "description": "Edit README.md",
        "status": "1",
        "id": 6,
        ...
    }
  }
```
<br>
<!-- UPDATE TODO -->
#### Update - Endpoint: /api/todos/6
Requires __JWT Authentication Bearer Token__ :heavy_check_mark:

Request body:
```
{
    "title": "string",
    "description": "string",
    "status": "boolean" // DEFAULT[0]: In progress, TRUE[1]: Completed
}
```
Response body:
```
  {
    "message": "Todo list updated successfully.",
    "todo": {
        "id": 6,
        "title": "Task 5 [UPDATED]",
        "description": "Edit README.md",
        "status": "2",
        ...
    }
  }
```
<br>
<!-- GET TODO -->
#### Get Todo - Endpoint: /api/todos/4
Requires __JWT Authentication Bearer Token__ :heavy_check_mark:

Response body:
```
  {
    "todo": {
        "id": 4,
        "title": "Task 4",
        "description": "This task is sample for sample deletion",
        "status": 0,
        ...
    }
  }
```
<br>
<!-- DELETE TODO -->
#### Delete - Endpoint: /api/todos/4
Requires __JWT Authentication Bearer Token__ :heavy_check_mark:

Response body:
```
  {
    "message": "Todo deleted successfully."
  }
```
