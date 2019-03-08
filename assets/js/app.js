import $ from 'jquery';
import "../css/estilo.css";
import "../css/style.scss";
/*import greet from './greet';*/


import 'admin-lte';

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();

});

$(document).ready(function () {

    $('.sidebar-toggle').pushMenu(options);

});


 /*$(document).ready(function() {
         $('body').prepend('<h1>'+greet('jill')+'</h1>');
     });*/