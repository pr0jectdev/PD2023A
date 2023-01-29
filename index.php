<!DOCTYPE html>
<html>
<head>
  <title>send</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="scripts/datainsert.js"></script>
  <link rel="stylesheet" href="style/sty1.css">
  <link rel="shortcut icon" href="assets/favicon1.ico" type="image/x-icon">
  <link rel="icon" href="assets/favicon1.ico" type="image/x-icon">
</head>
<!-- <body oncontextmenu="return false;"> -->
<body>

  <div class="wrapper">
    <!-- DIV WRAPPER -->
    <!-- <script src="scripts/desativar.js"></script> -->

    <script>
      function reqpass2(clicked) {
        var pswd = prompt("pass", "");
        //if (pswd != null) {
        if (pswd == 1111) {
          var clicado = clicked;
          window.location.href = "dataremove.php?id=" + clicado;
        }
      }
    </script>

    <table class="Tabela_1">
      <tr>
        <th></th>
        <th></th>
      </tr>
      <tr>
        <td id='tdSEND'>
          <textoverde>To Do List:</textoverde><br><br>
          <textarea cols="50" rows="1" id="about" style="text-transform:uppercase"></textarea><br><br>
          <textarea cols="80" rows="10" id="comment" wrap="hard" style="text-transform:uppercase"></textarea><br><br>
          <table class="envia">
            <tr>
              <th align="center"><input type="checkbox" name="job" disabled>
                <textoverde>job</textoverde>
              </th>
              <th align="center"><input type="button" id="btnSend" class="send1" value="send" /></th>
            </tr>
          </table>
        </td>

        <td id='tdUPLOAD'>

          <!-- Display upload status -->
          <div id="uploadStatus" class="z"></div>

          <br><br>
          <!-- Progress bar -->
          <div class="progress" id="z">
            <div class="progress-bar" id="z"></div>
          </div>

          <br>
          <div class="textoSizeProgress" id="SizeProgress"></div>
          <br>

          <form id="form" method="post" enctype="multipart/form-data">
            <h2>Upload File</h2>
            <input type="file" name="photo" class="bUpload" id="photo"><br>
            <br>
            <input type="submit" name="submit" class="bUpload" id="submit" value="Upload">
            <br><br>
            <textobranco><strong>Extension:</strong> zip, 7z, rar, mp3, xml, docx, jpg, png, jpeg, gif</textobranco>
            <br>
            <textobranco><strong>Max size:</strong> 100 MB</textobranco>
          </form>

          <br>
          <div class="z" id="x_resultado"></div>
          <br><br>
          <script src="scripts/dataupload.js"></script>
        </td>
      </tr>
    </table>

    <br>

    <?php 
        echo "<pre style='color:White;'>";
        echo "TESTE";
        echo "</pre>";
    
    ?>

    <?php include 'dataselectdynamo.php'; ?>

    <br>
    <div class="push"></div>
  </div> <!-- DIV WRAPPER -->
  
  <!--RODAPÉ-->
  <footer>
    <p>
      <a href="https://github.com/pr0jectdev/PD2023A/issues">Report bug</a>
    </p>
  
    <p>CI/CD 07012023:1356</p>
      
    <p>Developers:  
      <a href="https://github.com/wiz2k20" target="_blank" class="devName">Márcio Barcellos</a> and 
      <a href="https://github.com/HelenaOliveira366" target="_blank" class="devName">Helena Oliveira</a>
    </p>
  
    <p>Created on: 24/08/2019 | Last update: 29/01/2023</p>
  </footer>

  <!-- <script src="scripts/datainsert.js"></script> -->

</body>
</html>