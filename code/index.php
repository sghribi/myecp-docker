<?php

$mysql =  new PDO(
    'mysql:host=mysql;dbname=myecp',
    'myecp',
    'myecp'
);

$psql =  new PDO(
    'pgsql:host=postgres;dbname=myecp',
    'myecp',
    'myecp'
);

echo phpinfo();

