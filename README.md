### Uji Radius Putar

##### Clone Project
```
 git clone https://github.com/ASNProject/uji-radius-putar.git
```
<b > Jika menggunakan xampp/ Windows, download file dan simpan di dalam C:/xampp/htdocs</b>

- Rename .env.example dengan .env dan sesuaikan pengaturan DB seperti dibawah
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_radius
DB_USERNAME=root
DB_PASSWORD=
```
- Download database di folder ```sql``` dan import di mysql

##### Run Project
- Run Composer
```
composer update
```

- Run server
```
php artisan serve
```
- Development
```
php artisan serve --host=0.0.0.0 --port=8000
```

#### Route
##### Radius
- Post
```
Route : http://127.0.0.1:8000/api/radius

Body: 
{
    "mode": "Kanan",
    "calcMode": "1",
    "radius": 90,
    "result": "Lolos"
}
```