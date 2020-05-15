function validar(){
	var nombre, contraseña;

	nombre = document.getElementById('nickname');
	contraseña = document.getElementById('contraseña');

	if((nombre.value === "")||(contraseña.value === "")){
		if( nombre.value === "")
			nombre.classList.add("bordeError");
		else
			nombre.classList.remove("bordeError");
		if( contraseña.value === "")
			contraseña.classList.add("bordeError");
		else
			contraseña.classList.remove("bordeError");
		alert("Tienes que ingresar ambos campos");
		return false;
	}
}