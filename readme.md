<h1>Swagger Petstore</h1>

Petstore API in Laravel:



##Server Requirements

- PHP >= 7.1.3
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension


##Installing Laravel

 - Download from git.
 - Open commend terminal
 - Go to project root (cd petshore).
 - composer update
 - php artisan serve

host: localhost::8000



##Add a new pet to the store
  ​base_url + /pet/add

#Input field

    - Pet id
    - Pet name
    - Category Id
    - Category name
    - Status
    - Tags Id
    - Tags name


##Update an existing pet

   base_url + /pet/update

#Input field

    - Pet id
    - Pet name
    - Category Id
    - Category name
    - Status
    - Tags Id
    - Tags name


##Finds Pets by status

 base_url + /pet/findByStatus

#Input field
    - Status


##Find pet by ID
 
#Input field

    - Pet id

##Updates a pet in the store with form data

#Input field

    - Pet id
    - Pet name
    - Status


##Delete an existing pet

#Input field

    - api_key (You can use any api_key like: 123 or 145 or 4758 etc)
    - Pet id


  
