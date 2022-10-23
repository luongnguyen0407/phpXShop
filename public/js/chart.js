window.addEventListener("load", () => {
  axios({
    method: "get",
    url: "./Ajax/DashboardManage",
  }).then((res) => {
    createCharDoughnut(res.data);
    createCharHorizontal(res.data);
  });
  function createCharDoughnut(data) {
    if (!data) return;
    new Chart(document.getElementById("doughnut-chart"), {
      type: "doughnut",
      data: {
        labels: ["Hoá Đơn", "Khách Hàng", "Sản Phẩm"],
        datasets: [
          {
            label: "Population (millions)",
            backgroundColor: [
              "#3e95cd",
              "#8e5ea2",
              "#3cba9f",
              "#e8c3b9",
              "#c45850",
            ],
            data: [data.HoaDon, data.KhachHang, data.SanPham],
          },
        ],
      },
      options: {
        title: {
          display: true,
          text: "Predicted world population (millions) in 2050",
        },
      },
    });
  }
  function createCharHorizontal(data) {
    if (!data) return;
    new Chart(document.getElementById("bar-chart-horizontal"), {
      type: "bar",
      data: {
        labels: ["Hoá Đơn", "Khách Hàng", "Sản Phẩm"],
        datasets: [
          {
            label: "Population (millions)",
            backgroundColor: [
              "#3e95cd",
              "#8e5ea2",
              "#3cba9f",
              "#e8c3b9",
              "#c45850",
            ],
            data: [data.HoaDon, data.KhachHang, data.SanPham],
          },
        ],
      },
      options: {
        indexAxis: "x",
        legend: { display: false },
        title: {
          display: true,
          text: "Predicted world population (millions) in 2050",
        },
      },
    });
  }
});
