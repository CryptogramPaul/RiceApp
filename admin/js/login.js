$(document).ready(function (data) {
    $("#FormLogin").on("submit", function (e) {
      e.preventDefault();
      UserLogin();
    });
  });

function UserLogin() {
    const username = $("#username").val();
    const password = $("#password").val();
    // btnSpinner(true, 'loginBtn', 'Please Wait...');
    $.post(
      "actions/login-action.php",
      {
        username: username,
        password: password,
      },
      function (data) {
        if (jQuery.trim(data) == "success") {
          alert("Login Successfully");
          window.location.href = "index.php";
        } else {
        //   toastAlert("warning", data);
          alert(data);
        }
  
        // btnSpinner(false, 'loginBtn', 'Sign In');
      }
    );
  }
  