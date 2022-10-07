$(document).ready(function () {
  const formatPrice = (number) => {
    return number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
  };

  const LoadProduct = (category = null) => {
    const data = category
      ? {
          category,
        }
      : "";
    $.ajax({
      url: "./Ajax/getProductByCategory",
      method: "POST",
      data: data,
      success: function (data) {
        const res = JSON.parse(data);
        if (res.length > 0) {
          $(".new_product_content").text("");
          res.slice(0, 8).forEach((item) => {
            const listImg = JSON.parse(item.srcImg);
            const template = `<div class="new_product_item">
            <a href="/xshop/Product/detailProduct/${item.maSanPham}">
                <div class="new_product_item_img">
                    <img src="public/imgUp/${listImg[0]}" alt="">
                    <div class="new_product_item_hover">
                        <div>
                            <i class="fa-regular fa-heart"></i>
                            <i class="fa-solid fa-magnifying-glass" style="margin-left:20px;"></i>
                        </div>
                        <div class="new_product_item_hover_shopnow">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <p>shop now</p>
                        </div>
                    </div>
                </div>
                <div class="new_product_item_name">${item.tenSanPham}</div>
                <div class="new_product_item_category_cost">
                    <p class="new_product_item_category">Dress</p>
                    <p class="new_product_item_cost">${formatPrice(
                      item.giaSanPham
                    )}đ</p>
                </div>
            </a>
        </div>`;
            $(".new_product_content").append(template);
          });
        }
      },
    });
  };
  LoadProduct();
  const listCate = $(".get_product_by_category_new");
  [...listCate].forEach((item) => {
    item.addEventListener("click", function () {
      if (!this.matches(".active")) {
        for (let item of [...listCate]) {
          item.classList.remove("active");
        }
        this.classList.add("active");
        const idProduct = this.dataset.category;
        idProduct === "all" ? LoadProduct() : LoadProduct(idProduct);
      }
    });
  });
});
