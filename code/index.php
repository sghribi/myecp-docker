<?php
mysql_connect("mysql", "myecp", "myecp");
pg_connect("host=postgresql dbname=myecp user=myecp password=myecp");

echo phpinfo();

