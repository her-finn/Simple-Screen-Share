# Simply share your screen through a website
Just install the repo in your Webroot and Share your screen!

## Installation:
```
git clone https://github.com/her-finn/Simple-Screen-Share.git
cd Simple-Screen-Share/
composer install
npm i
cp .env.example .env
php artisan key:generate
nano .env
php artisan migrate
chown -R www-data:www-data *
```
#### Crontab:
```
crontab -e
*/10 * * * * /usr/bin/php /var/www/screen-share/artisan cleanup
```

## Screenshots:
![image](https://user-images.githubusercontent.com/58078450/132226082-2964dbad-506f-4b2c-a2b4-afe2fb294030.png)
![image](https://user-images.githubusercontent.com/58078450/132226110-ec7a05b5-26ab-45df-a7bf-35e5c9fdba0d.png)
![image](https://user-images.githubusercontent.com/58078450/132226152-b43bf2eb-efb2-4fc9-9fb8-5b62711c8498.png)

## Note:
> At the moment the project only works on PC, Notebook, MacBook, IPad.
> It doesn't work on smartphones because of the WebRtc API, which is
> necessary to share the screen. As soon as it becomes available, this
> repository will be updated.
