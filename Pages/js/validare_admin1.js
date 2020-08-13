var numeM = document.getElementById("valid_Medicament");
var IDm = document.getElementById("valid_ID_Medicament");
var stoc = document.getElementById("valid_Nr_Medicament");
var data = document.getElementById("datepicker2");
var form = document.getElementById("addMed");
var eroareForm = document.getElementById("eroare");

function validateNumere(numere){
	var numereTest = /^\d+$/;
	return numereTest.test(numere);
}


//Event Listener - atunci cand se apasa submit verifica formul(daca sunt toate campurile introduse corect)
form.addEventListener('submit',(e) =>{
	let mesaj = []
	//Validare nume
	if(numeM.value === '' || numeM.value == null){
		mesaj.push('Trebuie completat  campul NUME MEDICAMENT!')
	}
	//Validare Id
	if(IDm.value === '' || IDm.value == null){
		mesaj.push('Trebuie completat ID MEDICAMENT!')
	}
	//Validare Stoc
	if(stoc.value === '' || stoc.value == null){
		mesaj.push('Trebuie completate campul STOC MEDICAMENT!')
	}else if(validateNumere(stoc.value)==0){
		mesaj.push('Campul STOC poate sa contina doar numere!')

	}
	if(data.value === '' || data.value == null){
		mesaj.push('Trebuie completate campul DATA EXPIRARII!')
	}
	if(mesaj.length>0){
		e.preventDefault();
		eroareForm.innerText = mesaj.join('\n ')
	}
})
