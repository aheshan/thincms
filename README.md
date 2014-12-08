Thincms
=======

A very basic thincms for building small sites using content management and word-press approach. Generally i found it difficult when i have to build content management in any web-application. If i choose word-press i have to follow it's rules also i can't code in normal way as beginner can but i have to follow it's rules. So i decided to build my own cms for building sites in core php way but using modern trend that composer provides.

Building the admin-app using gulp
===========
If you wish to change admin app do following steps.
Prerequisite to perform below steps: Nodejs should be installed in your system. 

1. Navigate to admin/scripts directory.
2. run: npm install
3. run: gulp clean
4. run: gulp build:all (this command will regenerate new scripts in relevant sub apps like category_app.js in category module)
