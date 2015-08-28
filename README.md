# Shoe Stores

#####  MySql exercise for Epicodus, 8/28/2015

#### By Annie Hoogendoorn

## Description

This app allows a user to list out local shoe stores and the brands of shoes they carry.

##Setup

1. Clone this repository using the command `git clone https://github.com/anniehoogendoorn/ShoeStores.git`.
2. Change directory into the top level of the project folder.
3. Install Composer (https://getcomposer.org) and then run the command `composer install` to download the Silex and Twig vendor files.
4. Change directory into the `web` folder and start your server. For example, using PHP’s built-in server: `php -S localhost:8000`
4. Navigate your browser to the home page at the root address. For example: `http://localhost:8000`.

To recreate the shoes database in MySql follow these steps:
1. At Epicodus, open the bash terminal and run:
`mysql.server start`
followed by the command:
`mysql -uroot -proot`

If you're working with MAMP, once you've started the servers,
you can access your MySQL terminal by entering:
`/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot`

2. In the terminal, type:
`> CREATE DATABASE shoes;`
`> USE shoes;`
`> CREATE TABLE stores (id serial PRIMARY KEY, name VARCHAR (255));`
`> CREATE TABLE brands (id serial PRIMARY KEY, name VARCHAR (255));`
`> CREATE TABLE stores_brands (id serial PRIMARY KEY, store_id int, brand_id int);`

To recreate the Mysql shoes_test database, follow these steps:


## Technologies Used

HTML
Twig
Silex
PHP
MySql

### Legal

Copyright (c) 2015 Annie Hoogendoorn

This software is licensed under the MIT license.

Permission is hereby granted, on a donation basis, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
