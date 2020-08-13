var trasa = document.getElementById("valid_Traseu");
var form = document.getElementById("addUser");
var eroareForm = document.getElementById("eroare");

function validateNumere(numere){
	var numereTest = /^\d+$/;
	return numereTest.test(numere);
}


//Event Listener - atunci cand se apasa submit verifica formul(daca sunt toate campurile introduse corect)
form.addEventListener('submit',(e) =>{
	let mesaj = []
	//Validare traseu
	if(trasa.value === '' || trasa.value == null){
		mesaj.push('Trebuie completat  campul Traseu!')
	}else if(validateNumere(trasa.value)==0){
		mesaj.push('Campul Traseu trebuie sa contina doar numere')
	}
		if(mesaj.length>0){
		e.preventDefault();
		eroareForm.innerText = mesaj.join('\n ')
	}
})
