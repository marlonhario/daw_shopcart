$(document).ready(function(){
	
    $(document).on("click","#signup_register", function (e) {
      e.preventDefault();
       $.ajax({
           url: "Controller/users/create.php",
           type: "POST",
           async: false,
           data: {
               signup_first_name: $("#signup_first_name").val(),
               signup_last_name: $("#signup_last_name").val(),
               signup_username: $("#signup_username").val(),
               signup_email: $("#signup_email").val(),
               signup_password: $("#signup_password").val(),
               signup_password_confirmation: $("#signup_password_confirmation").val(),
           },
           dataType: "JSON",
           success: function (datas) {
               if (datas['message'] !== null) {
                  if (datas['message'] === 1) {
                    window.location.replace("index.php");
                  } else {
                    $(".display_log_err").html(datas['message']);
                    $("#log_err").show().delay(3000).fadeOut();
                  }
               }
               console.log(datas['message']);
           }
       });
     });

   // login user ======================================
   $(document).on("click","#login_user", function (e) {
      e.preventDefault();
       $.ajax({
           url: "Controller/users/login.php",
           type: "POST",
           async: false,
           data: {
               login_username: $("#login_username").val(),
               login_password: $("#login_password").val(),
           },
           dataType: "JSON",
           success: function (jsonStr) {
               // $("#result").text(JSON.stringify(jsonStr));
               // var daw = JSON.stringify(jsonStr);
               if (jsonStr !== null) {
                  if (jsonStr === 1) {
                    window.location.replace("index.php");
                  } else {
                    $(".display_log_err").html(jsonStr);
                    $("#log_err").show().delay(3000).fadeOut();
                  }
               }
               
           }
       });
   }); 
});    