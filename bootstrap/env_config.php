<?php

/**
 * .env file definitions.
 */

$env = parse_ini_file(__DIR__ . '/../.env');
define('BASE_URL', $env['BASE_URL']);
define('SGBD', $env['SGBD']);
define('HOST', $env['HOST']);
define('DB_NAME', $env['DB_NAME']);
define('USERNAME', $env['USERNAME']);
define('PASSWORD', $env['PASSWORD']);