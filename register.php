<?php include ("header.php");?>
<?php
session_start();
?>
    <div class="container mlogin">
    <div id="login">
    <h1>Logueo</h1>
   <form name="loginform" id="loginform" action="loginCN.php" method="post">
   <p>
        <label for="user_login">Nombre De Usuario</br>
        <input type="text" name="usuario" id="usuario" class="input" value="" size="20"/></label>
   </p>
   <p>
        <label for="user_pass">Contraseña</br>
        <input type="text" name="usuario" id="usuario" class="input" value="" size="20" /></label>
   </p>
   <p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Entrar"/>
   </p>
        <p class="regtext">No estas registrado? <a href="register.php">Registrate Aqui</a></p>
</form>
    </div>
    
    </div>
    
    <?php include ("includes/footer.php");?>
    
    <?php
    if(!empty($_SESSION['mensaje'])) {echo "<p class=\"error\">". "MENSAJE:".$_SESSION['mensaje']."</p>";}
    ?>
               
         
           
   
