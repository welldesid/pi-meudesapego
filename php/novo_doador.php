<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Meu Desapego</title>

		<link rel="stylesheet" href="../css/php.css">
		<link href="css/main.css" rel="stylesheet" media="all">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1 ) { ?>
			<div class="alert hide">
				<span class="fas fa-exclamation-circle"></span>
				<span class="msg">Warning: This is a warning alert!</span>
				<div class="close-btn">
					<span class="fas fa-times"></span>
				</div>
			</div>
			<script>
				$('button').click(function(){
				$('.alert').addClass("show");
				$('.alert').removeClass("hide");
				$('.alert').addClass("showAlert");
				setTimeout(function(){
					$('.alert').removeClass("show");
					$('.alert').addClass("hide");
				},5000);
				});
				$('.close-btn').click(function(){
				$('.alert').removeClass("show");
				$('.alert').addClass("hide");
				});
			</script>
		<?php } ?>
	</body>
</html>





