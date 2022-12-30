<?php

include 'security/dynamodb-loader.php';

//https://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-dynamodb.html
//https://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.DynamoDb.DynamoDbClient.html

class memories {
    public $id;
    public $date;
    public $time;
    public $about;
    public $msg;
}

$iterator = $client->getIterator('Scan', array(
    'TableName' => 'SendEmailMessage'
));

$mList = array(new memories);

foreach ($iterator as $item) {
    array_push($mList, (object)[
        'id' => $item['Id']['N'],
        'date' => $item['1Date']['S'],
        'time' => $item['2Time']['S'],
        'about' => $item['3About']['S'],
        'msg' => $item['4Message']['S'],
    ]);
}// foreach

// usort($mListid, function($a, $b) {
//     return $a->id < $b->id ? 1 : -1;
// });

usort($mList, function($a, $b) {
    return $a->id < $b->id ? 1 : -1;
});

// echo "<pre style='color:White;'>";
// foreach ($mListid as $n) {
//     $tmp1 = $n->id;
//     echo 'esse numero: ' . strval($tmp1) . '<br>';
// }// foreach
// echo "</pre>";


echo "<pre style='color:White;'>";
echo getenv('HOME');
echo "</pre>";



// echo "<pre style='color:Orange;'>";
// foreach ($mList as $n) {
//     $tmpId = $n->id;
//     $tmpDate = $n->date;
//     $tmpTime = $n->time;
//     $tmpAbout = $n->about;
//     $tmpMsg = $n->msg;
    
//     if($tmpId !== NULL){
//         echo 'id: ' . strval($tmpId) . '<br>';
//         echo 'date: ' . strval($tmpDate) . '<br>';
//         echo 'time: ' . strval($tmpTime) . '<br>';
//         echo 'about: ' . strval($tmpAbout) . '<br>';
//         echo 'message: ' . strval($tmpMsg) . '<br>';
//     }
//     echo '<br>';
// }// foreach
// echo "</pre>";

// ***************** MOSTRA OS DADOS (DYNAMODB)
echo "<table class='lista'>";
echo "
<thead><tr>
<th style='width:3%' id='thID'>ID
<th style='width:6%' id='thDate'>Date
<th style='width:6%' id='thTime'>Time
<th style='width:25%' id='thAbout'>About
<th style='width:57%' id='thText'>Text
<th style='width:3%' id='thDel'>del
</thead><tbody>";

foreach ($mList as $n) {
    $tmpId = $n->id;
    $tmpDate = $n->date;
    $tmpTime = $n->time;
    $tmpAbout = $n->about;
    $tmpMsg = $n->msg;
    
    if($tmpId !== NULL){
        echo "<tr><td id='tdID'>" . strval($tmpId) . "</td><td id='tdDate'>" . strval($tmpDate) . "</td><td id='tdTime'>" . strval($tmpTime) . "</td><td id='tdAbout'>" . strval($tmpAbout) . "</td><td id='tdText'> " . strval($tmpMsg) . "</td>";
        echo "<td id='tdDel'><button class='send1' id=" . strval($tmpId) . " onclick='reqpass2(this.id)'>del</button></td>";
        echo "<td></td></tr>";
    }
}
echo "</tbody></table>";


// ***************** MOSTRA OS DADOS (CACHE)
// echo "<table class='lista'>";
// echo "
// <thead><tr>
// <th style='width:3%' id='thID'>ID
// <th style='width:6%' id='thDate'>Date
// <th style='width:6%' id='thTime'>Time
// <th style='width:25%' id='thAbout'>About
// <th style='width:57%' id='thText'>Text
// <th style='width:3%' id='thDel'>del
// </thead><tbody>";

// for ($x = 0; $x <= 10; $x++) {
//     $tmpId = "id" . strval($x);
//     $tmpDate = "date" . strval($x);
//     $tmpTime = "time" . strval($x);
//     $tmpAbout = "about" . strval($x);
//     $tmpMsg = "msg" . strval($x);

//     echo "<tr><td id='tdID'>" . $tmpId . "</td><td id='tdDate'>" . $tmpDate . "</td><td id='tdTime'>" . $tmpTime . "</td><td id='tdAbout'>" . $tmpAbout . "</td><td id='tdText'> " . $tmpMsg . "</td>";
//     echo "<td id='tdDel'><button class='send1' id=" . $tmpId . " onclick='reqpass2(this.id)'>del</button></td>";
//     echo "<td></td></tr>";
// }
// echo "</tbody></table>";

?>