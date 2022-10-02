$(window).on("load", () => {
  $(".eyeshow").click((e) => {
    if (e.target.matches(".fa-eye")) {
      e.target.classList.remove("fa-eye");
      $(".inputPass").attr("type", "text");
    } else {
      e.target.classList.add("fa-eye");
      $(".inputPass").attr("type", "password");
    }
  });
});
