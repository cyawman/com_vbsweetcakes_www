var SweetCakes = (function($){
    
    var bootstrap = function(){
        $('.thumbnail-popup-trigger').on('click', handleThumbnailPopup);
        $("#homepage-carousel").carousel({
            interval: 3000
        });
    }
    
    var handleThumbnailPopup = function(event){
        event.preventDefault();
        var $target = $(event.target);
        $('#thumbnail-popup .modal-body img').remove();
        $('#thumbnail-popup .modal-title').text($target.attr('alt'));
        $('#thumbnail-popup .modal-body').append($('<img src="'+$target.data('fullimage')+'" class="img-responsive"></img>'));
        $('#thumbnail-popup').modal();
    }
    
    return {
        ready : (function($){
            bootstrap();
        })
    }
    
})(jQuery);

$(document).ready(function(){
    SweetCakes.ready();
});