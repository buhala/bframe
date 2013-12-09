$(function () {
    $('label').each(function () {
        var name = $(this).attr('for');
        
        $('.text-input[name='+name+']').attr('id', name);
        
        
        if($(this).hasClass('required')) {
            $(this).removeClass('required');
            $(this).append(' <span class="required">*</span>');
        }
    });
});