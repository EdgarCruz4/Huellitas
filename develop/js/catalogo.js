window.onload=function() {
    let raza = localStorage.getItem("valRz");
    console.log(raza);
    let encabzd = document.getElementById("encbz");
    if (raza == "gato") {
        encabzd.innerHTML="CONOCE A NUESTROS GATITOS";
    } else {
        encabzd.innerHTML="CONOCE A NUESTROS PERRITOS";
    }

    let divCont = document.getElementById("divContainer");
    
    $.post('develop/php/selectCatalogo.php',{
        especie:raza
    },function(data){
        //Aqui se obtiene la respuesta 
        var insertRespuesta = JSON.parse(data);
        if (insertRespuesta!=null) {
            console.log(insertRespuesta);
            if (insertRespuesta.response == "OK") {
                console.log(insertRespuesta.detail);
                let array = insertRespuesta.detail;
                array.forEach(row1 => {
                    console.log(row1);
                    let div0 = document.createElement("div");
                    row1.forEach(row2 => {
                        console.log(row2.nombre);
                        div0.innerHTML=`
                        <div>
                            <img class="img" src=${row2.foto} class="img-fluid" alt="">
                        </div>
                        <p class="text"> ${row2.nombre} </p>
                    
                        <input type="checkbox" id="btn-modal">
                        <label for="btn-modal" class="lbl-modal">Leer más</label>
                        <div class="modal">
                            <div class="contenedor">
                                <header>Datos de la mascota</header>
                                <label for="btn-modal">X</label>
                                <div class="contenido">
                                    <p>
                                        Nombre de la mascota:<strong>${" "+row2.nombre}</strong>
                                        </br>Edad:<strong>${" "+row2.edad}</strong>
                                        </br>Peso:<strong>${" "+row2.peso+" Kg"}</strong>
                                        </br>Color:<strong>${" "+row2.color}</strong>
                                        </br>Raza:<strong>${" "+row2.raza}</strong>
                                        </br>Sexo:<strong>${" "+row2.sexo}</strong>
                                    </p></br>
                    
                                    <form >
                                        <input  type="button" value="Adoptar" onclick="confirmar();">
                                    </form>
                    
                                </div>
                            </div>
                        </div>
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


function confirmar(){
    console.log("se hizo click en el btn adoptar");
}


