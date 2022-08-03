// * THE EMPLOYEE NO. FIELD IS ONLY FOR ADMIN & SUPERADMIN ONLY, THAT'S WHY IT IS SEPARATED TO AVOID ANY ERRORS. *

//===================================== MESSAGE ===========================================//
// FIRST CONTAINER
// 1ST SECTION
var errorFirstName = document.querySelector('#errorFirstName');
var errorFirstName2 = document.querySelector('#errorFirstName2');
var successFirstName = document.querySelector('#successFirstName');
var errorMiddleName2 = document.querySelector('#errorMiddleName2');
var errorLastName = document.querySelector('#errorLastName');
var errorLastName2 = document.querySelector('#errorLastName2');
var successLastName = document.querySelector('#successLastName');
var errorMiddleName = document.querySelector('#errorMiddleName');
var successMiddleName = document.querySelector('#successMiddleName');

// 2ND SECTION
var errorHomeAddress = document.querySelector('#errorHomeAddress');
var errorHomeAddress2 = document.querySelector('#errorHomeAddress2');
var successHomeAddress = document.querySelector('#successHomeAddress');
var errorBirthday = document.querySelector('#errorBirthday');
var errorBirthday2 = document.querySelector('#errorBirthday2');
var successBirthday = document.querySelector('#successBirthday');

// 3RD SECTION
var errorContactPerson = document.querySelector('#errorContactPerson');
var errorContactPerson2 = document.querySelector('#errorContactPerson2');
var successContactPerson = document.querySelector('#successContactPerson');
var errorContactAddress = document.querySelector('#errorContactAddress');
var errorContactAddress2 = document.querySelector('#errorContactAddress2');
var successContactAddress = document.querySelector('#successContactAddress');
var errorContactNumber = document.querySelector('#errorContactNumber');
var errorContactNumber2 = document.querySelector('#errorContactNumber2');
var successContactNumber = document.querySelector('#successContactNumber');

// SECOND CONTAINER
// 1ST SECTION
var errorApplicantNumber = document.querySelector('#errorApplicantNumber');
var errorApplicantNumber2 = document.querySelector('#errorApplicantNumber2');
var successApplicantNumber = document.querySelector('#successApplicantNumber');
var errorPosition = document.querySelector('#errorPosition');
var errorPosition2 = document.querySelector('#errorPosition2');
var successPosition = document.querySelector('#successPosition');
var errorOffice = document.querySelector('#errorOffice');
var errorOffice2 = document.querySelector('#errorOffice2');
var successOffice = document.querySelector('#successOffice');

// 2ND SECTION
var errorDivision = document.querySelector('#errorDivision');
var errorDivision2 = document.querySelector('#errorDivision2');
var successDivision = document.querySelector('#successDivision');
var errorGSIS = document.querySelector('#errorGSIS');
var errorGSIS2 = document.querySelector('#errorGSIS2');
var successGSIS = document.querySelector('#successGSIS');
var errorTIN = document.querySelector('#errorTinNum');
var errorTIN2 = document.querySelector('#errorTinNum2');
var successTIN = document.querySelector('#sucessTinNum');

// 3RD SECTION
var errorPH = document.querySelector('#errorPH');
var errorPH2 = document.querySelector('#errorPH2');
var successPH = document.querySelector('#successPH');
var errorBT = document.querySelector('#errorBT');
var errorBT2 = document.querySelector('#errorBT2');
var successBT = document.querySelector('#successBT');
var errorDO = document.querySelector('#errorDO');
var errorDO2 = document.querySelector('#errorDO2');
var successDO = document.querySelector('#successDO');

//===================================== LABEL ============================================//
// MIDDLE NAME LABEL (OPTIONAL)
var middleLabel = document.querySelector('#middleLabel');
var birthdayLabel = document.querySelector('#birthdayLabel');
var phLabel = document.querySelector('#phLabel');
var bloodTypeLabel = document.querySelector('#bloodTypeLabel');
var tinLabel = document.querySelector('#tinLabel');

