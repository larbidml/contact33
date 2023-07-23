<?PHP
$sub_header ="Modificar  contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

     try{
    
        //collect form data and store in variables
		$id= $_POST['id'];
		$fecha= $_POST['fecha'];
		$hora= $_POST['hora'];
		$ref= $_POST['ref'];
		$nie= $_POST['nie'];
		$nombre= $_POST['nombre'];
		$apellido1= $_POST['apellido1'];
		$departe= $_POST['departe'];
		$precio= $_POST['precio'];
		$pagado= $_POST['pagado'];
		$CORREO= $_POST['CORREO'];
		$TEL= $_POST['TEL'];
		$nota= $_POST['nota'];
				
      



    
        //SQL statement to update categoriaword
                $sqlUpdate = "UPDATE citanacionalidad SET
								id  =:id ,
								fecha  =:fecha ,
								hora  =:hora ,
								ref  =:ref ,
								nie  =:nie ,
								nombre  =:nombre ,
								apellido1  =:apellido1 ,
								departe  =:departe ,
								precio  =:precio ,
								pagado  =:pagado ,
								CORREO  =:CORREO ,
								TEL  =:TEL ,
								nota  =:nota 

                                
                                WHERE id=:id";

                //use PDO prepared to sanitize SQL statement
                $statement = $db->prepare($sqlUpdate);

                //execute the statement
                //hay que incluir tambien :id => $id
            $statement->execute(array(
                                        
				':id' => $id ,
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
        //end sql

        $result= flashMessage("Modificación exitosa","Pass");
               
     
        }
        catch (PDOException $ex)
        {
              $result= flashMessage("$ex->getMessage()", "Fail");
        }

        	
    
    
    
    
    
    ?>

    <?php if (isset($result)) echo $result; ?>

    <!-- end -->
<?PHP
include_once '../../resource/footerPage.php';
?>
