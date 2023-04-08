<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Description of the task

Write a program that can price a cart of products from different countries, accept multiple products, combine offers, and display a total detailed invoice in USD as well.

# Description of solution

I used SOLID principles and cleen code in writing a program , In terms of security, it has no any any obvious vulnerability ,

## Design Patterns used are.

- **Repository Design Pattern**
- **Builder Design Pattern**
- **Facade Design Pattern**

## Packages used are.

- **livewire**
- **laratrust**
- **toastr**
- **Pest-test**



## Install

install the program using git

```sh
git clone https://github.com/mohamedabdelmaksoud2000/Invoice-task
```

```sh
cd invoice-task
```

install packages and vendor using composer

```sh
comoser update or comoser install
```

install packages and vendor using composer

```sh
comoser update or comoser install
```

create env file

```sh
cp .env.example .env
```

```sh
Set up .env file
```

generate key

```sh
php artisan key:generate
```

create tables in database
```sh
 php artisan migrate
``` 

create data in database
```sh
 php artisan db:seed
``` 

run project
```sh
 php artisan serve
``` 
(https://patreon.com/taylorotwell)


We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### why i use Repository Design Pattern 

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
