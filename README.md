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

# database

<img src="database.jpg">


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
[http://127.0.0.1:8000/](http://127.0.0.1:8000/)

