const showDrop = document.querySelector(".avatar-img");
const dropDow = document.querySelector(".dropdown-menu");
showDrop.addEventListener("click", () => {
  dropDow.style.height = `${dropDow.scrollHeight}px`;
  dropDow.classList.toggle("show");
  if (!dropDow.classList.contains("show")) {
    dropDow.style.height = "0px";
  }
});

window.addEventListener("click", (e) => {
  if (!dropDow.contains(e.target) && !e.target.matches(".avatar-img")) {
    dropDow.classList.remove("show");
    dropDow.style.height = "0px";
  }
});

const now = new Date();
const hrs = now.getHours();
const gd = document.querySelector(".go-mr");
let msg;
if (hrs > 0) msg = "Mornin' Sunshine!,"; // REALLY early
if (hrs > 6) msg = "Good Morning,"; // After 6am
if (hrs > 12) msg = "Good Afternoon,"; // After 12pm
if (hrs > 17) msg = "Good Evening,"; // After 5pm
if (hrs > 22) msg = "Go To Bed!,"; // After 10pm

gd.textContent = msg;

const listRemove = document.querySelectorAll(".ti-trash.remove");
[...listRemove].forEach((item) => {
  item.addEventListener("click", (e) => {
    const productId = e.target.dataset.product;
    if (!productId) return;
    swal({
      title: `Sản Phẩm id ${productId}`,
      text: "Bạn muốn xóa sản phẩm này ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) handleDeleteProduct(productId);
    });
  });
});

const handleDeleteProduct = (id) => {
  $.ajax({
    url: "./Ajax/deleteProduct",
    method: "POST",
    data: {
      id,
    },
    success: function (data) {
      if (data !== "false") {
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        }).then(() => {
          location.reload();
        });
      } else {
        swal("503", "Server error", "error");
      }
    },
  });
};
