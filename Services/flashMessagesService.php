<?php

function addFlash($message) {
  $_SESSION['flashbag'] = $message;
}

function getFlash() {
  $message = $_SESSION['flashbag'];
  unset($_SESSION['flashbag']);
  return $message;
}
