<? 

include 'Snoopy/Snoopy.class.php';
 

if($output=="mean1"){

	$snoopy=new snoopy;
	$snoopy->fetch("http://dic.daum.net/search.do?q=".$Word."&dic=eng&search_first=Y");
	$txt=$snoopy->results;
	$rex="/\<div class=\"txt_means_KUEK\"\>(.*)\<\/div\>/";  

	preg_match_all($rex,$txt,$o); 

	if(strlen(substr(substr($o[0][0],0,-5),28,-1)) > 100){ 
	}
	else{
		print_r(substr(substr($o[0][0],0,-5),28,-1));
	}

}
else if($output=="mean2"){
	$snoopy=new snoopy;
	$snoopy->fetch("http://endic.naver.com/search.nhn?sLn=kr&searchOption=all&query=".$Word);
	$txt=$snoopy->results;
	$rex="/\<span class=\"fnt_k05\"\>(.*)\<\/span\>/";  

	preg_match_all($rex,$txt,$o);
 
	if(strlen(substr(substr($o[0][0],0,-6),22,-1)) > 100){ 
	}
	else{
		print_r(substr(substr($o[0][0],0,-6),22,-1));
	}

}

else if($output=="mean3"){
	$snoopy=new snoopy;
	$snoopy->fetch("http://alldic.daum.net/search.do?q=".$Word);
	$txt=$snoopy->results;
	//$rex="/\<span class=\"inner_voice\"\>(.*)\<\/span\>/";  

	$rex="/href=([\'\"])http\:\/\/[^\'\"]*([\'\"])/i";  
  
	preg_match_all($rex,$txt,$o);
	print_r( $o[0][18] );
 
 

}


?>  
 