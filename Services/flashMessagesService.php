<?php

function addFlash($message) {
  $_SESSION['flashbag'] = $message;
}

function getFlash() {
  echo $_SESSION['flashbag'];
  unset($_SESSION['flashbag']);
}
