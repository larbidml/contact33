
<?PHP
    $nif= $_POST['nif']; $nif=trim($nif) ;

    $nombre1= $_POST['nombre1']; $nombre1=trim($nombre1) ;
    $apellido1= $_POST['apellido1']; $apellido1=trim($apellido1) ;
    $apellido2= $_POST['apellido2']; $apellido2=trim($apellido2) ;
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../../../images/ico/icono33.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?PHP  echo" <title>SEPA-$nif</title>";                ?>

    <link rel="stylesheet" href="../SEPA/css/styles_form_sepageneralitat.css">
</head>

<body id="bodyImage1">
    

<?PHP

    //collect form data and store in variables



    $tel1= $_POST['tel1']; $tel1=trim($tel1) ;

    $CALLE= $_POST['CALLE']; $CALLE=trim($CALLE) ;
    $NOCALLE= $_POST['NOCALLE']; $NOCALLE=trim($NOCALLE) ;
    $PISO= $_POST['PISO']; $PISO=trim($PISO) ;
    $PUERTA= $_POST['PUERTA']; $PUERTA=trim($PUERTA) ;
    $CP= $_POST['CP']; $CP=trim($CP) ;
    $CIUDAD= $_POST['CIUDAD']; $CIUDAD=trim($CIUDAD) ;


    $CBANCARIA1= $_POST['CBANCARIA1']; $CBANCARIA1=trim($CBANCARIA1) ;
    $CBANCARIA2= $_POST['CBANCARIA2']; $CBANCARIA2=trim($CBANCARIA2) ;
    $CBANCARIA3= $_POST['CBANCARIA3']; $CBANCARIA3=trim($CBANCARIA3) ;
    $CBANCARIA4= $_POST['CBANCARIA4']; $CBANCARIA4=trim($CBANCARIA4) ;
    $CBANCARIA5= $_POST['CBANCARIA5']; $CBANCARIA5=trim($CBANCARIA5) ;
    $CBANCARIA6= $_POST['CBANCARIA6']; $CBANCARIA6=trim($CBANCARIA6) ;

    $correo= $_POST['correo']; $correo=trim($correo) ;
    


    //end collect form data and store in variables


//datos 


echo "<div id=\"circulo\"></div>\n" ;




echo "<div id=\"divfont\">\n" ;

  echo "<div id=\"divnif\">$nif</div>\n" ;
  echo "<div id=\"divnombrecompleto\">$nombre1 $apellido1 $apellido2</div>\n" ;

  echo "<div id=\"divadresa\">$CALLE $NOCALLE $PISO $PUERTA </div>\n" ;
  echo "<div id=\"divcp\">$CP</div>\n" ;
  echo "<div id=\"divcp\">$CP</div>\n" ;
  echo "<div id=\"divCIUDAD\">$CIUDAD</div>\n" ;
  echo "<div id=\"divtel1\">$tel1</div>\n" ;

  echo "<div id=\"div_correo\">$correo</div>\n" ;

  echo "<div id=\"div_CBANCARIA1_1\">$CBANCARIA1[0]</div>\n" ;
  echo "<div id=\"div_CBANCARIA1_2\">$CBANCARIA1[1]</div>\n" ;
  echo "<div id=\"div_CBANCARIA1_3\">$CBANCARIA1[2]</div>\n" ;
  echo "<div id=\"div_CBANCARIA1_4\">$CBANCARIA1[3]</div>\n" ;

  echo "<div id=\"div_CBANCARIA2_1\">$CBANCARIA2[0]</div>\n" ;
  echo "<div id=\"div_CBANCARIA2_2\">$CBANCARIA2[1]</div>\n" ;
  echo "<div id=\"div_CBANCARIA2_3\">$CBANCARIA2[2]</div>\n" ;
  echo "<div id=\"div_CBANCARIA2_4\">$CBANCARIA2[3]</div>\n" ;

  echo "<div id=\"div_CBANCARIA3_1\">$CBANCARIA3[0]</div>\n" ;
  echo "<div id=\"div_CBANCARIA3_2\">$CBANCARIA3[1]</div>\n" ;
  echo "<div id=\"div_CBANCARIA3_3\">$CBANCARIA3[2]</div>\n" ;
  echo "<div id=\"div_CBANCARIA3_4\">$CBANCARIA3[3]</div>\n" ;

  echo "<div id=\"div_CBANCARIA4_1\">$CBANCARIA4[0]</div>\n" ;
  echo "<div id=\"div_CBANCARIA4_2\">$CBANCARIA4[1]</div>\n" ;
  echo "<div id=\"div_CBANCARIA4_3\">$CBANCARIA4[2]</div>\n" ;
  echo "<div id=\"div_CBANCARIA4_4\">$CBANCARIA4[3]</div>\n" ;

  echo "<div id=\"div_CBANCARIA5_1\">$CBANCARIA5[0]</div>\n" ;
  echo "<div id=\"div_CBANCARIA5_2\">$CBANCARIA5[1]</div>\n" ;
  echo "<div id=\"div_CBANCARIA5_3\">$CBANCARIA5[2]</div>\n" ;
  echo "<div id=\"div_CBANCARIA5_4\">$CBANCARIA5[3]</div>\n" ;

  echo "<div id=\"div_CBANCARIA6_1\">$CBANCARIA6[0]</div>\n" ;
  echo "<div id=\"div_CBANCARIA6_2\">$CBANCARIA6[1]</div>\n" ;
  echo "<div id=\"div_CBANCARIA6_3\">$CBANCARIA6[2]</div>\n" ;
  echo "<div id=\"div_CBANCARIA6_4\">$CBANCARIA6[3]</div>\n" ;



    echo "</div>\n" ;
//end datos 

?>
</body>
</html>
   



