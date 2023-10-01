ขั้นตอน
1. composer install
2. npm install
3. npm run dev
4. เปลี่ยนชื่อไฟล์ .env.example เป็น .env เพื่อใช้งาน
5. 
DB_CONNECTION=mysql \n
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=root
DB_PASSWORD=
ตั้งค่าเชื่อมต่อ databas

6. php artsan cache:clear
7. php artisan config:clear
8.  php artisan key:generate
9. php artisan migrate
10. php artisan db:seed --class=DatabaseSeeder
ทำการสร้าง user 100 คน พร้อมสร้างห้องซื้อขายแล้ว
email: test1-100@gmail.com
password: test1234
11. php artisan optimize
12. composer dump-autoload
13. php artisan serv

router 
/home
/login
/regiser
/rooms 
