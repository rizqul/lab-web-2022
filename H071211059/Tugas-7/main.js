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

        $("#the-table").load(location.href + " #the-table");
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
    url: "func.php/?product_id=" + product_id,

    success: function (response) {
      var res = jQuery.parseJSON(response);
      console.log(res);
      if (res.status == 404) {
        alert(res.message);
      } else if (res.status == 200) {
        var data = jQuery.parseJSON(res.data);
        console.log(data[0]);

        $("#code").val(data[0].product_code);
        $("#title").val(data[0].title);
        $("#price").val(data[0].price);
        $("#qty").val(data[0].qty);
        $("#series").val(data[0].series);
        $("#prod_desc").val(data[0].product_desc);
        $("#img_src").val(data[0].imgsrc);
      }
    },
  });
});

$(document).on("submit", "#editProduct", function (e) {
  e.preventDefault();

  var formData = new FormData(this);
  formData.append("edit_product", true);

  $.ajax({
    type: "POST",
    url: "func.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      // console.log(response);
      if (res.status == 442) {
        $("#errorMessage").removeClass("d-none");
        $("#errorMessage").text(res.message);
      } else if (res.status == 200) {
        $("#errorMessage").addClass("d-none");
        $("#productEditModal").modal("hide");
        $("#editProduct")[0].reset();

        $("#the-table").load(location.href + " #the-table");
      } else if (res.status == 500) {
        alert(res.message);
      }
    },
  });
});

$(document).on("click", ".deleteProductBtn", function (e) {
  e.preventDefault();

  if (confirm("ARE YOU MAD FAM?")) {
    var product_id = $(this).val();

    $.ajax({
      type: "POST",
      url: "func.php",
      data: {
        delete_product: true,
        product_id: product_id,
      },
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if (res.status == 500) {
          alert(res.message);
        } else {
          $("#the-table").load(location.href + " #the-table");
        }
      },
    });
  }
});


