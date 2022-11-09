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

$(document).on("click", ".editProductBtn", function () {
  var product_id = $(this).val();

  $.ajax({
    type: "GET",
    url: "config.php?product_id=" + product_id,
    success: function (response) {
      // console.log(response);
      var res = jQuery.parseJSON(response);
      if (res.status == 404) {
        alert(res.message);
      } else if (res.status == 200) {
        $("#product_id").val(res.data.id);
        $("#title").val(res.data.title);
        $("#price").val(res.data.price);
        $("#qty").val(res.data.qty);
        $("#series").val(res.data.series);
        $("#imgsrc").val(res.data.imgsource);

        $("#productEditModal").modal("show");
      }
    },
  });
});

$(document).on("submit", "#updateProduct", function (e) {
  e.preventDefault();

  var formData = new FormData(this);
  formData.append("update_product", true);

  $.ajax({
    type: "POST",
    url: "config.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      // console.log(response);

      var res = jQuery.parseJSON(response);
      if (res.status == 422) {
        $("#errorMessage").removeClass("d-none");
        $("#errorMessage").text(res.message);
      } else if (res.status == 200) {
        $("#errorMessage").addClass("d-none");
        $("#productEditModal").modal("hide");
        $("#saveProduct")[0].reset();

        // reload table
        $("#products-table").load(location.href + " #products-table");
      } else if (res.status == 500) {
        alert(res.message);
      }
    },
  });
});

$(document).on("click", ".deleteProductBtn", function (e) {
  e.preventDefault();

  if (confirm("Are you sure you want to delete this product?")) {
    var product_id = $(this).val();

    $.ajax({
      type: "POST",
      url: "config.php",
      data: {
        delete_product: true,
        product_id: product_id,
      },
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 500) {
          alert(res.message);
        } else {
          $("#products-table").load(location.href + " #products-table");
        }
      },
    });
  }
});