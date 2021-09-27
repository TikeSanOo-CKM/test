// JSAT NAVI CUSTOM SCRIPT
$(function () {
    // サイドバー初期化
    initSidebar();

    // イベント登録
    registEvent();

    // Swiper初期化
    initSwiper();
});

function initSidebar() {
    $sidebar = $(".sidebar");

    $sidebar_img_container = $sidebar.find(".sidebar-background");

    $full_page = $(".full-page");

    $sidebar_responsive = $("body > .navbar-collapse");

    window_width = $(window).width();

    fixed_plugin_open = $(".sidebar .sidebar-wrapper .nav li.active a p").html();

    if (window_width > 767 && fixed_plugin_open == "Dashboard") {
        if ($(".fixed-plugin .dropdown").hasClass("show-dropdown")) {
            $(".fixed-plugin .dropdown").addClass("open");
        }
    }
}

/**
 * イベント登録
 */
function registEvent() {
    // イベントハンドラ
    $(".category_nav_item").on("mouseenter", function () {
        $(this).addClass("is_active");
    });
    $(".category_nav_item").on("mouseleave", function () {
        $(this).removeClass("is_active");
    });
    $(".iine_btn").on("click", function () {
        var $iineCnt = $(this).parent().parent().parent().find(".iine_cnt");
        var iineCnt = 0;
        if ($(this).prop("checked")) {
            iineCnt = Number($iineCnt.text()) + 1;
        } else {
            iineCnt = Number($iineCnt.text()) - 1;
        }
        $iineCnt.text(iineCnt);
    });
    $("#minimizeSidebar").on("click", function () {
        $(".nav-item ").find(".collapse").removeClass("show");
    });
    $(".follow_btn").on("click", function () {
        if ($(this).hasClass("is_active")) {
            $(this).text("フォロー").removeClass("is_active");
        } else {
            $(this).text("フォロー中").addClass("is_active");
        }
    });
}

function initSwiper() {
    var sliderSelector1 = "#pick_up_swiper",
        options1 = {
            init: false,
            loop: true,
            speed: 800,
            slidesPerView: 2,
            // spaceBetween: 10,
            centeredSlides: true,
            effect: "coverflow",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            grabCursor: true,
            parallax: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                1023: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
            },
            // Events
            on: {
                imagesReady: function () {
                    this.el.classList.remove("loading");
                },
            },
        };
    if ($('#pick_up_swiper').length != 0) {
        var mySwiper1 = new Swiper(sliderSelector1, options1);

        // Initialize slider
        mySwiper1.init();
    }

    var sliderSelector2 = "#classic_swiper",
        options2 = {
            init: false,
            loop: false,
            speed: 800,
            slidesPerView: 5,
            effect: "slide",
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        };
    if ($('#classic_swiper').length != 0) {
        var mySwiper2 = new Swiper(sliderSelector2, options2);

        // Initialize slider
        mySwiper2.init();
    }


    var sliderSelector3 = "#new_swiper",
        options3 = {
            init: false,
            loop: false,
            speed: 800,
            slidesPerView: 5,
            effect: "slide",
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        };
    if ($('#new_swiper').length != 0) {
        var mySwiper3 = new Swiper(sliderSelector3, options3);

        // Initialize slider
        mySwiper3.init();
    }

    var sliderSelector4 = "#topic_swiper",
        options4 = {
            init: false,
            loop: false,
            speed: 800,
            slidesPerView: 5,
            effect: "slide",
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        };
    if ($('#topic_swiper').length != 0) {
        var mySwiper4 = new Swiper(sliderSelector4, options4);

        // Initialize slider
        mySwiper4.init();
    }
}
