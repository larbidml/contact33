<?PHP
$sub_header ="pcr Add";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';
			
try 
{
	//create SQL insert statement			
	$sqlQuery = 
				"SELECT * FROM contactos 
				WHERE  FAVORITO = 1
				ORDER BY contactos.fn2 DESC											
				";

	$statement = $db->prepare($sqlQuery);
	$statement->execute();
	$data = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	$num_columns = $statement->columnCount();
	//print_r($data);

	//check if row is not null
	if ($statement->rowCount() == 0) 
	{
	$result = flashMessage("no hay resultados", "Fail");
		
	}
	else
	{
		// display resultados
		?>
		<!-- body -->
		<div class="container  ">
			<div class="row  justify-content-center">
				<form method="post" action="01-pcr_add_form.php" class="col col-lg-8 text-light bg-dark ">
					<br>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Example select</label>
							<select class="form-control" name="nif" id="nif">
								<?PHP
								for ($row=0; $row < $num_rows ; $row++)
								{ 
									$data1=$data[$row]["nif"];
									$data2=$data[$row]["apellido1"]." ".$data[$row]["apellido2"]." , ".$data[$row]["nombre1"];
									echo "<option value=$data1>{$data2}</option>\n";
							
								}
								?>
							</select>
					</div>            
					<button type="submit" class="btn btn-primary">Submit</button>
					<br><br>
				</form>
			</div>
		 </div>
	<?PHP  
	}
	} 
	catch (PDOException $ex) 
	{
    $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> An error occurred: " . $ex->getMessage() . "</p>";
	}
 

if (isset($result)) echo $result;

?>

<?PHP   include_once '../../resource/footerPage.php'; ?>

