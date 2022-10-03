$(document).ready(function () {
  $("#edit").click(function (event) {
    event.preventDefault();
    
    var uid = $("#uid").val();
    var user_name = $("#user_name").val();
    var contact_no = $("#contact_no").val();

    console.log(uid);
    console.log(user_name);
    console.log(contact_no);

    var m_ptn = /^\d{10}$/;
    var name_ptn = /^[A-Za-z _]*[A-Za-z][A-Za-z _]*$/;

    if (user_name == "" || contact_no == "" || uid == "") {
      $("#return").html(
        '<h4 style="color:black;font-size:20px;font-weight:bold;margin-top:15px">Please Enter All Required Fields</h4>'
      );
      setTimeout(function () {
        location.reload(true);
      }, 5000);
    } else if (m_ptn.test(contact_no) == false) {
      alert("Please Enter Valide Contact Number...");
      $("#contact_no").focus();
    } else if (name_ptn.test(user_name) == false) {
      alert("Please Enter Valid User Name...");
      $("#user_name").focus();
    } else {
      // alert("Please Enter Valid User Name...515151");

      $.ajax({
        url: "./back/edituser.php",
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
