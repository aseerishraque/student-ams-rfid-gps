<script>
    $('input[type=radio]').change(function () {
        if ($('#list_type').is(':checked')){
            $('#group_list').removeClass('d-none');
            $('#group_new').addClass('d-none');
            $('#new_name').prop('disabled', true);
            $('#list_value').prop('disabled', false);
        }else{
            $('#group_new').removeClass('d-none');
            $('#group_list').addClass('d-none');
            $('#new_name').prop('disabled', false);
            $('#list_value').prop('disabled', true);
        }
    });
</script>
