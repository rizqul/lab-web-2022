let addBtn = document.getElementById("add-btn");
let editBtn = document.getElementById("editButton");
let cancelBtn = document.getElementById("cancel");
let formPanel = document.getElementById("add");
let overlay = document.getElementById("carousel-box");
let idData;

addBtn.onclick = () => {
  formPanel.style.display = "block";
};

editBtn.onclick = () => {
  console.log("edit button");
  formPanel.style.display = "block";
};

cancelBtn.onclick = () => {
  document.getElementById("form").reset();
  formPanel.style.display = "none";
};

overlay.onclick = () => {
  document.getElementById(idData).style.display = "none";
  document.getElementById("carousel-box").style.display = "none";
};

function viewImages(id) {
  let carousel = document.getElementById(id);
  let overlay = document.getElementById("carousel-box");
  carousel.style.display = "block";
  overlay.style.display = "block";
  console.log("show images of " + id);
  idData = id;
}
