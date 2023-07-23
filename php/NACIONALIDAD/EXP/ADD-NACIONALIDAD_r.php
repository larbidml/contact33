<?PHP
$sub_header ="Añadir contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
include_once '../../resource/Database.php';
?>


<?php			 
			 //collect form data and store in variables








			//ref
			$ref = $_POST['ref'];
			$ref=trim($ref) ;
			//id
			$id = $_POST['terminobusqueda2'];
			$id=trim($id) ;
			//ano
			$ano = $_POST['ano'];
			$ano=trim($ano) ;
			//activo
			$activo = 1 ;
		
			



			


			if(chekDuplicateEntries("nacionalidadexp","ref",$ref ,$db))
			{
				$result= flashMessage("ref ya existe", "Fail");
			}
			else
			{
				try 
				{
					//create SQL insert statement
					$sqlInsert = "INSERT INTO nacionalidadexp (
																
																ref,
																id,
																ano,
																activo



														)

										VALUES (

																:ref,
																:id,
																:ano,
																:activo


														) ";

					//use PDO prepared to sanitize data
					$statement = $db->prepare($sqlInsert);

					//add the data into the database
					$statement->execute(array(	
											

										':ref' => $ref ,	
										':id' => $id ,	
										':ano' => $ano ,	
										':activo' => $activo 	


											));
					//print_r($statement);

					//check if one new row was created
					if ($statement->rowCount() == 1) 
					{
						$result= flashMessage("Añadido exitos","Pass");
					}
				} catch (PDOException $ex) 
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