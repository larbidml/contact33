<?PHP
$sub_header ="Contactos";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';
			
try 
{
	
	$valorfavorito = "0" ;
	//create SQL insert statement			
	$sqlQuery = 
				"SELECT id , nombre1 FROM contactos 
				WHERE `FAVORITO` = 1
															
				";
				

	$statement = $db->prepare($sqlQuery);
	$statement->execute();
	$data = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	$num_columns = $statement->columnCount();
	//print_r($data);
	//echo "<br>";
	//echo $num_rows;

	//check if row is not null
	if ($statement->rowCount() == 0) 
	{
	$result = flashMessage("no hay resultados", "Fail");
		
	}
	else
	{
		$FAVORITO = 0 ;
		for ($row=0; $row < $num_rows  ; $row++)
		{ 
			$id = $data[$row]["id"];
	    	//SQL statement to update categoriaword
			$sqlUpdate = "UPDATE contactos SET
			FAVORITO=:FAVORITO
			WHERE id=:id";

					//use PDO prepared to sanitize SQL statement
					$statement = $db->prepare($sqlUpdate);

				//execute the statement
				//hay que incluir tambien :id => $id
				$statement->execute(array(

					':id' => $id, 
					':FAVORITO' => $FAVORITO

										));
			//end sql
		}


		$result= flashMessage("Modificación exitosa","Pass");
   
	}
	} 
	catch (PDOException $ex) 
	{
    $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> An error occurred: " . $ex->getMessage() . "</p>";
	}
 

if (isset($result)) echo $result;

?>

<?PHP   include_once '../../resource/footerPage.php'; ?>

