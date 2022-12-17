
<?php

date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

// CAMINHO PARA QUANDO ESTIVER NO SERVIDOR
//require '/var/www/html/tmp1/send/vendor/autoload.php';

// CAMINHO PARA QUANDO ESTIVER LOCAL
require 'vendor/autoload.php';
use Aws\DynamoDb\DynamoDbClient;

$client = DynamoDbClient::factory(array(
    'region' => 'us-east-1', 
    'version' => '2012-08-10' 
));

?>