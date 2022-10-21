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
    item.addEventListener("focus", (e) => {
      e.target.nextElementSibling.classList.toggle("open");
    });
  });

  btnSubmit.addEventListener("click", (e) => {
    const detailAddress = document.querySelector(".detailAddress");
    e.preventDefault();
    const province = listProvince.previousElementSibling.value;
    const detailAddressVal = detailAddress.value;
    const district = listDistrict.previousElementSibling.value;
    const ward = listWard.previousElementSibling.value;
    console.log(province, district, ward);
    console.log(detailAddressVal);
  });
});
