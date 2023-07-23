<?PHP
$sub_header ="DETALLES EDIT";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

try{

//collect
	$id= $_POST['id']; $id=trim($id) ;
	$datainici= $_POST['datainici']; $datainici=trim($datainici) ;
	$datafi= $_POST['datafi']; $datafi=trim($datafi) ;
	$importealquiler= $_POST['importealquiler']; $importealquiler=trim($importealquiler) ;
	$contractaRenovat= $_POST['contractaRenovat']; $contractaRenovat=trim($contractaRenovat) ;
	$fechacontratoanterior= $_POST['fechacontratoanterior']; $fechacontratoanterior=trim($fechacontratoanterior) ;
	$tipoarrendador= $_POST['tipoarrendador']; $tipoarrendador=trim($tipoarrendador) ;
	$PERSONAFISICAOJURIDICA= $_POST['PERSONAFISICAOJURIDICA']; $PERSONAFISICAOJURIDICA=trim($PERSONAFISICAOJURIDICA) ;
	$nombrearrendador= $_POST['nombrearrendador']; $nombrearrendador=trim($nombrearrendador) ;
	$apellido1arrendador= $_POST['apellido1arrendador']; $apellido1arrendador=trim($apellido1arrendador) ;
	$apellido2arrendador= $_POST['apellido2arrendador']; $apellido2arrendador=trim($apellido2arrendador) ;
	$niearrendador= $_POST['niearrendador']; $niearrendador=trim($niearrendador) ;

	$JURIDICACIF= $_POST['JURIDICACIF']; $JURIDICACIF=trim($JURIDICACIF) ;
	$JURIDICAEMPRESA= $_POST['JURIDICAEMPRESA']; $JURIDICAEMPRESA=trim($JURIDICAEMPRESA) ;



//


//SQL statement to update categoriaword
    $sqlUpdate = "UPDATE alquilerdetalles SET


id  =:id ,
datainici  =:datainici ,
datafi  =:datafi ,
importealquiler  =:importealquiler ,
contractaRenovat  =:contractaRenovat ,
fechacontratoanterior  =:fechacontratoanterior ,
tipoarrendador  =:tipoarrendador ,
PERSONAFISICAOJURIDICA  =:PERSONAFISICAOJURIDICA ,
nombrearrendador  =:nombrearrendador ,
apellido1arrendador  =:apellido1arrendador ,
apellido2arrendador  =:apellido2arrendador ,
niearrendador  =:niearrendador ,
JURIDICACIF  =:JURIDICACIF ,
JURIDICAEMPRESA  =:JURIDICAEMPRESA 


    WHERE id=:id";


    $statement = $db->prepare($sqlUpdate);
    $statement->execute(array(

	
		':id' => $id ,
		':datainici' => $datainici ,
		':datafi' => $datafi ,
		':importealquiler' => $importealquiler ,
		':contractaRenovat' => $contractaRenovat ,
		':fechacontratoanterior' => $fechacontratoanterior ,
		':tipoarrendador' => $tipoarrendador ,
		':PERSONAFISICAOJURIDICA' => $PERSONAFISICAOJURIDICA ,
		':nombrearrendador' => $nombrearrendador ,
		':apellido1arrendador' => $apellido1arrendador ,
		':apellido2arrendador' => $apellido2arrendador ,
		':niearrendador' => $niearrendador ,

		':JURIDICACIF' => $JURIDICACIF ,
		':JURIDICAEMPRESA' => $JURIDICAEMPRESA 
		
    ));
//end sql








$result= flashMessage("Modificación exitosa","Pass");


}
catch (PDOException $ex)
{
$result= flashMessage("$ex->getMessage()", "Fail");
}




?>

<?php 
if (isset($result)) echo $result; 


$actionpost = "01-ALQUILER.php" ;
echo"<div class=\"container \">\n" ;
echo "<div class=\"row justify-content-center\">\n" ;
echo "<div class=\"col-lg-6 bg-dark \">\n" ;   
echo "<form  action= $actionpost  method=\"post\">\n" ;

// hidden
//echo "<input type=\"hidden\"  name=\"Hmes\"   value=\"$Hmes\">\n" ;

//div BOTON
    echo "<div class=\"form-row bg-dark\">\n" ;
    echo "<div class=\"form-group col-md-12\">\n" ;
    echo "<button type=\"bg-warning\" class=\"btn btn-primary\">Return</button>\n" ;
    echo "</div>\n" ;
    echo "</div>\n" ;  
// 
echo "</form>\n" ;
echo "</div>\n" ;
echo "</div>\n" ;
echo "</div>\n" ;




?>





<!-- end -->
<?PHP include_once '../../resource/footerPage.php'; ?>
