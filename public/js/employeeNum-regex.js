//===================================== MESSAGE ===========================================//
var errorEmployeeNo = document.querySelector('#errorEmployeeNo');
var errorEmployeeNo2 = document.querySelector('#errorEmployeeNo2');
var successEmployeeNo = document.querySelector('#successEmployeeNo');

//===================================== REGEX ============================================//
// REGEX EXPRESSION PATTERN; '\s, \d, \-, \+' FOR SPACE, DIGITS, HYPEN AND PLUS. '[-]. [/]' FOR ESCAPING OF FORWARD SLASH AND HYPEN
const regexp9 = /^[A-Z]+([-][0-9]+)+$/;

//===================================== ONKEYUP ===========================================//
// ON KEYUP METHOD FOR SPECIFIC FIELDS

employee_no.addEventListener("keyup", validateEmployeeNo);
function validateEmployeeNo() {

    // IF ELSE-IF SHORTHAND
    return employee_no.value == "" ? (errorEmployeeNo.innerText = "Employee No. is required", successEmployeeNo.innerText = "", errorEmployeeNo2.innerText = "")
        : !employee_no.value.match(regexp9) ? (errorEmployeeNo.innerText = "Only Uppercase, Hypen and Numbers Only.", successEmployeeNo.innerText = "", errorEmployeeNo2.innerText = "")
        : (successEmployeeNo.innerText = "Accepted", successEmployeeNo.style.color = "green", errorEmployeeNo.innerText = "", errorEmployeeNo2.innerText = "");
}

//===================================== KEYPRESS ===========================================//
// PREVENT SPACES
$(employee_no).keypress(function(space) {
    if (space.which == 32) {
        return false;
    }
});
