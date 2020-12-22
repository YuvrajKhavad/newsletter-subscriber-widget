jQuery(document).ready(function($) 
{
    var form = $("#subscriber-form");
    form.submit(function(e)
    {
        e.preventDefault();
        
        // form data
        var subscriber_data = form.serialize();
        
        // submit form
        $.ajax({
            type: 'post',
            url: form.attr('action'),
            data: subscriber_data
        }).done(function(response)
        {
            var form_msg = $("#form-msg");
            // if success
            form_msg.removeClass('error');
            form_msg.addClass('success');

            // Set message text
            form_msg.text(response);

            // clear field
            $("#name").val('');
            $("#email").val('');

        }).fail(function(data)
        {
            // if error
            form_msg.removeClass('success');
            form_msg.addClass('error');

            // Set message text
            form_msg.text(response);
            
            if(data.responseText !== '')
            {
                form_msg.text(data.responseText);
            }
            else
            {
                form_msg.text('Message was not send');
            }
        });
    });
});