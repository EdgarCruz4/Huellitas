//Este es el script de la api de facebook
//Este script es necesario para las funciones para iniciar sesion con facebook

window.fbAsyncInit = function() {
    FB.init({
        appId      : '432948705668232',
        cookie     : true,
        xfbml      : true,
        version    : 'v15.0'
    });
        
    FB.AppEvents.logPageView();   
        
};
    
(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));