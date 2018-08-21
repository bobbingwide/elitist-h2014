jQuery(window).load(function() {

    beforeafter_resize();

    jQuery(window).on("debouncedresize", function( event ) {
        beforeafter_resize();
    });



    function beforeafter_resize(){
        var $beforeafter = jQuery(".ql_beforeafter");
        var ba_parent = $beforeafter.parent().width();

        var $img_before;
        var img_ratio;
        var total_height;

        $beforeafter.each(function() {

            $img_before = jQuery(this).find("img[alt='before']");
            img_ratio = $img_before.width() / $img_before.height();
            total_height = ba_parent/img_ratio;

            //Parent div
            jQuery(this).width(ba_parent)
                   .height(total_height).attr('height', total_height);

            //Image Before
            $img_before.width(ba_parent).attr('width', ba_parent)
                       .height(total_height).attr('height', total_height)
                       .parent().width(ba_parent / 2).height(total_height).attr('height', total_height);

            //Image After
             jQuery(this).find("img[alt='after']").width(ba_parent).attr('width', ba_parent)
                                             .height(total_height).attr('height', total_height)
                                             .parent().width(ba_parent).height(total_height).attr('height', total_height);

            jQuery(this).find(".ui-draggable").css('left', (ba_parent / 2) - 4 ).css('top', '0').height(total_height).children('div').height(total_height);
            jQuery(this).find("img[id*='handle']").css('top', total_height/2);

        });

    }//beforeafter_resize

});