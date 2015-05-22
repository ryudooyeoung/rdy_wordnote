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

	 

	$words = explode("/", $data);
	$words_c = count($words);
	
	
	
	for($i=0 ; $i < $words_c; $i++){
		$means = explode(";", $words[$i]);
		$means_c = count($means);
		
		$basic_q = "INSERT INTO Word_Eng(`word` ,`mean1` ,`mean2` ,`flag`,`date` ) VALUES (";
		$query="";
 
		if($means[0]!=""){
			for($j=0 ; $j < $means_c; $j++){
				
				 
				$query .= "'".$means[$j]."',"; 

			} 

			//$basic_q .= $query ."0,'".date("Y-m-d",time())."')";
			$basic_q .= $query ."0,'$date')";
			mysqli_query($my_db, $basic_q); 
		}
	}
	

 
?>  
