Thincms
=======

A very basic thincms for building small sites using content management and core PHP approach. Generally i found it difficult when i have to build content management in any web-application. If i choose word-press i have to follow it's rules for creating theme which can be difficult initially a core PHP developer, also i can't code in normal way as beginner can, but i have to follow wordpress rules. So i decided to build my own cms for building sites in core php way but using modern trend that composer provides in PHP community.

setup
==
Once you clone or download this repository and paste it your server root directory do below steps.
**Prerequisite to perform below steps: PHP5.5.4 and [Composer](http://composer.org "Composer") should be installed in your system.** 

1. navigate to thincms directory from your command prompt.
2. Type: **composer install**
3. Type: **composer dump-autoload**
4. Open **config/db_config.php** file and setup database parameter in PHP array.
5. Create database in mysql named **thincms**.
6. Create database structure using **db/thincms_structure.sql**.
5. Open **config/ap_config.php** and set your default theme in PHP array.
6. Navigate to [http://localhost/thincms](http://localhost/thincms "http://localhost/thincms") in your browser.
7. For admin panel navigate to [http://localhost/thincms/admin](http://localhost/thincms/admin "http://localhost/thincms/admin")
8. Enter default admin credential as admin/admin.

Building the admin client app using gulp
===========
If you wish to change admin app inside script which is built using [angularjs](http://Angularjs.org "Angularjs") do following steps.
**Prerequisite to perform below steps: Nodejs should be installed in your system.** 

1. Navigate to admin/scripts directory.
2. run: npm install
3. run: gulp clean
4. run: gulp build:all (this command will regenerate new scripts in relevant sub apps like category_app.js in category module)

UNDER CONSTRUCTION!
==
