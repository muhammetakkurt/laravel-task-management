
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
| List task statuses | GET | api/v1/task-statusses |
