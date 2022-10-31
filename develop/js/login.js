//Este fagmento de codigo es el que le da funcionalidad al formulario de la vista loguin
let formulario = document.getElementById('formularioDts');
formulario.addEventListener('submit',e=>{
    e.preventDefault();
    //Se obtinen los datos del formulario 
    let ema = document.getElementById('correo').value;
    let pas = document.getElementById('password').value;
    //Los datos son enviados a develop/php/selectLogin.php para ser procesados 
    $.post('develop/php/selectLogin.php',{
        email:ema,
        password:pas
    },function(data){
        //Aqui se obtiene la respuesta 
        var insertRespuesta = JSON.parse(data);
        if (insertRespuesta!=null) {
            if (insertRespuesta.response == "SUCCESS") {
                //Si el proceso fue un exito los datos obtenidos son enviados a la funcion de loginLS(id,nom,jer) en cookies.js
                var resLS = loginLS(
                    insertRespuesta.id,
                    insertRespuesta.nombre,
                    insertRespuesta.jerarquia
                );
                console.log(resLS);
                alert('Sesión iniciada');
                window.location= 'index.php';
            } 
// en caso de que haya ocurrido un error este sera notificado
            else if (insertRespuesta.response == "ERROR1") {
                alert(insertRespuesta.detail);
            } else {
                alert('Ha ocurrido un error, intetelo mas tarde');
                window.location= 'index.php';                        
            }
        }else{
            alert('Ha ocurrido un error, intetelo mas tarde');
            window.location= 'index.php';
        }
    });
});

//Esta funcion permite iniciar sesion a partir del boton de facebook
function onLogFB() {
    //Se esta haciendo uso de la api de facebook, los scripts de la api estan en scriptsFB.js
    console.log("Ejecutando la funcion de login con facebook");
    FB.login((response) => {
        if (response.authResponse) {
            //Se obtienen los datos del perfil de facebook
            FB.api('/me?fields=id', (response) => {
                //Los datos son enviados a develop/php/selectLoginFB.php para ser procesados 
                $.post('develop/php/selectLoginFB.php',response,function(data){
                    var insertRespuesta = JSON.parse(data);
                    if (insertRespuesta!=null) {
                        if (insertRespuesta.response == "SUCCESS") {
                            //Si el proceso fue un exito los datos obtenidos son enviados a la funcion de loginLS(id,nom,jer) en cookies.js
                            var resLS = loginLS(
                                insertRespuesta.id,
                                insertRespuesta.nombre,
                                insertRespuesta.jerarquia
                            );
                            console.log(resLS);
                            alert('Sesión iniciada');
                            window.location= 'index.php';
                        }
// en caso de que haya ocurrido un error este sera notificado 
                        else if (insertRespuesta.response == "ERROR1") {
                            alert(insertRespuesta.detail);
                        } else {
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