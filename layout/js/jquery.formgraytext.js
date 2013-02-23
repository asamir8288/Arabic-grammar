(function($){

    $.fn.formGrayText = function(options){

        var opts = $.extend({},$.fn.formGrayText.defaults,options);

        return this.each(function(){
            var Element = $(this);
            var title = Element.attr('title');
            if(Element.val() == ''){
                Element.val(title);
                Element.addClass('gray_text');
            }
            Element.focusin(function(){
                title = Element.attr('title');
                if($(this).val() == title){
                    $(this).val('');
                    $(this).removeClass('gray_text');
                }
            });
            Element.focusout(function(){
                title = Element.attr('title');
                if($(this).val() == ''){
                    $(this).val(title);
                    $(this).addClass('gray_text');
                }
            });
            Element.closest('form').submit(function(){
                title = Element.attr('title');
                if(Element.val() == title)
                    Element.val('');
            })
        });
    };

    $.fn.formGrayText.defaults = {
    };

})(jQuery);