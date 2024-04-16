<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
setTimeout(function() {
    $('#successMessage').fadeOut('fast');
}, 3000);

$(document).on('click', '#noteupdate', function() {
    var id = $(this).data('id');
    var url = $(this).data('url')
    var newurl = $(this).data('newurl');
    $.ajax({
        url: newurl,
        type: 'PUT',
        success: function(response) {
            window.location = url;
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
        }
    });
})
</script>