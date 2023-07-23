<?PHP
$sub_header ="Eliminar RENTA";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';
$idrenta = $_POST['idrenta'];
  
        try
          {         
 
            
            $stmt = $db->prepare( "DELETE FROM renta WHERE idrenta =:idrenta" );
            $stmt->bindParam(':idrenta', $_POST['idrenta'], PDO::PARAM_INT);   
            //$stmt->bindParam(':idnif', $idnif);
            $stmt->execute();
            if( ! $stmt->rowCount() )
            {
                
                $result= flashMessage("Error en la eliminacion ","Fail");
            
            }
            else
            {
                $result= flashMessage("Modificación exitosa","Pass");
            }
    
     
        }
        catch (PDOException $ex)
        {
            $result= flashMessage("$ex->getMessage()", "Fail");
        }

        	
    ?>

    <?php
     if (isset($result)) flashMessage2($result); 

     
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
<?PHP
include_once '../../resource/footerPage.php';
?>