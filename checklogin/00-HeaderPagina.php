<?php

    echo " <head>\n";
	echo"	<title>principal</title>\n";
		
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\n";
			echo "<meta name=\"viewport\" content=\"width=device-width\" />\n";
		echo "<link rel=\"shortcut icon\" href=\"../images/favicon.ico\" />\n";
		echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"../css/newcss2.css\"/>\n"; 
    echo "</head>\n"; 
    echo "<body>\n";
   echo " <div class=\"global\">\n";
   echo " <div class=\"content\">\n";
            echo " <h1  class=\"headerPage\">principal</h1>\n";
            

//////////////////////////////////////////////////////////////////
require_once("../bdconect/bd_conect_fns.php");
require_once("../bdconect/verificar_entrada_datos.php");
//////////////////////////////////////////////////////////////////


$tabla_base_datos =  "pagos_usuarios";

  
?>
