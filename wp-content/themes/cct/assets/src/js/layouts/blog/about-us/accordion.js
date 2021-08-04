var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var ctm = this.nextElementSibling;
        if (ctm.style.maxHeight) {
            ctm.style.maxHeight = null;
        } else {
            ctm.style.maxHeight = ctm.scrollHeight + "px";
        }
    });
}
// <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
// $(document).ready(function(){
//     $(".itm ").click(function(){
//         if($(this).next(".ctm").hasClass("active")){
//             $(this).next(".ctm").removeClass("active").slideUp()
//             $(this).children("i").removeClass("fa-minus").addClass("fa-plus")
//         }
//         else {
//             $(".border-parent .ctm").removeClass("active").slideUp()
//             $(".border-parent .itm i").removeClass("fa-minus").addClass("fa-plus");
//             $(this).next(".ctm").addClass("active").slideDown()
//             $(this).children("i").removeClass("fa-plus").addClass("fa-minus")
//         }
//     })
// })




