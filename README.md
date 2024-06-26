# WebDev-Laragym

<h2>Start Up</h2>
Run the following commands

composer install

cp .env.example .env

php artisan key:generate
php artisan migrate
php artisan optimize

npm install
npm run dev

php artisan serve

*optional*
php artisan db:seed

<h2>Requirements Checklist</h2>
<html>
<table>
    <tr>
    <th style="width:100%;">Status</th>
    <th>Description</th>
    <th>Note</th>
    </tr>
    <tr>
        <th>✔</th>
        <th>MP1</th>
        <th>Fully Completed</th>
    </tr>
    <tr>
        <th>✔</th>
        <th>MP2</th>
        <th>Fully Completed</th>
    </tr>
    <tr>
        <th>✔</th>
        <th>MP3</th>
        <th>Fully Completed</th>
    </tr>
    <tr>
        <th>✔</th>
        <th>MP4</th>
        <th>Fully Completed</th>
    </tr>
    <tr>
        <th>¼</th>
        <th>MP5</th>
        <th>Registration Done</th>
    </tr>
    <tr>
        <th>✔</th>
        <th>Quiz 1</th>
        <th>Fully Completed</th>
    </tr>
    <tr>
        <th>✔</th>
        <th>Quiz 2</th>
        <th>Fully Completed</th>
    </tr>
    <tr>
        <th>✖</th>
        <th>Quiz 3</th>
        <th>Not Started</th>
    </tr>
    <tr>
        <th>✔</th>
        <th>Quiz 4</th>
        <th>Need: View Page for Transactions</th>
    </tr>
    <tr>
        <th>✔</th>
        <th>UT 1</th>
        <th>Need: Database Diagram</th>
    </tr>
    <tr>
        <th>✔</th>
        <th>UT 2</th>
        <th>Not Started</th>
    </tr>
    <tr>
        <th>✔</th>
        <th>TT Lec</th>
        <th>Not Started</th>
    </tr>
    <tr>
        <th>✔</th>
        <th>TT Lab</th>
        <th>Not Started</th>
    </tr>

</table>

</body>
</html>

Web Development Project Requirements
machine problems 20pts

 mp1 20pts 
CRUD functions single image upload 15pts
	CRUD functions using datatables multiple image uploads 20pts

mp2 20pts 
CRUD functions single image upload 15pts
	CRUD functions using datatables multiple image uploads 20pts
 
mp3 20pts 
CRUD functions single image upload 15pts
	CRUD functions using datatables multiple image uploads 20pts
 
mp4 20pts 
CRUD functions single image upload 15pts
	CRUD functions using datatables multiple image uploads 20pts
 
mp5 20pts 
User/Customer registration. user/customer profile should only be updated by the authenticated user. upload an image of the user. admininistrator can deactivate the user. 15 pts.

Upon user registration, the user will receive an email and confirm it. 20pts

term test Lab 30pts
transaction crud. send an email after the user completes the buying process. the administrator/employee updates the status of the customer's order/s. 20pts
the customer can now post a review/comment of the product/s bought. only customers that bought the products/service can write a review. 10pts



unit 1 20pts
database design. database should be normalized to at least 2NF. 10pts
create all database tables using migration scripts 5pts
create database seeders for parent tables. 5pts

unit test 2 20pts
program execution (errors) 10pts
UI/UX Design 10pts

quiz 1 15pts
Form Validation. check for validation errors on create and edit forms on mp1 - mp4

quiz 2 15pts
search function. search for products or services on the homepage. the result of the search is a list of products/services with links to its details. datatables search is not applicable.

quiz 3 15pts
3 charts bar line pie 10pts
3 charts bar line pie with join query 15 pts

quiz 4 15pts
basic authentication. authenticated users can access crud pages  10pts
manual user authentication with roles. only admin users can access crud pages. only authenticated users can complete a transaction 15pts     

Term Test 
Functional Requirements completeness 10pts
code contribution 10pts


APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:Vf9F8oP7cvvb0SuGntWYD0kGb4gic+E7Jg1zhMU20rU=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gym
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=33e98bc85ceb65
MAIL_PASSWORD=bdebe6e324b84e
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="fitzone@gmail.com.ph"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

ALGOLIA_APP_ID=3IWPAD07EJ
ALGOLIA_SECRET=a0b00dc67d166e7d30182e6a657e1505
