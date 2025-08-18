<?php

const PRONAME = "Electeronic_Shop";
const SERVER = "localhost";
const DATABASE_NAME = "eshop";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE = "mysql";

$dns = DATABASE . ":host=" . SERVER . ";dbname=" . DATABASE_NAME . ";";

$Connect = new PDO($dns, username: USERNAME, password:PASSWORD);
