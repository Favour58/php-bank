 function startListen(){
     togglepassword.addEventListener("click", function(event){
          if (password.type == "password") {
               event.preventDefault();
               password.type ="text";
               eye.style.display = "none";
               eyeSlash.style.display = "block";
          }
          else{
               event.preventDefault();
               password.type ="password";
               eyeSlash.style.display = "none";
               eye.style.display = "block";
          }
     })
 }