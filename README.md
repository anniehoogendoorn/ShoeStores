#Shoe Stores

By Annie Hoogendoorn 8/28/2015

This app allows a user to make lists of local shoe stores and the brands of shoes they carry.

##Setup for OSX

1. Clone this repository using the command: `git clone https://github.com/anniehoogendoorn/ShoeStores.git`.
2. Change directory into the top level of the project folder.
3. Install Composer (https://getcomposer.org) and then run the command `composer install` to download the Silex and Twig vendor files.
4. Change directory into the `web` folder and start your server. For example, using PHP’s built-in server: `php -S localhost:8000`
4. Navigate your browser to the home page at the root address. For example: `http://localhost:8000`.

To recreate the shoe_stores database in MySql follow these steps:
1. At Epicodus, open the bash terminal and run:
`mysql.server start`
followed by the command:
`mysql -uroot -proot`

If you're working with MAMP, once you've started the servers,
you can access your MySQL terminal by entering:
`/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot`

2. In the terminal, type:
```console
`> CREATE DATABASE shoe_stores;`
`> USE shoe_stores;`
`> CREATE TABLE stores (id serial PRIMARY KEY, name VARCHAR (255));`
`> CREATE TABLE brands (id serial PRIMARY KEY, name VARCHAR (255));`
`> CREATE TABLE stores_brands (id serial PRIMARY KEY, store_id int, brand_id int);`
```

To recreate the Mysql shoes_test database, follow these steps:

1. On your home computer, open MAMP and click "Start Servers". On Epicodus computers, in the Bash terminal enter: `$ apachectl start`
2. Use your browser to open `localhost:8888/phpmyadmin`, or if you're at Epicodus `localhost:8080/phpmyadmin`.
3. On the left sidebar of the phpMyAdmin screen select the `shoe_stores` database and a new screen will appear. This view shows us our tables.
4. Select Operations from the tabs at the top of the screen.
5. In the box labelled `Copy database to:` we enter the name of our new database: shoe_stores_test.
6. Click Go and you'll see a new database has appeared in the sidebar called `shoes_test`.


## Technologies Used

PHP, MySql, Silex, Twig, HTML, CSS, Bootstrap


### Legal

Copyright (c) 2015 Annie Hoogendoorn

This software is licensed under the MIT license.

Permission is hereby granted, on a donation basis, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
