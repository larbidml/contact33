<?PHP
$sub_header ="COV UPDATE";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';

?>

		<?php
			 include_once '../../resource/Database.php';
			$terminobusqueda = $_POST['terminobusqueda'];
			$terminobusqueda=trim($terminobusqueda) ;
			
			try 
			{
				//create SQL insert statement			
				$sqlQuery = 
							"SELECT * FROM contactos  
							WHERE nif LIKE :terminobusqueda 						
							";


				$statement = $db->prepare($sqlQuery);
				$statement->execute(array(':terminobusqueda' => "%".$terminobusqueda."%"));
				$row = $statement->fetchAll();
				//print_r($row);
				$num_rows = $statement->rowCount() ;	

				//check if one new row was created
				if ($statement->rowCount() >= 1) 
				{
							
				echo "<div class=\"container text-light bg-success\">\n";
			
					//-- form -->
						echo "<form action=\"04-nif_update_form_r.php\" method=\"post\">\n";


								//div0----
										echo "<div class=\"form-row bg-success\">\n";
										//id
										echo "<input type=\"hidden\" class=\"form-control\" id=\"inputid\"  name=\"id\" value=\"{$row[0]["id"]}\">\n";
										//doctypo
											echo "<div class=\"form-group col-md-1\">\n";
											echo "<label class=\" text-light\"  for=\"course\">Tipo:</label>\n";
											if(is_null($row[0]["doctypo"]))
											{
												$PCRHORAdefault = "";
											}
											else
											{
												$PCRHORAdefault = $row[0]["doctypo"];
											}
												echo "<select class=\"form-control\" name=\"doctypo\" id=\"doctypo\">\n";
													echo "<option value=\"{$PCRHORAdefault}\" >{$PCRHORAdefault}</option>\n";
													echo "<option value=\"NIE\" >NIE</option>\n";
													echo "<option value=\"DNI\" >DNI</option>\n";
													echo "<option value=\"PASS\" >PASS</option>\n";

												echo "</select>\n";
											echo " </div>\n";
										//////////////////////////////
										// nif
										echo "<div class=\"form-group col-md-2\">\n";
											echo "<label class=\" text-light\" for=\"course\">NIF:</label>\n";
											echo "<input  type=\"text\" class=\"form-control\" id=\"nif\" name=\"nif\"  value=\"{$row[0]["nif"]}\">\n";
										echo " </div>\n";
										//F vencimiento
										echo "<div class=\"form-group col-md-2\">\n";
											echo "<label class=\" text-light\" for=\"course\"> FV:</label>\n";
											echo "<input  type=\"text\" class=\"form-control\" id=\"Fvenc\" name=\"Fvenc\"  value=\"{$row[0]["Fvenc"]}\">\n";
										echo " </div>\n";
										//tel1
										echo "<div class=\"form-group col-md-2\">\n";
											echo "<label class=\" text-light\"  for=\"course\"> Tel1:</label>\n";
											echo "<input  type=\"text\" class=\"form-control\" id=\"tel1\" name=\"tel1\"  value=\"{$row[0]["tel1"]}\">\n";
										echo " </div>\n";
										//tel2
										echo "<div class=\"form-group col-md-2\">\n";
											echo "<label class=\" text-light\"  for=\"course\">  Tel2:</label>\n";
											echo "<input  type=\"text\" class=\"form-control\" id=\"tel2\" name=\"tel2\" value=\"{$row[0]["tel2"]}\"  >\n";
										echo " </div>\n";
									echo " </div>\n";
								//end div0----
								echo "<hr>\n";


								//div1----
									echo "<div class=\"form-row bg-success\">\n";
										//id
										echo "<input type=\"hidden\" class=\"form-control\" id=\"inputid\"  name=\"id\" value=\"{$row[0]["id"]}\">\n";
										//doctypo
											echo "<div class=\"form-group col-md-1\">\n";
											echo "<label class=\" text-light\"  for=\"course\">Tipo:</label>\n";
											if(is_null($row[0]["doctypo"]))
											{
												$PCRHORAdefault = "";
											}
											else
											{
												$PCRHORAdefault = $row[0]["doctypo"];
											}
												echo "<select class=\"form-control\" name=\"doctypo\" id=\"doctypo\">\n";
													echo "<option value=\"{$PCRHORAdefault}\" >{$PCRHORAdefault}</option>\n";
													echo "<option value=\"NIE\" >NIE</option>\n";
													echo "<option value=\"DNI\" >DNI</option>\n";
													echo "<option value=\"PASS\" >PASS</option>\n";

												echo "</select>\n";
											echo " </div>\n";
										//////////////////////////////
										// nif
										echo "<div class=\"form-group col-md-2\">\n";
											echo "<label class=\" text-light\" for=\"course\">NIF:</label>\n";
											echo "<input  type=\"text\" class=\"form-control\" id=\"nif\" name=\"nif\"  value=\"{$row[0]["nif"]}\">\n";
										echo " </div>\n";
										//F vencimiento
										echo "<div class=\"form-group col-md-2\">\n";
											echo "<label class=\" text-light\" for=\"course\"> FV:</label>\n";
											echo "<input  type=\"text\" class=\"form-control\" id=\"Fvenc\" name=\"Fvenc\"  value=\"{$row[0]["Fvenc"]}\">\n";
										echo " </div>\n";
										//tel1
										echo "<div class=\"form-group col-md-2\">\n";
											echo "<label class=\" text-light\"  for=\"course\"> Tel1:</label>\n";
											echo "<input  type=\"text\" class=\"form-control\" id=\"tel1\" name=\"tel1\"  value=\"{$row[0]["tel1"]}\">\n";
										echo " </div>\n";
										//tel2
										echo "<div class=\"form-group col-md-2\">\n";
											echo "<label class=\" text-light\"  for=\"course\">  Tel2:</label>\n";
											echo "<input  type=\"text\" class=\"form-control\" id=\"tel2\" name=\"tel2\" value=\"{$row[0]["tel2"]}\"  >\n";
										echo " </div>\n";
									echo " </div>\n";
								//end div1----
								echo "<hr>\n";

								//div2----
									echo "<div class=\"form-row -bg-success\">\n";	
										//nombre//////////////////////
											//nombre1
											echo "<div class=\"form-group col-md-4\">\n";
												echo "<label class=\" text-light\"  for=\"course\">Nombre:</label>\n";
											echo "<input  type=\"text\" class=\"form-control\" id=\"nombre1\" name=\"nombre1\"  value=\"{$row[0]["nombre1"]}\"   >\n";
											echo " </div>\n";								
											//apellido1
											echo "<div class=\"form-group col-md-3\">\n";
												echo "<label class=\" text-light\"  for=\"course\">Apellido1:</label>\n";
											echo "<input  type=\"text\" class=\"form-control\" id=\"apellido1\" name=\"apellido1\"  value=\"{$row[0]["apellido1"]}\"   >\n";
											echo " </div>\n";								
											//apellido2
											echo "<div class=\"form-group col-md-3\">\n";
												echo "<label class=\" text-light\"  for=\"course\">Apellido2:</label>\n";
											echo "<input  type=\"text\" class=\"form-control\" id=\"apellido2\" name=\"apellido2\"  value=\"{$row[0]["apellido2"]}\"   >\n";
											echo " </div>\n";
										/////////////////////////////////

										// f nacimiento
										echo "<div class=\"form-group col-md-2\">\n";
											echo "<label class=\" text-light\"  for=\"course\">  F nacimiento:</label>\n";
											echo "<input  type=\"text\" class=\"form-control bg-warning\" id=\"fn2\" name=\"fn2\"   value=\"{$row[0]["fn2"]}\" >\n";
										echo " </div>\n";
									echo " </div>\n";
								//end div2----
								echo "<hr>\n";
								
								//div3----
									echo "<div class=\"form-row bg-success\">\n";	
										//direccion////////////////////////
											//CALLE 
											echo "<div class=\"form-group col-md-5\">\n";
												echo "<label class=\" text-light\"  for=\"course\"> CALLE:</label>\n";
												echo "<input  type=\"text\" class=\"form-control   \" id=\"CALLE\" name=\"CALLE\"  value=\"{$row[0]["CALLE"]}\" >\n";
											echo " </div>\n";
											//NOCALLE 
											echo "<div class=\"form-group col-md-1\">\n";
												echo "<label class=\" text-light\"  for=\"course\"> Nº:</label>\n";
												echo "<input  type=\"text\" class=\"form-control   \" id=\"NOCALLE\" name=\"NOCALLE\"  value=\"{$row[0]["NOCALLE"]}\" >\n";
											echo " </div>\n";
											//PISO 
											echo "<div class=\"form-group col-md-1\">\n";
												echo "<label class=\" text-light\"  for=\"course\"> PISO:</label>\n";
												echo "<input  type=\"text\" class=\"form-control   \" id=\"PISO\" name=\"PISO\"  value=\"{$row[0]["PISO"]}\" >\n";
											echo " </div>\n";
											//PUERTA 
											echo "<div class=\"form-group col-md-1\">\n";
												echo "<label class=\" text-light\"  for=\"course\"> PUERTA:</label>\n";
												echo "<input  type=\"text\" class=\"form-control   \" id=\"PUERTA\" name=\"PUERTA\"  value=\"{$row[0]["PUERTA"]}\" >\n";
											echo " </div>\n";
											//CP 
											echo "<div class=\"form-group col-md-1\">\n";
												echo "<label class=\" text-light\"  for=\"course\"> CP:</label>\n";
												echo "<input  type=\"text\" class=\"form-control   \" id=\"CP\" name=\"CP\"  value=\"{$row[0]["CP"]}\" >\n";
											echo " </div>\n";
											//CIUDAD 
											echo "<div class=\"form-group col-md-3\">\n";
												echo "<label class=\" text-light\"  for=\"course\"> CIUDAD:</label>\n";
												echo "<input  type=\"text\" class=\"form-control   \" id=\"CIUDAD\" name=\"CIUDAD\"  value=\"{$row[0]["CIUDAD"]}\" >\n";
											echo " </div>\n";
											//CATASTRO 
											echo "<div class=\"form-group col-md-3\">\n";
												echo "<label class=\" text-light\"  for=\"course\"> CATASTRO:</label>\n";
												echo "<input  type=\"text\" class=\"form-control   \" id=\"CATASTRO\" name=\"CATASTRO\"  value=\"{$row[0]["CATASTRO"]}\" >\n";
											echo " </div>\n";
										//////////////////////////
									echo " </div>\n";
								//end div3----
								echo "<hr>\n";
			
								//div4----
									echo "<div class=\"form-row bg-success\">\n";	   
										//C BANCARIA//////////////////////

											//CBANCARIA1
											echo "<div class=\"form-group col-md-1\">\n";
											echo "<label class=\" text-light \"  for=\"course\"> CB1:</label>\n";
											echo "<input  type=\"text\" class=\"form-control bg-success\" id=\"CBANCARIA1\" name=\"CBANCARIA1\"   value=\"{$row[0]["CBANCARIA1"]}\" >\n";
											echo " </div>\n";
											//CBANCARIA2
											echo "<div class=\"form-group col-md-1\">\n";
											echo "<label class=\" text-light\"  for=\"course\">CB2:</label>\n";
											echo "<input  type=\"text\" class=\"form-control bg-success\" id=\"CBANCARIA2\" name=\"CBANCARIA2\"   value=\"{$row[0]["CBANCARIA2"]}\" >\n";
											echo " </div>\n";
											//CBANCARIA3
											echo "<div class=\"form-group col-md-1\">\n";
											echo "<label class=\" text-light\"  for=\"course\">CB3:</label>\n";
											echo "<input  type=\"text\" class=\"form-control bg-success\" id=\"CBANCARIA3\" name=\"CBANCARIA3\"   value=\"{$row[0]["CBANCARIA3"]}\" >\n";
											echo " </div>\n";
											//CBANCARIA4
											echo "<div class=\"form-group col-md-1\">\n";
											echo "<label class=\" text-light\"  for=\"course\">CB4:</label>\n";
											echo "<input  type=\"text\" class=\"form-control bg-success\" id=\"CBANCARIA3\" name=\"CBANCARIA4\"   value=\"{$row[0]["CBANCARIA4"]}\" >\n";
											echo " </div>\n";
											//CBANCARIA5
											echo "<div class=\"form-group col-md-1\">\n";
											echo "<label class=\" text-light\"  for=\"course\">CB5:</label>\n";
											echo "<input  type=\"text\" class=\"form-control bg-success\" id=\"CBANCARIA5\" name=\"CBANCARIA5\"   value=\"{$row[0]["CBANCARIA5"]}\" >\n";
											echo " </div>\n";
											//CBANCARIA6
											echo "<div class=\"form-group col-md-1\">\n";
											echo "<label class=\" text-light\"  for=\"course\"> CB6:</label>\n";
											echo "<input  type=\"text\" class=\"form-control bg-success\" id=\"CBANCARIA6\" name=\"CBANCARIA6\"   value=\"{$row[0]["CBANCARIA6"]}\" >\n";
											echo " </div>\n";
										/////////////////////////////////////

										//Tcorreo
										echo "<div class=\"form-group col-md-6\">\n";
										echo "<label class=\" text-light\"  for=\"course\">Email:</label>\n";
										echo "<input  type=\"text\" class=\"form-control\" id=\"correo\" name=\"correo\"   value=\"{$row[0]["correo"]}\" >\n";
										echo " </div>\n";

									echo " </div>\n";
								//end div4----
								echo "<hr>\n";

								//div5----
									echo "<div class=\"form-row bg-success\">\n";	

										//T SANITARIA
										echo "<div class=\"form-group col-md-2\">\n";
										echo "<label class=\" text-light\"  for=\"course\">  T SANITARIA:</label>\n";
										echo "<input  type=\"text\" class=\"form-control\" id=\"TSANITARIA\" name=\"TSANITARIA\"   value=\"{$row[0]["TSANITARIA"]}\" >\n";
										echo " </div>\n";
										//T F numerosa
										echo "<div class=\"form-group col-md-2\">\n";
										echo "<label class=\" text-light\"  for=\"course\">TFnumerosa:</label>\n";
										echo "<input  type=\"text\" class=\"form-control\" id=\"TFnumerosa\" name=\"TFnumerosa\"   value=\"{$row[0]["TFnumerosa"]}\" >\n";
										echo " </div>\n";


										//PASAPORTE
										echo "<div class=\"form-group col-md-2\">\n";
										echo "<label class=\" text-light\"  for=\"course\">PASAPORTE:</label>\n";
										echo "<input  type=\"text\" class=\"form-control\" id=\"nota\" name=\"PASAPORTE\"  value=\"{$row[0]["PASAPORTE"]}\" >\n";
										echo " </div>\n";
										//FVPASPORT
										echo "<div class=\"form-group col-md-2\">\n";
										echo "<label class=\" text-light\"  for=\"course\">FVPASPORT:</label>\n";
										echo "<input  type=\"text\" class=\"form-control\" id=\"nota\" name=\"FVPASPORT\"  value=\"{$row[0]["FVPASPORT"]}\" >\n";
										echo " </div>\n";
										//GENERO
											echo "<div class=\"form-group col-md-2\">\n";
											echo "<label class=\" text-light\"  for=\"course\">GENERO:</label>\n";
											if(is_null($row[0]["GENERO"]))
											{
												$PCRHORAdefault = "";
											}
											else
											{
												$PCRHORAdefault = $row[0]["GENERO"];
											}
												echo "<select class=\"form-control\" name=\"GENERO\" id=\"GENERO\">\n";
													echo "<option value=\"{$PCRHORAdefault}\" >{$PCRHORAdefault}</option>\n";
													echo "<option value=\"HOMBRE\" >HOMBRE</option>\n";
													echo "<option value=\"MUJER\" >MUJER</option>\n";
												echo "</select>\n";
											echo " </div>\n";
										//////////

										//FAMILIA
										echo "<div class=\"form-group col-md-2\">\n";
										echo "<label class=\" text-light\"  for=\"course\">FAMILIA:</label>\n";
										echo "<input  type=\"text\" class=\"form-control\" id=\"nota\" name=\"FAMILIA\"  value=\"{$row[0]["FAMILIA"]}\" >\n";
										echo " </div>\n";


										//nota
										echo "<div class=\"form-group col-md-12\">\n";
										echo "<label class=\" text-light\"  for=\"course\">Nota:</label>\n";
										echo "<input  type=\"text\" class=\"form-control\" id=\"nota\" name=\"nota\"  value=\"{$row[0]["nota"]}\" >\n";
										echo " </div>\n";
										
									
									echo " </div>\n";
								//end div5----


								//div6----
									echo "<div class=\"form-row bg-success\">\n";
										echo "<button type=\"submit\" class=\"btn btn-primary\">UPDATE</button>\n";
										echo " </div>\n";
										echo "<br>\n";
									echo " </div>\n";
								//end div6----
			
						echo "</form>\n";

					
					echo " </div>\n";
					

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
