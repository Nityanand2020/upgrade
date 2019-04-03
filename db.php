<?php
$servername = "localhost";
$username = "root";
$password = '';

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE amethi";

$conn->query($sql);
    
$conn->close();

 $hn = 'localhost';
  $db = 'amethi';
  $un = 'root';
  $pw = '';
  
  $conn = new mysqli($hn,$un,$pw,$db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function createTable($name,$query)
{
	queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
}
function queryMysql($query)
{
	global $conn;
  $result=$conn->query($query);
  $p="use amethi";
  $res=$conn->query($p);
  if(!$result)
  {
	  die($conn->error);
  return $result;
  }
  if(!$res)
  {
	  die($conn->error);
  return $res;
  }

}


?>
