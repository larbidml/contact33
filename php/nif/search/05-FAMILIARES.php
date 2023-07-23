<?PHP
$sub_header ="Contactos";
include_once '../../resource/headerPage.php';
include_once '../../resource/Database.php';
include_once '../../resource/utilities.php';
//collect data
	$terminobusqueda3 = $_POST['terminobusqueda3'];
	$terminobusqueda3=trim($terminobusqueda3) ;

try 
{

//sql
	$sqlQuery = 
	"SELECT * FROM contactos 
	WHERE FAMILIA = :terminobusqueda3
	ORDER BY fn2 
	";

	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':terminobusqueda3' => $terminobusqueda3 ));
	$data = $statement->fetchAll();
	$num_rows = $statement->rowCount() ;
	$num_columns = $statement->columnCount();
	//print_r($data);
//end


//check if row is not null
if ($statement->rowCount() == 0) 
{
$result = flashMessage("no hay resultados", "Fail");

}
else
{

$titulo_table ="registro";
// display resultados
echo" <div class=\"container \">\n";
echo "<h2 class=\"text-center text-light\">$num_rows $titulo_table</h2>\n";
echo "</div >\n";


for ($row=0; $row < $num_rows ; $row++)
{              
echo" <div class=\"container bg-light\">\n";
if(isset($data))
{

	//nif
		if(strlen($data[$row]["nif"]) >1 )
		{
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">NIF</div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["nif"]}</div>\n";
		echo "</div>\n"; 
		}
	//nombre
	if(strlen($data[$row]["nombre1"]) >1 )
	{
	$NOMBRECOMPLETO = $data[$row]["nombre1"]." ".$data[$row]["apellido1"]." ".$data[$row]["apellido2"];
	echo "<div class=\"row\">\n";
	echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">NOMBRE</div>\n";                    
	echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \"><b>{$NOMBRECOMPLETO}</b></div>\n";
	echo "</div>\n"; 
	}

		//niftipo
		if(strlen($data[$row]["niftipo"]) >1 )
		{
			echo "<div class=\"row\">\n";
			echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">Nif Tipo</div>\n";                    
			echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["niftipo"]}</div>\n";
			echo "</div>\n"; 
		}


	//Fvenc
		if($data[$row]["Fvenc"] >1 )
		{
		$Fvenc = $data[$row]["Fvenc"][8].$data[$row]["Fvenc"][9].
		"/".
		$data[$row]["Fvenc"][5].$data[$row]["Fvenc"][6].
		"/".
		$data[$row]["Fvenc"][0].$data[$row]["Fvenc"][1].$data[$row]["Fvenc"][2].$data[$row]["Fvenc"][3];

		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">FV</div>\n";                    
		echo "<div class=\" col-2 col-sm-2 col-md-2  col-lg-2  text-dark \">{$Fvenc}</div>\n";
		//echo obtener_envigor_fecha($data[$row][2]);
		echo "</div>\n"; 
		}



	//tel1
		if(strlen($data[$row]["tel1"]) >1 )
		{
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">TEL1</div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["tel1"]}</div>\n";
		echo "</div>\n"; 
		}
	//tel2
		if(strlen($data[$row]["tel2"]) >1 )
		{
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">TEL2</div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["tel2"]}</div>\n";
		echo "</div>\n"; 
		}

	//direccion
		if(strlen($data[$row]["CALLE"]) >1 )
		{
		$DIRECCIONCOMPLETA = $data[$row]["CALLE"]." ".$data[$row]["NOCALLE"]." ". 
		$data[$row]["PISO"]." ". $data[$row]["PUERTA"]." ".
		$data[$row]["CP"]." ". $data[$row]["CIUDAD"]." ". $data[$row]["CATASTRO"]   ;
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">DIRECCION</div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$DIRECCIONCOMPLETA}</div>\n";
		echo "</div>\n"; 
		}


	//fn2
		if(strlen($data[$row]["fn2"]) >1 )
		{
		$FechaNacimiento = $data[$row]["fn2"][8].$data[$row]["fn2"][9]."/".$data[$row]["fn2"][5].$data[$row]["fn2"][6].
		"/".$data[$row]["fn2"][0].$data[$row]["fn2"][1].$data[$row]["fn2"][2].$data[$row]["fn2"][3];

		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">F Nacimiento</div>\n";                    
		echo "<div class=\" col-6 col-sm-6 col-md-6  col-lg-6 bg-warning text-white \">{$FechaNacimiento}</div>\n";
		echo "</div>\n"; 

		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">EDAD</div>\n";                    
		$EDAD = obtener_edad_segun_fecha($data[$row]["fn2"]);
		echo "<div class=\" col-2 col-sm-2 col-md-2  col-lg-2  \">{$EDAD}</div>\n";

		echo "</div>\n"; 
		}

	//CBANCARIA
		if(strlen($data[$row]["CBANCARIA1"]) >1 )
		{
		$CBANCARIACOMPLETA = $data[$row]["CBANCARIA1"].$data[$row]["CBANCARIA2"].$data[$row]["CBANCARIA3"].
		$data[$row]["CBANCARIA4"].$data[$row]["CBANCARIA5"].$data[$row]["CBANCARIA6"] ;
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">C BANCARIA</div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$CBANCARIACOMPLETA}</div>\n";
		echo "</div>\n"; 
		}



	//TSANITARIA
		if(strlen($data[$row]["TSANITARIA"]) >1 )
		{
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-primary \"><b>T SANITARIA</b></div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10 text-primary \"><b>{$data[$row]["TSANITARIA"]}</b></div>\n";
		echo "</div>\n"; 
		}
	//TFnumerosa
		if(strlen($data[$row]["TFnumerosa"]) >1 )
		{
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">T NUMEROSA</div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["TFnumerosa"]}</div>\n";
		echo "</div>\n"; 
		}
	//correo
		if(strlen($data[$row]["correo"]) >1 )
		{
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">Email</div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["correo"]}</div>\n";
		echo "</div>\n"; 
		}
	//nota
		if(strlen($data[$row]["nota"]) >1 )
		{
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">NOTA</div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["nota"]}</div>\n";
		echo "</div>\n"; 
		}
	//FAVORITO
		if(strlen($data[$row]["FAVORITO"]) >1 )
		{
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">FAV</div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["FAVORITO"]}</div>\n";
		echo "</div>\n"; 
		}

	//PASAPORTE
		if(strlen($data[$row]["PASAPORTE"]) >1 )
		{
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">PASAPORTE</div>\n";                    
		echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["PASAPORTE"]}</div>\n";
		echo "</div>\n"; 
		}

	//FVPASPORT
		if( $data[$row]["FVPASPORT"] > 0)
		{
		$FVPASPORT = $data[$row]["FVPASPORT"][8].$data[$row]["FVPASPORT"][9]."/".$data[$row]["FVPASPORT"][5].$data[$row]["FVPASPORT"][6].
		"/".$data[$row]["FVPASPORT"][0].$data[$row]["FVPASPORT"][1].$data[$row]["FVPASPORT"][2].$data[$row]["FVPASPORT"][3];

		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">FVPASPORT</div>\n";                    
		echo "<div class=\" col-2 col-sm-2 col-md-2  col-lg-2  text-dark \">{$FVPASPORT}</div>\n";
		//echo obtener_envigor_fecha($data[$row]["FVPASPORT"]);
		echo "</div>\n"; 
		}

	//SOPORTE
		if(strlen($data[$row]["SOPORTE"]) >1 )
		{
		echo "<div class=\"row\">\n";
		echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">SOPORTE</div>\n";                    
		echo "<div class=\" col-8 col-sm-2 col-md-2  col-lg-2 bg-info text-white \">{$data[$row]["SOPORTE"]}</div>\n";
		echo "</div>\n"; 
		}

	
		//ref_renta
		if(strlen($data[$row]["ref_renta"]) >1 )
		{
			echo "<div class=\"row\">\n";
			echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-white \">ref_renta</div>\n";                    
			echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10  \">{$data[$row]["ref_renta"]}</div>\n";
			echo "</div>\n"; 
		}

		//NSSOCIAL
		if(strlen($data[$row]["NSSOCIAL"]) >1 )
		{
			echo "<div class=\"row\">\n";
			echo "<div class=\" col-4 col-sm-4 col-md-2   col-lg-2  bg-dark text-danger \">NSSOCIAL</div>\n";                    
			echo "<div class=\" col-8 col-sm-8 col-md-10  col-lg-10 text-danger \"><b>{$data[$row]["NSSOCIAL"]}</b></div>\n";
			echo "</div>\n"; 
		}
		                   //carpeta link
						   if(strlen($data[$row]["LINK"]) >1){
							echo "<div class=\"row\">\n";                    
							echo "<div class=\" col-4 col-sm-4  col-md-2    col-lg-2  bg-dark text-white \">drive</div>\n";                   
							//echo "<div class=\" col-8 col-sm-8 col-md-10   col-lg-10  \"><a href=\"../../../../contact33_DATA/NIF/{$data[$row]["LINK"]}/\">carpeta</a></div>\n";  
							
							$url = $data[$row]["LINK"];
							echo "<div class=\" col-8 col-sm-8 col-md-10   col-lg-10  \"><a href=\"$url/\"><b>drive link</b></a></div>\n";  
		
							echo "</div>\n"; 
						   }
		
						  // 
						  
		

}  


