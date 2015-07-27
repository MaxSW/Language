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
		<label id="i_speak">I speak</label>
		<select id="lang_select" multiple="multiple">
			<option value="cmn">Mandarin Chinese</option>
	        <option value="eng" selected>English</option>
	        <option value="spa">Spanish</option>
	        <option value="hin">Hindi</option>
	        <option value="por">Portugese</option>
	        <option value="rus">Russian</option>
	        <option value="fre">French</option>
	        <option value="ben">Bengali</option>
	        <option value="mal">Malay</option>
	        <option value="ger">German</option>
	        <option value="jap">Japanese</option>
	        <option value="ita">Italian</option>
	        <option value="per">Persian</option>
	        <option value="pun">Punjabi</option>
	        <option value="urd">Urdu</option>
	        <option value="mar">Marathi</option>
	        <option value="tur">Turkish</option>
	        <option value="tel">Telugu</option>
	        <option value="ear">Egyptian Arabic</option>
	        <option value="jav">Javanese</option>
	        <option value="wch">Wu Chinese</option>
	        <option value="kor">Korean</option>
	        <option value="tha">Thai</option>
	        <option value="vie">Vietnamese</option>
	        <option value="ych">Yue Chinese</option>
	        <option value="tam">Tamil</option>
	        <option value="mag">Maghrebi Arabic</option>
	        <option value="min">Min Nan Chinese</option>
	        <option value="pol">Polish</option>
	        <option value="guj">Gujarati</option>
	        <option value="jin">Jin Yu Chinese</option>
	        <option value="ukr">Ukranian</option>
	        <option value="hau">Hausa</option>
	        <option value="kan">Kannada</option>
	        <option value="pas">Pashto</option>
	        <option value="xch">Xiang Chinese</option>
	        <option value="lev">Levantine Arabic</option>
	        <option value="may">Malayalam</option>
	        <option value="hch">Hakka Chinese</option>
	        <option value="ber">Berber</option>
	        <option value="amh">Amharic</option>
	        <option value="oro">Oromo</option>
	        <option value="bur">Burmese</option>
	        <option value="ori">Oriya</option>
	        <option value="nep">Nepali</option>
	        <option value="sud">Sudanese</option>
	        <option value="bho">Bhojpuri</option>
	        <option value="fil">Filipino</option>
	       	<option value="bul">Bulgarian</option>
	        <option value="cr0">Croation</option>
	        <option value="cze">Czech</option>
	        <option value="dan">Danish</option>
	        <option value="dut">Dutch</option>
	        <option value="est">Estonian</option>
	        <option value="fin">Finnish</option>
	        <option value="gre">Greek</option>
	        <option value="hun">Hungarian</option>
	        <option value="iri">Irish</option>
	        <option value="lat">Latvian</option>
	        <option value="lit">Lithuanian</option>
	        <option value="rom">Romanian</option>
	        <option value="slo">Slovak</option>
	        <option value="sln">Slovenian</option>
	        <option value="swe">Swedish</option>

		</select>
	</div>

	<!-- Shown if only 1 language is selected. Hidden by default -->
	<div id="single_lang" class="grid_12">
		<h2 id="s_lang_name">Please select a language</h2>
		<h4>Countries that have official an language you speak:</h4>
		<div id="s_lang_map" style="height: 400px"></div>
		<h4>Speakers of your language:</h4>
		<p><span class="data" id="s_lang_nat">0</span> million native speakers and <span class="data" id="s_lang_tot">0</span> million total speakers</p>
		<div id="s_lang_bar" class="progress">
		  	<div id="s_lang_bar_nat" class="progress-bar progress-bar-info" style="width: 0%">
		    	<span class="sr-only">Native</span>
		 	</div>
		  	<div id="s_lang_bar_for" class="progress-bar progress-bar-warning" style="width: 0%">
		 	   <span class="sr-only">Foreign</span>
		  	</div>
		</div>
		<p class="small">Blue: native speakers Orange: foreign speakers</p>
		<h4>If the world consisted of 100 people:</h4>
		<p>There would be <span class="data" id="s_lang_people_nat">0</span> native speaker(s) and a total of <span class="data" id="s_lang_people_tot">0</span> speaker(s)</p>
	</div>

	<!-- Shown if multiple languages are selected. Hidden by default -->
	<div id="multiple_lang" class="grid_12">
		<h2 id="m_lang_name">Please select a language</h2>
		<h4>Countries that have official an language you speak:</h4>
		<div id="m_lang_map" style="height: 400px"></div>
		<h4>Speakers of your languages:</h4>
		<p><span class="data" id="m_lang_nat">0</span> million native speakers which is <span class="data" id="m_lang_per">0</span>% of the world's population</p>
		<div id="m_lang_bar" class="progress">
		  	<div id="m_lang_bar_nat" class="progress-bar progress-bar-info" style="width: 0%">
		    	<span class="sr-only">Native</span>
		 	</div>
		 </div>
		 <p>There are between <span class="data" id="m_lang_tot_min">0</span> million and <span class="data" id="m_lang_tot_max">0</span> million total speakers of your languages. 
		 <a tabindex="0" id="inaccurate_popover" class="btn btn-info" role="button" data-placement="top" data-toggle="popover" data-trigger="focus" title="The inaccuracy of Total Speakers for Multiple Languages:" data-content="We only have the data for the total speakers of each language individually. Unfortunately the totals for different langauges may overlap as someone can speak 2 langauges, therefore we only show you the min (native speakers) and max (total speakers added together for each language) values">Why so inaccurate?</a>

		 </p>
		<div id="m_lang_bar" class="progress">
			<div id="m_lang_bar_tot_min" class="progress-bar progress-bar-info" style="width: 0%"></div>
			 <div id="m_lang_bar_tot_max" class="progress-bar progress-bar-warning" style="width: 0%"></div>
		</div>
		<p class="small">Blue: minimum total speakers. Blue & orange: maximum total speakers</p>

		<h4>If the world consisted of 100 people:</h4>
		<p>There would be <span class="data" id="m_lang_people_nat">0</span> native speaker(s)</p>

		<hr />
		<h3>Language Breakdown</h3>
		<p class="small">Blue: native speakers. Orange: foreign speakers</p>
		<div id="m_lang_split">
		</div>
	</div>


</div>
</body>
</html>