let formulario = document.getElementById('formularioDts');
formulario.addEventListener('submit',e=>{
    e.preventDefault();
    let ema = document.getElementById('correo').value;
    let pas = document.getElementById('password').value;
    $.post('develop/php/selectLogin.php',{
        email:ema,
        password:pas
    },function(data){
        var insertRespuesta = JSON.parse(data);
        if (insertRespuesta!=null) {
            if (insertRespuesta.response == "SUCCESS") {
                var resLS = loginLS(
                    insertRespuesta.id,
                    insertRespuesta.nombre,
                    insertRespuesta.jerarquia
                );
                console.log(resLS);
                alert('Sesión iniciada');
                window.location= 'index.php';
            } else if (insertRespuesta.response == "ERROR1") {
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

function onLogFB() {
    console.log("Ejecutando la funcion de login con facebook");
    FB.login((response) => {
        if (response.authResponse) {
            FB.api('/me?fields=id', (response) => {
    
                $.post('develop/php/selectLoginFB.php',response,function(data){
                    var insertRespuesta = JSON.parse(data);
                    if (insertRespuesta!=null) {
                        if (insertRespuesta.response == "SUCCESS") {
                            var resLS = loginLS(
                                insertRespuesta.id,
                                insertRespuesta.nombre,
                                insertRespuesta.jerarquia
                            );
                            console.log(resLS);
                            alert('Sesión iniciada');
                            window.location= 'index.php';
                        } else if (insertRespuesta.response == "ERROR1") {
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