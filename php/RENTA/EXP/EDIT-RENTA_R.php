<?PHP
$sub_header ="RENTA EDIT";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

try{

//collect
    $idrenta= $_POST['idrenta']; $idrenta=trim($idrenta) ;
    $id= $_POST['id']; $id=trim($id) ;
    $PRECIO= $_POST['PRECIO']; $PRECIO=trim($PRECIO) ;
    $PAGADO= $_POST['PAGADO']; $PAGADO=trim($PAGADO) ;
    $LISTO= $_POST['LISTO']; $LISTO=trim($LISTO) ;
//


//SQL statement to update categoriaword
    $sqlUpdate = "UPDATE RENTA SET

    id  =:id ,
    PRECIO  =:PRECIO ,
    PAGADO  =:PAGADO ,
    LISTO  =:LISTO 


    WHERE id=:id";


    $statement = $db->prepare($sqlUpdate);
    $statement->execute(array(

 
    ':id' => $id ,
    ':PRECIO' => $PRECIO ,
    ':PAGADO' => $PAGADO ,
    ':LISTO' => $LISTO 
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


$actionpost = "01-RENTA.php" ;
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
