<?php

  spl_autoload_register(function($class){
    $filename = './PHP/Classes/'.$class.'.class'.'.php';
    if (!file_exists($filename)) {
      return false;
    } else {
      include $filename;
    }
  });

 ?>
