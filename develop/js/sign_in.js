//Esta funcion permite iniciar sesion a partir del boton de facebook
function onLoginFB() {
    //Se esta haciendo uso de la api de facebook, los scripts de la api estan en scriptsFB.js
    FB.login((response) => {
        if (response.authResponse) {
            //Se obtienen los datos del perfil de facebook
            FB.api('/me?fields=id,email,first_name,last_name', (response) => {
                //Los datos son enviados a develop/php/addUserFB.php para ser procesados 
                $.post('develop/php/addUserFB.php',response,function(data){
                    //Aqui se obtiene la respuesta 
//Si el proceso fue un exito los datos obtenidos son enviados a la funcion de loginLS(id,nom,jer) en cookies.js
                    if (data!=null) {
                        console.log(data);
                        if (data == "preRegistrado") {
                            alert('El usuario ya ha sido registrado');
                            window.location= 'login.php';
                        } else if (data == "registrado") {
                            alert('Usuario registrado con exito');
                            window.location= 'login.php';
                        }
// en caso de que haya ocurrido un error este sera notificado 
                        else {
                            alert('Ha ocurrido un error, intetelo mas tarde');
                            window.location= 'index.php';                        
                        }
                    }else{
                        alert('Ha ocurrido un error, intetelo mas tarde');
                        window.location= 'index.php';
                    }
                });

            });
        }else{
            alert("Ha ocurrido un error intentelo mas tarde");
            window.location= 'index.php'
        }
    });
}


//Este fagmento de codigo es el que le da funcionalidad al formulario de la vista sign_in
let formulario = document.getElementById('formularioDts');
formulario.addEventListener('submit',e=>{
    e.preventDefault();
    //Se obtinen los datos del formulario 
    let nom = document.getElementById('username').value;
    let ape = document.getElementById('apellido').value;
    let ema = document.getElementById('email').value;
    let pas = document.getElementById('password').value;
    let dir = document.getElementById('direccions').value;
    let num = document.getElementById('numero').value;
    //Se encarga de verificar que la cadena de caracteres del campo telefono sea correcta
    let valoresAceptados = /^[0-9]+$/;
    if (num.match(valoresAceptados)){}else{
        alert("Ingrese un numero de telefono valido");
        return;
    }
    //Los datos son enviados a develop/php/addUsuario.php para ser procesados 
    $.post('develop/php/addUsuario.php',{
        nombre:nom,
        apellido:ape,
        email:ema,
        password:pas,
        direccion:dir,
        telefono:num
    },function(data){
        if (data!=null) {
            //Aqui se obtiene la respuesta 
//Si el proceso fue un exito los datos obtenidos son enviados a la funcion de loginLS(id,nom,jer) en cookies.js
            if (data == "preRegistrado") {
                alert('El usuario ya ha sido registrado');
                window.location= 'login.php';
            } else if (data == "registrado") {
                alert('Usuario registrado con exito');
                window.location= 'login.php';
            }             
// en caso de que haya ocurrido un error este sera notificado
            else {
                alert('Ha ocurrido un error, intetelo mas tarde');
                window.location= 'index.php';                        
            }
        }else{
            alert('Ha ocurrido un error, intetelo mas tarde');
            window.location= 'index.php';
        }
    });
});

