/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(function (jQuery) {
    if (jQuery(window).width() > 769) {
        jQuery('.navbar .dropdown').hover(function () {
            jQuery(this).find('.dropdown-menu').first().stop(true, true).delay(500).slideDown();

        }, function () {
            jQuery(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

        });

        jQuery('.navbar .dropdown > a').click(function () {
            location.href = this.href;
        });

    }
});


