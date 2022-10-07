$(document).ready(async function () {
  function autoScroll() {
    const scrollTo = document.querySelector(".product_content_right");
    let elmPosition = scrollTo.getBoundingClientRect();
    window.scrollTo({
      top: elmPosition.top,
      behavior: "smooth",
    });
  }
  const formatPrice = (number) => {
    return number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
  };
  const loadProduct = (offset = 0, isActive = 1, category = null) => {
    const data = category
      ? {
          offset,
          category,
        }
      : {
          offset,
        };
    $.ajax({
      url: "./Ajax/getProductByPagination",
      method: "POST",
      data: data,
      success: function (data) {
        const res = JSON.parse(data);
        if (res.length > 0) {
          $(".content_right_products").text("");
          res.forEach((item) => {
            const listImg = JSON.parse(item.srcImg);
            const template = `<div class="content_right_product_box">
            <a href="/xshop/Product/detailProduct/${item.maSanPham}">
                <img src="public/imgUp/${listImg[0]}" alt="">
                <div class="content_right_product_box_text">
                    <p class="product_name_fer">${item.tenSanPham}</p>
                    <p class="icon_star">4.5 <i class="fa-solid fa-star"></i></p>
                </div>
                <div class="content_right_product_box_text">
                    <h3>${formatPrice(item.giaSanPham)}đ</h3>
                    <p>(17)</p>
                </div>
                <div class="content_right_product_box_icon">
                    <p><i class="fa-solid fa-clock"></i> 5 days</p>
                </div>
                <div class="content_right_product_box_icon">
                    <p><i class="fa-sharp fa-solid fa-house"></i> Jakarta Barat</p>
                </div>
                <div class="content_right_product_message">
                    <div class="content_right_product_message_box">
                        <p><i class="fa-solid fa-message"></i></p>
                    </div>
                    <div class="content_right_product_Wishlist_box">
                        <p>Wishlist</p>
                    </div>
                </div>
            </a>
        </div>`;
            $(".content_right_products").append(template);
          });
          getAmount(isActive);
          autoScroll();
        }
      },
    });
  };
  const getAmount = (isActive, limit = 9) => {
    $.ajax({
      url: "./Ajax/getAmount",
      method: "GET",
      success: function (data) {
        const totalPage = Math.ceil(+data / limit);
        let i = 1;
        $(".wrap-pagination").text("");
        new Array(totalPage).fill(0).forEach(() => {
          const template = `<div class="pagination_item ${
            i === isActive ? "active" : ""
          }">${i++}</div>`;
          $(".wrap-pagination").append(template);
        });
        getPagination(loadProduct);
      },
    });
  };
  loadProduct();
  function getPagination(callFetchData) {
    const lisPagination = $(".pagination_item");
    [...lisPagination].forEach((item) => {
      item.addEventListener("click", function () {
        if (!this.matches(".active")) {
          for (let item of [...lisPagination]) {
            item.classList.remove("active");
          }
          this.classList.add("active");
          const page = Number(this.textContent);
          const offset = (page - 1) * 9;
          callFetchData(offset, page);
        }
      });
    });
  }
  $(".responsive_bar").click(function () {
    $(".product_content_left").addClass("active");
  });
  $(window).click(function (e) {
    if (
      !document.querySelector(".product_content_left").contains(e.target) &&
      !e.target.matches(".responsive_bar")
    ) {
      $(".product_content_left").removeClass("active");
    }
  });
  let listRadio1 = $(".content_left_title1 .content_left_text");
  listRadio1 = [...listRadio1];
  for (const radio of listRadio1) {
    radio.addEventListener("click", function () {
      if (!this.matches(".chose")) {
        loadProduct(0, 1, this.querySelector("p").dataset.category);
      }
      for (const item of listRadio1) {
        item.classList.remove("chose");
      }
      this.classList.add("chose");
    });
  }
});
