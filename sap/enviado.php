
<?php
	if(isset($_POST["btnsubmit"]))
	{
		include "conn.php";
		
		$data = $_POST["cyear"]."-".$_POST["cmonth"]."-".$_POST["cdate"];
               		
		$query = "select *from estudante ";
		$result = mysqli_query($conn,$query)or die("select error");
		while($rec = mysqli_fetch_array($result))
		{
			$mno = $rec["id"];
			if(isset($_POST[$mno]))
			{
				$query1 = "INSERT INTO  presenca(`id` ,  `sumario`, `data` ,  `presente`) VALUES('$mno','$sum','$data','1')";
			}
			else
			{
				$query1 = "INSERT INTO  presenca(`id` ,  `sumario`, `data` , `presente`) VALUES('$mno','$sum','$data','0')";
			}
			mysqli_query($conn,$query1)or die("error".$mno);
			print "<script>";
			print "alert('presença marcada com sucesso....');";
			print "self.location='index.php';";
			print "</script>";
		}
		
		
			
		
	}
	