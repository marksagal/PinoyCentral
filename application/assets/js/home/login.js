$(document).ready(() => {
    var body = $('body');
    var username = $('.username');
    var password = $('.password');
    var hash = $('.hash');;
    const ajax = new Ajax();

    $('#login_form').validator('update').on('submit', (e) => {
        if (e.isDefaultPrevented()) {
        } else {
            e.preventDefault();
            ajax.get({
                username: username.val(),
                password: password.val()
            }, '/login/rest/' + hash.val())
            .then((oResponse) => {
                console.log(oResponse);
            })
            .catch((oResponse) => {
                console.log(oResponse);
            });
        }
    });
});
