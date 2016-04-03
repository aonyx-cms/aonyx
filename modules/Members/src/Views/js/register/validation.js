jQuery(document).ready(function() {

    jQuery('#username').mouseleave(function() {
        //jQuery('#username').val('Ta quitté');
        var msg = '',
            ajax = jQuery.ajax({

            url: 'index.php?module=members&action=ajax_validation',
            type: 'POST',
            data: {username: jQuery('#username').val()},
            dataType: "json"
        });

        ajax.done(function(data){
            msg = data.responseText;
        });

        console.log(msg);
    });



    //jQuery('#username').mouseenter(function() {
    //    jQuery('#username').val('T\'es entré');
    //});

});