<?php
    session_start();
    include "../config/conexion.php";

    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "select * from usuario where (email = \"$email\")";
    $users = mysqli_query($conn,$query);
    $count = mysqli_num_rows($users);

    if($count > 0){
        $errors [] = "El correo ya existe en la base de datos";
    }else{
        $sql = "insert into usuario (nombres, apellidos, email, password)";
        $sql .= "value (\"$nombres\", \"$apellidos\", \"$email\", \"$password\")";

        $query_new_insert = mysqli_query($conn,$sql);
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
						foreach ($errors as $error){
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
							foreach ($messages as $message){
								echo $message;
							}
							?>
				</div>
				<?php
			}

?>