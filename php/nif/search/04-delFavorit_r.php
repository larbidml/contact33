<?PHP
$sub_header ="Modificar  contacto";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';

     try{
    
        //collect form data and store in variables
        //collect form data and store in variables
                $id = $_POST['id'];
                $id=trim($id) ;

                $favorito= 0 ;
                
    




    
        //SQL statement to update categoriaword
        $sqlUpdate = "UPDATE contactos SET
                                            favorito=:favorito
                        WHERE id=:id";

        //use PDO prepared to sanitize SQL statement
        $statement = $db->prepare($sqlUpdate);

        //execute the statement
        //hay que incluir tambien :id => $id
       $statement->execute(array(
                                ':id' => $id, 
                                ':favorito' => $favorito
                            ));


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
