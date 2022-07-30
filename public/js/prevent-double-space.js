//===================================== KEYUP ===========================================//
// PREVENT DOUBLE SPACES FOR EACH WORD/NAME
// AND REGEX WHEN TYPING(ONLY ALLOWED WHEN DOING)
$('#employee_no').keyup(function() {
    var input = $(this);
    input.val(input.val().replace(/(\s{2,})|[^a-zA-Z0-9\-]/g, ' '));
    input.val(input.val().replace(/^\s*/, ''));
});

$('#firstname').keyup(function() {
    var input = $(this);
    input.val(input.val().replace(/(\s{2,})|[^a-zA-Z]/g, ' '));
    input.val(input.val().replace(/^\s*/, ''));
});

$('#middlename').keyup(function() {
    var input = $(this);
    input.val(input.val().replace(/(\s{2,})|[^a-zA-Z]/g, ' '));
    input.val(input.val().replace(/^\s*/, ''));
});

$('#lastname').keyup(function() {
    var input = $(this);
    input.val(input.val().replace(/(\s{2,})|[^a-zA-Z]/g, ' '));
    input.val(input.val().replace(/^\s*/, ''));
});


$('#home_address').keyup(function() {
    var input = $(this);
    input.val(input.val().replace(/(\s{2,})|[^0-9a-zA-Z\-\.\,']/g, ' '));
    input.val(input.val().replace(/^\s*/, ''));
});

$('#contact_address').keyup(function() {
    var input = $(this);
    input.val(input.val().replace(/(\s{2,})|[^0-9a-zA-Z\-\.\,']/g, ' '));
    input.val(input.val().replace(/^\s*/, ''));
});

$('#contact_person').keyup(function() {
    var input = $(this);
    input.val(input.val().replace(/(\s{2,})|[^a-zA-Z]/g, ' '));
    input.val(input.val().replace(/^\s*/, ''));
});

$('#position').keyup(function() {
    var input = $(this);
    input.val(input.val().replace(/(\s{2,})|[^a-zA-Z']/g, ' '));
    input.val(input.val().replace(/^\s*/, ''));
});

$('#division').keyup(function() {
    var input = $(this);
    input.val(input.val().replace(/(\s{2,})|[^a-zA-Z']/g, ' '));
    input.val(input.val().replace(/^\s*/, ''));
});
