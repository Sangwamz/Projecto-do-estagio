<?php
session_start();
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$passe'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['nome'];
        $_SESSION['cargo'] = $row['cargo'];

        if ($row['cargo'] == 'admin') {
            header("Location: inicio.php");
        } else {
            header("Location: user.php");
        }
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User And Admin Login </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php if (isset($error)) { echo "<p>$error</p>"; } ?>

    <div class="header">
    <h2>Login</h2>
    </div>
    <form method="post" action="">
    <div class="input-group">
	<label>Email:</label>
	<input type="email" name="email" value="" required>
     </div>
     <div class="input-group">
     <label>Palavra-passe:</label>
     <input type="password" name="passe" required><br>
     </div>
     <div class="input-group">
	<button type="submit" class="btn" >login</button>
	</div>
        <p>Não tem conta? <a href="registro.php">Registra-te!</a></p>


    </form>
</body>
</html>