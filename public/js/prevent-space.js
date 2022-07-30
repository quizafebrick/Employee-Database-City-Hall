//===================================== KEYPRESS ===========================================//
// PREVENT SPACES
$('#birthday').keypress(function(space) {
    if (space.which == 32) {
        return false;
    }
});

$('#contact_no').keypress(function(space) {
    if (space.which == 32) {
        return false;
    }
});

$('#applicant_no').keypress(function(space) {
    if (space.which == 32) {
        return false;
    }
});

$('#gsis_no').keypress(function(space) {
    if (space.which == 32) {
        return false;
    }
});

$('#blood_type').keypress(function(space) {
    if (space.which == 32) {
        return false;
    }
});
