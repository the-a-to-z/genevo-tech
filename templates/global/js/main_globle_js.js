/*$(window).on('resize', function() {
 $('#width').text($(window).width());
 });
 $(document).ready(function() {
 $(window).trigger('resize');
 })*/  // This is use to know how size of screen 

// Date Picker
$(document).ready(function() {
    $('#datepicker').on('click', function() {
        var $datepicker = $("#datepicker");
        $datepicker.datepicker();
        $datepicker.datepicker('setDate', new Date());

    });


});

