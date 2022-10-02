window.addEventListener("load", () => {
  const scrollTo = document.querySelector(".content-product");
  let elmPosition = scrollTo.getBoundingClientRect();
  window.scrollTo({
    top: elmPosition.top,
    behavior: "smooth",
  });
});
