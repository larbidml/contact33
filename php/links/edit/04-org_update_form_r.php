<?PHP
$sub_header ="Modificar  contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

try{

//collect 
  $idorg= $_POST['idorg']; 
   
  $ORGANISMOnombre= $_POST['ORGANISMOnombre']; 
  $ORGANISMOnombre=trim($ORGANISMOnombre) ;
  $ORGANISMOnombre =strtoupper($ORGANISMOnombre)  ;

  $bgcolor= $_POST['bgcolor']; 
  
  
//


//SQL statement to update categoriaword
$sqlUpdate = "UPDATE organismos SET

idorg  =:idorg ,
ORGANISMOnombre  =:ORGANISMOnombre ,
bgcolor  =:bgcolor 





WHERE idorg=:idorg";

//use PDO prepared to sanitize SQL statement
$statement = $db->prepare($sqlUpdate);

//execute the statement
//hay que incluir tambien :idorg => $idorg
$statement->execute(array(

':idorg' => $idorg ,
':ORGANISMOnombre' => $ORGANISMOnombre ,
':bgcolor' => $bgcolor 



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
  if (isset($result))
  {
  flashMessage2($result);

  }  

?>






<?PHP
include_once '../../resource/footerPage.php';
?>
