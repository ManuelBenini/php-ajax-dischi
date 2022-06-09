<?php

  //DB dischi
  require_once __DIR__ . '/db.php';

  $genres = create_no_repetitive_array($disks, 'genre');

  $authors = create_no_repetitive_array($disks, 'author');

  function create_no_repetitive_array($array, $string){
    $filteredArray = [];
    foreach ($array as $disk) {
      if (!in_array($disk[$string], $filteredArray)){
        $filteredArray[] = $disk[$string];
      }
    }
    // var_dump($genres);
    return $filteredArray;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css' integrity='sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==' crossorigin='anonymous'/>

  <!-- VUE -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.9/vue.js' integrity='sha512-o9SZrtqlGkpa7EF+dDrNjEdRFFYhymlrBzDKpolHNolxsyx0IcXAbEm9i1e8QpoiMgEdKZVtY8XiK1t8i6jVDA==' crossorigin='anonymous'></script>

  <!-- AXIOS -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.js' integrity='sha512-uplugzeh2/XrRr7RgSloGLHjFV0b4FqUtbT5t9Sa/XcilDr1M3+88u/c+mw6+HepH7M2C5EVmahySsyilVHI/A==' crossorigin='anonymous'></script>

  <!-- GOOGLE FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"> 

  <!-- CSS -->
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/main.css">

  <title>php-ajax-dischi</title>
</head>
<body>

  <header>
    <div class="logo flex-grow-1 ">
      <img src="./img/logo-small.svg" alt="spotify logo">
    </div>

    <select name="genre-select">

      <option value="none">Seleziona un genere</option>

      <?php foreach ($genres as $genre): ?>
        <option value="<?php echo $genre?>">
          <?php echo $genre ?>
        </option>
      <?php endforeach; ?>

    </select>

    <select name="artist-select" class="mx-3">

      <option value="none">Seleziona un'artista</option>

      <?php foreach ($authors as $author): ?>
        <option value="<?php echo $author ?>">
          <?php echo $author ?>
        </option>
      <?php endforeach; ?>

    </select>

  </header>

  <main class="main-section">

    <div class="container d-flex flex-wrap">

      <?php foreach ($disks as $disk): ?>
        <div class="mb-card">
          <div class="thumb">
            <img src="<?php echo $disk['poster'] ?>">
          </div>

          <h6 class="my-3"><?php echo strtoupper($disk['title']) ?></h6>
          <p><?php echo $disk['author'] ?></p>
          <p><?php echo $disk['year'] ?></p>
        </div>
      <?php endforeach; ?>
      
    </div>

  </main>


<script src="js/script.js"></script>

</body>
</html>