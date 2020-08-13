var tratament = document.getElementById("valid_Trat");
var diagnostic = document.getElementById("valid_Diag");
var dataT = document.getElementById("datepicker");
var dataA = document.getElementById("datepicker");
var tipAlergie = document.getElementById("valid_Tip_A");
var simptome = document.getElementById("valid_Simptome");
var medicament = document.getElementById("valid_Medicament");
var form = document.getElementById("formTrat");
var eroareForm = document.getElementById("eroare");
//Event Listener - atunci cand se apasa submit verifica formul(daca sunt toate campurile introduse corect)
form.addEventListener('submit',(e) =>{
	let mesaj = []
	//Validare nume
	if(tratament.value === '' || tratament.value == null){
		mesaj.push('Trebuie completat  campul TRATAMENT, daca nu are puteti pune "-" !')
	}
	//Validare Stoc
	if(diagnostic.value === '' || diagnostic.value == null){
		mesaj.push('Trebuie completate campul DOAGNPSTOC, daca nu are puteti pune "-" !')
	}
	if(tipAlergie.value === '' || tipAlergie.value == null){
		mesaj.push('Trebuie completate campul TIP ALERGIE, daca nu are puteti pune "-" !')
	}
	if(simptome.value === '' || simptome.value == null){
		mesaj.push('Trebuie completate campul SIMPTOME, daca nu are puteti pune "-" !')
	}
	if(medicament.value === '' || medicament.value == null){
		mesaj.push('Trebuie completate campul Medicament, daca nu are puteti pune "-" !')
	} 
	if(mesaj.length>0){
		e.preventDefault();
		eroareForm.innerText = mesaj.join('\n ')
	}
})
