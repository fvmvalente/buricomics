<?php
$config = parse_ini_file("config.ini",true);


$db = new mysqli($config["BANCO_DE_DADOS"]["dbhost"], $config["BANCO_DE_DADOS"]["dbuser"], $config["BANCO_DE_DADOS"]["dbpass"], $config["BANCO_DE_DADOS"]["dbname"]);