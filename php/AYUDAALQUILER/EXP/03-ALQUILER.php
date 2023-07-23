<?PHP
$sub_header ="EXP";
$formAction ="00-lista_all_r.php";
$placeholder_valor ="nombre o lista o telefono";

include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';


	//create SQL insert statement			
	$sqlQuery = 
				"SELECT * FROM tramitesnacionalidad
				WHERE `resuelto` = 0
                order BY ano DESC , ref DESC
				";
	
	$statement = $db->prepare($sqlQuery);
	$statement->execute();
	$data = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	$num_col = $statement->columnCount();
	//print_r($data);


		
		$titulo_table ="NACIONALIDAD";
        echo" <div class=\"container bg-light\">\n";
       	//display resultado

	$table_Headers=array("nie","ref","nombre","ano");
	

	//display
		echo" <div class=\"container\">";
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
            echo "<tr>\n";         
                
                echo "<td>";
                echo $data[$j]["nie"];
                echo  "</td>\n";

                echo "<td>";
                echo $data[$j]["ref"];
                echo  "</td>\n";
                
                $NOMBRECOMPLETO = $data[$j]["apellido"]." , ". $data[$j]["nombre"];
                echo "<td>";
                echo $NOMBRECOMPLETO ;
                echo  "</td>\n";


                echo "<td>";
                echo $data[$j]["ano"];
                echo  "</td>\n";

               


            echo "</tr>\n"; 			
        }
        echo"  </tbody>\n ";

    echo "</table>\n";




        echo "<br>";

?>

<!-- ADD NUEVO DATO -->
<div class="container bg-success">
    <form  class="form-row" action="03-expNACIONALIDAD_R.php" method="post">
        
        
        <!-- nie-->
        <div class="form-group col-md-2">
        <label class=" text-light" for="course">nie :</label>
        <input  type="text" class="form-control" id="nie" name="nie"  >
        </div>


        <!-- ref-->
        <div class="form-group col-md-2">
        <label class=" text-light" for="course">ref :</label>
        <input  type="text" class="form-control" id="ref" name="ref"  >
        </div>



        <!-- nombre-->
        <div class="form-group col-md-3">
        <label class=" text-light" for="course">nombre :</label>
        <input  type="text" class="form-control" id="nombre" name="nombre"  >
        </div>

        <!-- apellido1-->
        <div class="form-group col-md-3">
        <label class=" text-light" for="course">apellido :</label>
        <input  type="text" class="form-control" id="apellido" name="apellido"  >
        </div>

 

        <!-- ano-->
        <div class="form-group col-md-2">
        <label class=" text-light" for="course">ano :</label>
        <select class="form-control bg-dark text-light " type="text"  name="ano" id="ano">
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>

         

        <!-- btn -->
        <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
        <br>
</div>




<?PHP   include_once '../../resource/footerPage.php'; ?>
