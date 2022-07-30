$(function() {
    $( "#birthday" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "mm/dd/yy",
        yearRange: '1950:+0',   //Year 1900 to Current Year.
        onSelect: function () {
            $("#birthday");
        }
    });
});

