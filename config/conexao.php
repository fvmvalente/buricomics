<?php
$config = parse_ini_file("config.ini",true);
$db = new mysqli($config["DB"]["dbhost"], 
                 $config["DB"]["dbuser"], 
                 $config["DB"]["dbpass"], 
                 $config["DB"]["dbname"]);