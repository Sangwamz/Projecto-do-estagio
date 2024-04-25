
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
		<script>
	function passvalues()
	{
		var sumario=document.getElementById("txt").value;
		localStorage.setItem("textvalue", sumario);
		return false;
	}
 </script>
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
				background: #3b444d;
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
            <li><a class="active" href="participação.php">Participação</a></li>
            <li><a href="relatorio.php">relatorio</a></li>
        </ul>
    </nav>
    



<script type="text/javascript">
	function getatt(value)
	{
		if(value == true)
		{
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) - 1;
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) + 1;
		}
		else
		{
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) + 1;
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) - 1;
		}
	}
</script>


<table >
      
        <td>
        <form action="enviado.php" method="post">
        <table >
            	<tr>
                	<td> Seleciona a data : <br />
                   <?php 
				 		    $dt = getdate();
							$day = $dt["mday"];
							$month = date("m");
							$year = $dt["year"];
							
							echo "<select name='cdate'>";
							for($a=1;$a<=31;$a++)
							{
								if($day == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select><select name='cmonth'>";
							for($a=1;$a<=12;$a++)
							{
								if($month == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select><select name='cyear'>";
							for($a=2010;$a<=$year;$a++)
							{
								if($year == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select>";
						?>                    
                    </td>
                </tr>
             </table>	
        
          <table>
            <tr>
              <td colspan="3"><div align="center"><strong>Lista de presença da aula <input type="text" id="txt" name="sum"></span></strong></div></td>
            </tr>
            <tr >
              <td><strong >Id</strong></td>
              <td><strong >Nome</strong></td>
              <td><strong >Presente</strong></td>
            </tr>
            <?php
				include "conn.php";
				extract($_POST);
				$query = "select * from estudante order by id";
				$s = 0;
				$result = mysqli_query($conn,$query);
				while($rec = mysqli_fetch_array($result))
				{
					$s = $s + 1;
					echo ' <tr>
							  <td >'.$rec["id"].'</td>
							  <td >'.$rec["nome"].'</td>
							  <td ><input type=checkbox name='.$rec["id"].' onclick="getatt(this.checked);"/></td>
							</tr>';
				}
			?>			
            <tr>
              <td colspan="3"><div align="center">
                <input type="submit" value="Enviar" name="btnsubmit" class="btnsubmit" onclick="passvalues();"/>
                &nbsp;&nbsp;</div></td>
            </tr>
          </table>
          </form>
         
         	<table c>
            	<tr>
                	<td> Total Ausente : <input type="text" id="txtAbsent" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                </tr>
                <tr>
                	<td> Total Presente : <input type="text" id="txtPresent" value="0" size="10"  disabled="disabled"/></td>
                </tr>
                <tr>
                	<td> Estudante Total : <input type="text" id="txtStrength" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                </tr>
             </table>
         
         </td>
      </tr>
    </table>

</body>
</html>