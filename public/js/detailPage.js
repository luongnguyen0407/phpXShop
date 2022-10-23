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

$(document).ready(function () {
  $("#comment_form").on("submit", function (event) {
    event.preventDefault();
    const idProduct = $("#comment_form").data("product");
    let form_data = $(".content_comment_input").val();
    $.post(
      "./Ajax/pushComment",
      {
        comment: form_data,
        idProduct,
      },
      function (data) {
        console.log("ok");
        $("#comment_form")[0].reset();
        load_comment();
      }
    );
  });

  load_comment();

  function load_comment() {
    const idProduct = $("#comment_form").data("product");
    $.ajax({
      url: "./Ajax/getComment",
      method: "POST",
      data: {
        id: Number(idProduct),
      },
      success: function (data) {
        console.log(data);
        const res = JSON.parse(data);
        $(".product_detail_review_wrapper").text("");
        res.forEach((item) => {
          const template = `<li>
          <img src="https://images.unsplash.com/photo-1544481921-fb52f37ba73c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
          <div class="comment_infor">
              <p class="name_user_comment">${item.userName}</p>
              <p class="date_user_comment">${item.dateCreate}</p>
              <div class="product_detail_start_vote">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
              </div>
              <p class="content_comment">
                  ${item.content}
              </p>
          </div>
      </li>`;

          $(".product_detail_review_wrapper").append(template);
        });
      },
    });
  }

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
  $(".btn_add_cart").click(handleAddProductToCart);
});
