<?php
function verifyToken($sessionToken, $getToken) {
  if (isset($sessionToken) && isset($getToken) && !empty($sessionToken) && !empty($getToken)) {
    return true;
  }
  var_dump($getToken, $sessionToken);
  return false;
}
