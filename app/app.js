onerror = errorHandler;

function errorHandler(message, url, line) {
    out = "Error";
    out += "Message: " + message;
    out += "URL: " + url;
    out += "Line: " + line;
    alert(out);
}

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

/* Boots the app after JQuery has been loaded */
$(function() {
	lang = new Language("ita");
	lang.load();
});