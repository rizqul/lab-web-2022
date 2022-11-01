let addBtn = document.getElementById("add-btn");
let cancelBtn = document.getElementById("cancel");
let formPanel = document.getElementById("add");

addBtn.onclick = () => {
  formPanel.style.display = "block";
};

cancelBtn.onclick = () => {
  document.getElementById("form").reset();
  formPanel.style.display = "none";
};
