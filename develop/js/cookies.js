function loginLS(id,nom,jer){
    localStorage.setItem("id",id);
    localStorage.setItem("nombre",nom);
    localStorage.setItem("jerarquia",jer);
    return "Items creados correctamente\n"+localStorage.getItem("id")+"\n"+localStorage.getItem("nombre")+"\n"+localStorage.getItem("jerarquia");
}