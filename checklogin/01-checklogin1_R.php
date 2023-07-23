
<?php
/////////////////////////////////////
require_once("00-HeaderPagina.php");
////////////////////////////////////

$username = $_POST['username'];
$password = $_POST['password'];

//******************************
//     conect base de datos   **
//******************************
$con = conect_base_de_datos();		
//******************************



//****  hacer busqueda      
$consulta =
"
SELECT * 
FROM `$tabla_base_datos` 
WHERE `NOMBRE` = '$username' 
";
 						
$result=mysqli_query($con,$consulta);	
$num_resultados = mysqli_num_rows($result);	

$row=mysqli_fetch_assoc($result);

//echo $row["NOMBRE"].'<br />';
//echo 'hash-whirlpool----->'.hash('whirlpool', 'x3835218z').'<br />';

if (hash('whirlpool', $password) == $row["PASS"]) 
	{ 
		echo "<div class=\"detalles1\">\n";
	
		echo "<div class=\"detalles3\">\n";
			echo "<ul><li> <a href=\"../00-default/Nif.php\">NIF</a></li></ul>\n";    
		echo "</div>";
		
			
		echo "<div class=\"detalles3\">\n";   
			echo "<ul><li> <a href=\"../00-default/empresas.php\">EMPRESAS</a></li></ul>\n";
				echo "</div>";
	echo "<div class=\"detalles3\">\n";   
			echo "<ul><li> <a href=\"../shemaBaseDatos/01-shema.php\">Esquima Base Datos</a></li></ul>\n";
		echo "</div>";

		echo "<ul></ul>\n";
		echo "<ul></ul>\n";
	 
	 } 
else 
	{ 

		 echo "<form>\n";
					echo "<h4>Username o Password estan incorrectos</h4>\n ";
					echo "<h4> Por favor vuelve e intentarlo  de nuevo</h4>\n";
		  echo "</form>\n";
		  echo "</div>\n";
		  echo "</div>\n";
		  echo "</body>\n";
		  echo "</html>\n";
	      exit;
		 echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 
	}

?>


    </div>
	</div>
   
    </body>
</html>
