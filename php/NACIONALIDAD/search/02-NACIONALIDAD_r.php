<?PHP
$sub_header ="Añadir contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/utilities.php';
include_once '../../resource/Database.php';
?>


<?php			 
			 //collect form data and store in variables


			//fecha
			$fechaDIA = $_POST['fechaDIA'];
			$fechaDIA=trim($fechaDIA) ;
			$fechaMES = $_POST['fechaMES'];
			$fechaMES=trim($fechaMES) ;
			$fechaANO = $_POST['fechaANO'];
			$fechaANO=trim($fechaANO) ;
			$fecha =$fechaANO."/".$fechaMES."/".$fechaDIA ;


			//hora
			$horaHORA = $_POST['horaHORA'];
			$horaHORA=trim($horaHORA) ;
			$horaMINUTOS = $_POST['horaMINUTOS'];
			$horaMINUTOS=trim($horaMINUTOS) ;
			$hora =$horaHORA.":".$horaMINUTOS.":"."00" ;






			//ref
			$ref = $_POST['ref'];
			$ref=trim($ref) ;
			//nie
			$nie = $_POST['nie'];
			$nie=trim($nie) ;
			//nombre
			$nombre = $_POST['nombre'];
			$nombre=trim($nombre) ;
			//apellido1
			$apellido1 = $_POST['apellido1'];
			$apellido1=trim($apellido1) ;
			//departe
			$departe = $_POST['departe'];
			$departe=trim($departe) ;
			//precio
			$precio = $_POST['precio'];
			$precio=trim($precio) ;
			//pagado
			$pagado = $_POST['pagado'];
			$pagado=trim($pagado) ;
			//CORREO
			$CORREO = $_POST['CORREO'];
			$CORREO=trim($CORREO) ;
			//TEL
			$TEL = $_POST['TEL'];
			$TEL=trim($TEL) ;
			//nota
			$nota = $_POST['nota'];
			$nota=trim($nota) ;


			


			if(chekDuplicateEntries("citanacionalidad","ref",$ref ,$db))
			{
				$result= flashMessage("ref ya existe", "Fail");
			}
			else
			{
				try 
				{
					//create SQL insert statement
					$sqlInsert = "INSERT INTO citanacionalidad (
																
																fecha,
																hora,
																ref,
																nie,
																nombre,
																apellido1,
																departe,
																precio,
																pagado,
																CORREO,
																TEL,
																nota


														)

										VALUES (
																:fecha,
																:hora,
																:ref,
																:nie,
																:nombre,
																:apellido1,
																:departe,
																:precio,
																:pagado,
																:CORREO,
																:TEL,
																:nota

														) ";

					//use PDO prepared to sanitize data
					$statement = $db->prepare($sqlInsert);

					//add the data into the database
					$statement->execute(array(	
											
										':fecha' => $fecha ,	
										':hora' => $hora ,	
										':ref' => $ref ,	
										':nie' => $nie ,	
										':nombre' => $nombre ,	
										':apellido1' => $apellido1 ,	
										':departe' => $departe ,	
										':precio' => $precio ,	
										':pagado' => $pagado , 	
										':CORREO' => $CORREO ,	
										':TEL' => $TEL ,	
										':nota' => $nota 

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