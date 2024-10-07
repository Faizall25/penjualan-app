(function ($) {
    "use strict";

    // Page loading animation
    $(window).on("load", function () {
        $("#js-preloader").addClass("loaded");
    });

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var box = $(".header-text").height();
        var header = $("header").height();

        if (scroll >= box - header) {
            $("header").addClass("background-header");
        } else {
            $("header").removeClass("background-header");
        }
    });

    var width = $(window).width();
    $(window).resize(function () {
        if (width > 767 && $(window).width() < 767) {
            location.reload();
        } else if (width < 767 && $(window).width() > 767) {
            location.reload();
        }
    });

    const filterButtons = document.querySelectorAll(".event_filter li a");
    const eventItems = document.querySelectorAll(".event-item-parent");

    function filter(category, items) {
        items.forEach((item) => {
            const isItemFiltered =
                item.dataset.category.toLowerCase() !== category.toLowerCase();
            const isShowAll = category.toLowerCase() === "*";
            if (isItemFiltered && !isShowAll) {
                item.classList.add("hide");
            } else {
                item.classList.remove("hide");
            }
        });
    }

    filterButtons.forEach((button) => {
        button.addEventListener("click", () => {
            filterButtons.forEach((btn) => {
                if (btn === button) {
                    btn.classList.add("is_active");
                } else {
                    btn.classList.remove("is_active");
                }
            });

            const currentCategory = button.dataset.filter;
            filter(currentCategory, eventItems);
        });
    });

    /** legacy
	 * 
	const elem = document.querySelector('.event_box');
	const filtersElem = document.querySelector('.event_filter');
	if (elem) {
		const rdn_events_list = new Isotope(elem, {
			itemSelector: '.event_outer',
			layoutMode: 'fitRows'
		});
		if (filtersElem) {
			filtersElem.addEventListener('click', function(event) {
				if (!matchesSelector(event.target, 'a')) {
					return;
				}
				const filterValue = event.target.getAttribute('data-filter');
				rdn_events_list.arrange({
					filter: filterValue
				});
				filtersElem.querySelector('.is_active').classList.remove('is_active');
				event.target.classList.add('is_active');
				event.preventDefault();
			});
		}
	}
	*/

    $(".owl-banner").owlCarousel({
        center: true,
        items: 1,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        ],
        margin: 30,
        responsive: {
            992: {
                items: 1,
            },
            1200: {
                items: 1,
            },
        },
    });

    $(".owl-testimonials").owlCarousel({
        center: true,
        items: 1,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        ],
        margin: 30,
        responsive: {
            992: {
                items: 1,
            },
            1200: {
                items: 1,
            },
        },
    });

    // Menu Dropdown Toggle
    if ($(".menu-trigger").length) {
        $(".menu-trigger").on("click", function () {
            $(this).toggleClass("active");
            $(".header-area .nav").slideToggle(200);
        });
    }

    // Menu elevator animation
    $(".scroll-to-section a[href*=\\#]:not([href=\\#])").on(
        "click",
        function () {
            if (
                location.pathname.replace(/^\//, "") ==
                    this.pathname.replace(/^\//, "") &&
                location.hostname == this.hostname
            ) {
                var target = $(this.hash);
                target = target.length
                    ? target
                    : $("[name=" + this.hash.slice(1) + "]");
                if (target.length) {
                    var width = $(window).width();
                    if (width < 767) {
                        $(".menu-trigger").removeClass("active");
                        $(".header-area .nav").slideUp(200);
                    }
                    $("html,body").animate(
                        {
                            scrollTop: target.offset().top - 80,
                        },
                        700
                    );
                    return false;
                }
            }
        }
    );

    $(document).ready(function () {
        // $(document).on("scroll", onScroll);

        //smoothscroll
        $('.scroll-to-section a[href^="#"]').on("click", function (e) {
            e.preventDefault();
            $(document).off("scroll");

            $(".scroll-to-section a").each(function () {
                $(this).removeClass("active");
            });
            $(this).addClass("active");

            // var target = this.hash,
            // menu = target;
            // var target = $(this.hash);
            // $('html, body').stop().animate({
            //     scrollTop: (target.offset().top) - 79
            // }, 500, 'swing', function () {
            //     window.location.hash = target;
            //     $(document).on("scroll", onScroll);
            // });
        });
    });

    // function onScroll(event){
    //     var scrollPos = $(document).scrollTop();
    //     $('.nav a').each(function () {
    //         var currLink = $(this);
    //         var refElement = $(currLink.attr("href"));
    //         if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
    //             $('.nav ul li a').removeClass("active");
    //             currLink.addClass("active");
    //         }
    //         else{
    //             currLink.removeClass("active");
    //         }
    //     });
    // }

    // Page loading animation
    $(window).on("load", function () {
        if ($(".cover").length) {
            $(".cover").parallax({
                imageSrc: $(".cover").data("image"),
                zIndex: "1",
            });
        }

        $("#preloader").animate(
            {
                opacity: "0",
            },
            600,
            function () {
                setTimeout(function () {
                    $("#preloader").css("visibility", "hidden").fadeOut();
                }, 300);
            }
        );
    });

    const dropdownOpener = $(".main-nav ul.nav .has-sub > a");

    // Open/Close Submenus
    if (dropdownOpener.length) {
        dropdownOpener.each(function () {
            var _this = $(this);

            _this.on("tap click", function (e) {
                var thisItemParent = _this.parent("li"),
                    thisItemParentSiblingsWithDrop =
                        thisItemParent.siblings(".has-sub");

                if (thisItemParent.hasClass("has-sub")) {
                    var submenu = thisItemParent.find("> ul.sub-menu");

                    if (submenu.is(":visible")) {
                        submenu.slideUp(450, "easeInOutQuad");
                        thisItemParent.removeClass("is-open-sub");
                    } else {
                        thisItemParent.addClass("is-open-sub");

                        if (thisItemParentSiblingsWithDrop.length === 0) {
                            thisItemParent
                                .find(".sub-menu")
                                .slideUp(400, "easeInOutQuad", function () {
                                    submenu.slideDown(250, "easeInOutQuad");
                                });
                        } else {
                            thisItemParent
                                .siblings()
                                .removeClass("is-open-sub")
                                .find(".sub-menu")
                                .slideUp(250, "easeInOutQuad", function () {
                                    submenu.slideDown(250, "easeInOutQuad");
                                });
                        }
                    }
                }

                e.preventDefault();
            });
        });
    }
})(window.jQuery);
