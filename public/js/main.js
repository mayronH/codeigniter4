
function displayMessage(message) {
    switch (message['type']) {
        case 'success':
            toastr.success(message['body'], message['title']);
            break;
        case 'info':
            toastr.info(message['body'], message['title']);
            break;
        case 'warning':
            toastr.warning(message['body'], message['title']);
            break;
        case 'error':
            toastr.error(message['body'], message['title']);
            break;
    }
}