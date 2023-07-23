<?PHP
$sub_header ="Añadir contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
include_once '../../resource/Database.php';
?>
		<?php
			 

			 //collect form data and store in variables


			//nie
			$nie = $_POST['nie'];
			$nie=trim($nie) ;
			//ref
			$ref = $_POST['ref'];
			$ref=trim($ref) ;
			//nombre
			$nombre = $_POST['nombre'];
			$nombre=trim($nombre) ;
			//apellido
			$apellido = $_POST['apellido'];
			$apellido=trim($apellido) ;
			//ano
			$ano = $_POST['ano'];
			$ano=trim($ano) ;


			


			if(chekDuplicateEntries("tramitesnacionalidad","ref",$ref ,$db))
			{
				$result= flashMessage("ref ya existe", "Fail");
			}
			else
			{
				try 
				{
					//create SQL insert statement
					$sqlInsert = "INSERT INTO tramitesnacionalidad (
																
																ref,
																nie,
																nombre,
																apellido,
																ano


														)

										VALUES (
																:ref,
																:nie,
																:nombre,
																:apellido,
																:ano

														) ";

					//use PDO prepared to sanitize data
					$statement = $db->prepare($sqlInsert);

					//add the data into the database
					$statement->execute(array(	
											
										':ref' => $ref ,	
										':nie' => $nie ,	
										':nombre' => $nombre ,	
										':apellido' => $apellido ,	
										':ano' => $ano 	

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