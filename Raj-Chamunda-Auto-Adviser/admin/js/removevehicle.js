function removeVehicle(v_id) {
      if (confirm("Are You Sure to Want to Delete this Vehicle?")) {
        // console.log(v_id);
        console.log(v_id);
        // console.log(this)

        $.ajax({
          url: "./back/removevehicle.php",
          type: "POST",
          data: { v_id: v_id },
          success: function (data) {
            $("#return").fadeIn().html(data);
            $("#delete" + v_id).hide("slow");
            setTimeout(function () {
              location.reload(true);
            }, 5000);
            return false;
          },
        });
        return false;
      }
    }
    