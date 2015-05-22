<? 
 
 
	$host = "localhost";
	$user = "ruydoo0711";
	$pw = "fbendud89";
	$db = "ruydoo0711";

	$my_db = new mysqli($host,$user,$pw,$db);
	mysqli_query($my_db,"set names utf8");

	if ( mysqli_connect_errno() ) {
		echo mysqli_connect_error();
		exit;
	}

 
	$query = "UPDATE Word_Eng SET flag = {$flag} WHERE word LIKE '{$Word}' AND date ='{$date}'";
  
	mysqli_query($my_db, $query);
 
 
?>  
