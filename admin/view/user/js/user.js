$(document).ready(function () {
    UserDetails();
  
    $("#FormUser").on("submit", function (e) {
      e.preventDefault();
  
      if ($("#UserOffCanvas").attr("operation") == 0) {
        SaveUser();
      } else {
        const id = $("#UserOffCanvas").attr("user_id");
        UpdateUser(id);
      }
    });
  
  });
  function UserDetails() {
    $.post(
      "view/user/components/user-details.php",
      {},
      function (data) {
        $("#LoadUserDetails").html(data);
      }
    );
  }
  function UserRegistry(operation, id) {
    $.post(
      "view/user/components/user-entry.php",
      {
        id: id,
        operation: operation,
      },
      function (data) {
        $("#UserEntry").html(data);
      }
    );
  }
  function DeleteUser(id) {
    $.post(
      "view/user/actions/delete.php",
      {
        id: id,
      },
      function (data) {
        if (jQuery.trim(data) === "success") {
          alert("Delete successfully");
          UserDetails();
        } else {
          alert(data);
        }
      }
    );
  }
  function SaveUser() {
    const firstname = $("#firstname").val();
    const middlename = $("#middlename").val();
    const lastname = $("#lastname").val();
    const username = $("#username").val();
    const password = $("#password").val();
  
    $.post(
      "view/user/actions/save.php",
      {
        firstname: firstname,
        middlename: middlename,
        lastname: lastname,
        username: username,
        password: password,
      },
      function (data) {
        if (jQuery.trim(data) === "success") {
          $("#UserCanvas").offcanvas("hide");
          alert("User saved successfully");
          UserDetails();
        } else {
          alert(data);
        }
      }
    );
  }
  
  function UpdateUser(id) {
    const firstname = $("#firstname").val();
    const middlename = $("#middlename").val();
    const lastname = $("#lastname").val();
    const username = $("#username").val();
    const password = $("#password").val();
  
  
    $.post(
      "view/user/actions/update.php",
      {
        id: id,
        firstname: firstname,
        middlename: middlename,
        lastname: lastname,
        username: username,
        password: password,
      },
      function (data) {
        if (jQuery.trim(data) === "success") {
          $("#UserCanvas").offcanvas("hide");
          alert("User updated successfully");
          UserDetails(); // Call function to refresh disease details
        } else {
          alert(data);
        }
      }
    );
  }
  