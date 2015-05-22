 
<html>
  <head>
    <title>Bootstrap 101 Template</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 부트스트랩 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

	
  </head>

  <body>
   

	<center>
	<div class="row">
	  <div class="col-md-12">
		<h1>망각곡선에 의한 단어암기장</h1>
	  </div> 
	</div>
	<div class="row">
	  <div class="col-md-12"> 
		<button type="button" class="btn btn-success" onclick="Insert_Word()">단어 추가</button> 
	  </div> 
	</div>
	 
	 <br>

	
	<div class="row">
		<div class="col-md-12">
		<?php
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

			$query = "SELECT DISTINCT date FROM Word_Eng ORDER BY DATE DESC ";

			$result = mysqli_query($my_db, $query);
			echo '<table class="table table-hover table-bordered">
					<tr class="active"><th>등록일자</th><th>단어개수</th></tr>';

			while($data = mysqli_fetch_array($result)){
				$count;

				$query_d = "SELECT COUNT(date) AS COUNT FROM Word_Eng WHERE date ='".$data['date']."'";
				$result_d = mysqli_query($my_db, $query_d);
				while($data_d = mysqli_fetch_array($result_d)){
					$count = $data_d['COUNT'];
				}

				echo '<tr>
						<td><a href="index.php?date='.$data['date'].'">'.$data['date'].'</a></td> 
						<td>'.$count.'</td>
					</tr>';
			}

			echo '</table>';
		?>
		</div> 
	</div>




	</center>


    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요한) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- 모든 합쳐진 플러그인을 포함하거나 (아래) 필요한 각각의 파일들을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script> 

	<script>
		function Insert_Word(){
			location.href="Insert_Word.php";
		}
 

	</script>
  </body>
</html>