<?php

	function conect_base_de_datos()
	{		
		$con=mysqli_connect("localhost","root","","contact");
		// Check connection										
		if (mysqli_connect_errno())									  
		{															  
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}  																		
		return $con;
	}


	function conect_base_de_datos_shema()
	{			
		$con=mysqli_connect("localhost","root","","information_schema");
		// Check connection												
		if (mysqli_connect_errno())									   
		{															  
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}  																			
		
		return $con;
	}

?>
