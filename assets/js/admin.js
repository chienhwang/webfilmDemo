var tabLinks = document.querySelectorAll(".tablinks");

var tabContent =document.querySelectorAll(".tab_content");


tabLinks.forEach(function(el) {
   el.addEventListener("click", openTabs);
});


function openTabs(el) {
   var btn = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
   var tab = btn.dataset.tab; // lấy giá trị trong data-tabe

   tabContent.forEach(function(el) {
      el.classList.remove("active");
   }); //lặp qua các tab content để remove class active

   tabLinks.forEach(function(el) {
      el.classList.remove("active");
   }); //lặp qua các tab links để remove class active

   document.querySelector("#" + tab).classList.add("active");
   // trả về phần tử đầu tiên có id="" được add class active
   
   btn.classList.add("active");
   // các button mà chúng ta click vào sẽ được add class active
}