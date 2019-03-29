#!/usr/bin/env php
<?php
  if ($argc > 1) {
    $s = $argv[1];
    $s = preg_replace("/[\s\t]+/", " ", trim($s));
    print("{$s}\n");
  }
?>
