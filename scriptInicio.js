function validar(){
	var mensaje;

	mensaje = document.getElementById('publish').value;

	if(mensaje === "") {
		alert("No puede publicar un mensaje vacío");
		return false;
    if(strl(mensaje) > 140) {
		alert("No puede publicar un mensaje con mas de 140 caracteres");
		return false;
	}
}