//===================================== FIELDS ============================================//
// FIRST CONTAINER
// 1ST SECTION
var firstName = document.querySelector('#firstname');
var middleName = document.querySelector('#middlename');
var lastName = document.querySelector('#lastname');

// 2ND SECTION
var homeAddress = document.querySelector('#home_address');
var birthday = document.querySelector('#birthday');

// 3RD SECRTION
var contactPerson = document.querySelector('#contact_person');
var contactAddress = document.querySelector('#contact_address');
var contactNumber = document.querySelector('#contact_no');

// SECOND CONTAINER
// 1ST SECTION
var applicantNumber = document.querySelector('#applicant_no');
var position = document.querySelector('#position');
var office = document.querySelector('#office');

// 2ND SECTION
var division = document.querySelector('#division');
var gsisNum = document.querySelector('#gsis_no');
var tinNum = document.querySelector('#tin_no');

// 3RD SECTION
var philhealth = document.querySelector('#philhealth');
var bloodType = document.querySelector('#blood_type');
var detailedOffice = document.querySelector('#detailed_office');

//===================================== REGEX ============================================//
// REGEX EXPRESSION PATTERN; '\s, \d, \-, \+' FOR SPACE, DIGITS, HYPEN AND PLUS. '[-]. [/]' FOR ESCAPING OF FORWARD SLASH AND HYPEN
const regexp = /^[A-Za-z\s]{2,16}$/;
const regexp2 = /^[0-9A-Za-z\s\-\.\,']+$/;
const regexp3 = /^(\d{2})[/](\d{2})[/](\d{4})$/;
const regexp4 = /^[0-9]{11}$/;
const regexp5 = /^(\d{3})[-](\d{3})[-](\d{3})[-](\d{3})$/;
const regexp6 = /^(\d{2})[-](\d{9})[-](\d{1})$/;
const regexp7 = /^[A, B, O,\-\+]+$/gm;
const regexp8 = /^[0-9]$/;
//===================================== ONKEYUP ===========================================//
// ON KEYUP METHOD FOR SPECIFIC FIELDS

// FIRST CONTAINER
firstName.addEventListener("keyup", validateFirstName);
function validateFirstName() {

    // IF ELSE-IF SHORTHAND
    return firstName.value == "" ? (errorFirstName.innerText = "First Name is required", successFirstName.innerText = "", errorFirstName2.innerText = "")
        : !firstName.value.match(regexp) ? (errorFirstName.innerText = "Only Alphabets: Min:2", successFirstName.innerText = "")
        : (successFirstName.innerText = "Accepted", successFirstName.style.color = "green", errorFirstName.innerText = "", errorFirstName2.innerText = "");
}

middleName.addEventListener("keyup", validateMiddleName);
function validateMiddleName() {

    // IF ELSE-IF SHORTHAND
    return middleName.value == "" ? (errorMiddleName.innerText = "(Optional)", successMiddleName.innerText = "", middleLabel.innerText = "", errorMiddleName2.innerText = "" )
        : !middleName.value.match(regexp) ? (errorMiddleName.innerText = "Only Alphabets: Min:2", successMiddleName.innerText = "", middleLabel.innerText = "", errorMiddleName2.innerText = "")
        : (successMiddleName.innerText = "Accepted", successMiddleName.style.color = "green", errorMiddleName.innerText = "", middleLabel.innerText = "", errorMiddleName2.innerText = "");
}

lastName.addEventListener("keyup", validateLastName);
function validateLastName() {

    // IF ELSE-IF SHORTHAND
    return lastName.value == "" ? (errorLastName.innerText = "Last Name is required", successLastName.innerText = "", errorLastName2.innerText = "")
        : !lastName.value.match(regexp) ? (errorLastName.innerText = "Only Alphabets: Min:2", successLastName.innerText = "")
        : (successLastName.innerText = "Accepted", successLastName.style.color = "green", errorLastName.innerText = "", errorLastName2.innerText = "");
}

birthday.addEventListener("keyup", validateBirthday);
function validateBirthday() {

    // IF ELSE-IF SHORTHAND
    return birthday.value == "" ? (errorBirthday.innerText = "Birthday is required", successBirthday.innerText = "", errorBirthday2.innerText = "")
        : !birthday.value.match(regexp3) ? (errorBirthday.innerText = "The format of birthday is 'mm/dd/yyyy'", successBirthday.innerText = "")
        : (successBirthday.innerText = "Accepted", successBirthday.style.color = "green", errorBirthday.innerText = "", errorBirthday2.innerText = "");
}

homeAddress.addEventListener("keyup", validateHomeAddress);
function validateHomeAddress() {

    // IF ELSE-IF SHORTHAND
    return homeAddress.value == "" ? (errorHomeAddress.innerText = "Home Address is required", successHomeAddress.innerText = "", errorHomeAddress2.innerText = "")
        : !homeAddress.value.match(regexp2) ? (errorHomeAddress.innerText = "Only Alphabets, Numbers, -, ., are accepted", successHomeAddress.innerText = "")
        : (successHomeAddress.innerText = "Accepted", successHomeAddress.style.color = "green", errorHomeAddress.innerText = "", errorHomeAddress2.innerText = "");
}

contactPerson.addEventListener("keyup", validateContactPerson);
function validateContactPerson() {

    // IF ELSE-IF SHORTHAND
    return contactPerson.value == "" ? (errorContactPerson.innerText = "Contact Person is required", successContactPerson.innerText = "", errorContactPerson2.innerText = "")
        : !contactPerson.value.match(regexp2) ? (errorContactPerson.innerText = "Only Alphabets: Min:2 & Max: 16", successContactPerson.innerText = "", errorContactPerson2.innerText = "")
        : (successContactPerson.innerText = "Accepted", successContactPerson.style.color = "green", errorContactPerson.innerText = "", errorContactPerson2.innerText = "");
}

contactAddress.addEventListener("keyup", validateContactAddress);
function validateContactAddress() {

    // IF ELSE-IF SHORTHAND
    return contactAddress.value == "" ? (errorContactAddress.innerText = "Contact's Address is required", successContactAddress.innerText = "", errorContactAddress2.innerText = "")
        : !contactAddress.value.match(regexp2) ? (errorContactAddress.innerText = "Only Alphabets will be accepted", successContactAddress.innerText = "", errorContactAddress2.innerText = "")
        : (successContactAddress.innerText = "Accepted", successContactAddress.style.color = "green", errorContactAddress.innerText = "", errorContactAddress2.innerText = "");
}

contactNumber.addEventListener("keyup", validateContactNumber);
function validateContactNumber() {

    // IF ELSE-IF SHORTHAND
    return contactNumber.value == "" ? (errorContactNumber.innerText = "Contact Number is required", successContactNumber.innerText = "", errorContactNumber2.innerText = "")
        : !contactNumber.value.match(regexp4) ? (errorContactNumber.innerText = "Only numbers with max. of 11 digits", successContactNumber.innerText = "", errorContactNumber2.innerText = "")
        : (successContactNumber.innerText = "Accepted", successContactNumber.style.color = "green", errorContactNumber.innerText = "", errorContactNumber2.innerText = "");
}

// SECOND CONTAINER
// 1ST SECTION
applicantNumber.addEventListener("keyup", validateApplicantNumber);
function validateApplicantNumber() {

    // IF ELSE-IF SHORTHAND
    return applicantNumber.value == "" ? (errorApplicantNumber.innerText = "Applicant Mobile Number is required", successApplicantNumber.innerText = "", errorApplicantNumber2.innerText = "")
        : !applicantNumber.value.match(regexp4) ? (errorApplicantNumber.innerText = "Only numbers with max. of 11 digits", successApplicantNumber.innerText = "", errorApplicantNumber2.innerText = "")
        : (successApplicantNumber.innerText = "Accepted", successApplicantNumber.style.color = "green", errorApplicantNumber.innerText = "", errorApplicantNumber2.innerText = "");
}

position.addEventListener("keyup", validatePosition);
function validatePosition() {

    // IF ELSE-IF SHORTHAND
    return position.value == "" ? (errorPosition.innerText = "Position is required", successPosition.innerText = "", errorPosition2.innerText = "")
        : !position.value.match(regexp2) ? (errorPosition.innerText = "Only Alphabets will be accepted", successPosition.innerText = "", errorPosition2.innerText = "")
        : (successPosition.innerText = "Accepted", successPosition.style.color = "green", errorPosition.innerText = "", errorPosition2.innerText = "");
}

// 2ND SECTION

division.addEventListener("keyup", validateDivision);
function validateDivision() {

    // IF ELSE-IF SHORTHAND
    return division.value == "" ? (errorDivision.innerText = "Division is required", successDivision.innerText = "", errorDivision2.innerText = "")
        : !division.value.match(regexp2) ? (errorDivision.innerText = "Only Alphabets will be accepted", successDivision.innerText = "", errorDivision2.innerText = "")
        : (successDivision.innerText = "Accepted", successDivision.style.color = "green", errorDivision.innerText = "", errorDivision2.innerText = "");
}

gsisNum.addEventListener("keyup", validateGSIS);
function validateGSIS() {

    // IF ELSE-IF SHORTHAND
    return gsisNum.value == "" ? (errorGSIS.innerText = "GSIS No. is required", successGSIS.innerText = "", errorGSIS2.innerText = "")
        : !gsisNum.value.match(regexp8) ? (errorGSIS.innerText = "Only Numbers with max. of 12 digits", successGSIS.innerText = "", errorGSIS2.innerText = "")
        : (successGSIS.innerText = "Accepted", successGSIS.style.color = "green", errorGSIS.innerText = "", errorGSIS2.innerText = "");
}

tinNum.addEventListener("keyup", validateTIN);
function validateTIN() {

    // IF ELSE-IF SHORTHAND
    return tinNum.value == "" ? (errorTIN.innerText = "TIN. is required | Format: 000-000-000-000", successTIN.innerText = "", tinLabel.innerText = "", errorTIN2.innerText ="")
        : !tinNum.value.match(regexp5) ? (errorTIN.innerText = "Only Numbers with max. of 12 digits", successTIN.innerText = "", tinLabel.innerText = "", errorTIN2.innerText ="")
        : (successTIN.innerText = "Accepted", successTIN.style.color = "green", errorTIN.innerText = "", tinLabel.innerText = "", errorTIN2.innerText ="");
}

// 3RD SECTION

philhealth.addEventListener("keyup", validatePH);
function validatePH() {

    // IF ELSE-IF SHORTHAND
    return philhealth.value == "" ? (errorPH.innerText = "Philhealth No. is required | Format: 00-000000000-0", successPH.innerText = "", phLabel.innerText ="", errorPH2.innerText = "")
        : !philhealth.value.match(regexp6) ? (errorPH.innerText = "Only Numbers with max. of 12 digits and '-'", successPH.innerText = "", phLabel.innerText ="", errorPH2.innerText = "")
        : (successPH.innerText = "Accepted", successPH.style.color = "green", errorPH.innerText = "", phLabel.innerText ="", errorPH2.innerText = "");
}

bloodType.addEventListener("keyup", validateBT);
function validateBT() {

    // IF ELSE-IF SHORTHAND
    return !bloodType.value.match(regexp7) ? (errorBT.innerText = "Only 'A, A+, A-, B, B+, B-, O, O+, O-, AB, AB+, AB' are acceptable", successBT.innerText = "", bloodTypeLabel.innerText = "", errorBT2.innerText = "")
        : (successBT.innerText = "Accepted", successBT.style.color = "green", errorBT.innerText = "", bloodTypeLabel.innerText = "", errorBT2.innerText = "");
}
