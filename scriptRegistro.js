function validar(){
	var nombre, apellido, email, foto, Usuario, nuevaClave, nuevaClaveRepetida;

	nombre = document.getElementById('unNombre').value;
	apellido = document.getElementById('unApellido').value;
	email = document.getElementById('unEmail').value;
	foto = document.getElementById('unImagen').value;
	Usuario = document.getElementById('unUsuario').value;
	nuevaClave = document.getElementById('unContraseña').value;
	nuevaClaveRepetida = document.getElementById('unContraseña2').value;
	var expresion = /\w+@\w+\.+[a-z]/;
	var letras = /^[a-zA-Z]+$/;
	var verificadorContraseñaMinus = /[a-z]+/
	var verificadorContraseñaMayus = /[A-Z]+/
	var verificadorContraseñaDigitos = /[ª!"·$%&/()=?¿\|@#¬'¡º1234567890!]/;

	if (  (nombre === "")||(apellido === "")||(email === "")||(!foto)||(Usuario === "")||(nuevaClave === "")||(nuevaClaveRepetida === "")){
		if (nombre === "")
			document.getElementById('unNombre').classList.add("bordeError");
	    else
	    	document.getElementById('unNombre').classList.remove("bordeError");
		if(apellido === "")
			document.getElementById('unApellido').classList.add("bordeError");
	    else
	    	document.getElementById('unApellido').classList.remove("bordeError");
		if(email === "")
			document.getElementById('unEmail').classList.add("bordeError");
		else
	    	document.getElementById('unEmail').classList.remove("bordeError");
		if(foto === "")
			document.getElementById('unImagen').classList.add("bordeError");
		else
	    	document.getElementById('unImagen').classList.remove("bordeError");
	    if(Usuario === "")
			document.getElementById('unUsuario').classList.add("bordeError");
		else
	    	document.getElementById('unUsuario').classList.remove("bordeError");
		if(nuevaClave === "")
			document.getElementById('unContraseña').classList.add("bordeError");
		else
	    	document.getElementById('unContraseña').classList.remove("bordeError");
		if(nuevaClaveRepetida === "")
			document.getElementById('unContraseña2').classList.add("bordeError");
		else
	    	document.getElementById('unContraseña2').classList.remove("bordeError");
		alert("Debe completar todos los campos");
		return false;
	}
	else if ((!expresion.test(email))||(email.length>100)){
		document.getElementById('unEmail').classList.add("bordeError");
		document.getElementById('unNombre').classList.remove("bordeError");
		document.getElementById('unApellido').classList.remove("bordeError");
		document.getElementById('unImagen').classList.remove("bordeError");
		document.getElementById('unUsuario').classList.remove("bordeError");
		document.getElementById('unContraseña').classList.remove("bordeError");
		document.getElementById('unContraseña2').classList.remove("bordeError");
		alert("Debe ingresar un mail valido");
		return false;
	}
	else if ((nuevaClave.length<6)||(nuevaClave.length>30)){
		alert("La contraseña debe tener entre 6 y 30 caracteres")
		return false
	}
	else if((!verificadorContraseñaDigitos.test(nuevaClave))){
		alert("La contraseña debe tener al menos un caracter especial");
		return false;
	} 
	else if(!verificadorContraseñaMayus.test(nuevaClave)){
		alert("La contraseña debe tener una mayuscula");
		return false
	}
	else if(!verificadorContraseñaMinus.test(nuevaClave)){
		alert("La contraseña debe tener una minuscula");
		return false;
	}
	else if(!(nuevaClave===nuevaClaveRepetida)){
		document.getElementById('unContraseña').classList.add("bordeError");
		document.getElementById('unContraseña2').classList.add("bordeError");
		document.getElementById('unEmail').classList.remove("bordeError");
		document.getElementById('unNombre').classList.remove("bordeError");
		document.getElementById('unUsuario').classList.remove("bordeError");
		document.getElementById('unApellido').classList.remove("bordeError");
		document.getElementById('unImagen').classList.remove("bordeError");
		alert("La contraseña nueva y la repeticion de la misma no coinciden");
		return false;
	}
	else if(!letras.test(nombre)){
		alert("El nombre solo puede contener letras");
		return false;
	}
	else if(!letras.test(apellido)){
		alert("El apellido solo puede contener letras");
		return false;
	}
}