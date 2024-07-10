function editUser(id) {
    $.get('/users/' + id, function (user) {
        console.log('User data:', user);

        var date = new Date(user.date);
        $('#date').val(date.toISOString()); //.split('T')[0]
        $('#userId').val(user.id); // Almacenar el ID del usuario
        $('#code').val(user.code);
        $('#amount').val(user.amount);
        $('#github').val('https://github.com/');

        $.get('/api/getUsers', function (data) {
            console.log('GetUsers data:', data);
            var select = $('#code');
            //select.empty();
            $.each(data, function (key, value) {
                select.append('<option value="' + value.code + '">' + value.code +
                    '</option>');
            });
            select.val(user.code);
        });

        $('#editModal').modal('show');
    });
}

$('#editForm').on('submit', function (e) {
    e.preventDefault();

    var id = $('#userId').val(); // Usar el ID del usuario del campo oculto
    var formData = {
        code: $('#code').val(),
        amount: $('#amount').val(),
        date: $('#date').val(),
        github: $('#github').val(),
    };

    $.post('/users/' + id, formData, function (response) {
        console.log('Update response:', response);
        if (response.status === 200) {
            $('#editModal').modal('hide');
            location.reload();
        } else {
            alert('Failed to update user.');
        }
    });
});

