<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="./styles/styles.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      require_once "./PHP/autoload.php";
      $table = 1;
      $rows = 4;
      $cells = 4;
      $click = new Clicked();
      //1e
      $celldata = new cellData();
      //2e
      $check = new Check();
      //3e


      if (isset($_GET['id'])){
        $click->setClicked($_GET['id']);
        $celldata->setCellData($click->getClicked());
        $check->setCheck($celldata->getCellData()[$_GET['id']]);
        $check->setDecision($check->getCheck()[0], $check->getCheck()[1], $check->getCheck()[2], $check->getCheck()[3]);
        $celldata->setTurn($check->getDecision(), $check->getCheck());
      };

      if (isset($_GET['START||RESTART'])){
        $click->setClicked($_GET['START||RESTART']);
        $celldata->setCellData($click->getClicked());
        $_SESSION['arrayCheck'] = array();
      }

      echo "<div class='memory'>";
      echo "<h3> -- Memory game in PHP only -- </h3>";
      echo $celldata->getTurn();
      echo "Number 1 : <strong> ".$check->getCheck()[1] ."</strong> <br> Number 2 : <strong> ". $check->getCheck()[3] ."</strong>";
      echo "<br>";
      echo "<br>";
      for ($i=0; $i < $table; $i++) {
        echo "<table>".PHP_EOL;
        for ($r=0; $r < $rows ; $r++) {
          echo "<tr>".PHP_EOL;
          for ($c=0; $c < $cells ; $c++) {
            $id = $r * $rows + $c;
            echo "<td><a href=\"?id=$id\"><button class='button' name='button'>".$celldata->getCellData()[$id]."</p></button></a></td>".PHP_EOL;
          }
          echo "</tr>".PHP_EOL;
        }
        echo "</table>".PHP_EOL;
      }
      echo "<a href =\"?START||RESTART\"><button class='restart'>start/restart</button></a>";
      echo "</div>";
    ?>
  </body>
</html>
