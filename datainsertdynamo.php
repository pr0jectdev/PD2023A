<?php

include 'security/dynamodb-loader.php';

$checkcc = '';
$about = strtoupper($_POST['out_about']);
$comment = strtoupper($_POST['out_comment']);

if ($comment <> "") 
{ 
    date_default_timezone_set("America/Sao_Paulo");
    $date1 = date("d/m/Y");
    $time1 = date("H:i:s");
    $week1 = date("l");

    $iterator = $client->getIterator('Scan', array(
        'TableName' => 'SendEmailMessage'
    ));

    $numbers = [];

    foreach ($iterator as $item) {
        array_push($numbers, $item['Id']['N']);
    }

    $maxnumber = max($numbers);
    $nextnumber = $maxnumber + 1;

    $tableName = 'SendEmailMessage';
    $response = $client->batchWriteItem(array(
        'RequestItems' => array(
            $tableName => array(
                array(
                    'PutRequest' => array(
                        'Item' => array(
                            'Id'       => array('N' => (string) $nextnumber),
                            '1Date'    => array('S' => $date1),
                            '2Time'    => array('S' => $time1),
                            '3About'   => array('S' => $about),
                            '4Message' => array('S' => $comment)
                        )
                    ),
                )
            ),
        ),
    ));

    $maxnumber = 0;
    $nextnumber = 0;

    //echo "<textobranco>Date: " . $date1 . " ( " . $week1 . " ) - " . $time1 . "</textobranco><br><br>";
}

include 'dataemail-aws.php';

?>;