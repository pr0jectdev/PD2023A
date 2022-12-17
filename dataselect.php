<?php

include 'db1.php';

// = = = = = MOSTRA DADOS TABELA = = = = =
$sql1 = "SELECT control, date, time, about, comment FROM tabelasend ORDER BY control DESC";
$res1 = $cone->query($sql1);

if ($res1->num_rows > 0) {
  // output data of each row
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

  //HOW SET CSS TO ONE COLUMN    
  while ($row = $res1->fetch_assoc()) {
    echo "<tr><td id='tdID'>" . $row["control"] . "</td><td id='tdDate'>" . $row["date"] . "</td><td id='tdTime'>" . $row["time"] . "</td><td id='tdAbout'>" . $row["about"] . "</td><td id='tdText'> " . nl2br($row["comment"]) . "</td>";
    echo "<td id='tdDel'><button class='send1' id=" . $row["control"] . " onclick='reqpass2(this.id)'>del</button></td>";
    echo "<td></td></tr>";
  }
  echo "</tbody></table>";
} else {
    echo "0 results";
}

$cone->close();
?>