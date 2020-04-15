window.$ = jQuery;
var isApollo = $("meta[name=apollo-enabled]").attr("content") === "1";

function switchNightMode() {
    var night =
        document.cookie.replace(
            /(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/,
            "$1"
        ) || "0";
    if (night == "0") {
        document.body.classList.add("nice-dark-mode");
        document.cookie = "night=1;path=/";
        console.log("夜间模式开启");
    } else {
        document.body.classList.remove("nice-dark-mode");
        document.cookie = "night=0;path=/";
        console.log("夜间模式关闭");
    }
}
(function () {
    if (
        document.cookie.replace(
            /(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/,
            "$1"
        ) === ""
    ) {
        if (new Date().getHours() > 21 || new Date().getHours() < 6) {
            document.body.classList.add("nice-dark-mode");
            document.cookie = "night=1;path=/";
            console.log("夜间模式开启");
        } else {
            document.body.classList.remove("nice-dark-mode");
            document.cookie = "night=0;path=/";
            console.log("夜间模式关闭");
        }
    } else {
        var night =
            document.cookie.replace(
                /(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/,
                "$1"
            ) || "0";
        if (night == "0") {
            document.body.classList.remove("nice-dark-mode");
        } else {
            if (night == "1") {
                document.body.classList.add("nice-dark-mode");
            }
        }
    }
})();

function toggleDarkMode() {
    $("body").toggleClass("nice-dark-mode");
    if (!$("body").hasClass("nice-dark-mode")) {
        $(".logo-dark").removeClass("d-inline-block");
        $(".logo-dark").addClass("d-none");

        $(".logo-light").removeClass("d-none");
        $(".logo-light").addClass("d-inline-block");
        $(".excerpt-text").addClass("d-inline-block");
    } else {
        $(".logo-dark").removeClass("d-none");
        $(".logo-dark").addClass("d-inline-block");
        $(".logo-light").removeClass("d-inline-block");
        $(".logo-light").addClass("d-none");
        $(".excerpt-text").removeClass("d-inline-block");
    }
}
// mobile Sidebar
function toggleSidebar() {
    $(".sidebar-close, .mobile-overlay").on("click", function () {
        $("body").removeClass("modal-open");
        $(".mobile-sidebar").removeClass("active");
        $(".mobile-overlay").removeClass("active");
    });
    $("#sidebarCollapse").on("click", function () {
        $("body").addClass("modal-open");
        $(".mobile-sidebar").addClass("active");
        $(".mobile-overlay").addClass("active");
        $(".collapse.in").toggleClass("in");
        $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
}
jQuery(document).ready(function ($) {
    toggleSidebar();
    $(window).scroll(function () {
        var $window = $(window),
            $window_width = $window.width();

        if ($(this).scrollTop() > 200 && $window_width >= 1024) {
            $("#scroll_to_top").filter(":hidden").fadeIn("fast");
        } else {
            $("#scroll_to_top").filter(":visible").fadeOut("fast");
        }
    });
    $("#scroll_to_top").on("click", function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            "slow"
        );
        return false;
    });

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
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
                $("html, body").animate(
                    {
                        scrollTop: target.offset().top - 60,
                    },
                    1000,
                    "easeInOutExpo"
                );
                return false;
            }
        }
    });

    // Tooltip
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="tooltip"]').on("shown.bs.tooltip", function () {
        $(".tooltip").addClass("animated fadeIn");
    });

    // theiaStickySidebar
    $(".sidebar").theiaStickySidebar({
        additionalMarginTop: 20,
        additionalMarginBottom: 20,
    });
    // theiaStickySidebar
    $(".sidebar-author").theiaStickySidebar({
        additionalMarginTop: 100,
        additionalMarginBottom: 20,
    });
    if ($(".main-menu li").hasClass("menu-item-has-children")) {
        $(".main-menu .menu-item-has-children").prepend(
            '<span class="icon-sub-menu"><i class="iconfont icon-arrow-down-s-line"></i></span>'
        );
    }
    $(".mobile-sidebar-menu .menu-item-has-children > a").append(
        '<div class="dropdown-sub-menu"><span class="iconfont icon-arrow-drop-down-fill"></span></div>'
    ),
        $(".dropdown-sub-menu").on("click", function () {
            $(this).parents("li").children(".sub-menu").slideToggle(),
                $(this)
                    .parents("li")
                    .children(".dropdown-sub-menu")
                    .toggleClass("current");
        });

    // carousel
    var owl = $(".list-banner .owl-carousel");
    if (owl.length > 0) {
        owl.owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            smartSpeed: 1000,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    margin: 10,
                    nav: false,
                },
                768: {
                    nav: true,
                    navText: [
                        '<i class="iconfont icon-left"></i>',
                        '<i class="iconfont icon-right"></i>',
                    ],
                },
                992: {
                    nav: true,
                    navText: [
                        '<i class="iconfont icon-left"></i>',
                        '<i class="iconfont icon-right"></i>',
                    ],
                },
            },
        });
    }

    $(document).on("click", ".single-popup", function (event) {
        event.preventDefault();
        var img = $(this).data("img");
        var title = $(this).data("title");
        var desc = $(this).data("desc");
        var html =
            '<div class="text-center"><h6 class="py-1">' +
            title +
            '</h6>\
                    <div class="text-muted text-sm mb-2" > ' +
            desc +
            ' </div>\
                    <img src="' +
            img +
            '" alt="' +
            title +
            '" style="width:100%;height:auto;">\
                    </div>';
        ncPopup("small", html);
    });
    $(document).on("click", ".plus-power-popup", function (event) {
        event.preventDefault();
        var $this = $("#plus-power-popup-wrap");
        ncPopup("no-padding", $this.html());
    });
    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <=
                (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <=
                (window.innerWidth || document.documentElement.clientWidth)
        );
    }
    function givenElementInViewport(el, fn) {
        return function () {
            if (isElementInViewport(el)) {
                fn.call();
            }
        };
    }
    function addViewportEvent(el, fn) {
        if (window.addEventListener) {
            addEventListener(
                "DOMContentLoaded",
                givenElementInViewport(el, fn),
                false
            );
            addEventListener("load", givenElementInViewport(el, fn), false);
            addEventListener("scroll", givenElementInViewport(el, fn), false);
            addEventListener("resize", givenElementInViewport(el, fn), false);
        } else if (window.attachEvent) {
            attachEvent("DOMContentLoaded", givenElementInViewport(el, fn));
            attachEvent("load", givenElementInViewport(el, fn));
            attachEvent("scroll", givenElementInViewport(el, fn));
            attachEvent("resize", givenElementInViewport(el, fn));
        }
    }

    $(document).on("click", ".link-post-share", function (event) {
        event.preventDefault();
        $(this).parent().toggleClass("show");
        $("body").toggleClass("modal-open");
        $(".mobile-overlay").addClass("active");
    });
    if ($(".content-share").hasClass("show") === false) {
        $(document).on(
            "click",
            ".nice-dropdown .weixin, .mobile-overlay",
            function (event) {
                event.preventDefault();
                $(".content-share").removeClass("show");
                $("body").removeClass("modal-open");
                $(".mobile-overlay").removeClass("active");
            }
        );
    }
    //生成目录索引列表
    function GenerateContentList() {
        var jquery_h2_list = $("#article-post h2"); 
        if (jquery_h2_list.length > 0) {
            var content = '';
            content += "<ul id='menu-list' class='list-group'>";
            for (var i = 0; i < jquery_h2_list.length; i++) {
                $(jquery_h2_list[i]).attr("id", $(jquery_h2_list[i]).text());
                var li_content =
                    '<li class="list-group-item"><a href="#' +
                    $(jquery_h2_list[i]).text() +
                    '">' +
                    $(jquery_h2_list[i]).text() +
                    "</a></li>";
                content += li_content;
            }
            content += "</ul>";
            content += "</div>";
            if ($("#article-menu")) {
                $("#article-menu").append(content);
            }
            if ($("#m-article-menu")) {
                $("#m-article-menu").append(content);
            }
            console.log($("#article-menu"));
            
            console.log(content);
        }
    }
    renderMathInElement(document.body, {
        delimiters: [{
                left: "$$",
                right: "$$",
                display: true
            },
            {
                left: "$",
                right: "$",
                display: false
            }
        ]
    });
    GenerateContentList();
}); // End of use strict

//点击加载更多
jQuery(document).ready(function ($) {
    //点击下一页的链接(即那个a标签)
    $(".next").click(function () {
        $this = $(this);
        $this.addClass("loading").text("正在努力加载"); //给a标签加载一个loading的class属性，用来添加加载效果
        var href = $this.attr("href"); //获取下一页的链接地址
        if (href != undefined) {
            //如果地址存在
            $.ajax({
                //发起ajax请求
                url: href,
                //请求的地址就是下一页的链接
                type: "get",
                //请求类型是get
                error: function (request) {
                    //如果发生错误怎么处理
                },
                success: function (data) {
                    //请求成功
                    $this.removeClass("loading").text("点击查看更多"); //移除loading属性
                    var $res = $(data).find(".post"); //从数据中挑出文章数据，请根据实际情况更改
                    $("#content").append($res.fadeIn(500)); //将数据加载加进posts-loop的标签中。
                    var newhref = $(data).find(".next").attr("href"); //找出新的下一页链接
                    if (newhref != undefined) {
                        $(".next").attr("href", newhref);
                    } else {
                        $(".next").remove(); //如果没有下一页了，隐藏
                    }
                },
            });
        }
        return false;
    });
});