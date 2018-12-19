$(document).ready( function() {

    $('body').toggleClass('nojs js');

    $('.basicauth-password').on('blur keyup change', function() {
        $(this).next('.basicauth-label').toggleClass('js-filled', $(this).val().length > 0);
    });

});

$(window).on('load', function() {
    $('.basicauth').addClass('js-basicauth-ready');
});