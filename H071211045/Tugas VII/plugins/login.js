const loginForm = document.getElementById('login-form');
const regisForm = document.getElementById('registration-form');
const checkbox = document.getElementById('reg-log');

function slideToRight(element, start, end) {
    let id = null;
    let pos = start;
    clearInterval(id);
    id = setInterval(() => {
        if (pos == end) {
            clearInterval(id);
            return;
        } else {
            pos += 2;
            element.style.transform = 'translateX(' + pos + '%)';
        }
    }, 1);
}

function slideToLeft(element, start, end) {
    let id = null;
    let pos = start;
    clearInterval(id);
    id = setInterval(() => {
        if (pos == end) {
            clearInterval(id);
            return;
        } else {
            pos -= 2;
            element.style.transform = 'translateX(' + pos + '%)';
        }
    }, 1);
}


checkbox.addEventListener('change', function () {
    if (this.checked) {
        slideToRight(loginForm, -50, 200);
        slideToRight(regisForm, -250, -50);
    } else {
        slideToLeft(loginForm, 200, -50);
        slideToLeft(regisForm, -50, -250);
    }
});