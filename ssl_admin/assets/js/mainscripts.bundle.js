function initSparkline() {
    $(".sparkline").each(function () {
        var a = $(this);
        a.sparkline("html", a.data())
    })
}

function skinChanger() {
    $(".choose-skin li").on("click", function () {
        var a = $("body"), b = $(this), c = $(".choose-skin li.active").data("theme");
        $(".choose-skin li").removeClass("active"), a.removeClass("theme-" + c), b.addClass("active"), a.addClass("theme-" + b.data("theme"))
    })
}

$(function () {
    "use strict";
    skinChanger(), initSparkline(), $.Mplify.rightSideBar.activate(), setTimeout(function () {
        $(".page-loader-wrapper").fadeOut()
    }, 50)
}), $.Mplify = {}, $(document).ready(function () {
    "use strict";
    $("#main-menu").metisMenu(), $("#leftsidebar .sidebar-scroll").slimScroll({
        height: "calc(100vh - 65px)",
        wheelStep: 10,
        touchScrollStep: 50,
        color: "#efefef",
        size: "2px",
        borderRadius: "3px",
        alwaysVisible: !1,
        position: "right"
    }), $("#rightsidebar .sidebar-scroll").slimScroll({
        height: "calc(100vh - 60px)",
        wheelStep: 10,
        touchScrollStep: 50,
        color: "#efefef",
        size: "2px",
        borderRadius: "3px",
        alwaysVisible: !1,
        position: "right"
    }), $(".cwidget-scroll").slimScroll({
        height: "300px",
        wheelStep: 10,
        touchScrollStep: 50,
        color: "#efefef",
        size: "2px",
        borderRadius: "3px",
        alwaysVisible: !1,
        position: "right"
    }), $(".btn-toggle-fullwidth").on("click", function () {
        $("body").hasClass("menu-icon") ? $("body").removeClass("menu-icon") : ($("body").addClass("menu-icon"), $(".menu-icon .metismenu li").hover(function () {
            $(this).addClass("hover")
        }, function () {
            $(this).removeClass("hover")
        }))
    }), $(".btn-toggle-offcanvas").on("click", function () {
        $("body").toggleClass("offcanvas-active")
    }), $("#main-content").on("click", function () {
        $("body").removeClass("offcanvas-active")
    }), $('[data-toggle="tooltip"]').length > 0 && $('[data-toggle="tooltip"]').tooltip(), $('[data-toggle="popover"]').length > 0 && $('[data-toggle="popover"]').popover(), $(window).on("load", function () {
        $("#main-content").height() < $("#leftsidebar").height() && $("#main-content").css("min-height", $("#leftsidebar").innerHeight() - $("footer").innerHeight())
    }), $(window).on("load resize", function () {
        $(window).innerWidth() < 420 ? $(".navbar-brand logo.svg").attr("src", "assets/images/logo-icon.svg") : $(".navbar-brand logo-icon.svg").attr("src", "assets/images/logo.svg")
    }), $(".navbar-nav .icon-menu").hover(function () {
        $(this).toggleClass("animated jello")
    }), $(".accordion2 > .accordion-item.is-active").children(".accordion-panel").slideDown(), $(".accordion2 > .accordion-item").click(function () {
        $(this).siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp(), $(this).toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out")
    }), $("a.mega_menu").on("click", function () {
        $(".mega_menubar").toggleClass("open animated bounceIn")
    }), $('[data-toggle="cardloading"]').on("click", function () {
        var a = $(this).data("loadingEffect"), b = $(this).parents(".card").waitMe({
            effect: a,
            text: "Loading...",
            bg: "rgba(255,255,255,0.90)",
            color: "#555"
        });
        setTimeout(function () {
            b.waitMe("hide")
        }, 2e3)
    }), $(".full-screen").on("click", function () {
        $(this).parents(".card").toggleClass("fullscreen")
    })
}), $.fn.clickToggle = function (a, b) {
    return this.each(function () {
        var c = !1;
        $(this).bind("click", function () {
            return c ? (c = !1, b.apply(this, arguments)) : (c = !0, a.apply(this, arguments))
        })
    })
}, $(".select-all").on("click", function () {
    this.checked ? $(this).parents("table").find(".checkbox-tick").each(function () {
        this.checked = !0
    }) : $(this).parents("table").find(".checkbox-tick").each(function () {
        this.checked = !1
    })
}), $(".checkbox-tick").on("click", function () {
    $(this).parents("table").find(".checkbox-tick:checked").length == $(this).parents("table").find(".checkbox-tick").length ? $(this).parents("table").find(".select-all").prop("checked", !0) : $(this).parents("table").find(".select-all").prop("checked", !1)
}), $.Mplify.rightSideBar = {
    activate: function () {
        var a = this, b = $("#rightsidebar"), c = $(".overlay");
        $(".js-right-sidebar").on("click", function () {
            b.toggleClass("open"), a.isOpen() ? c.fadeIn() : c.fadeOut()
        }),
            $(".close-sidebar").click(function () {
                b.toggleClass("open"), a.isOpen() ? c.fadeIn() : c.fadeOut()
            });
    }, isOpen: function () {
        return $(".right-sidebar").hasClass("open")
    }
};