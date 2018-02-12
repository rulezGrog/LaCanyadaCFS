<?php

//Comenzamos la sesión, esto se explica despues en el Sistema de Login
session_start();

        //conexion a Socios

        //LOCAL******************

        define('DB_HOST_AG', 'localhost');
        define('DB_USER_AG', 'root');
        define('DB_PASS_AG', '');
        define('DB_NAME_AG', 'lacanyada2');

        //ONLINE NUEVA******************

        // define ('DB_HOST_AG', 'db665957498.db.1and1.com');
        // define ('DB_USER_AG', 'dbo665957498');
        // define ('DB_PASS_AG', 'Lacanyada12');
        // define ('DB_NAME_AG', 'db665957498');


        //ONLINE VIEJA******************

        // define ('DB_HOST_AG', 'db630685183.db.1and1.com');
        // define ('DB_USER_AG', 'dbo630685183');
        // define ('DB_PASS_AG', 'Lacanyada12');
        // define ('DB_NAME_AG', 'db630685183');

        //ONLINE---PRUEBAS------******************

        // define ('DB_HOST_AG', 'db644662919.db.1and1.com');
        // define ('DB_USER_AG', 'dbo644662919');
        // define ('DB_PASS_AG', 'al191650W.');
        // define ('DB_NAME_AG', 'db644662919');

        $ilink=mysql_connect(DB_HOST_AG, DB_USER_AG, DB_PASS_AG) or die(mysql_error());
        $dgAg = mysql_select_db(DB_NAME_AG, $ilink);
        // mysql_set_charset('utf8mb4', $ilink);
