<?PHP
$sub_header ="Añadir contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
include_once '../../resource/Database.php';
		 
//collect

	$id = $_POST['terminobusqueda2'];
	$PRECIO = $_POST['PRECIO'];
	$PAGADO = $_POST['PAGADO'];
	$LISTO = $_POST['LISTO']; 





//		
			
try 
{
	// SQL insert
		$sqlInsert = "INSERT INTO alquiler 
		(
		id ,
		PRECIO ,
		PAGADO ,
		LISTO


		)
		VALUES 
		(


		:id ,
		:PRECIO ,
		:PAGADO ,
		:LISTO


		) ";

		$statement = $db->prepare($sqlInsert);
		$statement->execute(array(	


		':id' => $id ,	
		':PRECIO' => $PRECIO ,	
		':PAGADO' => $PAGADO , 
		':LISTO' => $LISTO 

		));
		//print_r($statement);
	//


	// SQL2 insert
	$sqlInsert = "INSERT INTO alquilerdetalles 
	(
	id 
	)
	VALUES 
	(
	:id 
	) ";

	$statement2 = $db->prepare($sqlInsert);
	$statement2->execute(array(	

	':id' => $id 

	));
	//print_r($statement2);
	//



	//check if one new row was created
	if (($statement->rowCount() == 1) AND ($statement2->rowCount() == 1))
	{
	$result= flashMessage("Añadido exitos","Pass");
	}
	} catch (PDOException $ex) 
	{

	$result= flashMessage("$ex->getMessage()", "Fail");




}//END TRY	




?>	

<?php 
if (isset($result)) echo $result; 


	
	echo"<div class=\"container \">\n" ;
	echo "<div class=\"row justify-content-center\">\n" ;
	echo "<div class=\"col-lg-6 bg-dark \">\n" ;            
	echo "<form  action=\"01-ALQUILER.php\"  method=\"post\">\n" ;

	// hidden
	//echo "<input type=\"hidden\"  name=\"Hmes\"   value=\"$Hmes\">\n" ;

	//div BOTON
	echo "<div class=\"form-row bg-dark\">\n" ;
	echo "<div class=\"form-group col-md-12\">\n" ;
	echo "<button type=\"bg-warning\" class=\"btn btn-primary\">Return</button>\n" ;
	echo "</div>\n" ;
	echo "</div>\n" ;  
	// 

	echo "</form>\n" ;
	echo "</div>\n" ;
	echo "</div>\n" ;
	echo "</div>\n" ;



?>

</div>



<?PHP
include_once '../../resource/footerPage.php';
?>