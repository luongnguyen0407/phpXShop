const inputFile = document.querySelector(".inputFile");
const imgPew = document.querySelector(".img-pview");
inputFile.addEventListener("change", (e) => {
  const [file] = e.target.files;
  if (file) {
    src = URL.createObjectURL(file);
    imgPew.setAttribute("src", src);
  }
});
