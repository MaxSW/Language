function init() {
    $("#multiple_lang").hide();
    //Listener for whenever the selected language(s) change
    $("#lang_select").select2().on("change", function(e) {
        manager = new LanguageManager($("#lang_select").val());
        manager.load();
        manager.display();
    });
    $('#s_lang_map').vectorMap(); 
}
/*Constants*/
//Approximate world pop from: http://www.worldometers.info/world-population/
worldPopulation = 7325;

function Language(idCode) {
    this.idCode = idCode;
    this.name = "";
    this.nat = 0;
    this.sec = 0;
    this.tot = 0;
    this.rank = 0;
    this.countries = "";
    this.greeting = "";
    Language.prototype.load = function() {
        if (typeof data[idCode] != 'undefined') {
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
        } else {
            console.log("Error loading language with a code of: " + idCode);
        }
    };
}

function LanguageManager(idCodes) {
    this.idCodes = idCodes;
    this.langs = new Array();
    LanguageManager.prototype.load = function() {
        if (idCodes != null) {
            for (i = 0; i < idCodes.length; i++) {
                var l = new Language(idCodes[i]);
                l.load();
                this.langs.push(l);
            }
        }
    }
};
LanguageManager.prototype.display = function() {
    if (this.langs.length == 1) {
    	$("#multiple_lang").hide();
    	$('#s_lang_map').empty();
        var l = this.langs[0];
        $("#single_lang").show();
        $("#s_lang_name").text(l.name);
        //$("#s_lang_greeting").text(l.greeting);	
        /*The world map*/
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
        var pn = l.nat / worldPopulation;
        var pf = (l.tot - l.nat) / worldPopulation;
       	var pt = l.tot / worldPopulation;
        $("#s_lang_bar_nat").css("width", pn * 100 + "%");
        $("#s_lang_bar_for").css("width", pf * 100 + "%");

        $("#s_lang_nat").text(l.nat);
        $("#s_lang_tot").text(l.tot);

        /*The 1000 people world*/
        $("#s_lang_people_nat").text(Math.round(pn * 100));
        $("#s_lang_people_tot").text(Math.round(pt * 100));
    } else if (this.langs.length == 0) {
		// Means no language has been selected so we must reset everything
		$('#s_lang_map').empty();
		$('#s_lang_map').vectorMap(); 
		$("#s_lang_name").text("Please select a language");
		$("#s_lang_bar_nat").css("width","0%");
        $("#s_lang_bar_for").css("width","0%");
        $("#s_lang_people_nat").text(0);
        $("#s_lang_people_tot").text(0);
        $("#s_lang_nat").text(0);
        $("#s_lang_tot").text(0);
    } else {
        //Display for multiple languages
        $('#s_lang_map').empty();
        $('#m_lang_map').empty();
        $("#single_lang").hide();
        $("#multiple_lang").show();

        var countries = {};
        var nativeSpeakers = 0;
		$("#m_lang_name").empty();

        for(i = 0; i < this.langs.length; i++){
        	//Collects the countries
        	var l = this.langs[i];
			countries = $.extend(l.countries, countries);

			//Generates nice title
			if(i == this.langs.length - 2){
				$("#m_lang_name").append(l.name + " and ");
			}else if(i == this.langs.length -1){
				$("#m_lang_name").append(l.name);
			}else{
				$("#m_lang_name").append(l.name + ", ");
			}

			//Calculates the total native speakers
			nativeSpeakers += l.nat;
        }
        var pn = nativeSpeakers / worldPopulation;
        console.log(nativeSpeakers + " | " + pn);
        $("#m_lang_bar_nat").css("width", pn * 100 + "%");

        $('#m_lang_map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: countries,
                    scale: ['#C8EEFF', '#0071A4'],
                    normalizeFunction: 'polynomial'
                }]
            }
        });
    }
};
/* Boots the app after JQuery has been loaded */
$(function() {
    init();
    /*manager = new LanguageManager(["eng"]);
	manager.load();
	manager.display();
*/
});