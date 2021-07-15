function JWTAuth() {
}

JWTAuth.routes = {
    login: "http://127.0.0.1/login?token=on",
    loginByToken: "http://127.0.0.1/login/token"
};

JWTAuth.login = function () {
    var newWindow = JWTAuth.openCallbackWindow('', 'Login');

    $.get(JWTAuth.routes.login, {}, function (data) {
        newWindow.location.href = "http://127.0.0.1/login?token=on";
    });
};

JWTAuth.message = function (e) {
    e.preventDefault();

    if (!e.data.token) {
        return;
    }

    if (!e.data.hasOwnProperty('token')) {
        return;
    }

    if (e.data.token === '') {
        return;
    }

    $.post(JWTAuth.routes.loginByToken, {token: e.data.token}, function (data) {
        if (data.result === true) {
            location.reload();
        }
    })
};

JWTAuth.openCallbackWindow = function (url, title, options) {
    if (typeof url === 'object') {
        options = url;
        url = ''
    }

    options = { url: url, title: title, width: 600, height: 720};

    var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screen.left;
    var dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screen.top;
    var width = window.innerWidth || document.documentElement.clientWidth || window.screen.width;
    var height = window.innerHeight || document.documentElement.clientHeight || window.screen.height;

    options.left = ((width / 2) - (options.width / 2)) + dualScreenLeft;
    options.top = ((height / 2) - (options.height / 2)) + dualScreenTop;

    var optionsStr = Object.keys(options).reduce(function (acc, key) {
        acc.push(key+'='+options[key]);
        return acc
    }, []).join(',');

    var newWindow = window.open(url, title, optionsStr);

    if (window.focus) {
        newWindow.focus()
    }

    return newWindow
};

$(function() {

    JWTAuth.routes.login = "http://127.0.0.1/login?token=on",
    JWTAuth.routes.loginByToken = "http://127.0.0.1/login/token"

    window.addEventListener('message', JWTAuth.message);

    $("[data-type='login']").on('click', function () {
        JWTAuth.login();
    })

});