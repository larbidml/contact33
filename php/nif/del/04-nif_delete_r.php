<?PHP
$sub_header ="Eliminar contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';


  
     try{         
 
            
        $stmt = $db->prepare( "DELETE FROM contactos WHERE id =:id" );
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
        //$stmt->bindParam(':id', $id);
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

    <?php if (isset($result)) echo $result; ?>

    <!-- end -->
<?PHP
include_once '../../resource/footerPage.php';
?>