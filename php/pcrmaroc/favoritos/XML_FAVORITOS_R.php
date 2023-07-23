<?PHP
$sub_header ="xml favoritos";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

//collect form data and store in variables
$terminobusqueda = $_POST['terminobusqueda'];
$terminobusqueda=trim($terminobusqueda) ;
			
try 
{
	//INCLUE LOS PARAMETROS
	include_once '../../resource/PARAMETERS.php';
	
	//create SQL insert statement			
	$sqlQuery = 
				"SELECT * FROM contactos 
				WHERE nif LIKE :terminobusqueda
				OR 	nombre LIKE :terminobusqueda 
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
				if(strlen($data[$row]["nif"]) >1 )
				{
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[1]</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["nif"]}</div>\n";
					echo "</div>\n"; 
				}
				//nombre
				if(strlen($data[$row]["nombre"]) >1 )
				{
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[2]</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["nombre"]}</div>\n";
					echo "</div>\n"; 
				}
				//fn2
				if(strlen($data[$row][3]) >1 )
				{

					$FechaNacimiento = $data[$row][3][8].$data[$row][3][9]."/".$data[$row][3][5].$data[$row][3][6].
					"/".$data[$row][3][0].$data[$row][3][1].$data[$row][3][2].$data[$row][3][3];

					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[3]</div>\n";                    
					echo "<div class=\" col-2 col-sm-2 col-md-2  col-lg-2 bg-warning text-white \">{$FechaNacimiento}</div>\n";
					echo "</div>\n"; 

					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">AÑOS</div>\n";                    
					$ANOS = obtener_edad_segun_fecha($data[$row][3]);
					echo "<div class=\" col-2 col-sm-2 col-md-2  col-lg-2   \">{$ANOS}</div>\n";
					echo "</div>\n"; 
				}
				//nota
				if(strlen($data[$row]["nota"]) >1 )
				{
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[4]</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["nota"]}</div>\n";
					echo "</div>\n"; 
				}
				//FAVORITO
				if(strlen($data[$row]["FAVORITO"]) >1 )
				{
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[5]</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["FAVORITO"]}</div>\n";
					echo "</div>\n"; 
				}
				//PASAPORTE
				if(strlen($data[$row]["PASAPORTE"]) >1 )
				{
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[6]</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["PASAPORTE"]}</div>\n";
					echo "</div>\n"; 
				}
				//REF
				if(strlen($data[$row]["REF"]) >1 )
				{
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[7]</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["REF"]}</div>\n";
					echo "</div>\n"; 
				}
				//CODE
				if(strlen($data[$row]["CODE"]) >1 )
				{
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[8]</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["CODE"]}</div>\n";
					echo "</div>\n"; 
				}
				//FPCR
				if(strlen($data[$row]["FPCR"]) >1 )
				{

					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[9]</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["FPCR"]}</div>\n";
					echo "</div>\n"; 
				}
				//GENERO
				if(strlen($data[$row]["GENERO"]) >1 )
				{
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[10]</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["GENERO"]}</div>\n";
					echo "</div>\n"; 
				}
				//FVUELO
				if(strlen($data[$row]["FVUELO"]) >1 )
				{

					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[11]</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["FVUELO"]}</div>\n";
					echo "</div>\n"; 
				}
				//NACIONALIDAD
				if(strlen($data[$row]["NACIONALIDAD"]) >1 )
				{
					echo "<div class=\"row\">\n";
					echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-info text-white \">$table_Headers[12]</div>\n";                    
					echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["NACIONALIDAD"]}</div>\n";
					echo "</div>\n"; 
				}
				
				///////////////////////
				
			}  



			  ?>  
			<div class="row  bg-dark text-white">
				<form method="post" action="XML_R.php">
					<div class="form-group row">          
						<!-- <label class="col-4 col-sm-4  col-md-2    col-lg-2  bg-dark text-white " for="exampleFormControlSelect1">Busqueda:</label> -->
						<?PHP 
						
						//nif
						$nif =$data[0]["nif"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nif\" value=\"$nif\" >";
						//nombre
						$nombre =$data[0]["nombre"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nombre\" value=\"$nombre\" >";
						//fn2
						$fn2 =$data[0]["fn2"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"fn2\" value=\"$fn2\" >";
						//nota
						$nota =$data[0]["nota"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nota\" value=\"$nota\" >";
						//FAVORITO
						$FAVORITO =$data[0]["FAVORITO"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"FAVORITO\" value=\"$FAVORITO\" >";
						//PASAPORTE
						$PASAPORTE =$data[0]["PASAPORTE"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"PASAPORTE\" value=\"$PASAPORTE\" >";
						//REF
						$REF =$data[0]["REF"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"REF\" value=\"$REF\" >";
						//ANOS
						$ANOS2 = $ANOS;
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"ANOS2\" value=\"$ANOS2\" >";
						//CODE
						$CODE =$data[0]["CODE"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"CODE\" value=\"$CODE\" >";						
						//FPCR
						
						$FPCR = $data[$row]["FPCR"][8].$data[$row]["FPCR"][9]."/".$data[$row]["FPCR"][5].$data[$row]["FPCR"][6].
						"/".$data[$row]["FPCR"][0].$data[$row]["FPCR"][1].$data[$row]["FPCR"][2].$data[$row]["FPCR"][3];

						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"FPCR\" value=\"$FPCR \" >";


						//GENERO
						$GENERO =$data[0]["GENERO"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"GENERO\" value=\"$GENERO\" >";


						//$ANOS
						$ANOS = obtener_edad_segun_fecha($data[$row][3]);
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"ANOS\" value=\"$ANOS\" >";
						//NACIONALIDAD
						$NACIONALIDAD =$data[0]["NACIONALIDAD"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"NACIONALIDAD\" value=\"$NACIONALIDAD\" >";



						?>
						<div class="col-sm-4">
							<button type="submit" class="btn btn-primary">TO XML</button>
						</div>
					</div>
				</form>

				<form method="post" action="XML_FSANITIARE_R.php">
					<div class="form-group row">          
						<!-- <label class="col-4 col-sm-4  col-md-2    col-lg-2  bg-dark text-white " for="exampleFormControlSelect1">Busqueda:</label> -->
						<?PHP 
						
						//nif
						$nif =$data[0]["nif"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nif\" value=\"$nif\" >";
						
						//nombre
						$nombre =$data[0]["nombre"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"nombre\" value=\"$nombre\" >";
						//fn2
						$fn2 =$data[0]["fn2"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"fn2\" value=\"$fn2\" >";

						//PASAPORTE
						$PASAPORTE =$data[0]["PASAPORTE"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"PASAPORTE\" value=\"$PASAPORTE\" >";


						//$ANOS
						$ANOS = obtener_edad_segun_fecha($data[$row][3]);
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"ANOS\" value=\"$ANOS\" >";
						//NACIONALIDAD
						$NACIONALIDAD =$data[0]["NACIONALIDAD"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"NACIONALIDAD\" value=\"$NACIONALIDAD\" >";
						//FVUELO
						$FVUELO =$data[0]["FVUELO"];
						echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"FVUELO\" value=\"$FVUELO\" >";
						




						?>
						<div class="col-sm-4">
							<button type="submit" class="btn btn-success">F SANITAIRE</button>
						</div>
					</div>
				</form>



			</div>

				


		  <?PHP 
			
			 echo "</div>\n"; 
			  echo "<br>\n";

			  


		}
		// end for


		//display end
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

