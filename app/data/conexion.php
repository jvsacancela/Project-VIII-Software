<?php 

   define ('SERVIDOR', 'bijumwqlt1yyjbrlsjhm-mysql.services.clever-cloud.com');
   define ('USUARIO', 'uubqrs3yqh7z6cus');
   define ('CLAVE', 'egFAyeEA9hFPlCWGL7kj');
   define ('BDD', 'bijumwqlt1yyjbrlsjhm');

   # define ('SERVIDOR', 'localhost');
   # define ('USUARIO', 'root');
   # define ('CLAVE', '');
   # define ('BDD', 'p8swbdd');

    $conexion = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BDD) or die ("Error de conexion");
?>