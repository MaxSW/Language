<!DOCTYPE html>
<html>
<head>
<title>Language</title>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/main.css" type="text/css"/>
<script src="app/data.js"></script>
<script src="app/app.js"></script>
</head>
<body>
<div class="container">
<h1>Spoken Passport?</h1>
	<!-- Shown if only 1 language is selected. Hidden by default -->
	<div id="single_lang">
		<h2 id="s_lang_name">Single language</h2>
		<h3 id="s_lang_greeting">Hello</h3>
		<div id="s_lang_bar" class="progress">
		  	<div id="s_lang_bar_nat" class="progress-bar progress-bar-success" style="width: 0%">
		    	<span class="sr-only">Native</span>
		 	</div>
		  	<div id="s_lang_bar_for" class="progress-bar progress-bar-info" style="width: 0%">
		 	   <span class="sr-only">Foreign</span>
		  	</div>
		</div>
	</div>

	<!-- Shown if multiple languages are selected. Hidden by default -->
	<div id="multiple_lang">
		<h2 id="m_language_name">Multiple languages</h2>
	</div>


</div>
</body>
</html>