function validatePropertyForm (form) {
    var address = form['Property_Address'].value;
    var description = form['Property_Description'].value;
    var rent = form['Property_Rent'].value;
    var bedrooms = form['Property_NoOfRooms'].value;
    
    var spanElements = document.getElementsByClassName("error");
    for (var i = 0; i !== spanElements.lenght; i++) {
        spanElements[i].innerHTML = "";
    }
    var errors = new Object();
    
    if (address === "") {
        errors["address"] = "Address cannot be empty\n";
    }
    if (description === "") {
        errors["description"] = "Description cannot be empty\n";
    }
    if (rent === "") {
        errors["rent"] = "Rent cannot be empty\n";
    }
    if (bedrooms === "") {
        errors["bedrooms"] = "Bedrooms cannot be empty\n";
    }
    
    
    var valid = true;
    for (var index in errors) {
        valid = false;
        var errorMessage = errors[index];
        var spanElement = document.getElementById(index + "Error");
        spanElement.innerHTML = errorMessage;
    }
    if (errorMEssage !=="") {
        alert("Error:\n" + errorMessage);
    }
    return valid;
}
