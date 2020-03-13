<?php

spl_autoload_register(function($class){

$filename = 'Classes/'.$class.'.php';
if (!file_exists($filename)) {
  return false;
} else {
  include $filename;
}

});

$huis = new Huis('Van Schaikweg', 83, 'Emmen');
echo "aan welke straat ligt het huis? ";
echo $huis->getStraatNaam();
echo "<br>";
echo "welk huisnummer heeft het huis? ";
echo $huis->getHuisNummer();
echo "<br>";
echo "waar is het huis gelegen? ";
echo $huis->getPlaats();
echo "<br>";
// constructor ^;

$huis->setKamers(1);
echo "hoeveel kamers zijn er in het huis? ";
echo $huis->getKamers();
echo "<br>";
// kamers
$huis->setToiletten(2);
echo "hoeveel toiletten zijn er binnen het huis? ";
echo $huis->getToiletten();
echo "<br>";
// toiletten
$huis->setVerwarming(3);
echo "Hoeveel verwarmingen zijn er binnen het huis? ";
echo $huis->getVerwarming();
echo "<br>";
// verwarming
$huis->setSoortVerwarming("Houtkachel en straalkachels");
echo "wat voor soort verwarmingen zijn er binnen het huis? ";
echo $huis->getSoortVerwarming();
echo "<br>";
// verwarming soorten
$huis->setVierkant(70);
echo "hoeveel m2 bedraagt het huis? ";
echo $huis->getVierkant();
echo "<br>";
// vierkante meter
$huis->setWozWaarde(300000);
echo "wat is de WOZ waarde van de woning? ";
echo $huis->getWozWaarde();
echo "<br>";
// wozwaarde
$Belasting = new Belasting('Van Schaikweg', 83, 'Emmen');
$Belasting->setWozBelasting($huis->getWozWaarde());
$Belasting->setKamerBelasting($huis->getKamers());
$Belasting->setPlaatsBelasting($huis->getPlaats());
echo "de totale belasting over dit huis bedraagt ";
echo $Belasting->getTotalBelasting();

// setters and getters

 ?>
