window.addEventListener("DOMContentLoaded", function () {
  //modal handler
  $(".oder-btn").click(function () {
    $(".total_payment").text("Tổng đơn :" + $(".total_cart").text());
    $(".micromodal-slide").addClass("is-open");
    $(".micromodal-slide").attr("aria-hidden", "false");
  });
  $(".modal__close").click(function () {
    $(".micromodal-slide").removeClass("is-open");
    $(".micromodal-slide").attr("aria-hidden", "true");
  });
  //end

  //oder handler
  $(".btn_dh").click(function () {
    const add = document.querySelector(".list_address_item.active");
    if (add) {
      let idAddress = add.dataset.address;
      let arr = [];
      const listOderProduct = document.querySelectorAll(".one_product_ca");
      let total = formatNumber($(".total_cart").text());
      [...listOderProduct].forEach((item) => {
        const product = {
          idProduct: item.dataset.sle,
          slProduct: item.querySelector(".sl").value,
        };
        arr.push(product);
      });
      axios({
        method: "post",
        url: "./Ajax/OrderProduct",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        data: {
          data: arr,
          idAddress,
          total,
        },
      }).then(function (response) {
        console.log(response.data);
        if (+response.data === 1) {
          swal({
            title: "Thành Công",
            text: "Đặt hàng thành công! bạn có muốn xóa hết sản phẩm trong giỏ ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
              axios({
                method: "post",
                url: "./Ajax/DeleteProductCart",
                headers: {
                  "Content-Type": "application/x-www-form-urlencoded",
                },
                data: {
                  id: 1,
                  all: "deleteAll",
                },
              }).then(function (res) {
                if (+res.data === 1) {
                  $(".table-main tbody").remove();
                  showToast("Delete product success", "success");
                } else {
                  swal("Server Bận", {
                    icon: "Error",
                  });
                }
              });
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
              ///end
            } else {
              $(".micromodal-slide").removeClass("is-open");
              $(".micromodal-slide").attr("aria-hidden", "true");
            }
          });
        } else {
          swal("Error", "Server Bận", "error");
        }
      });
    } else {
      showToast("Bạn phải chọn địa chỉ");
    }
  });

  $(".list_address_item").click(function () {
    $(".list_address_item").removeClass("active");
    $(this).addClass("active");
  });

  $(".column4.column_input .su").click(function () {
    let amount = $(this.previousElementSibling).val();
    $(this.previousElementSibling).val(+amount + 1);
    handleCalculate(this.parentNode);
    updateToDB(
      $(this.previousElementSibling).val(),
      this.parentNode.dataset.id
    );
  });
  $(".column4.column_input .rai").click(function () {
    let amount = $(this.nextElementSibling).val();
    $(this.nextElementSibling).val(+amount - 1 < 1 ? 1 : +amount - 1);
    handleCalculate(this.parentNode);
    updateToDB($(this.nextElementSibling).val(), this.parentNode.dataset.id);
  });

  function updateToDB(sl, id) {
    if (!sl || !id) return;
    axios({
      method: "post",
      url: "./Ajax/UpdateProductCart",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      data: {
        idProduct: id,
        amount: sl,
      },
    }).then(function (response) {
      // console.log(response.data);
    });
  }

  $(".column7 .remove").click(function () {
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        const node = this.parentNode;
        const idCartRemove = node.parentNode.querySelector(
          ".column4.column_input"
        ).dataset.id;
        console.log(idCartRemove);
        $.ajax({
          url: "./Ajax/DeleteProductCart",
          method: "POST",
          data: {
            id: idCartRemove,
          },
          success: function (data) {
            if (+data === 1) {
              node.parentNode.remove();
              CalculateTotal();
              showToast("Delete product success", "success");
            }
          },
        });
      }
    });
  });

  function handleCalculate(parentEl) {
    let amount = Number(parentEl.querySelector(".sl").value);
    let inToMo = formatNumber(parentEl.nextElementSibling.textContent);
    const total = parentEl.nextElementSibling.nextElementSibling;
    total.textContent = formatNumber(inToMo * amount, true) + "đ";
    CalculateTotal();
  }

  function CalculateTotal() {
    let totalOder = 0;
    $(".tt_cart").each(function () {
      console.log();
      totalOder += formatNumber($(this).text());
    });
    $(".total_cart").text(formatNumber(totalOder, true) + "đ");
  }

  function formatNumber(text, out) {
    if (out) {
      return text.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    } else {
      return +text.replace(/[^a-zA-Z0-9 ]/g, "");
    }
  }
  // function debounce(fn, ms) {
  //   let timer;

  //   return function () {
  //     // Nhận các đối số
  //     const args = arguments;
  //     const context = this;

  //     if (timer) clearTimeout(timer);

  //     timer = setTimeout(() => {
  //       fn.apply(context, args);
  //     }, ms);
  //   };
  // }
  function showToast(mess = "This is a toast", type) {
    let color = type
      ? "linear-gradient(to right, #D2BB5A, #CCADDA)"
      : "linear-gradient(to right, #D46A6A, #FFAAAA)";
    Toastify({
      text: mess,
      duration: 2000,
      newWindow: true,
      close: true,
      gravity: "top", // `top` or `bottom`
      position: "right", // `left`, `center` or `right`
      stopOnFocus: true, // Prevents dismissing of toast on hover
      style: {
        background: color,
      },
      onClick: function () {}, // Callback after click
    }).showToast();
  }
});
