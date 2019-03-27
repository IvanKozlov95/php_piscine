<?php
  function ft_is_sort($arr) {
    for ($i = 1; $i < count($arr); $i++) {
      if (strcmp($arr[$i - 1], $arr[$i]) > 0)
        return FALSE;
    }
    return TRUE;
  };
?>