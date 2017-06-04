
<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'alphauser');
   define('DB_PASSWORD', 'alphaDB');
   define('DB_DATABASE', 'AlphaDb');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE)OR DIE ('COULD NOT CONNECT TO MYSQL:'.mysqli_connect_error());
?>