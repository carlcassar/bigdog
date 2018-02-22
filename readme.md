# BigDog Test Project

This is a test project completed during a trial day interview. The requirements were to make a web form to collect some
useful information. The form data is sent using AJAX but falls back to being a normal form when is disabled. The form 
has client and server side validation. It also contains an image upload field to upload selfies. The selfie is resized 
and cropped before being saved.

## Installation instructions

First things first, you'll need to clone the repository to your own machine:

```
git clone https://github.com/carlcassar/bigdog.git
```

Next you should install the required dependencies:
```
composer install
yarn
```

Don't forget to run Laravel Mix using:
```
yarn run dev
```

You'll need to make a new database to store the data collected from the form. Once you have added the database details
to your local .env file, you are ready to run:
```
php artisan migrate
```

You should now be able to load the project in the browser. If you're using Laravel Valet, head over to [http://bigdog.test/](http://bigdog.test).

Feel free to let me know if I've missed anything.
