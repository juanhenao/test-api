# Test API
## About this project

This is just a project to test the pontential of API Development with Laravel Framework, Codeception for testing Endpoints and Sanctum form security.

## How to start this Project

# Start Docker Containers
1. Run Commposer inside the laravel container
2. Run migrations with `php artisan migrate`
3. Create an user with the /register endpoint
4. Have fun!

## Endpoints

### General Endpoints

Path            | Method | Auth |Response               |Body
----------------|--------|------|-----------------|-----
/hello	        |GET	 | yes  | {message:'hello'}
/howareyou	    |GET	 | yes  | {message: 'I\'m fine'}
/whattimeisit	|GET	 | yes  | Current Time
/in	            |GET	 | yes  | Current Timezone
/in/london	    |GET	 | yes  | Time in London
/in	            |POST    | yes  | Time in city            | Examples: {"city":"Europe/London} {"city":"America/Bogota}

### Authentication Endpoints
Path            | Method | Auth |Response               |Body
----------------|--------|------|-----------------|-----
/register	    |POST	 | yes  | New User and Token
/login	        |POST	 | no   | New Token
/logout	        |POST	 | yes  | {"message": "loggedout"}
