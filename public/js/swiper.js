window.addEventListener("load", () => {
  const swiper = new Swiper(".swiper", {
    direction: "horizontal",
    loop: true,
    slidesPerView: 2,
    spaceBetween: 20,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      480: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      970: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
  });

  //open input search when click search icon
  $(".header_icon_search").click(function () {
    $(".input_header_search").toggleClass("show_input");
  });
  $(".input_header_search").focus(function () {
    $(".drop_down_search").css("display", "block");
  });
  $(".input_header_search").blur(function () {
    $(".drop_down_search").css("display", "none");
  });
  $(".input_header_search").keyup(function () {
    console.log(this.value);
  });
  $(".scroll_top").click(() => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});
