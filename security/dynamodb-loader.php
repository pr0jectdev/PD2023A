
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
use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\Credentials\CredentialProvider;

$client = DynamoDbClient::factory(array(
    'region' => 'us-east-1', 
    'version' => '2012-08-10' 
));

// try{
//     $profile = 'default';
//     $path = 'C:/Users/master/.aws/credentials';
//     $provider = CredentialProvider::ini($profile, $path); 
//     $provider = CredentialProvider::memoize($provider);
    
//     $client = DynamoDbClient::factory(array(
//         'region' => 'us-east-1', 
//         'version' => 'latest',
//         'credentials' => $provider,
//         'http' => array(
//             'verify' => false
//         )
//     ));

// } catch(DynamoDbException $e){
//     echo "<pre style='color:White;'>";
//     echo $e->getMessage() . "\n";
//     echo "</pre>";
// }

?>