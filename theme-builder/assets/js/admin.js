jQuery(function($){
    $(document).on('click', '#radio-a', function(){
        var data = {
            'action': 'template_404_update',
            'post_id': $(this).data('post-id'),
            'message' : 'Deactivate',
            'status': 'no'
        };
        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        jQuery.post(themeim_hfb_obj.ajax_url, data, function(response) {
            $('.themeim-error').html(response);
        });
    });
    $(document).on('click', '#radio-b', function(){
        var data = {
            'action': 'template_404_update',
            'post_id': $(this).data('post-id'),
            'message' : 'Active',
            'status': 'yes'
        };
        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        jQuery.post(themeim_hfb_obj.ajax_url, data, function(response) {
            $('.themeim-error').html(response);
        });
    });
    let currentPageType = $('#yotta_template_type').val();

    if(currentPageType == 'f0f') {
        $('.active-404-page').show();
        $('.display-settings').hide();
    }else{
        $('.active-404-page').hide();
        $('.display-settings').show();
    }

    $('#yotta_template_type').on('change', function(){
        if($(this).val() == 'f0f') {
            $('.active-404-page').show();
            $('.display-settings').hide();
        }else{
            $('.active-404-page').hide();
            $('.display-settings').show();
        }
    });

 
    
});