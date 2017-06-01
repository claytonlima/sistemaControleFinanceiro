<?php
 session_start();
 
 function mostraAlerta($tipo){
    if(isset($_SESSION["$tipo"])){
 ?>       
        <center><p class="text alert-<?php echo $tipo ?>"><?php echo $_SESSION["$tipo"]; ?></p></center>
<?php
    }
    unset($_SESSION["$tipo"]);
 }
?>