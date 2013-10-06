$ = jQuery.noConflict();
$(document).ready(function() {
    $(".cep").mask("99.999-999");
    $(".cep-little").mask("99.999-999");
    $(".cpf").mask("999.999.999-99");
    $(".telefone").mask("(999) 9999-9999");
});