#!/usr/bin/env php
<?php
  function ft_split($s) {
    $arr = array_filter(explode(" ", $s));
    sort($arr);
    return $arr;
  }

  if ($argc >= 2) {
    $words = ft_split($argv[1]);
    array_push($words, array_shift($words));
    $new_s = join(" ", $words);
    print("{$new_s}\n");
  }
?>