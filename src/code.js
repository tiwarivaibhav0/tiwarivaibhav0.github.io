$(document).ready(function () {
  var addedCart = [];
  (function () {
    "use strict";

    var forms = document.querySelectorAll(".needs-validation");

    Array.prototype.slice.call(forms).forEach(function (form) {
      form.addEventListener(
        "submit",
        function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }

          form.classList.add("was-validated");
        },
        false
      );
    });
  })();
  var edit;
  var editProduct;

  $("#Register").click(function () {
    window.location = "register.php";
  });

  $("#Login").click(function () {
    window.location = "login.php";
  });

  $(document).on("click", "#Orders", function () {
    window.location = "orders.php";
  });
  $(document).on("click", "#Products", function () {
    window.location = "products.php";
  });
  $(document).on("click", "#Users", function () {
    window.location = "users.php";
  });
  $(document).on("click", "#dashboard", function () {
    window.location = "dashboard.php";
  });
  $(document).on("click", "#Signup", function () {
    var fname = $("#floatingfname").val();
    var lname = $("#floatinglname").val();

    var email = $("#floatingemail").val();

    var password = $("#floatingPassword").val();
    var password2 = $("#floatingPassword2").val();

    var User_type = "user";
    var status = "active";

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { checkEmail: email },
      dataType: "text",
      success: function (result) {
        if (result == 0) {
          $("#reg").html("<strong>Email already in use</strong>");
        } else {
          if (password == password2) {
            if (
              fname != "" &&
              lname != "" &&
              email != "" &&
              password != "" &&
              User_type != ""
            ) {
              $.ajax({
                url: "server.php",
                type: "POST",
                data: {
                  fname: fname,
                  lname: lname,
                  email: email,
                  password: password,
                  User_type: User_type,
                  status: status,
                },
                dataType: "text",
                success: function (result) {
                  console.log(result);
                  // $("#result").html(result);
                  alert("Successfully Registered");
                  window.location = "login.php";
                },
                error: function () {},
              });
            } else {
              $("#Warning").html("<strong>All Fields are mandatory *</strong>");
            }
          } else {
            $("#reg").html("<strong>Passwords didn't match</strong>");
          }
        }
      },
      error: function () {},
    });
  });
  $(document).on("click", "#Signin", function () {
    var email = $("#loginEmail").val();
    var password = $("#loginPassword").val();
    var remember = document.getElementById("remember");
    if (remember.checked) {
      remember = 1;
    } else remember = 0;
    //  console.log(fname,lname,email,password,User_type);
    if (email != "" && password != "")
      $.ajax({
        url: "server.php",
        type: "POST",
        data: {
          loginEmail: email,
          loginPassword: password,
          remember: remember,
        },
        dataType: "text",
        success: function (result) {
          if (result != 0) window.location = "index.php";
          else {
            $("#reg").html("Invalid username or password</strong>");
          }
        },
        error: function () {},
      });
  });
  $(document).on("click", "#addUser", function () {
    //alert('Clicked');
    var fname = $("#admin_fname").val();
    var lname = $("#admin_lname").val();

    var email = $("#admin_email").val();

    var password = $("#admin_Password").val();

    var User_type = $("#admin_user_type").val();

    var status = "active";

    if (
      fname != "" &&
      lname != "" &&
      email != "" &&
      password != "" &&
      User_type != ""
    )
      $.ajax({
        url: "server.php",
        type: "POST",
        data: {
          fname: fname,
          lname: lname,
          email: email,
          password: password,
          User_type: User_type,
          status: status,
        },
        dataType: "text",
        success: function (result) {
          console.log(result);
          // $("#result").html(result);
          window.location = "users.php";
          //  alert("User Successfully added");
        },
        error: function () {},
      });
  });

  $(document).on("click", ".edit", function () {
    //alert($(this).attr("id"));
    // window.location.href="?name="+$(this).attr("id");
    edit = $(this).attr("id");
  });

  $(document).on("click", "#editUser", function () {
    var updated_user_type = $("#updated_user_type").val();
    var updated_status = $("#updated_status").val();

    // console.log(updated_user_type,updated_status,edit);
    $.ajax({
      url: "server.php",
      type: "POST",
      data: {
        updated_user_type: updated_user_type,
        updated_status: updated_status,
        edit_id: edit,
      },
      dataType: "text",
      success: function (result) {
        // console.log(result);
        // // if(result!=0)
        window.location = "users.php";
      },
      error: function () {},
    });
  });

  $(document).on("click", ".delete", function () {
    //  alert($(this).attr("id"));
    var del = $(this).attr("id");
    $.ajax({
      url: "server.php",
      type: "POST",
      data: { delete: del },
      dataType: "text",
      success: function (result) {
        // console.log(result);
        // // if(result!=0)
        window.location = "users.php";
      },
      error: function () {},
    });
  });

  $(document).on("click", ".editProduct", function () {
    //alert($(this).attr("id"));
    // window.location.href="?name="+$(this).attr("id");

    editProduct = $(this).attr("id");
    // alert(editProduct);
    $.ajax({
      url: "server.php",
      type: "POST",
      data: { editProduct_id: editProduct },
      dataType: "text",
      success: function (result) {
        window.location = "editProducts.php";
      },
      error: function () {},
    });
  });

  $(document).on("click", "#close", function () {
    window.location = "products.php";
  });
  $(document).on("click", "#editProduct", function () {
    // window.location='products.php';
    // alert("Clicked");
    var id = $("#edit_product_id").val();

    var name = $("#edit_product_name").val();
    var category = $("#edit_product_category").val();
    var image = $("#edit_product_image").val();

    var price = $("#edit_product_price").val();
    var quantity = $("#edit_product_quantity").val();
    // console.log(name,category,price,quantity);
    $.ajax({
      url: "server.php",
      type: "POST",
      data: {
        edit_product_name: name,
        edit_product_category: category,
        edit_product_price: price,
        edit_product_quantity: quantity,
        edit_product_id: id,
        edit_product_image: image,
      },
      dataType: "text",
      success: function (result) {
        //console.log(result);
        // // if(result!=0)
        window.location = "products.php";
      },
      error: function () {},
    });
  });
  $(document).on("click", ".deleteProduct", function () {
    // window.location.href="?name="+$(this).attr("id");

    deleteProduct = $(this).attr("id");

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { deleteProduct: deleteProduct },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        window.location = "products.php";
      },
      error: function () {},
    });
  });

  $(document).on("click", "#addProduct", function () {
    var pname = $("#new_product_name").val();
    var pcategory = $("#new_product_category").val();
    var pimage = $("#new_product_image").val();
    var pprice = $("#new_product_price").val();

    var pquantity = $("#new_product_quantity").val();

    if (pname != "" && pprice != "" && pquantity != "" && pcategory != "")
      $.ajax({
        url: "server.php",
        type: "POST",
        data: {
          new_product_name: pname,
          new_product_category: pcategory,
          new_product_price: pprice,
          new_product_quantity: pquantity,
          new_product_image: pimage,
        },
        dataType: "text",
        success: function (result) {
          // console.log(result);
          window.location = "products.php";
          //  alert("User Successfully added");
        },
        error: function () {},
      });
  });

  $(document).on("click", ".cart", function (e) {
    e.preventDefault();

    var cartId = $(this).attr("id");
    $.ajax({
      url: "server.php",
      type: "POST",
      data: { cartId: cartId },
      dataType: "text",
      success: function (result) {
        console.log(result);
        var flag = 0;
        for (let i = 0; i < addedCart.length; i++) {
          if (addedCart[i] == cartId) flag = 1;
        }
        if (flag == 0) {
          addedCart.push(cartId);
          $("#cartCount").html(Number($("#cartCount").html()) + 1);
        }
        // // if(result!=0)
        // window.location='Home.php';
        // location.reload();
      },
      error: function () {},
    });
  });

  $(document).on("click", ".deleteCart", function () {
    var delCart = $(this).attr("id");
    $(this).parent().parent().remove();

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { delCart: delCart },
      dataType: "text",
      success: function (result) {
        console.log(result);
        $("#cartCount").html(Number($("#cartCount").html()) - 1);
        if ($("#cartCount").html() == 0) location.reload();

        // // if(result!=0)
        // window.location='cart.php';
      },
      error: function () {},
    });
  });

  $(document).on("click", "#clickCategory", function (e) {
    e.preventDefault();

    // alert("Clicked")
    $("#selectFilter").css("visibility", "visible");
    $("#sortPrice").css("visibility", "hidden");
  });
  $(document).on("click", "#selectFilter", function (e) {
    e.preventDefault();

    var applyFilter = $(this).val();
    if (applyFilter != "")
      $.ajax({
        url: "server.php",
        type: "POST",
        data: { applyFilter: applyFilter },
        dataType: "text",
        success: function (result) {
          console.log(result);
          // // if(result!=0)
          // window.location='Home.php';
          location.reload();
        },
        error: function () {},
      });
  });

  $(document).on("click", "#clickSort", function (e) {
    e.preventDefault();

    // alert("Clicked")
    $("#sortPrice").css("visibility", "visible");
    $("#selectFilter").css("visibility", "hidden");
  });
  $(document).on("click", "#sortPrice", function (e) {
    e.preventDefault();

    //alert($(this).val());

    var sortP = $(this).val();
    if (sortP != "")
      $.ajax({
        url: "server.php",
        type: "POST",
        data: { sortP: sortP },
        dataType: "text",
        success: function (result) {
          console.log(result);
          // // if(result!=0)
          // window.location='Home.php';
          location.reload();
        },
        error: function () {},
      });
  });

  $(document).on("click", "#checkOut", function () {
    window.location = "checkout.php";
  });

  $(document).on("click", ".viewDetails", function () {
    //  alert($(this).attr("id"));
    var detailsId = $(this).attr("id");

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { detailsId: detailsId },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        window.location = "viewDetails.php";
        // location.reload();
      },
      error: function () {},
    });
  });
  $(document).on("click", ".viewDetailsOrder", function () {
    //  alert($(this).attr("id"));
    var detailsIdorder = $(this).attr("id");

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { detailsIdorder: detailsIdorder },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        window.location = "viewDetailsOrder.php";
        // location.reload();
      },
      error: function () {},
    });
  });

  $(document).on("click", ".updateStatusId", function () {
    var updateStatusId = $(this).attr("id");

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { updateStatusId: updateStatusId },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        // window.location='viewDetails.php';
        // location.reload();
      },
      error: function () {},
    });
  });

  $(document).on("click", "#updateStatus", function () {
    var selectStatus = $("#selectStatus").val();

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { selectStatus: selectStatus },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        // window.location='viewDetails.php';
        location.reload();
      },
      error: function () {},
    });
  });


  $(document).on("click", "#floatingPassword", function () {
    $("#reg").html("");
  });
  $(document).on("click", "#floatingPassword2", function () {
    $("#reg").html("");
  });
  $(document).on("click", "#floatingemail", function () {
    $("#reg").html("");
  });

  $(document).on("click", ".dec", function () {
    decQuantity = $(this).attr("id");

    if($(this).closest("span").next().text()==1){
      $(this).closest("tr").remove();
    }

    $(this)
      .closest("span")
      .next()
      .text(Number($(this).closest("span").next().text()) - 1);

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { decQuantity: decQuantity },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        // window.location='viewDetails.php';
        //location.reload();
      },
      error: function () {},
    });
  });

  $(document).on("click", ".inc", function () {
    //  alert($(this).attr("id"));
    incQuantity = $(this).attr("id");
    $(this)
      .closest("span")
      .prev()
      .text(Number($(this).closest("span").prev().text()) + 1);
    $.ajax({
      url: "server.php",
      type: "POST",
      data: { incQuantity: incQuantity },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        // window.location='viewDetails.php';
        // location.reload();
      },
      error: function () {},
    });
  });
});
