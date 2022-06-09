<?php

  require_once __DIR__ . '/db.php';

  header('Content-Type: application/json');

  echo json_encode($disks);
?>