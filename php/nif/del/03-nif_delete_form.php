<?PHP
$sub_header ="Eliminar contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';

?>

		<?php
			 include_once '../../resource/Database.php';
			$terminobusqueda2 = $_POST['terminobusqueda2'];
			$terminobusqueda2=trim($terminobusqueda2) ;
			
			try 
			{
				//create SQL insert statement			
				$sqlQuery = 
							"SELECT * FROM contactos  
							WHERE nif LIKE :terminobusqueda2 						
							";


				$statement = $db->prepare($sqlQuery);
				$statement->execute(array(':terminobusqueda2' => "%".$terminobusqueda2."%"));
				$row = $statement->fetchAll();
				//print_r($row);
				$num_rows = $statement->rowCount() ;	

				//check if one new row was created
				if ($statement->rowCount() >= 1) 
				{
							
				echo "<div class=\"container text-light bg-danger\">\n";
			
						   //-- form -->
						echo "<form  class=\"form-row\" action=\"04-nif_delete_r.php\" method=\"post\">\n";
			
								//id
								echo "<input type=\"hidden\" class=\"form-control\" id=\"inputid\"  name=\"id\" value=\"{$row[0]["id"]}\">\n";
								// nif
								echo "<div class=\"form-group col-md-2\">\n";
									echo "<label class=\" text-light\" for=\"course\">NIF:</label>\n";
									echo "<input  type=\"text\" class=\"form-control\" id=\"nif\" name=\"nif\"  value=\"{$row[0]["nif"]}\">\n";
								echo " </div>\n";							
								//nombre//////////////////////
									//nombre1
									echo "<div class=\"form-group col-md-4\">\n";
										echo "<label class=\" text-light\"  for=\"course\">nombre1:</label>\n";
									echo "<input  type=\"text\" class=\"form-control\" id=\"nombre1\" name=\"nombre1\"  value=\"{$row[0]["nombre1"]}\"   >\n";
									echo " </div>\n";								
									//apellido1
									echo "<div class=\"form-group col-md-4\">\n";
										echo "<label class=\" text-light\"  for=\"course\">apellido1:</label>\n";
									echo "<input  type=\"text\" class=\"form-control\" id=\"apellido1\" name=\"apellido1\"  value=\"{$row[0]["apellido1"]}\"   >\n";
									echo " </div>\n";								
									//apellido2
									echo "<div class=\"form-group col-md-4\">\n";
										echo "<label class=\" text-light\"  for=\"course\">apellido2:</label>\n";
									echo "<input  type=\"text\" class=\"form-control\" id=\"apellido2\" name=\"apellido2\"  value=\"{$row[0]["apellido2"]}\"   >\n";
									echo " </div>\n";
								/////////////////////////////////

                                // btn
                                echo "<div class=\"form-group col-md-12\">\n";
                                echo "<button type=\"submit\" class=\"btn btn-primary\">delete</button>\n";
                                echo "</div>\n";

			
							echo "</form>\n";
							echo "<br>\n";



					echo " </div>\n";
						   echo "<br>\n";
					}
			
				
							
			
				else{
					 $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> there is no result</p>";
				}
			} 
			catch (PDOException $ex) 
			{
           	 $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> An error occurred: " . $ex->getMessage() . "</p>";
        	}

           
		
	
			if (isset($result)) echo $result;
		?>	

<?PHP
include_once '../../resource/footerPage.php';
?>
