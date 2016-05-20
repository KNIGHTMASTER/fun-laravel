(function() {

    var laravel = {
        initialize: function() {
            this.methodLinks = $('a[data-method]');
            this.token = $('a[data-token]');
            this.registerEvents();
        },

        registerEvents: function() {
            this.methodLinks.on('click', this.handleMethod);
        },

        handleMethod: function(e) {
            var link = $(this);
            var httpMethod = link.data('method').toUpperCase();
            var form;

            // If the data-method attribute is not PUT or DELETE,
            // then we don't know what to do. Just ignore.
            if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
                return;
            }

            // Allow user to optionally provide data-confirm="Are you sure?"
            if ( link.data('confirm') ) {
                if ( ! laravel.verifyConfirm(link) ) {
                    return false;
                }
            }

            form = laravel.createForm(link);
            form.submit();

            e.preventDefault();
        },

        verifyConfirm: function(link) {
            return confirm(link.data('confirm'));
        },

        createForm: function(link) {
            var form =
                $('<form>', {
                    'method': 'POST',
                    'action': link.attr('href')
                });

            var token =
                $('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': link.data('token')
                });

            var hiddenInput =
                $('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

            return form.append(token, hiddenInput)
                .appendTo('body');
        }
    };

    laravel.initialize();

})();
/*
$(document).ready(function() {
    $("button.remove").on('click', function(e){
        e.preventDefault();
        if ( ! confirm('Are you sure?')) {
            return false;
        }
        var action = $(this).data("action");
        var parent = $(this).parent();
        $.ajax({
            type: 'delete',
            url: action,
            data: '_token='+token,
            beforeSend: function() {
                parent.closest("tr").animate({'backgroundColor':'#fb6c6c'},300);
            },
            error: function(msg) {
                alert(msg.responseJSON[0]);
            },
            success: function() {
                parent.slideUp(300,function() {
                    parent.closest("tr").remove();
                });
            }
        });
    })
});*/
