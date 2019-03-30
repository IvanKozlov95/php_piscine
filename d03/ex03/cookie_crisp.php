<?php
  $action = $_GET['action'];
  $name = $_GET['name'];
  $newVal = $_GET['value'];
  print_r($_COOKIE);
  if ($name)
    $oldVal = $_COOKIE[$name];
  switch ($action) {
    case("set"):
      if ($name && $newVal) {
        setcookie($name, $newVal);
      }
      break;
    case("get"):
      if ($name && $oldVal && !$newVal)
        echo $oldVal."\n";
      break;
		case("del"):
			if ($name && !$newVal)
        setcookie($name, '', 1);
      break;
    }
  print_r($_COOKIE);

// ob_start();
//     print_r($_COOKIE);
// if (isset($_COOKIE['test'])) {
//     echo 'cookie is fine<br>';
// } else {
//     setcookie('test', 'cookie test content');  /* expire in 1 hour */
//     echo 'Trying to set cookie. Reload page plz';    
// }
// echo "\n";