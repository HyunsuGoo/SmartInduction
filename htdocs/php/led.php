<?php
  $var1 ;
  $myFile = "/home/pi/led.txt" ;

  if ($_GET["ardu"] == "data") {
    $fh = fopen($myFile. 'r') ;
    $line = fgets($fh) ;
    fclose($fh) ;
    echo $line ;
  }

  else if ($_GET["led"] != NULL) {
    $var1 = $_GET["led"] ;
    if ($var1 == "on") {
      $fh = fopen($myFile, 'w') ;
      fwrite($fh, '1') ;
      fclose($fh) ;
      $fp = fsockopen("tcp://192.168.0.20", 80, $errno, $errstr, 30) ;
      if (!$fp) {
        echo "$errstr ($errno)<br/>\n" ;
      }
      else {
        fwrite($fp, "on") ;
        fclose($fp) ;
      }
      echo "<script>location.replace('led.html') ;</script>" ;
    }
    else if ($var1 == "off") {
      $fh = fopen($myFile, 'w') ;
      fwrite($fh, '0') ;
      fclose($fh) ;
      $fp = fsockopen("tcp://192.168.0.20", 80, $errno, $errstr, 30) ;
      if (!$fp) {
        echo "$errstr ($errno)<br/>\n" ;
      }
      else {
        fwrite($fp, "off") ;
        fclose($fp) ;
      }
      echo "<script>location.replace('led.html') ;</script>" ;
    }
  }
  else {
    echo "fail to get led data" ;
  }

?>