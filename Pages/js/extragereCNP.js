var cnp = document.getElementById("valid_CNP");

var data = document.getElementById("datepicker");

var varsta = document.getElementById("valid_Varsta");

var sexA = document.getElementById("valid_Sex");

function takeCNP(){

	var take= cnp.value;

	var Year = take.substring(1,3);

	var Month = take.substring(3,5);

	var Day = take.substring(5,7);

	var Sex = take.substring(0,1);

	var cutoff = (new Date()).getFullYear() - 2000;

	var birthDate =(Year > cutoff ? '19' : '20') + Year + '-' + Month + '-' + Day;

	data.value = birthDate;

	if(take === ""){

		data.value = "";

	}
	

	var takeData = data.value;

	var varstaAn = (new Date()).getFullYear();

	var anVarsta = takeData.substring(0,4);

	varsta.value = Math.abs(varstaAn - anVarsta);

	if(take === ""){

		varsta.value ="";

	}

	if(Sex === "1"){

	    sexA.text= "masculin";

	    sexA.value = "m";

	} else if (Sex === "2"){

	    sexA.text= "feminin";

	    sexA.value = "f";

	} else{
		data.value="CNP invalid";
		varsta.value="CNP invalid";
	}
	
	if(Month > 12 || Month < 1){
		data.value="CNP invalid";
		varsta.value="CNP invalid";
	}
	
	if(Day > 31 || Day <1){
		data.value="CNP invalid";
		varsta.value="CNP invalid";
	}

}