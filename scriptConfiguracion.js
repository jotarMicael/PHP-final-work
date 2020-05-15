function validar(){
	var email, nombre, apellido, foto;

	nombre = document.getElementById('unNombre').value;
	apellido = document.getElementById('unApellido').value;
	email = document.getElementById('unEmail').value;
	foto = document.getElementById('unImagen').value;
	expresion = /\w+@\w+\.+[a-z]/;
	letras = /^[a-zA-Z]+$/;

	if ( (nombre === "") && (apellido === "") && (email === "") && (!foto) ) {
		document.getElementById('unNombre').classList.add("bordeError");
		document.getElementById('unApellido').classList.add("bordeError");
		document.getElementById('unEmail').classList.add("bordeError");
		document.getElementById('unImagen').classList.add("bordeError");
	    alert("Debe modificar aunque sea UN campo de Actualizacion de informacion para poder guardar los cambios");
	    return false;
	}
	else if ((!expresion.test(email))||(email.length>100)){
		document.getElementById('unNombre').classList.remove("bordeError");
		document.getElementById('unApellido').classList.remove("bordeError");
		document.getElementById('unEmail').classList.add("bordeError");
		document.getElementById('unImagen').classList.remove("bordeError");
		alert("Debe ingresar un mail valido");
		return false;
	}
	else if(!letras.test(nombre)){
		document.getElementById('unNombre').classList.add("bordeError");
		document.getElementById('unApellido').classList.remove("bordeError");
		document.getElementById('unEmail').classList.remove("bordeError");
		document.getElementById('unImagen').classList.remove("bordeError");
		alert("El nombre solo puede contener letras");
		return false;
	}
	else if(!letras.test(apellido)){
		document.getElementById('unNombre').classList.remove("bordeError");
		document.getElementById('unApellido').classList.add("bordeError");
		document.getElementById('unEmail').classList.remove("bordeError");
		document.getElementById('unImagen').classList.remove("bordeError");
		alert("El apellido solo puede contener letras");
		return false;
	}
}
function validar2(){
	var contraseñaActual, contraseñaNueva, contraeñaNuevaRepeticion;

	contraseñaActual = document.getElementById('unContraseña').value;
	contraseñaNueva = document.getElementById('unContraseña2').value;
	contraseñaNuevaRepeticion = document.getElementById('unContraseña3').value;
	var verificadorContraseñaMinus = /[a-z]+/
	var verificadorContraseñaMayus = /[A-Z]+/
	var verificadorContraseñaDigitos = /[ª!"·$%&/()=?¿\|@#¬'¡º1234567890!]/;

	if( (contraseñaActual === "") || (contraseñaNueva === "") || (contraseñaNuevaRepeticion === "") ){

		if (contraseñaActual === "")
			document.getElementById('unContraseña').classList.add("bordeError");
	    else
	    	document.getElementById('unContraseña').classList.remove("bordeError");

	    if (contraseñaNueva === "")
			document.getElementById('unContraseña2').classList.add("bordeError");
	    else
	    	document.getElementById('unContraseña2').classList.remove("bordeError");

	    if (contraseñaNuevaRepeticion === "")
			document.getElementById('unContraseña3').classList.add("bordeError");
	    else
	    	document.getElementById('unContraseña3').classList.remove("bordeError");

	    alert("No pueden haber campos vacios");
		return false;
	}
	else if(!(contraseñaNueva === contraseñaNuevaRepeticion)){
		document.getElementById('unContraseña2').classList.add("bordeError");
		document.getElementById('unContraseña3').classList.add("bordeError");
		document.getElementById('unContraseña').classList.remove("bordeError");
		alert("La contraseña nueva y la repeticion de la misma no coinciden");
		return false;
	}
	else if ((contraseñaNueva.length<8)||(contraseñaNueva.length>30)){
		alert("La contraseña debe tener entre 8 y 30 caracteres")
		return false
	}
	else if((!verificadorContraseñaDigitos.test(contraseñaNueva))){
		alert("La contraseña debe tener al menos un caracter especial");
		return false;
	} 
	else if(!verificadorContraseñaMayus.test(contraseñaNueva)){
		alert("La contraseña debe tener una mayuscula");
		return false
	}
	else if(!verificadorContraseñaMinus.test(contraseñaNueva)){
		alert("La contraseña debe tener una minuscula");
		return false;
	}
}	