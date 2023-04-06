<?php

/**
 * Developer: Alanderson Tomaiz
 * Date: 06/04/2022
 */

 /**
  * @param array $data
  * @param ?bool $stop
  */
function pr($data, $stop = false) {
  echo "<pre>";
  print_r($data);
  echo "</pre>";

  if ($stop) {
    die;
  }
}

/**
 * @param string $string
 * @return string
*/
function sanitize($string) {
  return preg_replace(
    array(
      '/(á|à|ã|â|ä)/',
      '/(Á|À|Ã|Â|Ä)/',
      '/(é|è|ê|ë)/',
      '/(É|È|Ê|Ë)/',
      '/(í|ì|î|ï)/',
      '/(Í|Ì|Î|Ï)/',
      '/(ó|ò|õ|ô|ö)/',
      '/(Ó|Ò|Õ|Ô|Ö)/',
      '/(ú|ù|û|ü)/',
      '/(Ú|Ù|Û|Ü)/',
      '/(ñ)/',
      '/(Ñ)/',
      '/(Ç)/',
      '/(ç)/
      '),
      explode(' ', 'a A e E i I o O u U n N C c'),
      $string);
}