<div class="modal" id="passwordModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Password</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div id="passwordForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input type="password" class="form-control" name="old_password" id="old_password" required>
                        <span id="perror" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                        <span id="perror" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="password_confirmation" required>
                        <span id="cerror" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="Save" value="Save" class="btn btn-primary" id="upPassword">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

$(document).on('click', "#updatePassword", function() {
    $('#passwordModal').modal('show');
});
$(document).on('focusout', '#password', function() {
    var password = $(this).val();
    if (password.length < 8) {
        $('#perror').text('Password must be at least 8 characters');
    } else {
        $('#perror').text('');
    }
})
$(document).on('focusout', '#password_confirmation', function() {
    var cpassword = $(this).val();
    var password = $('#password').val();
    if (password != cpassword) {
        $('#cerror').text('Password do not match');
    } else {
        $('#cerror').text('');
    }
});

$(document).on('click', '#upPassword', function(e) {
    e.preventDefault();
    var password = $('#password').val();
    var password_confirmation = $('#password_confirmation').val();
    var old_password = $('#old_password').val();
    $.ajax({
        type: 'POST',
        url: "{{ route('admin.update-password') }}",
        data: {
            new_password: password,
            old_password: old_password,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.status == false) {
                Swal.fire({
                    title: "Oops!",
                    text: response.message,
                    icon: "error"
                });
            } else {
                Swal.fire({
                    title: "Great!",
                    text: response.message,
                    icon: "success"
                }).then(function() {
                    $('#passwordModal').modal('hide');
                })
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
</script>