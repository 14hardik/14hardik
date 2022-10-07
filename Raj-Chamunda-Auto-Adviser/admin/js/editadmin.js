$(document).ready(function () {
  $("#edit").click(function (event) {
    event.preventDefault();

    var admin_id = $("#admin_id").val();
    var username = $("#username").val();
    var password = $("#password").val();

      console.log(admin_id);
      console.log(username);
      console.log(password);

    //   var m_ptn = /^\d{10}$/;
    // var name_ptn = /^[A-Za-z _]*[A-Za-z][A-Za-z _]*$/;
    var name_ptn = /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/;

    if (username == "" || password == "" || admin_id == "") {
      $("#return").html(
        '<h4 style="color:black;font-size:20px;font-weight:bold;margin-top:15px">Please Enter All Required Fields</h4>'
      );
      setTimeout(function () {
        location.reload(true);
      }, 5000);
    } else if (name_ptn.test(username) == false) {
      alert("Please Enter Valid User Name...");
      $("#username").focus();
    } else {
     

      $.ajax({
        url: "./back/editadmin.php",
        method: "POST",
        data: $("#edituser").serialize(),
        success: function (data) {
          $("form").trigger("reset");
          $("#return").fadeIn().html(data);
          $("#return").fadeOut("slow");
          $("#reset").show();
          $("#load").load(" #load");
          setTimeout(function () {
            location.reload(true);
          }, 5000);
        },
      });
    }
  });
});
