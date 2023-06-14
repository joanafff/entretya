//Ejecutando funciones con la captura de eventos
document.getElementById("btn_iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn_registrarse").addEventListener("click", registro);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario_login = document.querySelector(".formulario_login");
var formulario_registro = document.querySelector(".formulario_registro");
var contenedor_login_registro = document.querySelector(".contenedor_login-registro");
var caja_trasera_login = document.querySelector(".caja_trasera-login");
var caja_trasera_registro = document.querySelector(".caja_trasera-registro");


//Para mostrar o no los contenedores de login y registro, dependiendo de la medida de la pantalla
function anchoPage(){
    if (window.innerWidth > 850){
        caja_trasera_registro.style.display = "block";
        caja_trasera_login.style.display = "block";
    }else{
        caja_trasera_registro.style.display = "block";
        caja_trasera_registro.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_registro.style.left = "0px";
        formulario_registro.style.display = "none";   
    }
}

anchoPage();

//Se muestra el contenedor de login y se esconde el de registro
function iniciarSesion(){
    if (window.innerWidth > 850){
        formulario_login.style.display = "block";
        contenedor_login_registro.style.left = "10px";
        formulario_registro.style.display = "none";
        caja_trasera_registro.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
    }else{
        formulario_login.style.display = "block";
        contenedor_login_registro.style.left = "0px";
        formulario_registro.style.display = "none";
        caja_trasera_registro.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}

//Se muestra el contenedor de registro y se esconde el login
function registro(){
    if (window.innerWidth > 850){
        formulario_registro.style.display = "block";
        contenedor_login_registro.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_registro.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";
    }else{
        formulario_registro.style.display = "block";
        contenedor_login_registro.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_registro.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity = "1";
    }
}