(function ($) {
    $(document).on(`scroll`, function (e) {
        if (($(this).scrollTop() == 0)) {
            // Top of the page
            $(`.robo-header`).removeClass(`robo-floating-nav`);
        } else {
            // Scrolling down the page
            $(`.robo-header`).addClass(`robo-floating-nav`);
        }
    });
})(jQuery);
