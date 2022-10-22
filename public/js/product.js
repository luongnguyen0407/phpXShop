$(document).ready(async function () {
  const DEFAULT_LIMIT = 6;
  // client auto scroll top when reload
  function autoScroll() {
    const scrollTo = document.querySelector(".product_content_right");
    let elmPosition = scrollTo.getBoundingClientRect();
    window.scrollTo({
      top: elmPosition.top,
      behavior: "smooth",
    });
  }

  //format price
  const formatPrice = (number) => {
    return number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
  };
  const handleAddProductToCart = (e) => {
    const sl = $(".header_flex .sl_item").text();
    $(".header_flex .sl_item").text(+sl + 1);
    $.ajax({
      url: "./Ajax/addProductToCart",
      method: "POST",
      data: {
        id: e.target.dataset.add,
      },
      success: function (data) {
        if (+data === 1) {
          Toastify({
            text: "Add product success",
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
  };
  //load product
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
            <a href="./Product/detailProduct/${item.maSanPham}">
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
            </a>

                <div class="content_right_product_message">
                    <div class="content_right_product_message_box">
                        <p><i class="fa-solid fa-message"></i></p>
                    </div>
                    <div class="content_right_product_Wishlist_box" data-add=${
                      item.maSanPham
                    }>
                        <p>AddCart</p>
                    </div>
                </div>
        </div>`;
            $(".content_right_products").append(template);
          });
          category
            ? getAmount(isActive, DEFAULT_LIMIT, category)
            : getAmount(isActive);
          autoScroll();
          $(".content_right_product_Wishlist_box").click(
            handleAddProductToCart
          );
        }
      },
    });
  };
  loadProduct();

  //get total product
  const getAmount = (isActive, limit = DEFAULT_LIMIT, byCategory) => {
    $.ajax({
      url: "./Ajax/getAmount",
      method: "POST",
      data: byCategory ? { byCategory } : "",
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

  //get product when click pagination
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
          const offset = (page - 1) * DEFAULT_LIMIT;
          callFetchData(offset, page);
        }
      });
    });
  }

  //// handle responsive menu filter
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
  ////////

  //// handle filter product by category
  let listRadio1 = $(".content_left_title1 .content_left_text");
  listRadio1 = [...listRadio1];
  for (const radio of listRadio1) {
    radio.addEventListener("click", function () {
      if (!this.matches(".chose")) {
        const categorySelect = this.querySelector("p").dataset.category;
        const offset = 0;
        const isActive = 1;
        categorySelect === "all"
          ? loadProduct(offset, isActive)
          : loadProduct(offset, isActive, categorySelect);
      }
      for (const item of listRadio1) {
        item.classList.remove("chose");
      }
      this.classList.add("chose");
    });
  }
});
