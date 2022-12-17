<?php
  //ini_set("display_errors", "1");
  //error_reporting(E_ALL);

  include 'db1.php';

  $checkcc = '';
  $about = strtoupper($_POST['out_about']);
  $comment = strtoupper($_POST['out_comment']);

  //echo "<textobranco>cc: " . $checkcc . "</textobranco><br><br>";

  // if (empty($_POST["job"])) {
  //   echo "<textoverde>[ Checkbox unchecked ]</textoverde><br><br>";
  // } else {
  //   echo "<textoverde>[ Checkbox CHECKED ]</textoverde><br><br>";
  //   $checkcc = 'marcio.barcellos@metadados.com.br';
  // }

  if ($comment <> "") { 
    date_default_timezone_set("America/Sao_Paulo");
    $date1 = date("d/m/Y");
    $time1 = date("H:i:s");
    $week1 = date("l");

    //echo "<textobranco>Date: " . $date1 . " ( " . $week1 . " ) - " . $time1 . "</textobranco><br><br>";

    $sql = "INSERT INTO tabelasend (date, time, about, comment) VALUES ('$date1', '$time1', '$about', '$comment')";

    if (!mysqli_query($cone, $sql)) {
      die('Ocorreu erro ao inserir as informações no banco de dados.');
    } else {
      echo "Informações enviadas com sucesso.";
    }
  }

  include 'dataemail-aws.php';

?>