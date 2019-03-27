<?php
  function ft_split($s) {
    $arr = array_filter(explode(" ", $s));
    sort($arr);
    return $arr;
  }
?>
