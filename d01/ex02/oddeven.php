#!/usr/bin/env php
<?php
  while (1) {
    echo "Enter a number: ";
    $input = rtrim(fgets(STDIN));
    if (feof(STDIN)) {
      echo "\n";
      break ;
    }
    if (is_numeric($input)) {
      $evenOdd = $input % 2 == 0 ? "even" : "odd";
      echo "The number {$input} is {$evenOdd}\n";
    } else {
      echo "'{$input}' is not a number\n";
    }
  }
?>
