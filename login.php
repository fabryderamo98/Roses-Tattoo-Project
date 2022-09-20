<?php include ("header.php")?>
<?php
session_start();
?>
	<div class="container mlogin">
	<div id"login">
	<h1>Logueo</h1>
<form name="loginform" id="loginform" action="loginCN.php" method="post">
	<p>
		<label for="user_login">Nombre de usuario<br/>
		<input type="text" name="username" class="input" value="" size="20"/></label>
	</p>
	<p>
		<label for="user_pass">Contraseña<br/>
		<input type="password" name="password" id="password" class="input" value="" size="20"/></label>
	</p>
	<p class="submit">
	<input type="submit" name="login" class="button" value="entrar"/>
	</p>
	
</form>

	</div>
	
	</div>
	
	<?php // include("footer.php");?>
	
	<?php
	
	if(isset ($_GET['msg'])){
		if($_GET['msg']!="") {echo "<p class=\"error\">"."MENSAJE:".$_GET['msg']."</p>";}
	}
	?>
		