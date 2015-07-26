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

<!-- JVectorMap -->
<link rel="stylesheet" href="css/jquery-jvectormap-2.0.2.css" type="text/css"/>
<script src="app/jquery-jvectormap-2.0.2.min.js"></script>
<script src="app/jquery-jvectormap-world-mill-en.js"></script>

<!-- Select 2 -->
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<!-- 960 GS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/960gs/0/960.min.css" type="text/css"/>


<link rel="stylesheet" href="css/main.css" type="text/css"/>
<script src="app/data.js"></script>
<script src="app/app.js"></script>
</head>
<body>
<div class="container_12">
	<div class="grid_12" id="header">
		<h1>Site Title</h1>
	</div>
	<div class="grid_12">
		<label>I speak</label>
		<select id="lang_select" multiple="multiple">
			<option value="cmn">Mandarin</option>
			<option value="eng">English</option>
			<option value="ita">Italian</option>
			<option value="spa">Spanish</option>
			<option value="hin">Hindi</option>
			<option value="por">Portuguese</option>
			<option value="rus">Russian</option>

		</select>
	</div>

	<!-- Shown if only 1 language is selected. Hidden by default -->
	<div id="single_lang" class="grid_12">
		<h2 id="s_lang_name">Please select a language</h2>
		<h3>Countries that have official an language you speak:</h3>
		<div id="s_lang_map" style="height: 400px"></div>
		<h3>Speakers of your language:</h3>
		<p><span id="s_lang_nat">0</span> million native speakers and <span id="s_lang_tot">0</span> million total speakers</p>
		<div id="s_lang_bar" class="progress">
		  	<div id="s_lang_bar_nat" class="progress-bar progress-bar-info" style="width: 0%">
		    	<span class="sr-only">Native</span>
		 	</div>
		  	<div id="s_lang_bar_for" class="progress-bar progress-bar-warning" style="width: 0%">
		 	   <span class="sr-only">Foreign</span>
		  	</div>
		</div>
		<p>Blue: native speaker, orange: foreign speaker</p>
		<h3>If the world consisted of 100 people:</h3>
		<p>There would be <span id="s_lang_people_nat">0</span> native speaker(s) and a total of <span id="s_lang_people_tot">0</span> speaker(s)</p>
	</div>

	<!-- Shown if multiple languages are selected. Hidden by default -->
	<div id="multiple_lang" class="grid_12">
		<h2 id="m_lang_name">Please select a language</h2>
		<h3>Countries that have official an language you speak:</h3>
		<div id="m_lang_map" style="height: 400px"></div>
		<h3>Native speakers of your languages:</h3>
		<div id="m_lang_bar" class="progress">
		  	<div id="m_lang_bar_nat" class="progress-bar progress-bar-info" style="width: 0%">
		    	<span class="sr-only">Native</span>
		 	</div>
		 </div>
	</div>


</div>
</body>
</html>