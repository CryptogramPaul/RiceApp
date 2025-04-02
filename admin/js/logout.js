function Logout() {
  $.post("actions/logout.php", {}, function (data) {
    window.location.href = "login.php";
  });
}
