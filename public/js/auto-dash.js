//===================================== INPUT ===========================================//
// FOR TIN
document.querySelector('#tin_no').addEventListener('input', function() {
    var number = this.value.split("-").join("");
    // THIS WILL MAKE AN AUTOMATIC DASH AFTER 3 DIGITS TYPED BY THE USER.
    // TO CONTROL THE MAX LENGTH OF THE NUMBER, I PUT 'MAXLENGTH(IT IS "15" INCLUDED THE DASH, ORIGINAL LENGTH IF BASIS ARE THE NUMBERS ONLY ARE "12" DIGITS) TO THE HTML ATTRIBUTE.
    if (number.length > 0) {
      number = number.match(new RegExp('.{1,3}', 'g')).join("-");
    }
    this.value = number;
});

// FOR PHILHEALTH
document.querySelector('#philhealth').addEventListener('input', function (dash) {
    var number = dash.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,9})(\d{0,1})/);
    // CONDITIONAL:
    // IF SECOND SECTION(NUMBER[2]) IS TRUE, AUTOMATIC DASH IS PLACING BEFORE THE START OF THE SECOND BATCH, ELSE NO DASH.
    // SAME GOES TO THE THIRD SECTION(NUMBER[3]).
    dash.target.value = + number[1]
                        + (number[2] ? `-${number[2]}` : '')
                        + (number[3] ? `-${number[3]}` : '');
});
