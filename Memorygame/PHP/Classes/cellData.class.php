<?php

  class cellData {

    private $numbers = array(1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8);
    private $topCard = array("?","?","?","?","?","?","?","?","?","?","?","?","?","?","?","?");
    private $output;
    private $id;

    public function setCellData($data){
      $this->id = $data;
    }

    public function getCellData(){
      if ($this->id == $_GET['START||RESTART']) {
          $this->output = $this->topCard;
          $_SESSION['output'] = $this->output;
          shuffle($this->numbers);
          $_SESSION['numbers'] = $this->numbers;
        } else if ($_SESSION['output'][$this->id] == "X") {
          $_SESSION['output'][$this->id] = "X";
        } else {
          $_SESSION['output'][$this->id] = $_SESSION['numbers'][$this->id];
        }
        return $_SESSION['output'];
      }

  // wanneer er voor de 1e keer op de start/restart button geklikt wordt komen er allemaal vraagtekens vanuit de array topcard naar voren toe
  // zodra er dan op een button geklikt wordt komt er een random nummer naar voren toe.

    public function setTurn($trueOrFalse, $data){
      if (count($data) > 2 && $trueOrFalse) {
        $_SESSION['output'][$data[0]] = "X";
        $_SESSION['output'][$data[2]] = "X";
        $_SESSION['arrayCheck'] = array();
        $this->turn = "<p class='MATCH'> Congratz! you matched <strong>".$data[1]." ".$data[3] ." </strong></p>";
      } else if (count($data) > 4 && !$trueOrFalse){
        $_SESSION['output'][$data[0]] = "?";
        $_SESSION['output'][$data[2]] = "?";
        $_SESSION['arrayCheck'] = array($data[4], $data[5]);
      }
    }

    public function getTurn(){
        return $this->turn;
    }
  }
  // bepaalt of de waardes gelijk zijn aan elkaar, of juist niet.
  // wanneer dit wel zo is wordt de waarde X geretourneerd.
  // wanneer dit niet zo is wordt de waarde ? geretourneed.

?>
