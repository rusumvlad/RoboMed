var user = document.getElementById("valid_User");
var parola = document.getElementById("valid_Parola");
var form = document.getElementById("addUser");
var eroareForm = document.getElementById("eroare");
//Event Listener - atunci cand se apasa submit verifica formul(daca sunt toate campurile introduse corect)
form.addEventListener('submit',(e) =>{
	let mesaj = []
	//Validare Utilizator
	if(user.value === '' || user.value == null){
		mesaj.push('Trebuie completat  campul Utilizator')
	}
	//Validare Parola
	if(parola.value === '' || parola.value == null){
		mesaj.push('Trebuie completate campul PAROLA')
	}
		if(mesaj.length>0){
		e.preventDefault();
		eroareForm.innerText = mesaj.join('\n ')
	}
})
