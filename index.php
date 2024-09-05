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
      <h4 class="h4">Zadejte parametry knihy pro vložení do databáze</h4>
      <div style="height: 20px"></div> 
      <hr>
      <p>Je aplikována ochrana, aby nebylo možné vložit pouze mezery (tabulátor, mezery). 
        Bude ověřena délka vstupu bez mezer, vloženy budou pokud bude kontrola úspěšná včetně mezer.</p>
      <hr>
              
      <form action="vlozit.php" class="m-3" method="POST">
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-6 m-1">
          <input type="text" placeholder="ISBN (minimálně 10 znaků)" class="form-control" name="isbn" required>
        </div>
        <div class="col-12 col-md-6 m-1">
          <input type="text" placeholder="Jméno (min dva znaky)" class="form-control" name="jmeno" required>
        </div>
        <div class="col-12 col-md-6 m-1">
          <input type="text" placeholder="Příjmení (min dva znaky)" class="form-control" name="prijmeni"required>
        </div>
        <div class="col-12 col-md-6 m-1">
          <input type="text" placeholder="Název (min dva znaky)" class="form-control" name="nazev" required>
        </div>
        <div class="w-100" ></div>
        <div class="col-12 col-md-6 m-1">
        <textarea class="form-control" name="popis" rows="8" placeholder="Popis knihy (není povinné)"></textarea>
        </div>
        <div class="w-100" ></div>
        <div class="col-12 col-md-6 m-1">
          <input type="submit" class="btn btn-success" value="vložit knihu">
        </div>
      </div>
      </form>
      
















    </div>
  </div>


  </div>
  </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
