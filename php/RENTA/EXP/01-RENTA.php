<?PHP
$sub_header ="RENTA";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';
echo "<link rel=\"stylesheet\" href=\"stylesRENTA.css\">\n";

//create SQL 

    $sqlQuery =" SELECT  *

    FROM contactos
    INNER JOIN renta
    ON contactos.id = renta.id

    WHERE  1 
    order by contactos.nombre1 

    ";

    $statement = $db->prepare($sqlQuery);
    $statement->execute();
    $data = $statement->fetchAll();
    $num_rows = $statement->rowCount() ;
    $num_columns = $statement->columnCount();
    //print_r($data);

// end SQL 



$titulo_table ="renta";


//display
echo" <div class=\"container\">";
//echo "<table class=\"table-responsive-md table  table-striped\">\n";
echo "<table>\n";
// table header
    //echo "<thead class=\"thead-dark\">\n";
    echo "<thead>\n";
        echo "<tr>\n";
            echo "<th>Nif</th>\n";
            echo "<th>Nombre</th>\n";
            echo "<th>PRECIO</th>\n";
            echo "<th>PAGADO</th>\n";
            echo "<th>LISTO</th>\n";
            echo "<th></th>\n";
            echo "<th></th>\n";
        echo "</tr>\n";
    echo "</thead>\n";
//

//table body
    echo "<tbody class=\"bg-light\">\n";


    for ($j=0; $j < $num_rows; $j++)
    {
    
    $idrenta = $data[$j]["idrenta"];
    $id = $data[$j]["id"];

    echo "<tr>\n";         

        echo "<td>";
        echo $data[$j]["nif"];
        echo  "</td>\n";


        echo "<td>";
        $nombreCompeto = $data[$j]["nombre1"] ." ".$data[$j]["apellido1"]; 
        echo $nombreCompeto ;
        echo  "</td>\n";

        echo "<td>";
        if($data[$j]["PRECIO"]){
            echo $data[$j]["PRECIO"];
        }
        else{
            echo "";
        }
        
        echo  "</td>\n";

        echo "<td>";
        if($data[$j]["PAGADO"]){
            echo $data[$j]["PAGADO"];
        }
        else{
            echo ""; 
        }
        
        echo  "</td>\n";



        echo "<td>";
        if($data[$j]["LISTO"]){
            echo"SI";

        }else{
            echo"NO";
        }

        echo  "</td>\n";

    
        //<!-- btn -->
            echo "<form  action=\"EDIT_RENTA.php\" method=\"post\">\n"; 
                echo "<td>";
                //hidden
                echo "<input type=\"hidden\"  name=\"id\"   value=\"$id\">\n" ;
                echo "<div class=\"form-group col-md-12\">\n";
                echo "<button type=\"submit\" class=\"btn btn-secondary\">EDIT</button>\n";
                echo "</div>\n";		
                echo  "</td>\n";
            echo "</form>\n";	
        //

        //<!-- btn -->
            echo "<form  action=\"DEL_RENTA.php\" method=\"post\">\n"; 
                echo "<td>";
                //hidden
                echo "<input type=\"hidden\"  name=\"id\"   value=\"$id\">\n" ;
                echo "<div class=\"form-group col-md-12\">\n";
                echo "<button type=\"submit\" class=\"btn btn-danger\">DELATE</button>\n";
                echo "</div>\n";		
                echo  "</td>\n";
            echo "</form>\n";	
        //



    echo "</tr>\n"; 

    
    }
    echo"  </tbody>\n ";
//

echo "</table>\n";
echo "<br>";

?>

<!-- ADD NUEVO DATO -->


<div class="container bg-dark">
<form  action="ADD-RENTA_r.php" method="post">

<!-- div1 -->
    <div class="form-row bg-dark">

    <!-- hidden -->
        <!-- <input  type="hidden" class="form-control" id="id" name="id"  > -->
    <!---->

    <!-- NOMBRE -->
        <?PHP
        //SQL		
            $sqlQuery = 
            "SELECT id , nif , nombre1 , apellido1 FROM contactos 
            WHERE 1	
            order by nombre1						
            ";

            $statement = $db->prepare($sqlQuery);
            $statement->execute(array());
            $DATA = $statement->fetchAll();
            $num_rows = $statement->rowCount() ;
            //print_r($DATA);
        //
        echo "<div class=\"form-group col-md-8\">\n" ;
        echo "<label class=\" text-light\" >nombre:</label>\n";
        echo "<select class=\"form-control \" name=\"terminobusqueda2\" id=\"terminobusqueda2\">\n";
        for ($row=0; $row < $num_rows ; $row++)
        {   
        $nombrecompleto = $DATA[$row]["nombre1"]." , ".$DATA[$row]["apellido1"] ." -- ".$DATA[$row]["nif"];
        echo" <option value=\"{$DATA[$row]["id"]}\">{$nombrecompleto}</option>\n";
        }
        echo "</select>\n";
        echo "</div>\n";
        //
        ?>
    <!---->

    <!-- PRECIO -->
        <div class="form-group col-md-1">
        <label class=" text-light" for="course">PRECIO :</label>
        <input  type="text" class="form-control" id="PRECIO" name="PRECIO"  value="0">
        </div>
    <!---->

    <!-- PAGADO -->
        <div class="form-group col-md-1">
        <label class=" text-light" for="course">PAGADO :</label>
        <input  type="text" class="form-control" id="PAGADO" name="PAGADO" value="0" >
        </div>
    <!---->

    <!-- LISTO -->
        <div class="form-group col-md-1">
        <label class=" text-light" for="course">LISTO :</label>
        <input  type="text" class="form-control" id="LISTO" name="LISTO"  >
        </div>
    <!---->

    </div>  
<!--End div1 -->

<!-- BOTON -->
    <div class="form-row bg-dark">
        <!-- btn -->
        <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>  
<!-- -->



</form>
<br>
</div>







<?PHP   include_once '../../resource/footerPage.php'; ?>
