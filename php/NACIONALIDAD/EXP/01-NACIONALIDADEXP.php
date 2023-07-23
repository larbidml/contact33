<?PHP
$sub_header ="NACIONALIDAD EXPEDIENTES";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';


//create SQL 

    $sqlQuery =" SELECT  *

    FROM contactos
    INNER JOIN nacionalidadexp
    ON contactos.id = nacionalidadexp.id

    WHERE activo = 1 
    order by ano , ref

    ";

    $statement = $db->prepare($sqlQuery);
    $statement->execute();
    $data = $statement->fetchAll();
    $num_rows = $statement->rowCount() ;
    $num_columns = $statement->columnCount();
    //print_r($data);

// end SQL 



$titulo_table ="NACIONALIDAD";


//display
echo" <div class=\"container\">";
echo "<table class=\"table-responsive-md table  table-striped\">\n";
// table header
echo "<thead class=\"thead-dark\"\n";
    echo "<tr>\n";
        echo "<th>Nif</th>\n";
        echo "<th>Ref</th>\n";
        echo "<th>Nombre</th>\n";
        echo "<th>Año</th>\n";
        echo "<th>dd</th>\n";
        echo "<th>mm</th>\n";
        echo "<th>aaaa</th>\n";
        echo "<th>ESTADO</th>\n";
        echo "<th></th>\n";
    echo "</tr>\n";
echo "</thead>\n";

//table body

echo "<tbody class=\"bg-light\">\n";
for ($j=0; $j < $num_rows; $j++)
{
echo "<form  action=\"EDIT_NACIONALIDADEXP.php\" method=\"post\">\n"; 
$idnacionalidad = $data[$j]["idnacionalidad"];


echo "<tr>\n";         

    echo "<td>";
    echo $data[$j]["nif"];
    echo  "</td>\n";

    echo "<td>";
    echo $data[$j]["ref"];
    echo  "</td>\n";

    echo "<td>";
    $nombreCompeto = $data[$j]["nombre1"] ." ".$data[$j]["apellido1"]; 
    echo $nombreCompeto ;
    echo  "</td>\n";

    echo "<td>";
    echo $data[$j]["ano"];
    echo  "</td>\n";

    echo "<td>";
    $fn_d =  $data[$j]["fn2"][8]. $data[$j]["fn2"][9];
    echo $fn_d ;
    echo  "</td>\n";


    echo "<td>";
    $fn_m =  $data[$j]["fn2"][5]. $data[$j]["fn2"][6];
    echo $fn_m;
    echo  "</td>\n";


    echo "<td>";
    $fn_a =  $data[$j]["fn2"][0]. $data[$j]["fn2"][1].$data[$j]["fn2"][2]. $data[$j]["fn2"][3];
    echo $fn_a ;
    echo  "</td>\n";

    echo "<td>";
    echo $data[$j]["ESTADO"];
    echo  "</td>\n";

    echo "<td>";
    //<!-- btn -->
        //hidden
        echo "<input type=\"hidden\"  name=\"idnacionalidad\"   value=\"$idnacionalidad\">\n" ;
        echo "<div class=\"form-group col-md-12\">\n";
        echo "<button type=\"submit\" class=\"btn btn-primary\">EDIT</button>\n";
        echo "</div>\n";		
    echo  "</td>\n";

echo "</tr>\n"; 

echo "</form>\n";	
}
echo"  </tbody>\n ";
echo "</table>\n";
//////////////////////////////////

echo "<br>";

?>

<!-- ADD NUEVO DATO -->
<div class="container bg-info">
<form  class="form-row" action="ADD-NACIONALIDAD_r.php" method="post">

<!-- ref-->
<div class="form-group col-md-2">
<label class=" text-light" for="course">ref :</label>
<input  type="text" class="form-control" id="ref" name="ref"  >
</div>

<!-- año -->
<div class="form-group col-md-2">
<label class=" text-light" >ANO:</label>
<select class="form-control  " type="text"  name="ano" id="ano">
<?PHP
for ($ano=2015; $ano <= 2030 ; $ano++)
{ echo "<option value=\"$ano\">$ano</option>\n";}
?>
</select>
</div>
<!---------->


<?PHP

//create SQL insert statement			
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
// end 
echo "<div class=\"form-group col-md-f\">\n";
echo "<label class=\" text-light\" >nombre:</label>\n";
echo "<select class=\"form-control col-sm-8\" name=\"terminobusqueda2\" id=\"terminobusqueda2\">\n";
for ($row=0; $row < $num_rows ; $row++)
{   
$nombrecompleto = $DATA[$row]["nombre1"]." , ".$DATA[$row]["apellido1"] ." -- ".$DATA[$row]["nif"];
echo" <option value=\"{$DATA[$row]["id"]}\">{$nombrecompleto}</option>\n";
}
echo "</select>\n";
echo "</div>\n";

?>



<!-- btn -->
<div class="form-group col-md-12">
<button type="submit" class="btn btn-primary">Add</button>
</div>
</form>
<br>
</div>




<?PHP   include_once '../../resource/footerPage.php'; ?>
