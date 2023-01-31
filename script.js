
//for signup (login.php)

document.querySelector('.img__btn').addEventListener('click', function()
{
  document.querySelector('.cont').classList.toggle('s--signup');
});


var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
