#!/usr/bin/env php
<?php
  $month = array(
    1 => "janvier",
    2 => "février",
    3 => "mars",
    4 => "avril",
    5 => "mai",
    6 => "juin",
    7 => "juillet",
    8 => "août",
    9 => "septembre",
    10 => "octobre",
    11 => "novembre",
    12 => "décembre");
  $week = array(
    1 => "lundi",
    2 => "mardi",
    3 => "mercredi",
    4 => "jeudi",
    5 => "vendredi",
    6 => "samedi",
    7 => "dimanche");

  if ($argc == 2) {
    $date = explode(" ", $argv[1]);

    $date[0] = array_search(lcfirst($date[0]), $week);
    $date[2] = array_search(lcfirst($date[2]), $month);

    if ($date[0] === false || $date[2] === false){
      echo "Wrong Format\n";
      exit();
    }

    $time = explode(":", $date[4]);
    $time[0] = (int)$time[0] - 1;
    $date[4] = join(":", $time);

    $format = "j m Y H:i:s";
    $external = "{$date[1]} {$date[2]} {$date[3]} {$date[4]}";
    $dateobj = DateTime::createFromFormat($format, $external);

    if ($dateobj)
      print("{$dateobj->getTimestamp()}\n");
    else
      print("Wrong format\n");
  }
?>