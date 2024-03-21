<?php
include("conection.php");


if (isset($_POST["register"])) {
   
    if (strlen($_POST["name"]) > 0 &&
        strlen($_POST["last_name"]) > 0 &&  
        strlen($_POST["email"]) > 0  && 
        strlen($_POST["city"]) > 0)  {
        
     
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        
        $consulta = "INSERT INTO users (nam_e, last_name, email, city) VALUES ('$name', '$last_name', '$email', '$city')";
        $resultado = mysqli_query($conex, $consulta); 
        
  
        if ($resultado) {
            ?>
            <h3 class="ok">Registro completado</h3>
            <?php
            $tabla_query = "SELECT * FROM users";
            $tabla_resultado = mysqli_query($conex, $tabla_query);
            ?>
            <h3>Registros existentes:</h3>
            <ul>
                <?php while ($fila = mysqli_fetch_assoc($tabla_resultado)): ?>
                    <li><?php echo $fila['nam_e']; ?> - <?php echo $fila['last_name']; ?> - <?php echo $fila['email']; ?> - <?php echo $fila['city']; ?></li>
                <?php endwhile; ?>
            </ul>
            <?php
        } else {
        } 
    } else {
        ?>
        <h3 class="bad">Complete los campos</h3>
        <?php
    }
}




