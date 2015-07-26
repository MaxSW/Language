//Simple error catching for during development
onerror = errorHandler;
function errorHandler(message, url, line) {
    out = "Error";
    out += "Message: " + message;
    out += "URL: " + url;
    out += "Line: " + line;
    alert(out);
}

function init(){
	$("#single_lang").hide();
	$("#multiple_lang").hide();
}

/*Constants*/
//Approximate world pop from: http://www.worldometers.info/world-population/
worldPopulation = 7325;

function Language(idCode){
	this.idCode = idCode;

	this.name = "";
	this.nat = 0;
	this.sec = 0;
	this.tot = 0;
	this.rank = 0;
	this.countries = "";
	this.greeting = "";

	Language.prototype.load = function() {
		if(typeof data[idCode] != 'undefined'){
			this.name = data[idCode]["name"];
			this.nat = data[idCode]["nat"];
			this.sec = data[idCode]["sec"];
			this.tot = data[idCode]["tot"];
			this.rank = data[idCode]["rank"];
			this.countries = data[idCode]["countries"];
			this.greeting = data[idCode]["greeting"];

			//Ensure int values are ints
			this.nat *= 1;
			this.sec *= 1;
			this.tot *= 1;
			this.rank *= 1;

			console.log(this.greeting);
		}else{
			console.log("Error loading language with a code of: " + idCode);
		}
	};
}

function LanguageManager(idCodes){
	this.idCodes = idCodes;
	this.langs = new Array();

	LanguageManager.prototype.load = function(){
		for(i = 0; i < idCodes.length; i++){
			var l = new Language(idCodes[i]);
			l.load();
			this.langs.push(l);
		}
	};

	LanguageManager.prototype.display = function(){
		if(this.langs.length == 1){
			var l = this.langs[0];
			$("#single_lang").show();
			$("#s_lang_name").text(l.name);
			//$("#s_lang_greeting").text(l.greeting);	
			/*The world map*/
			console.log(l.countries);
			$('#s_lang_map').vectorMap({
				map: 'world_mill_en',
				series: {
				  	regions: [{
				      	values: l.countries,
      					scale: ['#C8EEFF', '#0071A4'],
				     	normalizeFunction: 'polynomial'
				    }]
				}
			});


			/*The % of world pop bar */
			pn = l.nat / worldPopulation;
			pf = (l.tot - l.nat) / worldPopulation;
			pt = l.tot / worldPopulation;

			$("#s_lang_bar_nat").css("width",pn*100 + "%");
			$("#s_lang_bar_for").css("width",pf*100 + "%");

			/*The 1000 people world*/
			$("#s_lang_people_nat").text(Math.round(pn * 100));
			$("#s_lang_people_tot").text(Math.round(pt * 100));

		}else if(this.langs.length == 0){
			console.log("Error: trying to display with no languages")
			return;
		}else{
			//Display for multiple languages
		}
	};
}

/* Boots the app after JQuery has been loaded */
$(function() {
	init();
	manager = new LanguageManager(["eng"]);
	manager.load();
	manager.display();


});