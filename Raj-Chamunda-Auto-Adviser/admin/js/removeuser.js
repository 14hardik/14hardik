function removeUser(id) {
  if (confirm("Are You Sure to Want to Delete this User ?")) {
    console.log(id);
    $.ajax({
      url: "./back/removeuser.php",
      type: "POST",
      data: { id: id },
      success: function (data) {
        $("#return").fadeIn().html(data);
        $("#delete" + id).hide("slow");
        setTimeout(function () {
          location.reload(true);
        }, 5000);
        return false;
      },
    });
    return false;
  }
}