echo "</div>\n"; 

?>  

<div class="container bg-light">
<div class="row  bg-dark text-white">

<!-- boton plus +FAVORITO -->
<form method="post" action="03-addFavorit_r.php">
<div class="row">          
<?PHP 
echo "<input type=\"hidden\" class=\"form-control\" id=\"inputid\"  name=\"id\" value=\"{$data[$row][0]}\">\n";

?>
<div class="row-sm">
<button type="submit" class="btn btn-success">+fav</button>
</div>

</form>

<!-- boton FAMILIA -->
<form method="post" action="../search/05-FAMILIARES.php">							       
<?PHP 

if(strlen($data[$row]["FAMILIA"]) >1)
{
$FAMILIA =$data[$row]["FAMILIA"];
}
else
{
$FAMILIA =$data[$row]["nif"];
}

echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"terminobusqueda3\" value=\"{$FAMILIA}\" >";
?>
<div class="row-sm">
<button type="submit" class="btn btn-primary">familia</button>
</div>

</form>
<!----------------->

<!-- boton menos -FAVORITO -->
<form method="post" action="04-delFavorit_r.php">

<!-- <label class="col-4 col-sm-4  col-md-2    col-lg-2  bg-dark text-white " for="exampleFormControlSelect1">Busqueda:</label> -->
<?PHP 
$id =$data[$row]["id"];
echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"id\" value=\"$id\" >";

?>
<div class="row-sm">
<button type="submit" class="btn btn-danger">--fav</button>
</div>

</form>

<!-- boton UPDATE -->
<!-- <form method="post" action="../update/03-nif_update_form.php"> -->
<form method="post"  action="../update/03-nif_update_form.php?var1=x&amp;var2=y&amp;var3=z" TARGET="_blanc">
<?PHP 
$nif =$data[$row]["nif"];
echo "<input type=\"hidden\" class=\"form-control col-sm-1\" id=\"usr\" name=\"terminobusqueda2\" value=\"$nif\" >";
?>
<div class="row-sm">
<button type="submit" class="btn bg-secondary">update</button>
</div>



</form>							


</div>
</div>
</div>
<div class="row  bg-dark text-white">
</div>


<?PHP 
echo "<br>\n";

}
//display end
}
} 
catch (PDOException $ex) 
{
$result = "<p style='padding:20px; border: 1px solid gray; color: red;'> An error occurred: " . $ex->getMessage() . "</p>";
}


if (isset($result)) echo $result;

?>

<?PHP   include_once '../../resource/footerPage.php'; ?>