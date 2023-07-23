<?PHP
$sub_header ="CITAS";
$formAction ="00-lista_all_r.php";
$placeholder_valor ="nombre o lista o telefono";

$fechaActual = date('Y-m-d');

include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';


	//create SQL insert statement			
	$sqlQuery = 
				"SELECT * FROM citanacionalidad
				WHERE fecha >  \"$fechaActual\"
                order by fecha
				";
	
	$statement = $db->prepare($sqlQuery);
	$statement->execute();
	$data = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	$num_col = $statement->columnCount();
	//print_r($data);


///////display resultado	
    $titulo_table ="NACIONALIDAD";
   // echo" <div class=\"container bg-light\">\n";


    $table_Headers=array("FECHA","HOR","REF","NIE","NOMBRE","CORREO", "TEL" ,"nota","");

    
    //display
    //echo" <div class=\"container\">";
    echo "<h3 class=\"  text-center \">$titulo_table</h3>\n";

    echo "<table class=\"table-responsive-md table  table-striped\">\n";
        // table header
        echo "<thead class=\"thead-dark\"\n";
        echo "<tr>\n";
        foreach($table_Headers as $value_table_header)
        {
        echo "<th>$value_table_header</th>\n";
        }
        echo "</tr>\n";
        echo "</thead>\n";

        //table body
        //$columnas_numero =count($table_body);
        echo "<tbody class=\"bg-light\">	\n";
            for ($j=0; $j < $num_rows; $j++)
            {
                echo "<form  action=\"03-NACIONALIDAD_EDIT.php\" method=\"post\">n"; 
                $id = $data[$j]["id"];
                echo "<input type=\"hidden\"  name=\"id\"   value=\"$id\">\n" ;

                echo "<tr>\n";         

                echo "<td>";
                echo $data[$j]["fecha"];
                echo  "</td>\n";

                echo "<td>";
                echo $data[$j]["hora"];
                echo  "</td>\n";

                echo "<td>";
                echo $data[$j]["ref"];
                echo  "</td>\n";

                echo "<td>";
                echo $data[$j]["nie"];
                echo  "</td>\n";

                echo "<td>";
                echo $data[$j]["nombre"]." ". $data[$j]["apellido1"];
                echo  "</td>\n";

  



                // echo "<td>";
                // echo $data[$j]["departe"];
                // echo  "</td>\n";

                        
                // echo "<td>";
                // echo $data[$j]["precio"];
                // echo  "</td>\n";

                // echo "<td>";
                // echo $data[$j]["pagado"];
                // echo  "</td>\n";

                echo "<td>";
                echo $data[$j]["CORREO"];
                echo  "</td>\n";

                echo "<td>";
                echo $data[$j]["TEL"];
                echo  "</td>\n";

                echo "<td>";
                echo $data[$j]["nota"];
                echo  "</td>\n";



                echo "<td>";
                    //<!-- btn -->
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
<!-- <div class="container bg-info"> -->
    <form  class="form-row" action="02-NACIONALIDAD_r.php" method="post">
        


        <!-- fecha-->
        <!-- DIA -->
        <div class="form-group col-md-1">
            <label class=" text-light" >fecha:</label>
            <select class="form-control bg-success text-light" type="text"  name="fechaDIA" id="fechaDIA">
                <?php 
                for ($dia = 1; $dia <= 31; $dia++) {
                    echo "<option value=\"$dia\">$dia</option>\n";
                  }
                 ?>
            </select>
        </div>
        <!-- MES -->
        <div class="form-group col-md-1">
            <label class=" text-light" >MES:</label>
            <select class="form-control bg-success text-light" type="text"  name="fechaMES" id="fechaMES">
                <?php 
                    for ($mes = 1; $mes <= 12; $mes++) {
                    echo "<option value=\"$mes\">$mes</option>\n";
                    }
                 ?>
            </select>
        </div>
        <!-- año -->
        <div class="form-group col-md-2">
            <label class=" text-light" >ANO:</label>
            <select class="form-control  " type="text"  name="fechaANO" id="fechaANO">
                <!-- <option value="2022">2022</option>
                <option value="2023">2023</option> -->
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>
        <!---------->
        
        <!-- hora-->
        <!-- HORA -->
        <div class="form-group col-md-1">
            <label class=" text-light" >HORA:</label>
            <select class="form-control bg-success text-light" type="text"  name="horaHORA" id="horaHORA">
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </div>
        <!-- MINUTOS -->
        <div class="form-group col-md-1">
            <label class=" text-light" >MIN:</label>
            <select class="form-control bg-success text-light" type="text"  name="horaMINUTOS" id="horaMINUTOS">
                <option value="00">00</option>
                <option value="30">30</option>
                <option value="45">45</option>
            </select>
        </div>

        <!---------->



        <!-- ref-->
        <div class="form-group col-md-2">
        <label class=" text-light" for="course">ref :</label>
        <input  type="text" class="form-control" id="ref" name="ref"  >
        </div>

        <!-- nie-->
        <div class="form-group col-md-2">
        <label class=" text-light" for="course">nie :</label>
        <input  type="text" class="form-control" id="nie" name="nie"  >
        </div>

        <!-- nombre-->
        <div class="form-group col-md-3">
        <label class=" text-light" for="course">nombre :</label>
        <input  type="text" class="form-control" id="nombre" name="nombre"  >
        </div>

        <!-- apellido1-->
        <div class="form-group col-md-3">
        <label class=" text-light" for="course">apellido1 :</label>
        <input  type="text" class="form-control" id="apellido1" name="apellido1"  >
        </div>

        <!-- departe-->
        <div class="form-group col-md-2">
        <label class=" text-light" for="course">departe :</label>
            <select class="form-control" name="departe" id="departe">
                    <option value="MIO">MIO</option>
                    <option value="PROPIO">PROPIO</option>
            </select>   
        </div>

        <!-- precio-->
        <div class="form-group col-md-1">
        <label class=" text-light" for="course">precio :</label>
        <input  type="text" class="form-control" id="precio" name="precio"  >
        </div>

        <!-- pagado-->
        <div class="form-group col-md-1">
        <label class=" text-light" for="course">pagado :</label>
        <input  type="text" class="form-control" id="pagado" name="pagado"  >
        </div>

        <!-- CORREO-->
        <div class="form-group col-md-3">
        <label class=" text-light" for="course">CORREO :</label>
        <input  type="text" class="form-control" id="CORREO" name="CORREO"  >
        </div>

        <!-- TEL-->
        <div class="form-group col-md-2">
        <label class=" text-light" for="course">TEL :</label>
        <input  type="text" class="form-control" id="TEL" name="TEL"  >
        </div>

        <!-- nota-->
        <div class="form-group col-md-3">
        <label class=" text-light" for="course">nota :</label>
        <input  type="text" class="form-control" id="nota" name="nota"  >
        </div>
         

        <!-- btn -->
        <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
        <br>
</div>




<?PHP   include_once '../../resource/footerPage.php'; ?>
