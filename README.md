# Movie Theater Django + Laravel Backend Project

## Dev environment setup
- python3 -m venv env
- source env/bin/activate
- pip install -r requirements.txt

In movie_theater_laravel, navigate to .env and set the DB_DATABASE=../../db.sqlite3

- python manage.py migrate
- python manage.py createsuperuser
- cd movie_theater_laravel
- php artisan db:seed

## Reset DB
- php artisan db:wipe
- python manage.py migrate

## Basic Functionality
- python manage.py runserver
- cd movie_theater_laravel
- php artisan serve --port 8001

- Navigate to localhost:8000 for a calendar allowing you to read dates on the Django side
- Navigate to localhost:8001/top-theater/any_date allowing you to read dates on the Laravel side (format: YYYY-MM-DD)

- How to add records manually:
- Navigate to localhost:8000/admin, make sure to create a super user before this step

### Schema and Design
Movie -> Represents a Movie object, title and genre \
Theater -> Represets a Theater object, name and location \
Sales -> Represents a mapping table between Movie and Theater

1. Theater and Sales -> One to Many
2. Movie and Sales -> One to Many
3. Sales -> Many to Many Intermediary between Movie and Theater with the price attribute

Project Structure and Design:
- Monolithic

Database:
- db.sqlite3

### Extensions for the Django side
- Basic data analysis of movies, theaters, and sales
- Web app UI interactivity with JavaScript/jQuery Calendar

### Minor extension for the Laravel side
- Seeder
