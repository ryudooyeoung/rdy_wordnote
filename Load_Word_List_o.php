<? 
include 'Snoopy/Snoopy.class.php';

 
function Load_Word($day, $date){
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


	

	$time  = time(); 
	$query = "SELECT * FROM Word_Eng";

	if($day=='999'){
		$query = "SELECT * FROM Word_Eng WHERE flag = '0' ORDER BY date ASC"; 

	}
	//오늘기준
	else if($day=='t'){
		if($date!=""){ 
			$query = "SELECT * FROM Word_Eng WHERE date = '{$date}'"; 
			
		}
		else{
			$today = date("Y-m-d",strtotime("now", $time));
			$query = "SELECT * FROM Word_Eng WHERE date = '{$today}'"; 
			
		}

	}
	//이전
	else{ 
		if($date!=""){ 
			$result_day = date('Y-m-d',strtotime( $date.$day." days")); 
			$query = "SELECT * FROM Word_Eng WHERE date = '{$result_day}'"; 
		}
		else{ 
			$result_day = date('Y-m-d',strtotime($day." day", $time)); 
			$query = "SELECT * FROM Word_Eng WHERE date = '{$result_day}'"; 
		}
 
	}
 

	$result = mysqli_query($my_db, $query);
	$data2 = mysqli_fetch_array($result);
	echo '<h3>'.$data2['date'].'</h3>
			<table class="table table-bordered table-hover table-condensed"> 
			<tr class="active"><th width="15%" onclick="hide(\'w\')">Word</th><th width="75%" onclick="hide(\'m\')">Mean</th> <th width="10%"></th></tr>';
	while($data = mysqli_fetch_array($result)){
			
		echo '<tr>
				<td id="word" onclick="hide(\'w\')">'.$data['word'].'</td>
				<td id="mean" onclick="hide(\'m\')">'.$data['mean1'].'<br>'.$data['mean2'].'</td>  
				<td ><input type="checkbox" onclick="Check_Changed(\''.$data['word'].'\',\''.$data['date'].'\',';
					if($data['flag']!=0){
						echo '\'0\')" checked';
					}
					else {
						echo '\'1\')"';
					}
				echo'></td>
			</tr>';
			
	}

	echo '</table>';
}


////////////////////////////////////


if($output=="Today"){
	Load_Word('t',$date);
}
else if($output=="Yesterday"){
	Load_Word('-1',$date);
}
else if($output=="Threeday_ago"){
	Load_Word('-3',$date);
}
else if($output=="Aweek_ago"){
	Load_Word('-7',$date);
}
else if($output=="Twoweek_ago"){
	Load_Word('-14',$date);
}
else if($output=="Amonth_ago"){
	Load_Word('-30',$date);
}
else if($output=="Forgot_list"){
	Load_Word('999',$date);
}	

 
?>  
