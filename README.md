 ### install

```
$ composer install
```


### Setup
- When you are done with installation, copy the `.env.example` file to `.env`

  ```$ cp .env.example .env```


- Generate the application key

  ```$ php artisan key:generate```


- Add your database credentials to the necessary `env` fields

- Migrate the application

  ```$ php artisan migrate```

- Install laravel passport

  ```$ php artisan passport:install```

- Seed Database

  ```$ php artisan db:seed```


- Install node modules

  ```$ npm install```

### compile swagger

  ```$ php artisan l5-swagger:generate```

### Run the application

  ```$ php artisan serve```



