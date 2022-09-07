<?php
    session_start();
    include "../config/conexion.php";

	// usar real_escape_string para mayor seguridad en la db
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $password = $_POST["password"];
	$username = strstr($email, '@', true);
    $query = "select * from usuarios where (email = \"$email\")";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);

    if($row > 0){
        $errors [] = "El correo ya existe en la base de datos";
    }else{
        $query = "INSERT INTO `usuarios`(`nombres`, `apellidos`, `email`, `password`, `username`)
        VALUES ('$nombres','$apellidos', '$email', '$password','$username')";
        $query_new_insert = mysqli_query($conn,$query);

		if ($query_new_insert){
			$messages[] = "Registro exitoso.";
		} else{
			$errors []= "Algo ha salido mal, intenta nuevamente.".mysqli_error($conn);
		}
	}
	if (isset($errors)){
			
		?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> 
				<?php
					foreach ($errors as $error) {
							echo $error;
						}
					?>
		</div>
		<?php
		}
		if (isset($messages)){
			
			?>
			<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>¡Bien hecho!</strong>
					<?php
						foreach ($messages as $message) {
								echo $message;
							}
						?>
			</div>
			<?php
		}


?>