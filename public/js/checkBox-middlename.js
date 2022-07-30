//================================== CHECKBOX AUTO-DASH ===================================//
var checkBox = document.getElementById('checkBoxMiddlename');
var inputMiddleName = document.getElementById('middlename');

//===================================== ONCLICK ===========================================//
checkBox.addEventListener("click", checkedAutoDashMiddleName);

function checkedAutoDashMiddleName() {
    // IF NOT CHECKED, RETURN NULL
    // RETURN EMDASH VALUE(TO SEE, GO TO CHECKBOX & FIND VALUE)
    return !checkBox.checked
        ? inputMiddleName.value = " "
        : inputMiddleName.value = checkBox.value;
}
