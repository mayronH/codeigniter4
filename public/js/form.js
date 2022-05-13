$(function () {
    $('#form_user').submit(function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: 'http://localhost:8080/usercontroller/saveUser',
            type: "POST",
            cache: false,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: (data) => {
                if (data.status) {
                    Swal.fire('Success!', data.msg, 'success')
                } else {
                    Swal.fire('Error', data.msg, 'error')
                }
            },
            error: (response) => {
                console.log(response)
            }
        })
    })
})