var SweetCakes = {
    ready : (function($){
        $('.site-navigation .navigation li').hover(function() {
            $(this).find('ul').show();
        },
        function() {
          $(this).find('ul').hide();
        });
    })
};

$(document).ready(function(){
    SweetCakes.ready();
});