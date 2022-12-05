!function (l) { "use strict"; l("#sidebarToggle, #sidebarToggleTop").on("click", function (e) { l("body").toggleClass("sidebar-toggled"), l(".sidebar").toggleClass("toggled"), l(".sidebar").hasClass("toggled") && l(".sidebar .collapse").collapse("hide") }), l(window).resize(function () { l(window).width() < 768 && l(".sidebar .collapse").collapse("hide"), l(window).width() < 480 && !l(".sidebar").hasClass("toggled") && (l("body").addClass("sidebar-toggled"), l(".sidebar").addClass("toggled"), l(".sidebar .collapse").collapse("hide")) }), l("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel", function (e) { var o; 768 < l(window).width() && (o = (o = e.originalEvent).wheelDelta || -o.detail, this.scrollTop += 30 * (o < 0 ? 1 : -1), e.preventDefault()) }), l(document).on("scroll", function () { 100 < l(this).scrollTop() ? l(".scroll-to-top").fadeIn() : l(".scroll-to-top").fadeOut() }), l(document).on("click", "a.scroll-to-top", function (e) { var o = l(this); l("html, body").stop().animate({ scrollTop: l(o.attr("href")).offset().top }, 1e3, "easeInOutExpo"), e.preventDefault() }) }(jQuery);



/**
 * Profile Input Trigger
 */
$(".changeProfilePic").click(() => {
    $(".profilePic").click();
});


// Random Password Generate For User
$(".generatePasswordForUser").click(() => {
    let userPassword = $(".userPassword");
    let chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let password = "";
    for (var i = 0; i <= 16; i++) {
        var randomNumber = Math.floor(Math.random() * chars.length);
        password += chars.substring(randomNumber, randomNumber + 1);
    }
    userPassword.val(password);
});

// User Form Profile Pic Uploading
$(".ProfilePicBtn").click(() => {
    $(".userProfilePic").click();
})
$(".userProfilePic").change(function (e) {
    e.preventDefault();
    var textbox = $(".ProfilePicBtn");
    var fileName = $(this).val().split('\\').pop();
    textbox.text(fileName);
});