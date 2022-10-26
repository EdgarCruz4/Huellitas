
function onLoginFB() {
FB.login((response) => {
    if (response.authResponse) {
        FB.api('/me?fields=id,email,first_name,last_name', (response) => {

            $.post('develop/php/addUserFB.php',response,function(data){
                if (data!=null) {
                    console.log(data);
                    if (data == "preRegistrado") {
                        alert('El usuario ya ha sido registrado');
                        window.location= 'login.php';
                    } else if (data == "registrado") {
                        alert('Usuario registrado con exito');
                        window.location= 'login.php';
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

let formulario = document.getElementById('formularioDts');
formulario.addEventListener('submit',e=>{
    e.preventDefault();
    let nom = document.getElementById('username').value;
    let ape = document.getElementById('apellido').value;
    let ema = document.getElementById('email').value;
    let pas = document.getElementById('password').value;
    let dir = document.getElementById('direccions').value;
    let num = document.getElementById('numero').value;
    let valoresAceptados = /^[0-9]+$/;
    if (num.match(valoresAceptados)){}else{
        alert("Ingrese un numero de telefono valido");
        return;
    }
    $.post('develop/php/addUsuario.php',{
        nombre:nom,
        apellido:ape,
        email:ema,
        password:pas,
        direccion:dir,
        telefono:num
    },function(data){
        if (data!=null) {
            if (data == "preRegistrado") {
                alert('El usuario ya ha sido registrado');
                window.location= 'login.php';
            } else if (data == "registrado") {
                alert('Usuario registrado con exito');
                window.location= 'login.php';
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



/*

    $.post('develop/php/addUsuario.php',{
        nombre:document.getElementById('username'),
        apellido:document.getElementById('apellido'),
        email:document.getElementById('email'),
        password:document.getElementById('password'),
        direccion:document.getElementById('direccions'),
        telefono:document.getElementById('numero')
    },function(data){
        if (data!=null) {
            console.log(data);
        }else{
            alert('Ha ocurrido un error, intetelo mas tarde');
            window.location= 'index.php';
        }
    });



$("#btnRegistrar").click(function () {
    console.log("btn click");
});

            console.log(response);
            console.log("nombre: "+response.first_name);
            var nombrefb = response.first_name;
            var apellidofb = response.last_name;
            var idfb = response.id;
            console.log(
                'nombre: '+nombrefb+
                '\napellido: '+apellidofb+
                '\nid: '+idfb
            );

            $.ajax({
                url:'develop/php/addUserFB.php',
                method:'POST',
                data:{
                    nombre:nombrefb,
                    apellido:apellidofb,
                    id:idfb
                }
            }).done(function(respuesta){
                var insertRespuesta = JSON.parse(respuesta);
                console.log("respuesta: "+insertRespuesta);
                console.log("despues de la consulta");
            });


            fetch('develop/php/addUserFB.php',{
                method:'POST',
                body:{
                    nombre:nombrefb,
                    apellido:apellidofb,
                    id:idfb
                }
            })
                .then(respuesta => respuesta.json())
                .then(data=>{
                    console.log('respueta'+data);
                }).catch(error => console.log('error'+error));
*/