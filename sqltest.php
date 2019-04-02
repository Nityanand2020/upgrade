<!doctype html>
<html>
<head>
<title>add subscriber</title>

<style type="text/css">

 h1{
	 background-color:green;
	 text-align:center;
 }
 #two{
	 background-color:red;
 }
	#three{
		background-color:green;
	}
	 
	 
 </style>

  </head>
  
  <body>
  <header>
  <h1 id="one">ADD NEW SUBSCRIBER</h1>
  </header>
  
  
<?php 
 require_once 'setup.php';

  if (isset($_POST['delete']) && isset($_POST['phone']))
  {
    $phone   = get_post($conn, 'phone');
    $query  = "DELETE FROM classics WHERE phone='$phone'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  if (isset($_POST['user'])   &&
      isset($_POST['phone']) )
      
  {
    $user   = get_post($conn, 'user');
    $phone   = get_post($conn, 'phone');
    
    $query    = "INSERT INTO classics VALUES" .
      "('$user', '$phone')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  <form action="sqltest.php" method="post"><pre>
    USER <input type="text" name="user">
    PHONE<input type="text" name="phone">
  
    <input id="three" type="submit" value="ADD SUBSCRIBER">
  </pre></form>
_END;
$query  = "SELECT * FROM classics";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);
$rows = $result->num_rows;
   for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
 echo <<<_END
 <table id="five">
 <tr>
 <th>USER</th>
 <th>phone</th>
 <th></th>
 </tr>
 <tr>
 <td> $row[0]</td><td>$row[1]</td>
 
  <td><form action="sqltest.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="phone" value="$row[1]">
  <input id="two" type="submit" value="DELETE SUBSCRIBER"></form></td></tr>
</table>
_END;
  }
  
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>
</body>
</html>
