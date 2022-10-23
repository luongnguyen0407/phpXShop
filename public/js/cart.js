window.addEventListener("DOMContentLoaded", function () {
  $(".oder-btn").click(function () {
    $(".micromodal-slide").addClass("is-open");
    $(".micromodal-slide").attr("aria-hidden", "false");
  });
  $(".modal__close").click(function () {
    $(".micromodal-slide").removeClass("is-open");
    $(".micromodal-slide").attr("aria-hidden", "true");
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
    $(this.nextElementSibling).val(+amount - 1 < 0 ? 0 : +amount - 1);
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
              Toastify({
                text: "Delete product success",
                duration: 2000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                  background:
                    " linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(120,203,34,1) 0%, rgba(0,212,255,1) 100%)",
                },
              }).showToast();
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
});
