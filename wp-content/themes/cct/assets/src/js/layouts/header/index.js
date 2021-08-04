( function ( $ ) {
	class Header {
		constructor() {
			this.initializeHeader();
		}

		initializeHeader() {
			this.fixScroll();
			this.mobile();
		}
		fixScroll() {
			var header = new Headroom(document.querySelector(".cct-header"), {
				tolerance: 5,
				offset : 205,
				classes: {
					initial: "animated",
					pinned: "slideDown",
					unpinned: "slideUp"
				}
			});
			header.init();
		}
		mobile() {
			$('#dl-menu').dlmenu({
				animationClasses : { classin : 'dl-animate-in-5', classout : 'dl-animate-out-5' }
			});
		}
	}
	new Header();
})( jQuery );