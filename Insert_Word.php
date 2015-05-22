
<html>
  <head>
    <title>Bootstrap 101 Template</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 부트스트랩 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

	<script>
		function Add_Word(id){ 

		idx = id+1;
		$('#Word_'+id+'_Set').after(
		'<div class="row" id="Word_'+idx+'_Set">'+
			'<div class="col-xs-6"><input type="text" class="form-control" id="'+idx+'_word" onchange="Find_Info('+idx+')" placeholder="단어를 입력하세요"></div>'+
			'<div class="col-xs-3"><input type="text" class="form-control" id="'+idx+'_mean1" placeholder="다음"></div>'+
			'<div class="col-xs-3"><input type="text" class="form-control" id="'+idx+'_mean2" placeholder="네이버"></div>'+
		'</div>');

		$('#Btn_Add').attr('onclick', 'Add_Word('+idx+')');

		} 


		function Save_Word(){
			wcount = $('[id$="_word"]').length;

			str="";

			for(i=0; i<wcount ; i++){
			//문제를 구한후 'ㅉ'으로 나눔 
				str += $('[id$="_word"]:nth('+i+')').val();
				str += ";";
				str += $('[id$="_mean1"]:nth('+i+')').val();
				str += ";";
				str += $('[id$="_mean2"]:nth('+i+')').val();

				if( i!=wcount-1)
					str += "/"; 
			}
 

			$.ajax({
			type: "POST",
			url: "Insert_Word.do.php",
			data: {"data":str , "date":$("#date").val()},
			success: function(msg){  
				location.href = "index.php";
			},
			error: function(){
				alert("failure");
			}
			});

		}
		


		function Find_Info(id){ 

			$.ajax({
			type: "POST",
			url: "Find_Info.php",
			data: {"output":"mean1", "Word":$("#"+id+"_word").val()},
			success: function(msg){ 
				$("#"+id+"_mean1").val(msg); 
			},
			error: function(){
				alert("failure");
			}
			});


			$.ajax({
			type: "POST",
			url: "Find_Info.php",
			data: {"output":"mean2", "Word":$("#"+id+"_word").val()},
			success: function(msg){ 
				$("#"+id+"_mean2").val(msg); 
			},
			error: function(){
				alert("failure");
			}
			});

/*
			$.ajax({
			type: "POST",
			url: "Find_Info.php",
			data: {"output":"mean3", "Word":$("#"+id+"_word").val()},
			success: function(msg){ 
				$("#"+id+"_mean3").html(msg); 
			},
			error: function(){
				alert("failure");
			}
			});*/
 
		}

	</script>
  </head>

  <body>
   
   <br>
	<center>
	<div class="row" id="Word_1_Set">
		<div class="col-xs-6">
			<input type="text" class="form-control" id="1_word" onchange="Find_Info(1)" placeholder="단어를 입력하세요">
		</div>
		<div class="col-xs-3">
			<input type="text" class="form-control" id="1_mean1" placeholder="다음">
		</div>
		<div class="col-xs-3">
			<input type="text" class="form-control" id="1_mean2" placeholder="네이버">
		</div> 

	</div>


	<br>

	<div class="row">
		<div class="col-md-6">
			<input type="date" class="form-control" id="date">
		</div>
		<div class="col-md-6">
			<button type="button" class="btn btn-success" id="Btn_Add" onclick="Add_Word(1)">단어 추가</button>
			<button type="button" class="btn btn-success" id="Btn_Add" onclick="Save_Word()">단어장에 저장</button>
		</div>
	</div>

	</center>


    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요한) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- 모든 합쳐진 플러그인을 포함하거나 (아래) 필요한 각각의 파일들을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script>
  
  </body>
</html>