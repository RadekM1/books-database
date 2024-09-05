<?php
include('login.php');
$connection = new DbConnect(); 
$database = $connection->connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Knihy</title>
</head>
<body>
  <div class="container-lg maxSirka justify-content-evenly text-center">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Vložit knihu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="seznam.php">Seznam</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hledat.php">Vyhledat</a>
        </li>
    </div>
  </div>
</nav>
    <div style="height: 20px"></div> 
    <div class="row text-center">
      <h4 class="4">Zadejte parametry knihy pro vložení do databáze</h5>
      <div style="height: 20px"></div> 
      <hr>
      <p>Je aplikována ochrana, aby nebylo možné vložit pouze mezery (tabulátor, mezery). 
        Bude ověřena délka vstupu bez mezer, vloženy budou pokud bude kontrola úspěšná včetně mezer.</p>
      <hr>

    <?php

    $isbnInput = htmlspecialchars($_POST['isbn']);
    $jmenoInput = htmlspecialchars($_POST['jmeno']);
    $prijmeniInput = htmlspecialchars($_POST['prijmeni']);
    $nazevInput = htmlspecialchars($_POST['nazev']);
    $popis = htmlspecialchars($_POST['popis']);

    $isbn = preg_replace('/\s+/', '',$isbnInput);
    $jmeno = preg_replace('/\s+/', '',$jmenoInput);
    $prijmeni = preg_replace('/\s+/', '',$prijmeniInput);
    $nazev = preg_replace('/\s+/', '',$nazevInput);


    if(strlen($isbn) < 10 || strlen($jmeno) < 2 || strlen($prijmeni) < 2 ||
    strlen($nazev) < 2){
        echo " <p class='text-danger'> nevhodně zadané parametry, zkuste znovu</p> ";
    }else{
      $stmt = $database->prepare("INSERT INTO knihy (isbn, jmeno, prijmeni, nazev, popis ) VALUES (:isbn, :jmeno, :prijmeni, :nazev, :popis )");

      $stmt->bindParam(':isbn', $isbnInput);
      $stmt->bindParam(':jmeno', $jmenoInput);
      $stmt->bindParam(':prijmeni', $prijmeniInput);
      $stmt->bindParam(':nazev', $nazevInput);
      $stmt->bindParam(':popis', $popis);

      $stmt->execute();

      echo " <p class='text-success'>kniha byla vložena do databáze</p> ";

    };
    ?>
    </div>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
