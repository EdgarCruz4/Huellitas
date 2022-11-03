//Ambas funciones envian el dato para generar la cookie para posteriormente reedireccionar al catalogo

//Funcion para la opcion de gatos
function ctc(){    
    razaMascota("gato");
    window.location= 'catalogo.php';
}

//Funcion para la ocopion de perros
function ctd(){
    razaMascota("perro");
    window.location= 'catalogo.php';
}