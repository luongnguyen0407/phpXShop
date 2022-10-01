window.addEventListener("load", () => {
  const giam = document.querySelector(".rai");
  const tang = document.querySelector(".su");
  const slInput = document.querySelector(".sl");
  if (giam && tang) {
    giam.addEventListener("click", () => {
      if (slInput.value != 0) {
        slInput.value = Number(slInput.value) - 1;
      }
    });
    tang.addEventListener("click", () => {
      slInput.value = Number(slInput.value) + 1;
    });
  }
  const InputComment = document.querySelector(".textComment");
  const commentBtn = document.querySelector(".sendComment");
  InputComment.addEventListener("input", (e) => {
    e.target.value
      ? commentBtn.removeAttribute("disabled")
      : commentBtn.setAttribute("disabled", "");
  });
});
