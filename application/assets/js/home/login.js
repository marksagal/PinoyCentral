$(document).ready(() => {
    var body = $('body');
    var username = $('.username');
    var password = $('.password');
    const ajax = new Ajax();

    body.on('click', '.login', (e) => {
        e.preventDefault();
        ajax.get({
            username: username.val(),
            password: password.val()
        }, '/rest/login')
        .then((oResponse) => {
            console.log(oResponse);
        })
        .catch((oResponse) => {
            console.log(oResponse);
        });
    });
});
