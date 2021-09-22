<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


This is a basic task management system with components.
```
composer install
```
```
npm install
```

Create a database, then migrate tables.
```
touch database/database.sqlite
```
```
php artisan migrate --seed
```

Username: m_akkurt@live.com 
<br />
Password: password



##API Usage

You can use api with bearer token


```
http://127.0.0.1:8000/api/v1/
```

| Service | Method | URL |
| ------ | ------ | ------ |
| List tasks | GET | api/v1/tasks |
| Show task | GET | api/v1/tasks/{id} |
| Edit task | POST | api/v1/tasks/{id} |
| Destroy task | DELETE | api/v1/tasks/{id}/destroy |
| List tasks | GET | api/v1/task-statusses |
