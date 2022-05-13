$(function () {
    $('#form_user').submit((e) => {
        e.preventDefault();

        const formData = $('#form_user').serialize();

        $.ajax({
            url: 'http://localhost:8080/usercontroller/saveUser',
            type: "POST",
            cache: false,
            data: formData,
            processDate: false,
            contentType: false,
            dataType: "JSON",
            success: (data) => {
                if (data.status) {
                    Swal.fire('User created!', '', 'success')
                } else {
                    Swal.fire('Error', data.msg, 'danger')
                }
            },
            error: (response) => {
                console.log(response)
            }
        })
    })
})