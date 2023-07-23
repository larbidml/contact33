<?PHP
$sub_header ="Añadir contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
include_once '../../resource/Database.php';
		
//collect form data and store in variables
$id= $_POST['id']; $id=trim($id) ;   
$PADRE= $_POST['PADRE']; $PADRE=trim($PADRE) ; $PADRE=strtoupper($PADRE) ;
$MADRE= $_POST['MADRE']; $MADRE=trim($MADRE) ; $MADRE=strtoupper($MADRE) ;
$matrimonio_fecha= $_POST['matrimonio_fecha']; $matrimonio_fecha=trim($matrimonio_fecha) ; 
$matrimonio_lugar = $_POST['matrimonio_lugar']; $matrimonio_lugar=trim($matrimonio_lugar) ; $matrimonio_lugar=strtoupper($matrimonio_lugar) ;
$NLUGAR = $_POST['NLUGAR']; $NLUGAR=trim($NLUGAR) ; $NLUGAR=strtoupper($NLUGAR) ;
			
			if(chekDuplicateEntries("nacimientos","id",$id ,$db))
			{
				$result= flashMessage("id ya existe", "Fail");
			}
			else
			{
				try 
				{
					//create SQL insert statement
					$sqlInsert = "INSERT INTO nacimientos (
														
														id,
														PADRE,
														MADRE,
														matrimonio_fecha,
														matrimonio_lugar,
														NLUGAR 
														
														
														)

										VALUES (
														:id,
														:PADRE,
														:MADRE,
														:matrimonio_fecha,
														:matrimonio_lugar,
														:NLUGAR
							
							) ";

					//use PDO prepared to sanitize data
					$statement = $db->prepare($sqlInsert);

					//add the data into the database
					$statement->execute(array(	
										
											':id' => $id ,
											':PADRE' => $PADRE ,
											':MADRE' => $MADRE ,
											':matrimonio_fecha' => $matrimonio_fecha ,
											':matrimonio_lugar' => $matrimonio_lugar ,
											':NLUGAR' => $NLUGAR 
										


											));
					//print_r($statement);

					//check if one new row was created
					if ($statement->rowCount() == 1) 
					{
						$result= flashMessage("Añadido exitos","Pass");
					}
				} 
				catch (PDOException $ex) 
				{
					$result= flashMessage("$ex->getMessage()", "Fail");
				}	
			
			}


		?>	
	


	 	<?php if (isset($result)) echo $result; ?>
		
    </div>
				


<?PHP
include_once '../../resource/footerPage.php';
?>
