<?PHP
    $sub_header ="Modificar  contacto";
    include_once '../../resource/headerPage.php';
    include_once '../../resource/utilities.php';
	include_once '../../resource/Database.php';

	//collect form data and store in variables
	$terminobusqueda = $_POST['terminobusqueda'];
	$terminobusqueda=trim($terminobusqueda) ;
	
    try 
    {
		//create SQL insert statement			
		$sqlQuery = 
					"SELECT * FROM contactos 
					WHERE nif LIKE :terminobusqueda 
					OR nombre1 LIKE :terminobusqueda
					OR apellido1 LIKE :terminobusqueda
					OR apellido2 LIKE :terminobusqueda
					OR 	nota LIKE :terminobusqueda							
					";

		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':terminobusqueda' => "%".$terminobusqueda."%"));
		$DATA = $statement->fetchAll();
		//print_r($DATA);
		$num_rows = $statement->rowCount() ;	

                	//check if row is not null
	if ($statement->rowCount() == 0) 
	{
	$result = flashMessage("no hay resultados", "Fail");
	
	}
	else
	{

        ?>
        <!-- body -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-lg-10  text-light bg-info">          
                <br>
                <form method="post" action="03-nif_update_form.php">
                        <div class="form-group row">          
                            <label class="col-form-label col-sm-2" for="exampleFormControlSelect1">EDITAR:</label>
                            <?PHP
                            	echo "<select class=\"form-control col-sm-8\" name=\"terminobusqueda2\" id=\"terminobusqueda2\">\n";
                                for ($row=0; $row < $num_rows ; $row++)
                                    {   
                                        $nombrecompleto = $DATA[$row]["nif"]." -- ".$DATA[$row]["nombre1"]." , ".$DATA[$row]["apellido1"]." ".$DATA[$row]["apellido2"];
                                        echo" <option value=\"{$DATA[$row]["nif"]}\">{$nombrecompleto}</option>\n";
                                    }
                                echo "</select>\n";
                            ?>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                </form>
                <br>          
                </div>
            </div>
    
    </div>
    <!--end body -->
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
