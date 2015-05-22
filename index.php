 
<html>
  <head>
    <title>Bootstrap 101 Template</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 부트스트랩 -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">

	
  </head>

  <body>
 

	<center>
	<div class="row">
	  <div class="col-md-12">
		<h3>망각곡선에 의한 단어암기장</h3>
	  </div> 
	</div>
	<div class="row">
	  <div class="col-md-12"> 
		<button type="button" class="btn btn-success" onclick="Insert_Word()"><span class="glyphicon glyphicon-plus"></span></button>
		<button type="button" class="btn btn-success" onclick="Go_Home()"><span class="glyphicon glyphicon-home"></span></button>
		<button type="button" class="btn btn-success" onclick="List_Forgeted_Word()"><span class="glyphicon glyphicon-list"></span></button>
	  </div> 
	</div> 
	 
	 <br>

 <div class="row">
  <div class="col-md-12"> 
	<ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#Today">오늘</a></li>
        <li><a data-toggle="tab" href="#Yesterday">어제</a></li>
        <li><a data-toggle="tab" href="#Threeday_ago">삼일전</a></li>
		<li><a data-toggle="tab" href="#Aweek_ago">일주일전</a></li>
        <li><a data-toggle="tab" href="#Twoweek_ago">이주전</a></li>
		<li><a data-toggle="tab" href="#Amonth_ago">한달전</a></li>
        <li><a data-toggle="tab" href="#Forgot_list">망각</a></li>

        </li>
    </ul>
    <div class="tab-content">
        <div id="Today" class="tab-pane fade in active">
             
        </div>
        <div id="Yesterday" class="tab-pane fade">
             
        </div>
        <div id="Threeday_ago" class="tab-pane fade">
             
        </div>
        <div id="Aweek_ago" class="tab-pane fade">
             
        </div>
		<div id="Twoweek_ago" class="tab-pane fade">
             
        </div>
		<div id="Amonth_ago" class="tab-pane fade">
             
        </div>
		
		<div id="Forgot_list" class="tab-pane fade">
             
        </div>
    </div> 
</div>

	
	<!--div class="row">
	  <div class="col-md-12">
		<h1>오늘 외울단어</h1>
		<div id="Today"></div>
		<br>
		<h1> -복습- 어제 단어</h1>
		<div id="Yesterday"></div>
		<br>
		<h1> -복습- 3일전 단어</h1>
		<div id="Threeday_ago"></div>
		<br>
		<h1> -복습- 일주일전 단어</h1>
		<div id="Aweek_ago"></div>
		<br>
		<h1> -복습- 2주전 단어</h1>
		<div id="Twoweek_ago"></div>
		<br>
		<h1> -복습- 한달전 단어</h1>
		<div id="Amonth_ago"></div>
		<br>
		<h1> -복습- 잊어버린 단어</h1>
		<div id="Forgot_list"></div>
		</div> 
	</div-->




	</center>


    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요한) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- 모든 합쳐진 플러그인을 포함하거나 (아래) 필요한 각각의 파일들을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script> 

	<script>
		var m_flag=0;
		var w_flag=0;
		function hide(tag){
			if(tag=='w'){
				if(w_flag==0){
					$('[id$="word"]').css("color","white");
					w_flag=1;
				}
				else{
					$('[id$="word"]').css("color","black");
					w_flag=0;
				}
			}
			else if(tag=='m'){ 
				if(m_flag==0){
					$('[id$="mean"]').css("color","white");
					m_flag=1;
				}
				else{
					$('[id$="mean"]').css("color","black");
					m_flag=0;
				}
			}   
		}

		function Go_Home(){
			location.href="index.php";
		}

		function Insert_Word(){
			location.href="Insert_Word.php";
		}

		function List_Forgeted_Word(){
			location.href="List_Forgeted_Word.php";
		}
		
		function Check_Changed(Word, date, flag){
			
			$.ajax({
			type: "POST",
			url: "Update_Memory.php",
			data: {"Word":Word, "date":date, "flag":flag},
			success: function(msg){ 
				init();
			},
			error: function(){
				alert("failure");
			}
			});

		}


		//맨처음 실행시
		jQuery( document ).ready( function(){
			init();

		});

		function init(){

						//오늘단어
			$.ajax({
			type: "POST",
			url: "Load_Word_List.php",
			data: {"output":"Today", "date":"<?=$date?>"},
			success: function(msg){ 
				$("#Today").html(msg); 
			},
			error: function(){
				alert("failure");
			}
			});
	
			//어제
			$.ajax({
			type: "POST",
			url: "Load_Word_List.php",
			data: {"output":"Yesterday", "date":"<?=$date?>"},
			success: function(msg){ 
				$("#Yesterday").html(msg); 
			},
			error: function(){
				alert("failure");
			}
			});
	
			//3일전
			$.ajax({
			type: "POST",
			url: "Load_Word_List.php",
			data: {"output":"Threeday_ago", "date":"<?=$date?>"},
			success: function(msg){ 
				$("#Threeday_ago").html(msg); 
			},
			error: function(){
				alert("failure");
			}
			});

			//일주일전
			$.ajax({
			type: "POST",
			url: "Load_Word_List.php",
			data: {"output":"Aweek_ago", "date":"<?=$date?>"},
			success: function(msg){ 
				$("#Aweek_ago").html(msg); 
			},
			error: function(){
				alert("failure");
			}
			});

			//이주일
			$.ajax({
			type: "POST",
			url: "Load_Word_List.php",
			data: {"output":"Twoweek_ago", "date":"<?=$date?>"},
			success: function(msg){ 
				$("#Twoweek_ago").html(msg); 
			},
			error: function(){
				alert("failure");
			}
			});

			//한달
			$.ajax({
			type: "POST",
			url: "Load_Word_List.php",
			data: {"output":"Amonth_ago", "date":"<?=$date?>"},
			success: function(msg){ 
				$("#Amonth_ago").html(msg); 
			},
			error: function(){
				alert("failure");
			}
			});

			$.ajax({
			type: "POST",
			url: "Load_Word_List.php",
			data: {"output":"Forgot_list", "date":"<?=$date?>"},
			success: function(msg){ 
				$("#Forgot_list").html(msg); 
			},
			error: function(){
				alert("failure");
			}
			});

		}

	</script>
  </body>
</html>