<?php
    require_once "conn.php";
    if(isset($_POST['submit'])){

        extract($_POST);

     
            $sql = "INSERT INTO estudante (nome, sexo, turno, pitruca, data) VALUES ('$nome', '$sexo', '$turno', '$pitruca', '$data')";
            if (mysqli_query($conn, $sql)) {
                header("location: index.php");
            } else {
                 echo "Algo correu mal. Tenta de novo mais tarde.";
            }
       
    }
?>