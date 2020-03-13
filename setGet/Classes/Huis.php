<?php

class Huis {
  private $_straatnaam;
  private $_huisnummer;
  private $_plaats;
  private $kamers;
  private $toiletten;
  private $verwarming;
  private $soortVerwarming;
  private $vierkant;
  private $wozWaarde;

  public function __construct($straatnaam, $huisnummer, $plaats) {
    $this->_straatnaam = $straatnaam;
    $this->_huisnummer = $huisnummer;
    $this->_plaats = $plaats;
  }
  //constructor ^
  public function setKamers($Kamers){
    $this->kamers = $Kamers;
    return $this->kamers;
  }
  public function setToiletten($Toiletten){
    $this->toiletten = $Toiletten;
  }
  public function setVerwarming($Verwarming){
    $this->verwarming = $Verwarming;
  }
  public function setSoortVerwarming($SoortVerwarming){
    $this->$soortVerwarming = $SoortVerwarming;
  }
  public function setVierkant($Vierkant){
    $this->vierkant = $Vierkant;
  }
  public function setWozWaarde($WozWaarde){
    $this->$wozWaarde = $WozWaarde;
  }
  // setters ^

  public function getKamers(){
    return $this->kamers;
  }
  public function getToiletten(){
    return $this->toiletten;
  }
  public function getVerwarming(){
    return $this->verwarming;
  }
  public function getSoortVerwarming(){
    return $this->$soortVerwarming;
  }
  public function getVierkant(){
    return $this->vierkant;
  }
  public function getWozWaarde(){
    return $this->$wozWaarde;
  }
  // getters ^

  public function getStraatNaam(){
    return $this->_straatnaam;
  }
  public function getHuisNummer(){
    return $this->_huisnummer;
  }
  public function getPlaats(){
    return $this->_plaats;
  }
  // constructor getters ^
}

class Belasting extends Huis {
  private $belastingWOZ;
  private $belastingKamers;
  private $belastingPlaats;
  private $total;
  public function setWozBelasting($Belasting_1){
    if ($Belasting_1 < 100000) {
      $this->belastingWOZ = 600;
    } else if ($Belasting_1 > 100000 && $Belasting_1 < 200000) {
      $this->belastingWOZ = 2000;
    } else {
      $this->belastingWOZ = 6000;
    }
  }

  public function setKamerBelasting($Belasting_2){
    if ($Belasting_2 == 0) {
      $this->belastingKamers = 0;
    } else if ($Belasting_2 == 1) {
      $this->belastingKamers = 100;
    } else if ($Belasting_2 == 2) {
      $this->belastingKamers = 300;
    } else {
      $this->belastingKamers = 800;
    }
  }

  public function setPlaatsBelasting($Belasting_3){
    if ($Belasting_3 == "Amsterdam" || $Belasting_3 == "Rotterdam" || $Belasting_3 == "Groningen") {
      $this->belastingPlaats = 1000;
    } else {
      $this->belastingPlaats = 0;
    }
  }
  Public function getTotalBelasting(){
    $this->total = $this->belastingWOZ + $this->belastingKamers + $this->belastingPlaats;
    return $this->total;
  }
}
?>
