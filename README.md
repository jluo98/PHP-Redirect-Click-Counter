# PHP Redirect Click Counter

A simple php script to record click count and redirect a url.

### Installation

This project is written in PHP, using MySQL as its primary database.

- Modify MySQL information at the beginning of both `redirect.php` and `click.php` according to your settings

```
// MySQL Database
$servername = "localhost";      // MySQL Host
$username = "user";             // Username for you database
$password = "pass";             // Password with your username
$dbname = "database";           // Database Name
```

- Put modified `redirect.php` and `click.php` to your server for public access.

### Usage

If you want to redirect to https://www.google.com, just visit

    https://example.com/redirect.php?forward=https://www.google.com

To see click records, just visit

    https://example.com/clicks.php

If no `http` or `https` query is in the forward string, `http://` will be automatically added. 

Use `//www.google.com` if you do not want to specify a query type. 

### Demo

To create/update a record and redirect to a url:

[https://demo.steve-luo.com/php-redirect-click-counter/redirect.php?forward=https://www.google.com](https://demo.steve-luo.com/php-redirect-click-counter/redirect.php?forward=https://www.google.com)

To view records:

[https://demo.steve-luo.com/php-redirect-click-counter/clicks.php](https://demo.steve-luo.com/php-redirect-click-counter/clicks.php)

### License

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.