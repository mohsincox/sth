/*!

 * Custom javascript file
 * @author: Ashaduzzaman, ashad@myolbd.com
**/
var APP_URL = window.location.pathname;

if(APP_URL != '/account'){
    localStorage.removeItem("activeTab");
}

    var url = window.location;
    $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
    $('ul.nav a').filter(function() {
         return this.href == url;
    }).parent().addClass('active');
