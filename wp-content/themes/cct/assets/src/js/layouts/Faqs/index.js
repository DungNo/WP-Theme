( function ( $ ) {
    class faqs {
        constructor() {
            this.faqsAccordion();
        }

        faqsAccordion() {
            this.accordion();
        }
        accordion() {
            $(document).ready(function () {
                $(".cct-tab-title").click(function () {
                    $(".cct-tab-title").removeClass("add");
                    $(this).addClass("add");
                    let wrapper = $(this).next(".line");
                    let wrapper1 = wrapper.next(".cct-tab-content");
                    if (wrapper1.hasClass("active")) {
                        wrapper1.removeClass("active").slideUp()
                        $(".cct-accordion-icon-closed").removeClass("d-none")
                        $(".cct-accordion-icon-opened").removeClass("d-block")
                    } else {
                        $(".cct-tab-title .cct-accordion-icon-closed").removeClass("d-none")
                        $(".cct-tab-title .cct-accordion-icon-opened").removeClass("d-block")
                        $(".cct-accordion-item .cct-tab-content").removeClass("active").slideUp()
                        wrapper1.addClass("active").slideDown()

                        $(".add .cct-accordion-icon-closed").addClass("d-none")
                        $(".add .cct-accordion-icon-opened").addClass("d-block")
                    }
                })
            })
        }

    }
    new faqs();
} )( jQuery );