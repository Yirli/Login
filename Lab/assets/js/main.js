function validarfor(){

var correo = document.getElementById("email").value; 
var nom = document.getElementsByName("name").value;
var lastname = document.getElementsByName("lastName").value;
var cel = document.getElementsByName("cellphone").value;
var phone = document.getElementsByName("phone").value;
var password = document.getElementsByName("password").value;

if ((correo == "") || (nom == "") || (lastname == "") || (cel == "") || (phone == "") || (password == "")) {  //COMPRUEBA CAMPOS VACIOS
    alert("Los campos no pueden quedar vacios");
    return true;
}
