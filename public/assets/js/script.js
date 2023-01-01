$(document).ready(function(){
    function copyToClipboard(element, text) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(text).select();
        document.execCommand("copy");
        $temp.remove();
    }

    $('#link_store').on('submit', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();
        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType : 'json',
            success: function(data) {
                $('#link_store')[0].reset();
                $('#link_message').empty().removeClass('alert-danger alert-success');
                if (data.errors) {
                    $('#link_message').text(data.errors.full_link).addClass('alert-danger');
                } else {
                    var url = data.url;
                    copyToClipboard('link', url);
                    $('#link_message').text('Link is coplied to your clipboard').addClass('alert-success');
                }
            },
            error: function() {
                alert('There was some error occur!');
            }
        });
        return false;
    });

    
});
$('body').on('click','#delete_confirmation',function(e){
    e.preventDefault();
    $(document).find('#delete_action').attr('action',$(this).attr('data-action'));
});