#!/usr/local/bin/php
<?php

$args = array_slice($argv, 1);
foreach ($args as $key => $arg) {
  $args[$key] = addcslashes($arg, "\\\n");
}
$args = implode("\n", $args);
echo $args;
