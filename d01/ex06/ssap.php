#!/usr/bin/env php
<?php
  function ft_split($s) {
    $arr = array_filter(explode(" ", $s));
    sort($arr);
    return $arr;
  }

  $arr = [];
  for ($i = 1; $i < $argc; $i++) {
    $arr = array_merge($arr, ft_split($argv[$i]));
  }
  sort($arr);
  for ($i = 0; $i < count($arr); $i++) {
    print("{$arr[$i]}\n");
  }
?>
