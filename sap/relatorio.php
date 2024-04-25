<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
 
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
				background:gray;
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
			table{
				width:100%;
			}
			table,th,td{
				margin auto;
				font-size: 25px;
				padding:20px;
				text-align:center;
				border:1px solid #000;
				border-collapse: collapse;
			}
			input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			}
	
			.btnsubmit {
			background-color: #3e9cfa;
			border-radius: 8px;
			border-style: none;
			color: #FFFFFF;
			cursor: pointer;
			font-size: 14px;
			padding: 10px 16px;
			
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
            <li><a  href="inicio.php">Inicio</a></li>
            <li><a href="index.php">Adicionar</a></li>
            <li><a href="participação.php">Participação</a></li>
            <li><a class="active" href="relatorio.php">relatorio</a></li>
		
        </ul>
    </nav>
<table >
      
      <tr>
        <td><div >
        <form action="" method="post">
          <table >
          	<tr><td colspan="3" ><h3>Pesquisa os estudantes aqui!</h3></td></tr>
            <tr>
              <td bgcolor="#cdd1d5"><strong><span class="style2">Pesquise pelo id</span></strong></div></td>
              <td><span class="style6">
                <input type="text" name="eno" />
              </span></td>
              <td ><input type="submit" value="Ver informação" name="btnsubmit" class="btnsubmit"/></td>
            </tr>
          </table>
          </form>
        </div></td>
      </tr>
		<?php
		if(isset($_POST["btnsubmit"]))
		{
			include "conn.php";
			extract($_POST);

			
			$query = "SELECT * FROM `estudante` where id = ".$eno." limit 1";
			$result = mysqli_query($conn,$query);
			while($rec = mysqli_fetch_array($result))
			{
				echo '<tr><td colspan="2"><table >
				<tr>
				  <td><strong>Id</strong></td>
				  <td><strong>Nome</strong></td>
				  ';
				  $query1 = "select * from presenca where `id` = ".$rec["id"]." order by data";
					$result1 = mysqli_query($conn,$query1);
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td b>'.$rec1["data"].'</td>';
					}
				echo '</tr>
				<tr>
				  <td >'.$rec["id"].'</td>
				  <td >'.$rec["nome"].'</td>
				  ';
				  $query1 = "select *from presenca where id = ".$rec["id"]." order by data";
					$result1 = mysqli_query($conn,$query1);
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td>';
						if($rec1["presente"]==0)
							echo "Ausente";
						else
							echo "Presente";
						echo '</td>';
					}
				
				echo '
				</tr>
								
			  </table></td></tr>';
			}
		}
		else
		{
			include "conn.php";
			extract($_POST);
			$query = "select * from `estudante` ";
			$result = mysqli_query($conn,$query);
			while($rec = mysqli_fetch_array($result))
			{
				echo '<tr><td colspan="2"><table>
				<tr>
				  <td><strong>Id</strong></td>
				  <td><strong>Nome</strong></td>';
				  $query1 = "select * from presenca where id = ".$rec["id"]." order by data";
					$result1 = mysqli_query($conn,$query1);
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td >'.$rec1["data"].'</td>';
					}
				echo '</tr>
				<tr>
				  <td ><span class="style6">'.$rec["id"].'</span></td>
				  <td ><span class="style6">'.$rec["nome"].'</span></td>';
				  $query1 = "select * from presenca where id = ".$rec["id"]." order by data";
					$result1 = mysqli_query($conn,$query1);
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td>';
						if($rec1["presente"]==0)
							echo "Ausente "; 
						
						else
							echo "Presente  ";
						echo '</td>';
					}
				
				echo '
				</tr>
								
			  </table></td></tr>';
			}
		}
		?>    
	</table>
<script>
	document.getElementById("result").innerHTML=localStorage.getItem("textvalue");
</script>
</body>
</html>