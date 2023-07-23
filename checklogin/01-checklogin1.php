<?php

///////////////////////////////////////////////////////////
require_once("00-HeaderPagina.php");
$actionPost = "01-checklogin1_R.php";
///////////////////////////////////////////////////////////

echo "<h1 class=\"headerPage2\">MOVIMIENTOS LA CAIXA</h1><form action=$actionPost method=\"post\">";

?>
		<div style="font-size:1.5em;padding:0.2em;margin:0.2em;width: 97%;">
			<form action="01-checklogin1_R.php" method="post" >

			<label>Nombre Usuario:</label><br>
			<input style="width: 98%;font-size:1.5em;" name="username" type="text" id="username">
			<br><br>

			<label>Password:</label><br>
			<input style="width: 98%;font-size:1.5em;" name="password" type="password" id="password">
			<br><br>

			<input style="width:50% ;font-size:1.1em;" type="submit" name="Submit" value="LOGIN">

			</form>
			<hr />
		</div>
	</div>
</div>

<footer>

</footer>

 </body>
</html>



