const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

const validateLoginForm = () => {
    const loginEmail = document.getElementById("login-email");
    const loginPassword = document.getElementById("login-password");

    // LOGIN EMAIL VALIDATIONS
    if (loginEmail.value == "") {
        document.getElementById("login-email-alert").innerHTML =
            "**email cannot be empty";
        loginEmail.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("login-email-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (!loginEmail.value.match(mailformat)) {
        document.getElementById("login-email-alert").innerHTML =
            "**invalid email adress";
        loginEmail.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("login-email-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    // LOGIN PASSWORD VALIDATION
    if (loginPassword.value == "") {
        document.getElementById("login-password-alert").innerHTML =
            "**password cannot be empty";
        loginPassword.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("login-password-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
};

const validateSignupForm = () => {
    const firstName = document.getElementById("firstname");
    const lastName = document.getElementById("lastname");
    const rollNumber = document.getElementById("roll-number");
    const phoneNumber = document.getElementById("phone-number");
    const signupEmail = document.getElementById("signup-email");
    const adress = document.getElementById("adress");
    const city = document.getElementById("city");
    const state = document.getElementById("state");
    const pinCode = document.getElementById("pincode");
    const signupPassword = document.getElementById("signup-password");
    const confirmpassword = document.getElementById("confirm-password");

    // FIRST NAME VALIDATIONS
    if (firstName.value == "") {
        document.getElementById("firstname-alert").innerHTML =
            "**firstname cannot be empty";
        firstName.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("firstname-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (firstName.value.length <= 2 || firstName.value.length >= 15) {
        document.getElementById("firstname-alert").innerHTML =
            "**characters length must be between 3 and 15";
        firstName.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("firstname-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (!firstName.value.match(/^[a-zA-Z][a-zA-Z ]+$/)) {
        document.getElementById("firstname-alert").innerHTML =
            "**should contain only alphabets";
        firstName.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("firstname-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }

    // LAST NAME VLIDATIONS
    if (lastName.value == "") {
        document.getElementById("lastname-alert").innerHTML =
            "**lastname cannot be empty";
        lastName.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("lastname-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (lastName.value.length <= 2 || lastName.value.length >= 15) {
        document.getElementById("lastname-alert").innerHTML =
            "**characters length must be between 3 and 15";
        lastName.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("lastname-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (!lastName.value.match(/^[a-zA-Z][a-zA-Z ]+$/)) {
        document.getElementById("lastname-alert").innerHTML =
            "**should contain only alphabets";
        lastName.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("lastname-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    // ROLL NUMBER VALIDATIONSS
    const rollMatch = /^\d{3}[a-z]{2}\d{4}$/i;
    if (rollNumber.value == "") {
        document.getElementById("roll-number-alert").innerHTML =
            "**roll number cannot be empty";
        rollNumber.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("roll-number-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (!rollNumber.value.match(rollMatch)) {
        document.getElementById("roll-number-alert").innerHTML =
            "**should be of format 116ee650/716ee650";
        rollNumber.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("roll-number-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }


    // PHONE NUMBER VALIDATIONS
    if (phoneNumber.value == "") {
        document.getElementById("phone-number-alert").innerHTML =
            "**phone number cannot be empty";
        phoneNumber.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("phone-number-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (isNaN(phoneNumber.value)) {
        document.getElementById("phone-number-alert").innerHTML =
            "**should contain only numbers";
        phoneNumber.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("phone-number-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (phoneNumber.value.length != 10) {
        document.getElementById("phone-number-alert").innerHTML =
            "**should contain 10 digits";
        phoneNumber.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("phone-number-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }

    // EMAIL VALIDATIONS

    if (signupEmail.value == "") {
        document.getElementById("signup-email-alert").innerHTML =
            "**email cannot be empty";
        signupEmail.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("signup-email-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (!signupEmail.value.match(mailformat)) {
        document.getElementById("signup-email-alert").innerHTML =
            "**invalid email adress";
        signupEmail.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("signup-email-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }

    if (adress.value == "") {
        document.getElementById("adress-alert").innerHTML =
            "**adress cannot be empty";
        adress.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("adress-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (city.value == "") {
        document.getElementById("city-alert").innerHTML = "**city cannot be empty";
        city.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("city-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (state.value == "") {
        document.getElementById("state-alert").innerHTML =
            "**state cannot be empty";
        state.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("state-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }

    if (pinCode.value == "") {
        document.getElementById("pincode-alert").innerHTML =
            "**pinCode cannot be empty";
        pinCode.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("pincode-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (isNaN(pinCode.value)) {
        document.getElementById("pincode-alert").innerHTML =
            "**pinCode contains only numbers";
        pinCode.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("pincode-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }

    // SIGNUP PASSWORD VALIDATIONS
    if (signupPassword.value == "") {
        document.getElementById("signup-password-alert").innerHTML =
            "**password cannot be empty";
        signupPassword.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("signup-password-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (signupPassword.value.length < 7) {
        document.getElementById("signup-password-alert").innerHTML =
            "**password length must be atleast 6 characters";
        signupPassword.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("signup-password-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (signupPassword.value != confirmpassword.value) {
        document.getElementById("signup-confirm-password-alert").innerHTML =
            "**passwords are not matching";
        signupPassword.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("signup-password-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
    if (confirmpassword.value == "") {
        document.getElementById("signup-confirm-password-alert").innerHTML =
            "**confirmation password cannot be empty";
        signupPassword.addEventListener("click", () => {
            setInterval(() => {
                document.getElementById("signup-password-alert").innerHTML = "";
            }, 2500);
        });
        return false;
    }
};