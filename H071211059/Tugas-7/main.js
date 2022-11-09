$(document).on("submit", "#saveProduct", function (e) {
  e.preventDefault();

  var formData = new FormData(this);
  formData.append("submit_product", true);

  $.ajax({
    type: "POST",
    url: "func.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 442) {
        $("#errorMessage").removeClass("d-none");
        $("#errorMessage").text(res.message);
      } else if (res.status == 200) {
        $("#errorMessage").addClass("d-none");
        $("#productAddModal").modal("hide");
        $("#saveProduct")[0].reset();
      } else if (res.status == 500) {
        alert(res.message);
      }
    },
  });
});
