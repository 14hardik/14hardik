/* add vehicle */

function submitData() {
  var form = $("#vehicledata")[0];
  var data = new FormData(form);
  console.log(form);
  var url = "back/addvehicle.php";
  $.ajax({
    url: url,
    type: "POST",
    data: data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function () {
      $("#submit").hide();
     
    },
    success: function (data) {
      $("#vehicledata").trigger("reset");
      $("#return").fadeIn().html(data);
      $("#tab-1").load(" #tab-1");
      $("#submit").show();
      setTimeout(function () {
        location.reload(true);
      }, 5000);
      return false;
    },
  });
  return false;
}
