window.onload=function() {
    // Obtine el dato para sabere si se mostran perros o gatos
    let raza = localStorage.getItem("valRz");
    // Muestra el encabezado del documento dependindo si se van a mostrar gatos o perros 
    let encabzd = document.getElementById("encbz");
    if (raza == "gato") {
        encabzd.innerHTML="CONOCE A NUESTROS GATITOS";
    } else {
        encabzd.innerHTML="CONOCE A NUESTROS PERRITOS";
    }
    //Obtine el elemento del documento que mostrará a las mascotas
    let divCont = document.getElementById("divContainer");
    //Los datos son enviados a develop/php/selectCatalogo.php para ser procesados 
    $.post('develop/php/selectCatalogo.php',{
        especie:raza
    },function(data){
        //Aqui se obtiene la respuesta 
        var insertRespuesta = JSON.parse(data);
        if (insertRespuesta!=null) {
            //Si se obtuvieron los datos correctos serán mostrados en pantalla
            if (insertRespuesta.response == "OK") {
                let array = insertRespuesta.detail;
                array.forEach(row1 => {
                    let div0 = document.createElement("div");
                    row1.forEach(row2 => {
                        div0.innerHTML=`
                        <div>
                            <img class="img" src=${row2.foto} class="img-fluid" alt="">
                        </div>
                        <p class="text"> ${row2.nombre} </p>
                    
                        <input type="checkbox" id="btn-modal${row2.idMascota}">
                        <label for="btn-modal${row2.idMascota}" class="lbl-modal${row2.idMascota}">Leer más</label>
                        <div class="modal${row2.idMascota}">
                            <div class="contenedor${row2.idMascota}">
                                <header>Datos de la mascota</header>
                                <label for="btn-modal${row2.idMascota}">X</label>
                                <div class="contenido${row2.idMascota}">
                                    <p>
                                        Nombre de la mascota:<strong>${" "+row2.nombre}</strong>
                                        </br>Edad:<strong>${" "+row2.edad+" años"}</strong>
                                        </br>Peso:<strong>${" "+row2.peso+" Kg"}</strong>
                                        </br>Color:<strong>${" "+row2.color}</strong>
                                        </br>Raza:<strong>${" "+row2.raza}</strong>
                                        </br>Sexo:<strong>${" "+row2.sexo}</strong>
                                    </p></br>
                    
                                    <form >
                                        <input  type="button" value="Adoptar" onclick="confirmar(${row2.idMascota});">
                                    </form>
                    
                                </div>
                            </div>
                        </div>
                        `;
                        //Por cada mascota es necesario crearle una guia de estilo particular para que cada ventana modal reaccione de manera independiente
                        var nuevaHojaDeEstilo = document.createElement("style");
                        document.head.appendChild(nuevaHojaDeEstilo);
                        nuevaHojaDeEstilo.textContent = `

                        main .modal${row2.idMascota}{
                            width: 100%;
                            height: 100vh;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        }

                        .modal${row2.idMascota}{
                            position: fixed;
                            top: 0;
                            left: 0;
                            background: rgba(0, 0, 0, 0.5);
                            transition: all 500ms ease;
                            opacity: 0;
                            visibility: hidden;
                          }
                        
                          #btn-modal${row2.idMascota}:checked ~ .modal${row2.idMascota}{
                            opacity: 1;
                            visibility: visible;
                          }
                        
                          .contenedor${row2.idMascota}{
                            width: 400px;
                            height: 300px;
                            margin: auto;
                            background: #ffffff;
                            box-shadow: 1px 7px 25px rgba(0,0,0,0.6);
                            transition: all 500ms ease;
                            position: relative;
                            transform: translateY(-30%);
                          }
                        
                          #btn-modal${row2.idMascota}:checked ~ .modal${row2.idMascota} .contenedor${row2.idMascota}{
                            transform: translateY(0%);
                          }
                        
                          .contenedor${row2.idMascota} header{
                            padding: 10px;
                            background: #033B61;
                            color: #ffffff;
                            font-family: Candara;
                          }
                        
                          .contenedor${row2.idMascota} label{
                            position: absolute;
                            top: 10px;
                            right: 10px;
                            color: rgb(255, 255, 255);
                            font-size: 15px;
                            cursor: pointer;
                          }
                        
                          .contenido${row2.idMascota}{
                            width: 100%;
                            padding: 10px;
                            font-family: Cambria; 
                        }
                        .contenido${row2.idMascota} h3{
                            margin-bottom: 10px;
                        }
                        .contenido${row2.idMascota} p{
                            margin-bottom: 7px;
                        }
                        
                          #btn-modal${row2.idMascota}{
                            display: none;
                          }
                        
                          .lbl-modal${row2.idMascota}{
                            background: #ffffff;
                            padding: 10px 15px;
                            border-radius: 4px;
                            cursor: pointer;
                            display: flex;
                            justify-content: center;
                          }
                        
                          .button${row2.idMascota}{
                            background: #0785DB;
                            color: #ffffff;
                            padding: 10px 25px;
                            width: fit-content;
                            margin: 0 auto;
                            border-radius: 50px;
                            font-family: Arial;
                          }
                        


                        `;
                    });
                    divCont.appendChild(div0);
                });
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
}


function confirmar(idM){
    //Se verifica si la sesion se ha iniciado
    if (localStorage.getItem("id")) {
            //Se confirma si decea continuar con el proceso
        if (confirm("Favor de confirmar adopción")) {
            //si sí se hace la adopcion
            let idU = localStorage.getItem("id");
            adoptar(idM,idU);
        } else {
            window.location.reload();
        }
    }else{
        //si no se reedirecciona a la pantalla de login.php
        alert("Es necesario inciar sesión para continuar con el proceso");
        window.location= 'login.php';
    }
}

function adoptar(idMascota,idUsuario) {
        //Los datos son enviados a develop/php/addAdopciones.php para ser procesados 
        $.post('develop/php/addAdopciones.php',{
            id_mascota:idMascota,
            id_usuario:idUsuario
        },function(data){
            if (data!=null) {
                //Aqui se obtiene la respuesta 
                var insertRespuesta = JSON.parse(data);
                //Si el proceso fue un exito los datos obtenidos son enviados a la funcion de loginLS(id,nom,jer) en cookies.js
                if (insertRespuesta.response == "SUCCESS") {
                    window.location= 'adopcion.php'; 
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
}