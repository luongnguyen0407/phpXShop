$(document).ready(function () {
  $(".btn_comment").click(function () {
    const productId = this.parentNode.dataset.product;
    $("#modal-4").addClass("is-open");
    $("#modal-4").attr("aria-hidden", "false");
    load_comment(productId);
    $(".modal__title").text(`Danh sách bình luận đơn hàng ${productId}`);
  });
  $(".modal__close").click(function () {
    $("#modal-4").removeClass("is-open");
    $("#modal-4").attr("aria-hidden", "true");
  });

  $(document).on("click", ".btn_remove_comment", function () {
    const idStr = this.dataset.remove;
    if (!idStr) return;
    const id = idStr.split("&");
    const idCm = id[0];
    const idProduct = id[1];
    swal({
      title: `Id ${idCm}`,
      text: "Bạn muốn xóa comment này ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        axios({
          method: "post",
          url: "./Ajax/deleteComment",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          data: {
            idCm,
          },
        }).then(function (res) {
          if (+res.data === 1) {
            load_comment(idProduct);
            swal("Xóa thành công", {
              icon: "success",
            });
          } else {
            swal("Server Bận", {
              icon: "Error",
            });
          }
        });
      }
    });
  });

  function load_comment(idProduct) {
    // console.log(idProduct);
    if (!idProduct) return;
    $.ajax({
      url: "./Ajax/getComment",
      method: "POST",
      data: {
        id: Number(idProduct),
      },
      success: function (res) {
        const data = JSON.parse(res);
        $(".list_product_comment").text("");
        if (!data || data.length <= 0) {
          const template = " <p >Sản phẩm này chưa có bình luận nào</p>";
          $(".list_product_comment").append(template);
          return;
        }
        data.forEach((element) => {
          const template = ` <li class="list_comment_item">
            <div class="wrap_list_comment_text">
                <p class="user_name_order">${element.userName}</p>
                <p class="user_add_order user_user_comment">${element.dateCreate}</p>
                <p class="user_details_order">${element.content}</p>
            </div>
            <div class="modal_action">
                <button class="modal__btn modal__btn-primary btn_remove_comment" data-remove=${element.idCm}&${idProduct}>Xóa</button>
                <button class="modal__btn modal__btn_add btn_view_comment" data-micromodal-close aria-label="Close this dialog window"><a href="Product/detailProduct/${idProduct}">Xem</a></button>
            </div>
        </li>`;
          $(".list_product_comment").append(template);
        });
      },
    });
  }
});
