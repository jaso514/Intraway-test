After make Clone of the github project is necesary make ´composer install´ to install all the dependencies of laravel.

To configure the api is necessary have the modrewrite enabled and use the next virtual hos config in you httpd-vhost.conf or the file when you configure the virtual host:

```apache
<VirtualHost *:80>
    ServerName local.intraway.vh
    DocumentRoot "/directory/to/intraway-test/public"
    LogLevel info
    ErrorLog "/directory/to/intraway-test/storage/logs/error.log"
    CustomLog "/directory/to/intraway-test/storage/logs/access.log" common
    <Directory "/directory/to/intraway-test/public">
        AllowOverride Options FileInfo
         Require all granted      
    </Directory>
</VirtualHost>
```

In the hosts file you need to add the next line:
127.0.0.1 local.intraway.vh


An example to test the api with CURL is:
curl -X GET -H "Cache-Control: no-cache" -H "Postman-Token: 9a1e999c-715b-b014-bbc2-1bfa79b3ba67" "http://local.intraway.vh/fizzbuzz/5/17"

You can use an rest client like postman to test the api using the  url in the curl command (http://local.intraway.vh/fizzbuzz/5/17) with the GET method.

The method that have the code is in: .\app\Http\Controllers\Controller.php

The Unit test file is in: .\tests\IntraWayTest.php

To prove the unit test you can run ./vendor/bin/phpunit

