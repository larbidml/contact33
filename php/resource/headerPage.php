<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../../../images/ico/icono33.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contactos</title>
  <link rel="stylesheet" href="../../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../css/styles.css">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
    <a class="navbar-brand" href="../../ini/ini/index.php"><img src="../../../images/ico/icono33.ico" width="30" height="30" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Favoritos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../../nif/favoritos/01-nif_favorito_all.php">favoritos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item " href="../../nif/favoritos/02-clearFavoritos.php">clear</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Contactos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../../nif/search/01-nif_all.php">Buscar</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item " href="../../nif/add/01-nif_add.php">Añadir</a>
            <a class="dropdown-item" href="../../nif/update/01-nif_update.php">Editar</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../../nif/del/01-nif_delete.php">Borrar</a>

          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            links
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../../links/search/00-links_SEARCH.php">Buscar</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item " href="../../links/add/01-LINK_add.php">Añadir</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item " href="../../links/edit/01-org_update.php">EDIT</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            CERTIFICADOS
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item text-danger " href="../../CERTIFICADOS/SEPA/00-SEPAGENERALITAT.php"><b>SEPA GENERALITAT</b></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../../CERTIFICADOS/SEPA/02-SEPAalquiler.php"><b>SEPA Alquiler</b></a>

        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            NACIONALIDAD
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../../NACIONALIDAD/EXP/01-NACIONALIDADEXP.php">Expedientes2</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../../NACIONALIDAD/search/01-NACIONALIDAD.php">Citas</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  text-success" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ALQUILER
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../../AYUDAALQUILER/EXP/01-ALQUILER.php">Expedientes Alquiler</a>

        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Subtitles
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../../subtitles/search/sub.php">Subtitles -numeros</a>
            <a class="dropdown-item" href="../../subtitles/search/sub2.php">Subtitles </a>
          </div>
        </li>



        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            RENTA
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../../RENTA/EXP/01-RENTA.php">Expedientes RENTA</a>

        </li>

      </ul>
    </div>
  </nav>



  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php echo "<h2 class=\"text-white text-center\">$sub_header</h2>"; ?>
      </div>
    </div>
  </div>