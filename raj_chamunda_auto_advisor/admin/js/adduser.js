$(document).ready(function () {
  $("#submit").click(function (event) {
    event.preventDefault();

    var user_name = $("#user_name").val();
    var contact_no = $("#contact_no").val();

    console.log(user_name);
    console.log(contact_no);

    // var name_ptn = /^[a-zA-Z]+ [a-zA-Z]+$/;
    // var name_ptn = ([A-Za-z]+),\\s*([A-Za-z]+)\\s*([A-Za-z]+);

    var m_ptn = /^\d{10}$/;
        var name_ptn = /^[A-Za-z _]*[A-Za-z][A-Za-z _]*$/;
    var collage_ptn = /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/;

    if (user_name == "" || contact_no == "") {
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
        url: "./back/adduser.php",
        method: "POST",
        data: $("#form_data").serialize(),
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
