 // Form validation code with javascript
function validate()
{

    // check if first name is entered if not send an error message
if( document.registerForm.first.value == "" )
    {
    alert( "Vul aub je voornaam in" );
    document.registerForm.first.focus() ;
    return false;
    }
    // check if last name is entered if not send an error message
if( document.registerForm.last.value == "" )
    {
    alert( "Vul aub je achternaam in" );
    document.registerForm.last.focus() ;
    return false;
    }
    // check if email is entered if not send an error message     
var emailID = document.registerForm.EMail.value;
atpos = emailID.indexOf("@");
dotpos = emailID.lastIndexOf(".");
         
if (atpos < 1 || ( dotpos - atpos < 2 )) 
    {
        alert("Please enter correct email ID")
        document.registerForm.EMail.focus() ;
        return false;
    }
    // check if date is entered if not send an error message     
if( document.registerForm.date.value == "" )
    {
    alert( "Vul aub je geboortedatum in" );
    document.registerForm.date.focus() ;
    return false;
    }
    // check if password is entered if not send an error message     
if( document.registerForm.password.value == "" )
    {
    alert( "Vul aub een wachtwoord in" );
    document.registerForm.password.focus() ;
    return false;
    }
    return( true );
}