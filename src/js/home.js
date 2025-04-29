let tahun = document.getelementbyselector("#tahun");
let year = new Date();

console.log(year.getFullYear());

tahun.innerText = year.getFullYear();
