( function ( $ ) {
    class Categories {
        constructor() {
            this.initializeCategory();
        }

        initializeCategory() {
            this.showcategories();
        }
        showcategories(){
            $(".categorybtn").click(function(){
                $('#category').toggleClass('show1');
            });
        }

    }
    new Categories();
})( jQuery );