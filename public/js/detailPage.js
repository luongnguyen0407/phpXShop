window.addEventListener("load", () => {
  const imageShow = document.querySelector(".product_detail_img_show img");
  const colorList = document.querySelectorAll(".product_detail_color_items p");
  const imagePreview = document.querySelectorAll(
    ".product_detail_img_pview img"
  );
  [...imagePreview].forEach((item) => {
    item.addEventListener("click", (e) => {
      [...imagePreview].forEach((item) => {
        item.classList.remove("active");
      });
      e.target.classList.add("active");
      imageShow.setAttribute("src", e.target.getAttribute("src"));
    });
  });
  [...colorList].forEach((item) => {
    item.addEventListener("click", (e) => {
      [...colorList].forEach((item) => {
        item.classList.remove("active");
      });
      e.target.classList.add("active");
    });
  });
});
