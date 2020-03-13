<?php
  class Check {

    public function setCheck($data){
      if (!empty($_SESSION['arrayCheck']) && $_SESSION['index-number'] == 0) {
        $_SESSION['index-number']++;
      }
      if (empty($_SESSION['arrayCheck']) && $_SESSION['index-number'] == 0 ) {
        $_SESSION['index-number']++;
        $_SESSION['arrayCheck'] = array($_GET['id'], $data);
      } else if ($_SESSION['index-number'] == 1) {
        $_SESSION['index-number']++;
        $_SESSION['arrayCheck'] = array($_SESSION['arrayCheck'][0], $_SESSION['arrayCheck'][1], $_GET['id'], $data);
      } else {
        $_SESSION['arrayCheck'] = array($_SESSION['arrayCheck'][0], $_SESSION['arrayCheck'][1], $_SESSION['arrayCheck'][2],$_SESSION['arrayCheck'][3], $_GET['id'], $data);
        $_SESSION['index-number'] = 0;
      }
    }
    // maakt een array aan, zodra er op het 1e ID (button) geklikt wordt komen het 1e index en 1e random nummer terug.
    // bij de 2e klik worden de 1e en 2e index nummer en 1e en 2e random nummer opgeslagen in de array
    // bij de 3e klik worden de 1e, 2e en 3e id en 1e, 2e en 3e random nummer opgeslagen 

    public function getCheck(){
      return $_SESSION['arrayCheck'];
    }

      private $trueOrFalse;

      public function setDecision($index_0, $number_0, $index_1, $number_1){
        if ($index_0 != $index_1 && is_int($number_0) && is_int($number_1) && $number_0 == $number_1) {
          $this->trueOrFalse = true;
        } else {
          $this->trueOrFalse = false;
        }
      }

      public function getDecision(){
        return $this->trueOrFalse;
      }
    }
    // checkt of de waardes die ingevoerd zijn wel of juist niet overeen komen en returned de waarde "true" of "false";
