$(document).ready(function () {
    var personnal_card = $('.personnal-card');
    var accademy_card = $('.accademy-card');
    var caontact_card = $('.contact-card');
    var parents_card = $('.parents-card');

    var btn_contact = $('.btn-contact');
    var btn_personnal = $('.btn-personnal');
    var btn_accademy = $('.btn-accademy');
    var btn_parents = $('.btn-parents');

    $(btn_personnal).each(function () {
        $(this).on('click', function () {
            personnal_card.hide();
            $(this).caontact_card.slideToggle();
        })
    })

})