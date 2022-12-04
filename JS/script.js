/* Course name: Web Programming (CST_8285_312)
 Assignment 2
Student: Banumajan Mohammad */

// Regular expression for email validation
let Regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


let email       = document.getElementById("email");
let login       = document.getElementById("login");
let password   = document.getElementById("pass");
let firstname   = document.getElementById("firstname");
let lastname   = document.getElementById("lastname");
let phone   = document.getElementById("phone");
let role   = document.getElementById("role");

var lowerCaseLetters = /[a-z]/g;
var upperCaseLetters = /[A-Z]/g;
var phoneno =/^\d{3}-\d{3}-\d{4}$/;

//validate the user data on registration form
function validate(){          
    validationStatus =true;
    console.log(email.value==''? "Email blank":email.value);
    console.log(firstname.value==''? "firstname blank":firstname.value);   
    
    // Login name validation
    if ((login.value.length >20) || (login.value.length==0)){                
        login.style.borderColor="red";
        login.style.borderWidth = "2px 2px 2px 2px";        
        
        loginErr.style.color ="red"  ;   
        loginErr.textContent= "X User name should be non-empty, and within 20 characters long";
    
        validationStatus =false;       
    }
    else {
        login.style.borderColor='';
        loginErr.textContent = '';
        login.value =login.value.toLowerCase(); 
    } 

    //password validation
    if ((password.value.length <6 ) || (!password.value.match(upperCaseLetters)) || (!password.value.match(lowerCaseLetters))){                
        password.style.borderColor="red";
        password.style.borderWidth = "2px 2px 2px 2px";        
        
        pass1Err.style.color ="red"  ;   
        pass1Err.textContent= "X Password should be at least 6 characters: 1 uppercase, 1 lower case";  
        validationStatus =false;
    }
    else {
        password.style.borderColor='';
        pass1Err.textContent = '';
    } 

    // Firstname validation
    if (firstname.value.length==0) {                
        firstname.style.borderColor="red";
        firstname.style.borderWidth = "2px 2px 2px 2px";        
        
        firstErr.style.color ="red"  ;   
        firstErr.textContent= "X First name cannot be blank";  
        validationStatus =false;
    }
    else {
        firstname.style.borderColor='';
        firstErr.textContent = '';
    } 

    // Lastname validation
    if (lastname.value.length==0) {                
        lastname.style.borderColor="red";
        lastname.style.borderWidth = "2px 2px 2px 2px";        
        
        lastErr.style.color ="red"  ;   
        lastErr.textContent= "X Last name cannot be blank";  
        validationStatus =false;
    }
    else {
        lastname.style.borderColor='';
        lastErr.textContent = '';
    } 

    // Email valiation
    if (!Regex.test(email.value)){  
        email.style.borderColor="red";
        email.style.borderWidth = "2px 2px 2px 2px";

        emailErr.style.color = 'red';
        emailErr.textContent = 'X Email address should be non-empty with the format abc@abc.abc';
        validationStatus =false;
    }
    else {
        email.style.borderColor='';
        emailErr.textContent = '';
    }

    // Phone validation
    if (!phoneno.test(phone.value)){  
        phone.style.borderColor="red";
        phone.style.borderWidth = "2px 2px 2px 2px";

        phoneErr.style.color = 'red';
        phoneErr.textContent = 'X Phone number should be non-empty with the format xxx-xxx-xxxx';
        validationStatus =false;
    }
    else {
        phone.style.borderColor='';
        phoneErr.textContent = '';
    }
   
    console.log("validationStatus: "+ validationStatus);
    return validationStatus ; 
};

//validate login details before sending to the server
function validateLogin() {
    validateloginStatus =true;   
    let username       = document.getElementById("uname");
    let password       = document.getElementById("psw");

    // Login name validation
    if ((username.value.length== 0)){                
        username.style.borderColor="red";
        username.style.borderWidth = "2px 2px 2px 2px";        
        
        loginErr.style.color ="red"  ;   
        loginErr.textContent= "X User name is required! ";

        validateloginStatus =false;       
    }
    else {
        username.style.borderColor='';
        loginErr.textContent = '';         
    } 

    //password validation
    if (password.value.length ==0){                
        password.style.borderColor="red";
        password.style.borderWidth = "2px 2px 2px 2px";        
        
        pass1Err.style.color ="red"  ;   
        pass1Err.textContent= "X Password is required! ";  
        validateloginStatus =false;
    }
    else {
        password.style.borderColor='';
        pass1Err.textContent = '';
    } 
    return validateloginStatus ; 

}