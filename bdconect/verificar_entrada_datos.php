
<?php


function verificar_entrada_datos($v1,$v2,$v3){
    trim ($v1);
    if (!$v2 || !$v1)
    {
        $titulo1=$v3;
		
		//echo "<h1 class=\"header2\">$v3</h1>\n";
        echo "<form>\n";
		        echo "<h4>No has introducido los detalles de la busqueda</h4>\n ";
         		echo "<h4> Por favor vuelve e intentarlo  de nuevo</h4>\n";
      echo "</form>\n";
	  echo "</div>\n";
	  echo "</div>\n";
	  echo "</body>\n";
	  echo "</html>\n";
  exit;
    }


}
      
