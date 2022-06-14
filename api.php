<?php

  require_once __DIR__ . '/db.php';
  
  $genre = empty($_GET['genre']) ? 'none' : strtolower($_GET['genre']);
  $author = empty($_GET['author']) ? 'none' : strtolower($_GET['author']);

  if($genre === 'none'){
    $filteredArray = $disks;
  }else{
    $filteredArray = array_filter($disks, fn ($disk) => strtolower($disk['genre']) === $genre);
  }

  if($author != 'none'){
    $filteredArray = array_filter($filteredArray, fn ($disk) => strtolower($disk['author']) === $author);
  }

  header('Content-Type: application/json');

  echo json_encode($filteredArray);
?>