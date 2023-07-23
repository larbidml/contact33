<?PHP
$sub_header ="pcr Add";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
include_once '../../resource/Database.php';

			
$nif = $_POST['nif'];

			
try 
	{

			//create SQL  statement		
				$sqlQuery = 
				"SELECT id , nif ,	nombre1 , apellido1 ,apellido2
					FROM contactos 
				WHERE nif LIKE :nif
				";

				$statement = $db->prepare($sqlQuery);
				$statement->execute(array(':nif' => "%".$nif."%"));
				$data = $statement->fetchAll();
				$num_rows = $statement->rowCount() ;
				$num_columns = $statement->columnCount();
				//print_r($data);

			//END create SQL  statement	

				//check if one new row was created
					if ($statement->rowCount() >= 1) 
					{
								
						echo "<div class=\"container text-light bg-dark\">\n";
							//-- form -->
								echo "<form action=\"02-jura_add_form_r.php\" method=\"post\">\n";

										//div1----
											echo "<div class=\"form-row bg-dark\">\n";
												//id
												echo "<input type=\"hidden\" class=\"form-control\" id=\"id\"  name=\"id\" value=\"{$data[0]["id"]}\">\n";
												echo $data[0]["nif"]."<br>\n";
												echo $data[0]["nombre1"]."  ".$data[0]["apellido1"]."  " .$data[0]["apellido2"]."<br>\n";

											echo " </div>\n";
										//end div1----

										echo "<hr>\n";
										
										//div5----
											echo "<div class=\"form-row bg-success\">\n";	

												//REFPCR
												echo "<div class=\"form-group col-md-2\">\n";
												echo "<label class=\" text-light\"  for=\"course\">REF :</label>\n";
												echo "<input  type=\"text\" class=\"form-control\" id=\"REFPCR\" name=\"REFPCR\"  >\n";
												echo " </div>\n";

												//CODEPCR
												echo "<div class=\"form-group col-md-2\">\n";
												echo "<label class=\" text-light\"  for=\"course\">CODE PCR:</label>\n";
												echo "<input  type=\"text\" class=\"form-control\" id=\"CODEPCR\" name=\"CODEPCR\"   >\n";
												echo " </div>\n";


												//FPCR
												echo "<div class=\"form-group col-md-3\">\n";
												echo "<label class=\" text-light\"  for=\"course\">FECHA PCR:</label>\n";
												echo "<input  type=\"text\" class=\"form-control\" id=\"FPCR\" name=\"FPCR\"  >\n";
												echo " </div>\n";

												//FVUELO
												echo "<div class=\"form-group col-md-3\">\n";
												echo "<label class=\" text-light\"  for=\"course\">F VUELO:</label>\n";
												echo "<input  type=\"text\" class=\"form-control\" id=\"FVUELO\" name=\"FVUELO\"  >\n";
												echo " </div>\n";

												//NACIONALIDAD
												echo "<div class=\"form-group col-md-3\">\n";
												echo "<label class=\" text-light\"  for=\"course\">NACIONALIDAD:</label>\n";
												echo "<input  type=\"text\" class=\"form-control\" id=\"NACIONALIDAD\" name=\"NACIONALIDAD\"  >\n";
												echo " </div>\n";

												//PRECIO
												echo "<div class=\"form-group col-md-3\">\n";
												echo "<label class=\" text-light\"  for=\"course\">PRECIO:</label>\n";
												echo "<input  type=\"text\" class=\"form-control\" id=\"PRECIO\" name=\"PRECIO\"  >\n";
												echo " </div>\n";
												
												//PAGADO
												echo "<div class=\"form-group col-md-3\">\n";
												echo "<label class=\" text-light\"  for=\"course\">PAGADO:</label>\n";
												echo "<input  type=\"text\" class=\"form-control\" id=\"PAGADO\" name=\"PAGADO\"  >\n";
												echo " </div>\n";												
												
												//DEPARTE
												echo "<div class=\"form-group col-md-3\">\n";
												echo "<label class=\" text-light\"  for=\"course\">DEPARTE:</label>\n";
												echo "<input  type=\"text\" class=\"form-control\" id=\"DEPARTE\" name=\"DEPARTE\"  >\n";
												echo " </div>\n";









											
											
											echo " </div>\n";
										//end div5----

										//div6----
											echo "<div class=\"form-row bg-success\">\n";	


												//matrimonio_fecha
												echo "<div class=\"form-group col-md-2\">\n";
												echo "<label class=\" text-light\"  for=\"course\">FECHA MATRIMONIO:</label>\n";
												echo "<input  type=\"text\" class=\"form-control bg-warning\" id=\"matrimonio_fecha\" name=\"matrimonio_fecha\"  >\n";
												echo " </div>\n";

												//matrimonio_lugar
												echo "<div class=\"form-group col-md-4\">\n";
												echo "<label class=\" text-light\"  for=\"course\">LUGAR MATRIMONIO:</label>\n";
												echo "<input  type=\"text\" class=\"form-control bg-warning\" id=\"matrimonio_lugar\" name=\"matrimonio_lugar\"   >\n";
												echo " </div>\n";

											echo " </div>\n";
										//end div6---

										//div7----
											echo "<div class=\"form-row bg-success\">\n";
												echo "<button type=\"submit\" class=\"btn btn-primary\">UPDATE</button>\n";
												echo " </div>\n";
												echo "<br>\n";
											echo " </div>\n";
										//end div7----
					
								echo "</form>\n";
							// END FORM					
						echo " </div>\n";					
					}
					else
					{
						$result = "<p style='padding:20px; border: 1px solid gray; color: red;'> there is no result</p>";
					}
				//END IF
			
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
