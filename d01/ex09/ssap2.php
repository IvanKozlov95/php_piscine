#!/usr/bin/env php
<?php
  function ft_split($s) {
    $arr = array_filter(explode(" ", $s));
    sort($arr);
    return $arr;
  }

  function cmp($a, $b) {
    static $cmpstr = "abcdefghijklmnopqrstuvwxyz0123456789 !\"#$%&\'()*+,-./:;<=>?@[\\]^_`{|}~";

    $i = 0;
    $a = strtolower($a);
    $b = strtolower($b);
    $alen = strlen($a);
    $blen = strlen($b);
    $maxlen = max($alen, $blen);
    while ($i < $alen)
    {
      $posa = strpos($cmpstr, $a[$i]);
      $posb = strpos($cmpstr, $b[$i]);
      if ($posa < $posb)
        return (-1);
      else if ($posa > $posb)
        return (1);
      else
        $i++;
    }
  }

  $arr = array();
  for ($i = 1; $i < $argc; $i++) {
    $arr = array_merge($arr, ft_split($argv[$i]));
  }
  usort($arr, "cmp");
  for ($i = 0; $i < count($arr); $i++) {
    print("{$arr[$i]}\n");
  }
?>
