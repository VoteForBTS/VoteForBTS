<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>배너 텍스트 변경</title>
    <style>
      body {
        font-family: Consolas, monospace;
        font-family: 12px;
      }
    </style>
  </head>
  <body>
      test php
    <?php
      $text_type = $_POST[ 'text_type' ];
      $left_txt = $_POST[ 'left_txt' ];
      $right_txt = $_POST[ 'right_txt' ];
      echo "$text_type";
      $conn = mysqli_connect(
        "52hz.kr",
        'admintamb',
        'bts130613!',
        'admintamb');

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $txt_val = $left_txt.";".$right_txt;
        $data_id = "";
        if($text_type == "normal")
          $data_id = "BANNER_TEXT";
        else 
        $data_id = "BANNER_TEXT_ALRET";

        $sql = "INSERT INTO WEB_DATA (ID, DATA, DATETIME)
        VALUES ('$data_id','$txt_val', NOW())";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        
    ?>
  </body>
</html>
