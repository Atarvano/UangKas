const button = document.querySelector("#burger-btn");

button.addEventListener("click", function () {
  const sidebar = document.querySelector("#sidebar");
  sidebar.classList.toggle("active");
});
