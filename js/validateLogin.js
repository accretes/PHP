function validateLogin () {
                var isValid = true;
            if ( document.loginform.username =="" ) {
                alert ("Please type your Username");
                isValid = false;
            } else if (document.loginform.password.value == "" ) {
                alert ("Please type your password");
                isValid = false;
            }
            return isValid;
            }