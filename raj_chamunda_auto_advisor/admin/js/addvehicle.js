$(document).ready(function () {
  $("#submit").click(function (event) {
    event.preventDefault();

    var form = $("#vehicledata")[0];
    var data = new FormData(form);
    var uid = $("#uid").val();
    var service_type = $("#service_type").val();
    var vehicle_no = $("#vehicle_no").val();
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();
    var doc = $("#doc").val();
    console.log(vehicle_no);
    console.log(doc);

    var vehicle_patten = /^[A-Z|a-z]{2}\s?[0-9]{1,2}\s?[A-Z|a-z]{0,3}\s?[0-9]{4}$/


    // var vehicle_patten = /^[a-zA-Z]+ [a-zA-Z]+$/;
    // $vehicle_patten = "/^[a-zA-z]*$/";

    if (
      uid == "" ||
      service_type == "" ||
      vehicle_no == "" ||
      start_date == "" ||
      end_date == ""
    ) {
      $("#return").html(
        '<h4 style="color:red;font-size:20px;font-weight:bold;margin-top:15px">Please Enter All Required Fields</h4>'
      );
      setTimeout(function () {
        location.reload(true);
      }, 2000);
    } else if (vehicle_patten.test(vehicle_no) == false) {
      alert("Please Enter Valid Vehicle Number...!");
      $("#vehicle_no").focus();
    } else if (start_date >= end_date) {
      alert("End date must be greater than start date...!");
      $("#end_date").focus();
    } else {
      // alert("Please Enter Valid User Name...515151");

      $.ajax({
        url: "./back/addvehicle.php",
        method: "POST",
        // data: $("#vehicledata").serialize(),
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
          $("#submit").hide();
        },
        success: function (data) {
          $("form").trigger("reset");
          $("#return").fadeIn().html(data);
          $("#return").fadeOut("slow");
          $("#reset").show();
          $("#load").load(" #load");
          setTimeout(function () {
            location.reload(true);
          }, 500000);
        },
      });
    }
  });
});
