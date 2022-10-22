window.addEventListener("DOMContentLoaded", function () {
  //   $(".oder-btn").click(function () {
  //     console.log("ok");
  //     MicroModal.init();
  //     MicroModal.show("modal-1");
  //   });

  $(".column4.column_input .su").click(function () {
    let amount = $(this.previousElementSibling).val();
    $(this.previousElementSibling).val(+amount + 1);
    handleCalculate(this.parentNode);
  });
  $(".column4.column_input .rai").click(function () {
    let amount = $(this.nextElementSibling).val();
    $(this.nextElementSibling).val(+amount - 1 < 0 ? 0 : +amount - 1);
    handleCalculate(this.parentNode);
  });

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
});
