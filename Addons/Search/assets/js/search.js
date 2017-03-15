/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function (e) {
    jQuery('.search-panel .dropdown-menu').find('a').click(function (e) {
        e.preventDefault();
        var filter = $(this).attr("href").replace("#", "");
        var concept = $(this).text();
        jQuery('.search-panel span#search_concept').text(concept);
        jQuery('.input-group #search_filter').val(filter);
    });
});


