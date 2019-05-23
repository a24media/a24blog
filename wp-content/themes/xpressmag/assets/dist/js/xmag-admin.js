jQuery(document).ready(function($) {
    "use strict";

    /**
     * Image upload at widget
     */
    $('body').on('click','.selector-labels label', function(){
        var $this = $(this);
        var value = $this.attr('data-val');
        $this.siblings().removeClass('selector-selected');
        $this.addClass('selector-selected');
        $this.closest('.selector-labels').next('input').val(value);
    });

});