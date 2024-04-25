<!DOCTYPE html>
<html lang="en">
<?php
    require_once "conn.php";
    if(isset($_POST["nome"]) && isset($_POST["sexo"]) && isset($_POST["turno"]) && isset($_POST["pitruca"])&& isset($_POST["data"])){
        extract($_POST);
        $sql = "UPDATE `estudante` SET `nome`='$nome',`sexo`='$sexo',`turno`='$turno',`pitruca`='$pitruca',`data`='$data'  WHERE id= ".$_GET["id"];
        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Update Data</h1>
        <div class="container">
            <?php 
                require_once "conn.php";
                $sql_query = "SELECT * FROM estudante WHERE id = ".$_GET["id"];
                if ($result = $conn ->query($sql_query)) {
                    while ($row = $result -> fetch_assoc()) { 
                        $id = $row['id'];
                        $nome = $row['nome'];
                        $sexo = $row['sexo'];
                        $turno = $row['turno'];
                        $pitruca = $row['pitruca'];
                        $data = $row['data'];

               ?>
<form action="updatedata.php?id=<?php echo $Id; ?>" method="post">
<div class="row">
    <div class="form-group col-lg-4">
        <label for="">Nome do estudante</label>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo $nome ?>" required>
    </div>
    <div class="form-group col-lg-3">
    <label for="">Sexo</label>
    <select name="sexo" class="form-control" required>
            <option value="Escolhe um genero"></option>
            <option value="masculino" <?php if($sexo == "masculino"){ echo "Selected"; } ?>>Masculino</option>
            <option value="femenino" <?php if($sexo == "femenino"){ echo "Selected"; } ?>>Femenino</option>
        </select>
    </div>

    <div class="form-group col-lg-3">
    <label for="">Turno</label>
    <select name="sexo" class="form-control"  required>
        <option value="manha" <?php if($turno == "manha"){ echo "Selected"; } ?>>Manhã</option>
        <option value="tarde" <?php if($turno == "tarde"){ echo "Selected"; } ?>>Tarde</option>
    </select>
    </div>

    <div class="form-group col-lg-3">
    <label for="">Pitruca</label>
    <select name="sexo" class="form-control"  required>
        <option value="Nova Vida" <?php if($pitruca == "nova_vida"){ echo "Selected"; } ?>>Nova Vida</option>
        <option value="Camama" <?php if($pitruca == "camama"){ echo "Selected"; } ?>>Camama</option>
        </select>
    </div>

    <div class="form-group col-lg-4">
        <label for="">Criado</label>
    <input type="date" name="data" id="name" class="form-control"  value="<?php echo $data ?>" required>
    </div>

    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
    </div>
</div>
</form>
            <?php 
                    }
                }
            ?>
        </div>
    </section>
</body>

</html>
