<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de avaliacao</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

        <style>
    *{
   font-family: 'Rubik', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   list-style: none;
  
    }
    nav{
        background: black;
        height: 80px;
        width: 100%;
    }
    label.logo{
        color: white;
        font-size: 35px;
        line-height: 80px;
        padding: 0 100px;
        font-weight: bold;
    }
    nav ul{
        float:right;
        margin-right:20px;
    }
    nav ul li{
        display: inline-block;
        line-height:80px;
        margin:0 5px;
    }
    nav ul li a{
        color:white;
        font-size:17px;
        padding: 7px 13px;
        border-radius: 3px;
        text-transform:uppercase;
        text-decoration:none;
    }
    a.active,a:hover{
        background: gray;
        transition:.5s;

    }
    .checkbtn{
        font-size:30px;
        color:white;
        float:right;
        line-height:80px;
        margin-right:40px;
        cursor:pointer;
        display:none;
    }
    #check{
        display:none;
    }
    @media (max-width: 952px){
        label.logo{
            font-size:30px;
            padding-left:50px;
        }
        nav ul li a{
            font-size:16px;
        }
    }
    @media (max-width:858px) {
        .checkbtn{
            display:block;
        }
        ul{
            position:fixed;
            width:100%;
            height:100vh;
            background:#2c3e50;
            top:80px;
            left:-100%;
            text-align:center;
            transition: all .5s;
        }
        nav ul li{
            display:block;
            margin: 50px 0;
            line-height:80px;
        }
        nav ul li a{
            font-size:20px;
        }
        a:hover,a.active{
            background:none;
            color:white;
        }
        #check:checked ~ ul{
            left:0;
        }
    }
        </style>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"><ion-icon name="menu-outline"></ion-icon></label>
        <label class="logo">Education</label>
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a class="active" href="index.php">Adicionar</a></li>
            <li><a href="participação.php">Participação</a></li>
            <li><a href="relatorio.php">relatorio</a></li>

        </ul>
    </nav>
    
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Adicionar novo aluno</h1>
        <div class="container">
            <form action="adddata.php" method="post">
               <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="">Sexo</label>
                        <select name="sexo" id="sexo" class="form-control">
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group  col-lg-3">
                        <label for="">Turno</label>
                        <select name="turno" id="turno" class="form-control" required>
                            <option value="manha">Manhã</option>
                            <option value="tarde">Tarde</option>
                           
                        </select>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Pitruca</label>
                        <select name="pitruca"  class="form-control" required>
                            <option value="nova_vida">Nova Vida</option>
                            <option value="camama">Camama</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="">Criado</label>
                        <input type="date" name="data" class="form-control" required>
                    </div>
                    
                    <br>
                    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                    </div>
               </div>
            </form>
        </div>
    </section>
    <h1 style="text-align: center;margin: 50px 0;">Estudantes a frequentar o estagio</h1>
    <section style="margin: 50px 0;">
        <div class="container">
            <table class="table table-dark">
                <thead> <!--class="trow"-->
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Turno</th>
                    <th scope="col">Pitruca</th>
                    <th scope="col">Adicionado</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                    

                  </tr>
                </thead>
                <tbody>
                    <?php 
                      
                      define('DB_SERVER', 'localhost');
                      define('DB_USERNAME', 'root');
                      define('DB_PASSWORD', '');
                      define('DB_NAME', 'sap_db'); $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                       $sql = "SELECT * FROM estudante";
                       $result = $connection->query($sql);

                       
                       while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr  >
                        <td>$row[id]</td>
                        <td>$row[nome]</td>
                        <td>$row[sexo]</td>
                        <td>$row[turno]</td>
                        <td>$row[pitruca]</td>
                        <td>$row[data]</td>
                                    
                        <td> <a class='btn btn-primary' href='updatedata.php?id=$row[id]' >Edit</a></td>
                        <td> <a class='btn btn-danger' href='deletedata.php?id=$row[id]' >Delete</a></td>
                    </tr>
                        ";
                       }
                    ?>
                    
                   

                </tbody>
              </table>
        </div>
    </section>
</body>

</html><!DOCTYPE html>
<html lang="en">
