<?php
    //Code is provided by AWS and available here; http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/AppendixSampleDataCodePHP.html
    
    // Date now needs to be set.
    date_default_timezone_set('Europe/London');
    
    // Find out what the issues are:
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
    
    //require '/var/www/html/vendor/autoload.php';
    require '/var/www/html/tmp1/send/vendor/autoload.php';
    use Aws\DynamoDb\DynamoDbClient;
    
    $client = DynamoDbClient::factory(array(
        'region' => 'us-east-1', 
        'version' => '2012-08-10'
    ));
    
    $tableNames = array();
    
    $tableName = 'ProductCatalog223';
    echo "Creating table $tableName..." . PHP_EOL;
    
    $response = $client->createTable(array(
        'TableName' => $tableName,
        'AttributeDefinitions' => array(
            array(
                'AttributeName' => 'Id',
                'AttributeType' => 'N' 
            )
        ),
        'KeySchema' => array(
            array(
                'AttributeName' => 'Id',
                'KeyType' => 'HASH' 
            )
        ),
        'ProvisionedThroughput' => array(
             'ReadCapacityUnits'  => 6,
             'WriteCapacityUnits' => 5
        )
    ));
    $tableNames[] = $tableName;
    
    $tableName = 'Forum33';
    echo "Creating table $tableName..." . PHP_EOL;
    
    $response = $client->createTable(array(
        'TableName' => $tableName,
        'AttributeDefinitions' => array(
            array(
                'AttributeName' => 'Name',
                'AttributeType' => 'S' 
            )
        ),
        'KeySchema' => array(
            array(
                'AttributeName' => 'Name',
                'KeyType' => 'HASH'
            )
        ),
        'ProvisionedThroughput' => array(
            'ReadCapacityUnits'  => 6,
            'WriteCapacityUnits' => 5
        )
    ));
    $tableNames[] = $tableName;
    
    $tableName = 'Thread33';
    echo "Creating table $tableName..." . PHP_EOL;
    
    $response = $client->createTable(array(
        'TableName' => $tableName,
        'AttributeDefinitions' => array(
            array(
                'AttributeName' => 'ForumName',
                'AttributeType' => 'S'
            ),
            array(
                'AttributeName' => 'Subject',
                'AttributeType' => 'S'
            )
        ),
        'KeySchema' => array(
            array(
                'AttributeName' => 'ForumName',
                'KeyType' => 'HASH'
            ),
            array(
                'AttributeName' => 'Subject',
                'KeyType' => 'RANGE'
            )
        ),
        'ProvisionedThroughput' => array(
            'ReadCapacityUnits'  => 6,
            'WriteCapacityUnits' => 5
        )
    ));
    $tableNames[] = $tableName;
    
    $tableName = 'Reply33';
    echo "Creating table $tableName..." . PHP_EOL;
    
    $response = $client->createTable(array(
        'TableName' => $tableName,
        'AttributeDefinitions' => array(
            array(
                'AttributeName' => 'Id',
                'AttributeType' => 'S' 
            ),
            array(
                'AttributeName' => 'ReplyDateTime',
                'AttributeType' => 'S' 
            ),
            array(
                'AttributeName' => 'PostedBy',
                'AttributeType' => 'S' 
            )
        ),
        'LocalSecondaryIndexes' => array(
            array(
                'IndexName' => 'PostedBy-index',
                'KeySchema' => array(
                    array(
                        'AttributeName' => 'Id',
                        'KeyType' => 'HASH'
                    ),
                    array(
                        'AttributeName' => 'PostedBy',
                        'KeyType' => 'RANGE'
                    ),
                ),
                'Projection' => array(
                    'ProjectionType' => 'KEYS_ONLY',
                ),
            ),
        ),
        'KeySchema' => array(
            array(
                'AttributeName' => 'Id',
                'KeyType' => 'HASH' 
            ),
            array(
                'AttributeName' => 'ReplyDateTime',
                'KeyType' => 'RANGE'
            )
        ),
        'ProvisionedThroughput' => array(
            'ReadCapacityUnits'  => 6,
            'WriteCapacityUnits' => 5
        )
    ));
    $tableNames[] = $tableName;
    
    foreach($tableNames as $tableName) {
        echo "Waiting for table $tableName to be created." . PHP_EOL;
        $client->waitUntil('TableExists', array('TableName' => $tableName)); // Changed from v2
        echo "Table $tableName has been created." . PHP_EOL;
    }
