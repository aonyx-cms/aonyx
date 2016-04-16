jQuery(document).ready(function() {

    /**
     * Fonction : Requête AJAX
     * @param _urlActionController
     * @param _methodType
     * @param _attachment
     * @param _dataType
     * @param _appendTo
     * @private
     */
    var _ajaxRequest = function (_urlActionController, _methodType, _attachment, _dataType, _appendTo) {

        ajax = jQuery.ajax({
            url: _urlActionController,
            type: _methodType,
            data: { attachment:jQuery(_attachment).val()  },
            dataType: _dataType
        });

        ajax.done(function(data){

            if('' != data) {
                jQuery(_appendTo).html(data);
            } else {
                jQuery(_appendTo).html('');
            }

        });

    };

    /**
     * Event si on quitte le focus du champ username
     * on déclenche une requête en AJAX
     */
    jQuery('#username').focusout(function() {

        _ajaxRequest('index.php?module=members&action=ajax_validation_username', 'POST', '#username', 'html', '#ajax-username');
    });

    /**
     * Event si on quitte le focus du champ email
     * on déclenche une requête en AJAX
     */
    jQuery('#email').focusout(function() {

        _ajaxRequest('index.php?module=members&action=ajax_validation_email', 'POST', '#email', 'html', '#ajax-email');
    });

});