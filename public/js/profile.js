window.addEventListener("load", () => {
  const listProvince = document.querySelector(".wrap_list_pr1 .list_province");
  const listDistrict = document.querySelector(".wrap_list_pr2 .list_province");
  const listWard = document.querySelector(".wrap_list_pr3 .list_province");
  const listInput = document.querySelectorAll(".wrap_list_pr input");
  const btnSubmit = document.querySelector(".address_btn");
  const apiProvince = "https://vapi.vnappmob.com//api/province";
  const apiDistrict = "https://vapi.vnappmob.com//api/province/district/";
  const apiWard = "https://vapi.vnappmob.com//api/province/ward/";
  const handleSelectProvince = (node) => {
    const listLi = node.querySelectorAll("li");
    const inputShow = node.previousElementSibling;
    const nodeParent = +node.parentElement.dataset.parent;
    [...listLi].forEach((item) => {
      item.addEventListener("click", (e) => {
        const provinceId = e.target.dataset.province;
        inputShow.value = e.target.textContent;
        node.classList.remove("open");
        switch (nodeParent) {
          case 1:
            handleGetData(apiDistrict, listDistrict, provinceId);
            break;
          case 2:
            handleGetData(apiWard, listWard, provinceId);
            break;
          default:
            break;
        }
      });
    });
  };
  const handleGetData = (api = apiProvince, node, search) => {
    let newApi = search ? api + search : api;
    axios
      .get(newApi)
      .then(function (response) {
        // handle success
        const { data } = response;
        if (!data) return;
        insertAdjacentHtml(node, data.results);
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      });
  };

  const insertAdjacentHtml = (node, data) => {
    if (!data && data.length < 1) return;
    node.textContent = "";
    data.forEach((element) => {
      let id = element.district_id || element.province_id || element.ward_id;
      let name =
        element.province_name || element.district_name || element.ward_name;
      const template = `<li data-province = ${id}>${name}</li>`;
      node.insertAdjacentHTML("beforeend", template);
    });
    handleSelectProvince(node);
  };
  handleGetData(apiProvince, listProvince);

  listInput.forEach((item) => {
    item.addEventListener("click", (e) => {
      e.target.nextElementSibling.classList.toggle("open");
    });
  });

  btnSubmit.addEventListener("click", (e) => {
    e.preventDefault();
    const checkNumberPhone = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
    // if () console.log("ok");
    const province = listProvince.previousElementSibling.value;
    const phoneNumber = $(".phone_oder").val();
    const userName = $(".name_oder").val();
    const detailAddressVal = $(".detailAddress").val();
    const district = listDistrict.previousElementSibling.value;
    const ward = listWard.previousElementSibling.value;
    if (
      !province ||
      !detailAddressVal ||
      !district ||
      !ward ||
      !userName ||
      !phoneNumber
    ) {
      showToast("Missing value");
    }
    if (!checkNumberPhone.test(phoneNumber)) {
      showToast("Number phone invalid");
      return;
    }
    let data = {
      province,
      district,
      ward,
      userName,
      phoneNumber,
      detailAddressVal,
    };
    data = JSON.stringify(data);
    $.ajax({
      url: "./Ajax/addAddress",
      method: "POST",
      data: { data },
      success: function (data) {
        if (!data) {
          showToast("Server not response");
          return;
        }
        showToast("Add new address success", true);
        getListAddress();
      },
      error: function (error) {
        swal("Server not response");
      },
    });
  });

  function getListAddress() {
    $.ajax({
      url: "./Ajax/getAddress",
      method: "GET",
      success: function (res) {
        console.log(res);
        let data = JSON.parse(res);
        if (data && data.length > 0) {
          $(".wrap_list_address ul").text("");
          data.forEach((element) => {
            const template = ` <li>
            <div class="wrap_list_address_text" data-address = ${element.idAddress}>
                <p class="user_name_order">${element.tenKH} | ${element.sdt}</p>
                <p class="user_add_order">${element.province}, ${element.district}, ${element.ward}</p>
                <p class="user_details_order">${element.detail_address}</div>
            <div class="wrap_list_address_btn">
                <button class="btn_up">Update</button>
                <button class="btn_del">Delete</button>
            </div>
        </li>`;
            $(".wrap_list_address ul").append(template);
          });
          $(".btn_del").click(handleDeleteAddress);
        }
      },
      error: function (error) {
        swal("Server not response");
      },
    });
  }
  getListAddress();

  const handleDeleteAddress = (e) => {
    swal({
      title: "Are you sure?",
      text: "Bạn muốn xóa địa chỉ giao hàng này?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        const addressId =
          e.target.parentNode.previousElementSibling.dataset.address;
        $.ajax({
          url: "./Ajax/deleteAddress",
          method: "POST",
          data: {
            id: addressId,
          },
          success: function (res) {
            if (+res === 1) {
              // server return 1 when success
              showToast("Delete address success");
              e.target.parentNode.parentNode.remove();
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            }
          },
          error: function (error) {
            swal("Server not response");
          },
        });
      }
    });
  };

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
