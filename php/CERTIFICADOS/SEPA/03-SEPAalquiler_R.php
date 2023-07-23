<?PHP
$sub_header ="sepa Alquiler";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

			


$nif= $_POST['nif']; 


//create SQL insert statement			

		$sqlQuery =" SELECT * 
				FROM contactos 
				WHERE nif LIKE :nif
				
				";

	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':nif' => $nif ));
	$data = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	$num_columns = $statement->columnCount();
	//print_r($data);
	//echo "<hr>" ;

//end sql




$nif = $data[0]["nif"];
$nombre1 = $data[0]["nombre1"];
$apellido1 = $data[0]["apellido1"];
$apellido2 = $data[0]["apellido2"];
$tel1 = $data[0]["tel1"];

$CALLE = $data[0]["CALLE"];
$NOCALLE = $data[0]["NOCALLE"];
$PISO = $data[0]["PISO"];
$PUERTA = $data[0]["PUERTA"];
$CP = $data[0]["CP"];
$CIUDAD = $data[0]["CIUDAD"];

$CBANCARIA1 = $data[0]["CBANCARIA1"];
$CBANCARIA2 = $data[0]["CBANCARIA2"];
$CBANCARIA3 = $data[0]["CBANCARIA3"];
$CBANCARIA4 = $data[0]["CBANCARIA4"];
$CBANCARIA5 = $data[0]["CBANCARIA5"];
$CBANCARIA6 = $data[0]["CBANCARIA6"];

$correo = $data[0]["correo"];




//create SEGUNDO SQL  statement	

	// display resultados
	//body
	echo"<div class=\"container\">\n";
	//form 1
		echo"<div class=\"row  justify-content-center\">\n";
			echo"<form method=\"post\" action=\"REPORT_SEPAalquiler.php\" class=\"col col-lg-8 text-light bg-success\">\n";


				//padre
				echo"<div class=\"form-group bg-secondary\">\n";
					echo"<label class=\" text-light\" for=\"doctypo\">NOMBRE:</label><br>\n";
					echo" <label class=\" text-light\" for=\"doctypo\">$nombre1  $apellido1</label><br>\n";
					echo" <label class=\" text-light\" for=\"doctypo\">$CALLE $NOCALLE $PISO $PUERTA $CP $CIUDAD</label>\n";
				echo"</div>\n";



		

				echo"<div class=\"form-group\">\n";
					
					//HIDEN		
					

					

					echo "<input type=\"hidden\"  name=\"nif\"   value=\"$nif\">\n" ;

					echo "<input type=\"hidden\"  name=\"nombre1\"   value=\"$nombre1\">\n" ;
					echo "<input type=\"hidden\"  name=\"apellido1\"   value=\"$apellido1\">\n" ;
					echo "<input type=\"hidden\"  name=\"apellido2\"   value=\"$apellido2\">\n" ;
					echo "<input type=\"hidden\"  name=\"tel1\"   value=\"$tel1\">\n" ;

					echo "<input type=\"hidden\"  name=\"CALLE\"   value=\"$CALLE\">\n" ;
					echo "<input type=\"hidden\"  name=\"NOCALLE\"   value=\"$NOCALLE\">\n" ;
					echo "<input type=\"hidden\"  name=\"PISO\"   value=\"$PISO\">\n" ;
					echo "<input type=\"hidden\"  name=\"PUERTA\"   value=\"$PUERTA\">\n" ;
					echo "<input type=\"hidden\"  name=\"CP\"   value=\"$CP\">\n" ;
					echo "<input type=\"hidden\"  name=\"CIUDAD\"   value=\"$CIUDAD\">\n" ;

					echo "<input type=\"hidden\"  name=\"CBANCARIA1\"   value=\"$CBANCARIA1\">\n" ;
					echo "<input type=\"hidden\"  name=\"CBANCARIA2\"   value=\"$CBANCARIA2\">\n" ;
					echo "<input type=\"hidden\"  name=\"CBANCARIA3\"   value=\"$CBANCARIA3\">\n" ;
					echo "<input type=\"hidden\"  name=\"CBANCARIA4\"   value=\"$CBANCARIA4\">\n" ;
					echo "<input type=\"hidden\"  name=\"CBANCARIA5\"   value=\"$CBANCARIA5\">\n" ;
					echo "<input type=\"hidden\"  name=\"CBANCARIA6\"   value=\"$CBANCARIA6\">\n" ;

					echo "<input type=\"hidden\"  name=\"correo\"   value=\"$correo\">\n" ;
					
					
					


					

				echo"</div>\n";
				echo"<button type=\"submit\" class=\"btn btn-danger\">report</button>\n";
				
			echo"</form>\n";
		echo"</div>\n";
	//end form 1




	echo"</div>\n";
	
   


?>

<?PHP   include_once '../../resource/footerPage.php'; ?>

