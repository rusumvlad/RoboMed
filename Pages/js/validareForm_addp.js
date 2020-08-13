var nume = document.getElementById("valid_Nume");
var prenume = document.getElementById("valid_Prenume");
var CNP = document.getElementById("valid_CNP");
var telefon = document.getElementById("valid_Telefon");
var varsta = document.getElementById("valid_Varsta");
var numarPat = document.getElementById("valid_Numar");
var sex = document.getElementById("valid_Sex");
var adresa = document.getElementById("valid_Adresa");
var profesie = document.getElementById("valid_Profesie");
var locMunca = document.getElementById("valid_Loc");
var email = document.getElementById("valid_Email");
var data = document.getElementById("datepicker");
var form = document.getElementById("adaugarePac");
var eroareForm = document.getElementById("eroare");
//Functia care valideaza email
function validateEmail(email){
	//M-am folosit de expresie regulata(regex) - un sir de caractere care verifica daca este valid mailul
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}
//Functia care valideaza telefonul
function validateTelefon(telefon){
	var phoneno = /^\d{10}$/;
	return phoneno.test(telefon);
}
//Functia care valideaza CNP
function validateCNP(CNP){
	var cnpTest =  /^\d{13}$/;
	return cnpTest.test(CNP);
}
function validateNumere(numere){
	var numereTest = /^\d+$/;
	return numereTest.test(numere);
}
//Event Listener - atunci cand se apasa submit verifica formul(daca sunt toate campurile introduse corect)
form.addEventListener('submit',(e) =>{
	let mesaj = []
	//Validare nume
	if(nume.value === '' || nume.value == null){
		mesaj.push('Trebuie completat  campul NUME')
	}
	//Validare Prenume
	if(prenume.value === '' || prenume.value == null){
		mesaj.push('Trebuie completate campul PRENUME')
	}
	//Validare Telefon
	if(telefon.value === '' || telefon.value == null){
		mesaj.push('Trebuie completat campul TELEFON')
	} else 
	if(validateTelefon(telefon.value) == 0){
		mesaj.push('Numarul de telefon trebuie sa contina exact 10 cifre')
	}
	//Validare CNP
	if(CNP.value === '' || CNP.value == null){
		mesaj.push('Trebuie completat campul CNP')
	} else 
	if(validateCNP(CNP.value) == 0){
		mesaj.push('CNP trebuie sa contina exact 13 cifre')
	} else 
	if(data.value == 'CNP invalid' || varsta.value === 'CNP invalid'){
		mesaj.push('CNP invalid');
	}
	//Validare Numar Pat
	if(numarPat.value === '' || numarPat.value == null){
		mesaj.push('Trebuie completate campul NUMAR PERSOANE')
	}else 
    if(validateNumere(numarPat.value) == 0){
	    mesaj.push('Trebuie sa contina numere')
	}
	//Validare Email
	if(email.value === '' || email.value == null){
		mesaj.push('Trebuie completate campul EMAIL')
	} else 
	if(validateEmail(email.value) == 0){
		mesaj.push("Introduceti un EMAIL valid");
	}
	//Validare Adresa
	if(adresa.value === '' || adresa.value == null){
	    mesaj.push('Trebuie completate campul ADRESA')
	}
	//Validare Loc de Munca
	if(locMunca.value === '' || locMunca.value == null){
	    mesaj.push('Trebuie completate campul LOC DE MUNCA, daca nu are puneti "-"')
	}
	//Validare Profesie
	if(profesie.value === '' || profesie.value == null){
	    mesaj.push('Trebuie completate campul PROFESIE, daca nu are puneti "-"')
	}
	if(mesaj.length>0){
		e.preventDefault();
		eroareForm.innerText = mesaj.join('\n ')
	} 
})
