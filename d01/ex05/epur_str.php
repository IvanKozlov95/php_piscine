#!/usr/bin/env php
<?php
  $s = $argv[1];
  $s = trim($s);
  $s = preg_replace('/\s+/', ' ', $s);
  print("{$s}\n");
?>
