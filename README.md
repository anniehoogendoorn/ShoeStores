#Shoe Stores

By Annie Hoogendoorn 8/28/2015

This app allows a user to make lists of local shoe stores and the brands of shoes they carry.

##Setup for OSX

Clone project

1. Clone this repository using the command: `git clone https://github.com/anniehoogendoorn/ShoeStores.git`.
2. Change directory into the top level of the project folder.
3. Install Composer (https://getcomposer.org) and then run the command `composer install` to download the Silex and Twig vendor files.
4. Change directory into the `web` folder and start your server. For example, using PHP’s built-in server: `php -S localhost:8000`
4. Navigate your browser to the home page at the root address. For example: `http://localhost:8000`.

Recreate the **shoe_stores** database in MySql:

1. At Epicodus, open the bash terminal and run:
`mysql.server start`
followed by the command:
`mysql -uroot -proot`

If you're working with MAMP, once you've started the servers,
you can access your MySQL terminal by entering:
`/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot`

2. In the terminal, type:
```console
> CREATE DATABASE shoe_stores;
> USE shoe_stores;
> CREATE TABLE stores (id serial PRIMARY KEY, name VARCHAR (255));
> CREATE TABLE brands (id serial PRIMARY KEY, name VARCHAR (255));
> CREATE TABLE stores_brands (id serial PRIMARY KEY, store_id int, brand_id int);
```

Recreate the **shoes_test** database in MySql:

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
