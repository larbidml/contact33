<?PHP
$sub_header ="Contactos Favoritos";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

//collect form data and store in variables
$terminobusqueda = $_POST['terminobusqueda'];
$terminobusqueda=trim($terminobusqueda) ;
			
try 
{

////////////////////////////////////////////////////////////
	//create SQL insert statement			
	$sqlQuery = 
				"SELECT * FROM contactos 
				WHERE nif LIKE :terminobusqueda
				OR 	nombre1 LIKE :terminobusqueda 
				OR 	apellido1 LIKE :terminobusqueda 
				OR 	apellido2 LIKE :terminobusqueda 
				OR 	nota LIKE :terminobusqueda
				";
				
	
	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':terminobusqueda' => "%".$terminobusqueda."%"));
	$data = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	$num_col = $statement->columnCount();
	//print_r($data);

	//check if row is not null
	if ($statement->rowCount() == 0) 
	{
	$result = flashMessage("no hay resultados", "Fail");
	}
	else
	{
		
		$titulo_table ="registro";
		for ($row=0; $row < $num_rows ; $row++)
		{              
		   echo" <div class=\"container bg-light\">\n";
			  if(isset($data))
			  {

				//nif
						echo "<div class=\"row\">\n";
						echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">Nif</div>\n";                    
						echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["nif"]}</div>\n";
						echo "</div>\n"; 
				///

				//nombrecompleto
						echo "<div class=\"row\">\n";
						echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">Nombre</div>\n";   
						$nombrecompleto =  $data[$row]["apellido1"]." ".$data[$row]["apellido2"]." , ".  $data[$row]["nombre1"];              
						echo "<div class=\" h2 col-8 col-sm-8 col-md-10  col-lg-10 bg-warning text-white  \">{$nombrecompleto}</div>\n";
						echo "</div>\n"; 
				///

				//fn2
						$FechaNacimiento = $data[$row]["fn2"][8].$data[$row]["fn2"][9]."/".$data[$row]["fn2"][5].$data[$row]["fn2"][6].
						"/".$data[$row]["fn2"][0].$data[$row]["fn2"][1].$data[$row]["fn2"][2].$data[$row]["fn2"][3];

						echo "<div class=\"row\">\n";
						echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">F nacimiento</div>\n";                    
						echo "<div class=\" col-2 col-sm-2 col-md-2  col-lg-2 \">{$FechaNacimiento}</div>\n";
						echo "</div>\n"; 

						echo "<div class=\"row\">\n";
						echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">AÑOS</div>\n";                    
						$ANOS = obtener_edad_segun_fecha($data[$row]["fn2"]);
						echo "<div class=\" col-2 col-sm-2 col-md-2  col-lg-2   \">{$ANOS}</div>\n";
						echo "</div>\n"; 
				///

				//PASAPORTE
						echo "<div class=\"row\">\n";
						echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">PASAPORTE</div>\n";                    
						echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["PASAPORTE"]}</div>\n";
						echo "</div>\n"; 
				///
				
				// REFPCR
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">REF PCR</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["REFPCR"]}</div>\n";
					echo "</div>\n"; 
				//

				//CODEPCR
					echo "<div class=\"row\">\n";
						echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">CODE</div>\n";                    
						echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["CODEPCR"]}</div>\n";
					echo "</div>\n"; 
				//

				//FPCR
					$FPCR = $data[$row]["FPCR"][8].$data[$row]["FPCR"][9]."/".$data[$row]["FPCR"][5].$data[$row]["FPCR"][6].
					"/".$data[$row]["FPCR"][0].$data[$row]["FPCR"][1].$data[$row]["FPCR"][2].$data[$row]["FPCR"][3];
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">F PCR</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$FPCR}</div>\n";
					echo "</div>\n"; 
				//

				//GENERO
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">GENERO</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["GENERO"]}</div>\n";
					echo "</div>\n"; 
				///
				
				//FVUELO
					$FVUELO = $data[$row]["FVUELO"][8].$data[$row]["FVUELO"][9]."/".$data[$row]["FVUELO"][5].$data[$row]["FVUELO"][6].
					"/".$data[$row]["FVUELO"][0].$data[$row]["FVUELO"][1].$data[$row]["FVUELO"][2].$data[$row]["FVUELO"][3];
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \"> FVUELO</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$FVUELO}</div>\n";
					echo "</div>\n"; 
				///
				
				//PRECIO
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">PRECIO</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["PRECIO"]}</div>\n";
					echo "</div>\n"; 
				///

				//PAGADO
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">PAGADO</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["PAGADO"]}</div>\n";
					echo "</div>\n"; 
				///

				//DEPARTE
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">DEPARTE</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["DEPARTE"]}</div>\n";
					echo "</div>\n"; 
				///

				echo "<hr>";

				/////////////////// MARRUECOS /////////////////////////

				//FPCRMAROC
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-success text-white \"> FPC RMAROC</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["FPCRMAROC"]}</div>\n";
					echo "</div>\n"; 
				//

				//PCRHORA

					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-success text-white \"> PCR HORA</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["PCRMAROCHORA"]}</div>\n";
					echo "</div>\n"; 
				//

				//PCRMINUTO

					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-success text-white \"> PCR MINUTO</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["PCRMAROCMINUTO"]}</div>\n";
					echo "</div>\n"; 
				//

				//IPMAROC
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-success text-white \"> IP MAROC</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["IPMAROC"]}</div>\n";
					echo "</div>\n"; 
				//

				//CPATIENT
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-success text-white \">CPATIENT</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["CPATIENT"]}</div>\n";
					echo "</div>\n";
				//

				//DOSSIER
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-success text-white \"> DOSSIER</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["DOSSIER"]}</div>\n";
					echo "</div>\n";
				// 
				
				//TEL

					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-success text-white \">TEL</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["tel1"]}</div>\n";
					echo "</div>\n"; 
				//

				//echo "<hr>";
				
			}  


			  ?>  
			 	
        <!-- div1 -->
			<div class="form-row bg-dark">

			
					<!-- to XML -->
						<form method="post" action="XML_R.php">
							<div class="form-group col-md-1">          
								<!-- <label class="col-4 col-sm-4  col-md-2    col-lg-2  bg-dark text-white " for="exampleFormControlSelect1">Busqueda:</label> -->
								<?PHP 
									//nif
									$nif =$data[0]["nif"];
									echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nif\" value=\"$nif\" >";
									//nombre1
									$nombre1 =$data[0]["nombre1"];
									echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nombre1\" value=\"$nombre1\" >";								
									//apellido1
									$apellido1 =$data[0]["apellido1"];
									echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"apellido1\" value=\"$apellido1\" >";
									//apellido2
									$apellido2 =$data[0]["apellido2"];
									echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"apellido2\" value=\"$apellido2\" >";
									$fn2 =$data[0]["fn2"];
									echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"fn2\" value=\"$fn2\" >";
									//REFPCR
									$REFPCR =$data[0]["REFPCR"];
									echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"REFPCR\" value=\"$REFPCR\" >";
									//CODEPCR
									$CODEPCR =$data[0]["CODEPCR"];
									echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"CODEPCR\" value=\"$CODEPCR\" >";						
									//FPCR
									$FPCR =$data[0]["FPCR"];
									echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"FPCR\" value=\"$FPCR\" >";
									//GENERO
									$GENERO =$data[0]["GENERO"];
									echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"GENERO\" value=\"$GENERO\" >";
									//$ANOS
									$ANOS = obtener_edad_segun_fecha($data[$row]["fn2"]);
									echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"ANOS\" value=\"$ANOS\" >";
								?>
								
									<button type="submit" class="btn btn-primary">TO XML</button>
								
							</div>
						</form>
					<!----------->

					<!-- XML_FICHE SANITIARE -->
						<form method="post" action="XML_FSANITIARE_R.php">
						<div class="form-group col-md-1">        
								<!-- <label class="col-4 col-sm-4  col-md-2    col-lg-2  bg-dark text-white " for="exampleFormControlSelect1">Busqueda:</label> -->
								<?PHP 
								
								//nif
								$nif =$data[0]["nif"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nif\" value=\"$nif\" >";
								
								//nombre1
								$nombre1 =$data[0]["nombre1"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nombre1\" value=\"$nombre1\" >";
								
								//apellido1
								$apellido1 =$data[0]["apellido1"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"apellido1\" value=\"$apellido1\" >";
								
								//apellido2
								$apellido2 =$data[0]["apellido2"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"apellido2\" value=\"$apellido2\" >";


								//PASAPORTE
								$PASAPORTE =$data[0]["PASAPORTE"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"PASAPORTE\" value=\"$PASAPORTE\" >";


								//FVUELO
								$FVUELO =$data[0]["FVUELO"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"FVUELO\" value=\"$FVUELO\" >";

								//tel1
								$tel1 =$data[0]["tel1"];
								if( $data[0]["tel1"] == 0 )
								{
									$tel1 = "";
								}
								else
								{
									$tel1 =$data[0]["tel1"];
								}
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"tel1\" value=\"$tel1\" >";

								?>
								
									<button type="submit" class="btn btn-primary">F SANITAIRE</button>
								
							</div>
						</form>
					<!------------------------->

					<!-- XML_MAROC_PCR -->
						<form method="post" action="PCR_MAROC_R.php">
						<div class="form-group col-md-1">       
								<!-- <label class="col-4 col-sm-4  col-md-2    col-lg-2  bg-dark text-white " for="exampleFormControlSelect1">Busqueda:</label> -->
								<?PHP 

								//GENERO
								$GENERO =$data[0]["GENERO"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"GENERO\" value=\"$GENERO\" >";

								//IPMAROC
								$IPMAROC =$data[0]["IPMAROC"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"IPMAROC\" value=\"$IPMAROC\" >";



								//nif
								$nif =$data[0]["nif"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nif\" value=\"$nif\" >";
								
								//nombre1
								$nombre1 =$data[0]["nombre1"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nombre1\" value=\"$nombre1\" >";
								
								//apellido1
								$apellido1 =$data[0]["apellido1"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"apellido1\" value=\"$apellido1\" >";
								
								//apellido2
								$apellido2 =$data[0]["apellido2"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"apellido2\" value=\"$apellido2\" >";

								//fn2
								$fn2 =$data[0]["fn2"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"fn2\" value=\"$fn2\" >";

								//$ANOS
								$ANOS = obtener_edad_segun_fecha($data[$row]["fn2"]);
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"ANOS\" value=\"$ANOS\" >";

								//PASAPORTE
								$PASAPORTE =$data[0]["PASAPORTE"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"PASAPORTE\" value=\"$PASAPORTE\" >";


								//FPCRMAROC
								$FPCRMAROC =$data[0]["FPCRMAROC"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"FPCRMAROC\" value=\"$FPCRMAROC\" >";
				


								//PCRMAROCHORA
								$PCRMAROCHORA =$data[0]["PCRMAROCHORA"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"PCRMAROCHORA\" value=\"$PCRMAROCHORA\" >";
								//PCRMAROCMINUTO
								$PCRMAROCMINUTO =$data[0]["PCRMAROCMINUTO"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"PCRMAROCMINUTO\" value=\"$PCRMAROCMINUTO\" >";


								
								//CPATIENT
								$CPATIENT =$data[0]["CPATIENT"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"CPATIENT\" value=\"$CPATIENT\" >";


								//DOSSIER
								$DOSSIER =$data[0]["DOSSIER"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"DOSSIER\" value=\"$DOSSIER\" >";

								

							
					

								?>
								
									<button type="submit" class="btn btn-danger">MAROC PCR</button>
								
							</div>
						</form>
					<!--------------- -->

					<!--QR -->
						<form method="post" action="QR.php">
						<div class="form-group col-md-1">          
								<!-- <label class="col-4 col-sm-4  col-md-2    col-lg-2  bg-dark text-white " for="exampleFormControlSelect1">Busqueda:</label> -->
								<?PHP 

								//GENERO
								$GENERO =$data[0]["GENERO"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"GENERO\" value=\"$GENERO\" >";

								//IPMAROC
								$IPMAROC =$data[0]["IPMAROC"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"IPMAROC\" value=\"$IPMAROC\" >";
								
								//nombre1
								$nombre1 =$data[0]["nombre1"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nombre1\" value=\"$nombre1\" >";
								
								//apellido1
								$apellido1 =$data[0]["apellido1"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"apellido1\" value=\"$apellido1\" >";
								
								//apellido2
								$apellido2 =$data[0]["apellido2"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"apellido2\" value=\"$apellido2\" >";



								//PASAPORTE
								$PASAPORTE =$data[0]["PASAPORTE"];
								echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"PASAPORTE\" value=\"$PASAPORTE\" >";
							
					

								?>
								
									<button type="submit" class="btn btn-danger">QR</button>
								
							</div>
						</form>
					<!--------->
			</div>  
        <!--End div1 -->

				
				</div>
				
				
				<div class="row  bg-dark text-white">
				</div>
				<div class="row  bg-dark text-white">					
				</div>
				<div class="row  bg-dark text-white">
				</div>
				<div class="row  bg-dark text-white">
				</div>

		  <?PHP 
			
			 echo "</div>\n"; 
			  echo "<br>\n";

			  


		}
		// end for


			?>
			<!-- body -->

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

