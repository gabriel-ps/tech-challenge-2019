# Hubchain Technologies 2019 Tech Challenge
[Official Site](https://tech-challenge.hubchain.com)

## Development
Instructions to run application in development mode

### Requisites
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/)
- [Git](https://git-scm.com/)
- [NodeJS](https://nodejs.org/en/)
- [PHP @ 7.2](https://www.php.net/)
- [MySQL](https://www.mysql.com/)

### Clone Repository
```
git clone git@bitbucket.org:hubchainteam/tech-challenge-qa.git
```

### Install Dependencies
```
cd tech-challenge

composer install  # install Laravel

npm install       # install node dependencies
```

### Configure .env
```
cp .env-example .env
php artisan key:generate
nano .env
```
**Creating local database**
```
mysql -uroot -hlocalhost -proot

CREATE DATABASE desafio_hubchain;
```

*MySQL Configuration Example*
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desafio_hubchain
DB_USERNAME=root
DB_PASSWORD=root
```

**Creating tables**
```
php artisan migrate
```

### Run
```
php artisan serve
```
Access http://localhost:8000
