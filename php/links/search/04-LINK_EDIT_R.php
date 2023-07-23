<?PHP
$sub_header ="Modificar  contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

     try{
    
        //collect form data and store in variables
			$Id= $_POST['Id']; $Id=trim($Id) ;
			$idorg= $_POST['idorg']; $idorg=trim($idorg) ;
			$TRAMITElink= $_POST['TRAMITElink']; $TRAMITElink=trim($TRAMITElink) ;
			$DOC1= $_POST['DOC1']; $DOC1=trim($DOC1) ;
			$DOC2= $_POST['DOC2']; $DOC2=trim($DOC2) ;
			$DOC3= $_POST['DOC3']; $DOC3=trim($DOC3) ;
			$DOC4= $_POST['DOC4']; $DOC4=trim($DOC4) ;
			$DOC5= $_POST['DOC5']; $DOC5=trim($DOC5) ;
			$DOC6= $_POST['DOC6']; $DOC6=trim($DOC6) ;
			$DOC7= $_POST['DOC7']; $DOC7=trim($DOC7) ;
			$DOC8= $_POST['DOC8']; $DOC8=trim($DOC8) ;
			$DOC9= $_POST['DOC9']; $DOC9=trim($DOC9) ;
			$DOC10= $_POST['DOC10']; $DOC10=trim($DOC10) ;
			$DOC11= $_POST['DOC11']; $DOC11=trim($DOC11) ;
			$DOC12= $_POST['DOC12']; $DOC12=trim($DOC12) ;
			$DOC13= $_POST['DOC13']; $DOC13=trim($DOC13) ;
			$DOC14= $_POST['DOC14']; $DOC14=trim($DOC14) ;
			$DOC15= $_POST['DOC15']; $DOC15=trim($DOC15) ;	
			$SOLICITUDLINK= $_POST['SOLICITUDLINK']; $SOLICITUDLINK=trim($SOLICITUDLINK) ;	
		
		//




//SQL statement to update categoriaword
	$sqlUpdate = "UPDATE tramites SET
	Id  =:Id ,
	idorg  =:idorg ,
	TRAMITElink  =:TRAMITElink ,
	DOC1  =:DOC1 ,
	DOC2  =:DOC2 ,
	DOC3  =:DOC3 ,
	DOC4  =:DOC4 ,
	DOC5  =:DOC5 ,
	DOC6  =:DOC6 ,
	DOC7  =:DOC7 ,
	DOC8  =:DOC8 ,
	DOC9  =:DOC9 ,
	DOC10  =:DOC10 ,
	DOC11  =:DOC11 ,
	DOC12  =:DOC12 ,
	DOC13  =:DOC13 ,
	DOC14  =:DOC14 ,
	DOC15  =:DOC15 ,
	SOLICITUDLINK  =:SOLICITUDLINK 



	WHERE Id=:Id";

	//use PDO prepared to sanitize SQL statement
	$statement = $db->prepare($sqlUpdate);

	//execute the statement
	//hay que incluir tambien :id => $id
	$statement->execute(array(

	':Id' => $Id ,
	':idorg' => $idorg ,
	':TRAMITElink' => $TRAMITElink ,
	':DOC1' => $DOC1 ,
	':DOC2' => $DOC2 ,
	':DOC3' => $DOC3 ,
	':DOC4' => $DOC4 ,
	':DOC5' => $DOC5 ,
	':DOC6' => $DOC6 ,
	':DOC7' => $DOC7 ,
	':DOC8' => $DOC8 ,
	':DOC9' => $DOC9 ,
	':DOC10' => $DOC10 ,
	':DOC11' => $DOC11 ,
	':DOC12' => $DOC12 ,
	':DOC13' => $DOC13 ,
	':DOC14' => $DOC14 ,
	':DOC15' => $DOC15 ,
	':SOLICITUDLINK' => $SOLICITUDLINK 



					

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

//container 
echo "<div class=\"container bg-light\">\n" ;
echo "<div class=\"form-row bg-light\">\n" ;


			//form return
			echo "<form  action=\"00-links_SEARCH.php\" method=\"post\">\n" ;
			//echo "<input type=\"hidden\"  name=\"Hmes\"   value=\"$Hmes\">\n" ;
			echo "<div class=\"form-group col-md-8\">\n" ;
			echo "<button type=\"bg-warning\" class=\"btn btn-success\">Return</button>\n" ;
			echo "</div>\n" ;
			echo "</form>\n" ;

echo "</div>\n" ; 
echo "</div>\n" ;// end container -->





?>

<!-- end -->
<?PHP
include_once '../../resource/footerPage.php';
?>
