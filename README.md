# MultiWorlds website

Website for my game MultiWorlds. It contains a forum where people can talk about the game.

## Dependencies

* php 8.1
* composer

## Installation 

1. Clone the project
```
git clone https://github.com/MarcoMeijer/modern-web.git
```

2. Go into the directory
```
cd modern-web
```

3. Install dependencies
```
composer install
```

4. Copy the .env.example file to .env. Edit this file to the correct values for your system.
```
cp .env.example .env
```

5. Run migrations, this will create and fill the database
```
php artisan migrate:fresh --seed
```

## Running

Run the following command to run the server

```
php artisan serve
```

## Author

Marco Meijer
