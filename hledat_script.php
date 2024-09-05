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
    <div class="row">
    <h4 class="4">Zadejte parametry pro vyhledání knihy v databázi</h5>          
    <div style="height: 20px"></div> 
      <hr>

      <hr>
  
      <?php

$isbn = htmlspecialchars($_POST['isbn']);
$jmeno = htmlspecialchars($_POST['jmeno']);
$prijmeni = htmlspecialchars($_POST['prijmeni']);
$nazev = htmlspecialchars($_POST['nazev']);

$sql = "SELECT * FROM eshop_vsb_test.knihy WHERE 1=1";
$params = [];

if (!empty($isbn)) {
  $sql .= " AND isbn LIKE :isbn";
  $params[':isbn'] = '%' . $isbn . '%';
}
if (!empty($jmeno)) {
  $sql .= " AND jmeno LIKE :jmeno";
  $params[':jmeno'] = '%' . $jmeno . '%';
}
if (!empty($prijmeni)) {
  $sql .= " AND prijmeni LIKE :prijmeni";
  $params[':prijmeni'] = '%' . $prijmeni . '%';
}
if (!empty($nazev)) {
  $sql .= " AND nazev LIKE :nazev";
  $params[':nazev'] = '%' . $nazev . '%';
}

$stmt = $database->prepare($sql);

foreach ($params as $param => $value) {
  $stmt->bindValue($param, $value, PDO::PARAM_STR);
}

$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    
        echo "
        <div class='col-6 col-sm-4 col-md-3'>
          <div class='card m-2 w-100'>
            <div class='card-body'>
              <h5 class='card-title'>Kniha: <b>   ".$row['nazev']." </b > </h5>
              <hr>
              <p class='card-text'> Jméno autora: <b> ".$row['jmeno']."</b > </p>
              <p class='card-text'> Příjmení autora: <b> ".$row['prijmeni']."</b > </p>
              <p class='card-text'> ISBN: <b> ".$row['isbn']."</b > </p>
              <div class='row'>
              <hr>
                <p class='card-text'> Popis knihy:  </p> <br>
                <p class='text-start'>".$row['popis']." </p>
              </div>
            </div>
          </div>
        </div>
      ";
    }
    ?>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
