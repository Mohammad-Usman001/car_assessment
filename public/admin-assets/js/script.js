
document.addEventListener("DOMContentLoaded", function () {

    const sidebar = document.getElementById("adminSidebar");
    const overlay = document.getElementById("overlay");
    const btnMobileToggle = document.getElementById("btnMobileToggle");
    const btnCollapse = document.getElementById("btnCollapse");

    if(btnMobileToggle){
        btnMobileToggle.addEventListener("click", function(){
            sidebar.classList.add("show");
            overlay.classList.add("show");
        });
    }

    if(overlay){
        overlay.addEventListener("click", function(){
            sidebar.classList.remove("show");
            overlay.classList.remove("show");
        });
    }

    if(btnCollapse){
        btnCollapse.addEventListener("click", function(){
            sidebar.classList.toggle("collapsed");
        });
    }
});
