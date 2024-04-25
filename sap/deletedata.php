<?php
  include 'conn.php';
  $id = $_GET['id'];
  $sql = "delete from estudante where id=$id";
  $conn->query($sql);
  $conn->close();
  header("location: index.php");
?>