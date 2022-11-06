$(document).on("submit", "#saveProduct", function (e) {
  e.preventDefault();

  var formData = new FormData(this);
  formData.append("save_product", true);

  $.ajax({
    type: "POST",
    url: "config.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      console.log(response);

      var res = jQuery.parseJSON(response);
      if (res.status == 422) {
        $("#errorMessage").removeClass("d-none");
        $("#errorMessage").text(res.message);
      } else if (res.status == 200) {
        $("#errorMessage").addClass("d-none");
        $("#productAddModal").modal("hide");
        $("#saveProduct")[0].reset();
        
        // reload table
        $("#products-table").load(location.href + " #products-table");
      } else if (res.status == 500) {
        alert(res.message);
      }
    },
  });
});
