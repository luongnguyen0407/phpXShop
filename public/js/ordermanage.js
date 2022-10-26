window.addEventListener("load", () => {
  const listBtn = document.querySelectorAll(".btn_detail_order");
  const modalClose = document.querySelector(".modal__close");
  const modal = document.querySelector("#modal-2");
  const inputSwitch = document.querySelector(".switch-input");
  const status = document.querySelector(".status_bill");
  const btnSave = document.querySelector(".btn_save");
  const buttonsDelete = document.querySelectorAll(".btn_delete_order");
  let idSp = 0;
  let isChecked = false;
  modalClose.addEventListener("click", () => {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    handleNotChecked();
  });

  inputSwitch.addEventListener("change", function () {
    if (this.checked) {
      handleChecked();
    } else {
      handleNotChecked();
    }
  });

  [...buttonsDelete].forEach((btn) => {
    btn.addEventListener("click", function () {
      swal({
        title: "Are you sure?",
        text: "Bạn muốn xóa đơn hàng này ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          const idBillRemove = this.parentNode.parentNode.dataset.mhd;
          axios({
            method: "POST",
            url: "./Ajax/DeleteBill",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            data: {
              idBillRemove,
            },
          }).then((res) => {
            console.log(res);
            if (res.data && res.data === 1) {
              location.reload();
            }
          });
        }
      });
    });
  });

  [...listBtn].forEach((item) => {
    item.addEventListener("click", function () {
      const id = this.parentNode.parentNode.dataset.mhd;
      if (!id) return;
      const listProduct = document.querySelector(".list_product_order");
      const modalTitle = document.querySelector(".modal__title");
      modal.classList.add("is-open");
      modal.setAttribute("aria-hidden", "false");
      axios({
        method: "POST",
        url: "./Ajax/OrderManage",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        data: {
          id,
        },
      }).then((res) => {
        const { data } = res;
        if (!data || data.length <= 0) return;
        idSp = id;
        isChecked = Number(data[0].status);
        const idBill = id;
        const status = Number(data[0].status);
        modalTitle.textContent = `Chi tiết đơn hàng ${idBill}`;
        status === 0 ? handleNotChecked() : handleChecked();
        listProduct.textContent = "";
        data.forEach((item) => {
          const template = `<p class="modal__content_one_product">${item.tenSanPham} x ${item.soLuong}</p>`;
          listProduct.insertAdjacentHTML("beforeend", template);
        });
      });
    });
  });
  btnSave.addEventListener("click", updateStatus);

  function updateStatus() {
    const statusOld = isChecked === 0 ? false : true;
    if (inputSwitch.checked === statusOld) {
      modal.classList.remove("is-open");
      modal.setAttribute("aria-hidden", "true");
      return;
    }
    const statusNew = inputSwitch.checked ? "Approved" : "Pending"; //1 is Approved 0 is pending
    axios({
      method: "POST",
      url: "./Ajax/UpdateStatus",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      data: {
        id: idSp,
        status: statusNew,
      },
    }).then((res) => {
      if (Number(res.data) === 1) {
        showToast("Update success", "success");
      } else {
        showToast("Server Error");
      }
    });
  }
  function handleChecked() {
    inputSwitch.checked = true;
    status.classList.remove("status_pending");
    status.classList.add("status_approved");
    status.textContent = "Approved";
  }
  function handleNotChecked() {
    inputSwitch.checked = false;
    status.classList.add("status_pending");
    status.classList.remove("status_approved");
    status.textContent = "Pending";
  }
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
