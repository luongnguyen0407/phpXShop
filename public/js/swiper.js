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

  // $('.scroll_top').click(()=>{
  //   const scrollTo = document.querySelector(".heading_header");
  //   let elmPosition = scrollTo.getBoundingClientRect();
  //   window.scrollTo({
  //     top: elmPosition.top,
  //     behavior: "smooth",
  //   });
  // })
  $(".scroll_top").click(() => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});
