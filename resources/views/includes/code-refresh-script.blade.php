<script>

    $('#refresh_code').click(function () {

        $.ajax({
            url:'{{ route('join_code.new') }}',
            beforeSend: function(){
                $('#code_icon').removeClass('fa-refresh').fadeOut(500);
                $('#code_icon').addClass('fa-close').fadeIn(2000);
                $('#refresh_code').addClass('btn-danger').fadeIn(2000);
                // $('button[type=submit]').addAttribute('disabled');
            },
            success: res => {
                $('#code_icon').removeClass('fa-close');
                $('#refresh_code').removeClass('btn-danger');
                $('#code_icon').addClass('fa-refresh');
                $('#refresh_code').addClass('btn-primary');
                // $('button[type=submit]').removeAttribute('disabled');
                $('input[name=join_code]').val(res.join_code);
            }
        });
    });


</script>
