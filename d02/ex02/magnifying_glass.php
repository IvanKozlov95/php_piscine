#!/usr/bin/env php
<?php
  function replace($matches){
    return $matches[1].strtoupper($matches[2]).$matches[3];
  }
  if ($argc > 1) {
    $reg1 = "/(<a.*?title=\")(.*)(\">)/i";
    $reg2 = "/(<a.*?>)(.*)(<)/i";
    $file = "";
    $fd = fopen($argv[1], "r");
    while (!feof($fd))
    {
      $line = fgets($fd);
      $line = preg_replace_callback($reg1, replace, $line);
      $line = preg_replace_callback($reg2, replace, $line);
      $file .= $line;
    }
    print("{$file}\n");
  }
?>