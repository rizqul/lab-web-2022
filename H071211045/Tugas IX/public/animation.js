/*
*  Simple Animation Script by Sofyan Pujas
*  Github > http://github.com/sofyanox12
*/

const allTabs = document.querySelectorAll('.tab');
const sidebarButtons = document.querySelectorAll('.btn-side');

function showTable(button, classTab) {
    var button = document.getElementById(button);
    button.addEventListener('click', function () {
        sidebarButtons.forEach(btn => {
            btn.disabled = false;
        });
        button.disabled = true;
        var tab = document.getElementsByClassName(classTab)[0];
        for (let i = 0; i < sidebarButtons.length; i++) {
            sidebarButtons[i].style = "background-color : var(--beige); color : var(--dark);";
        }

        for (let i = 0; i < allTabs.length; i++) {
            allTabs[i].style.transform = 'translateX(200%)';
        }
        button.style = "background-color : var(--skin); box-shadow: 0 0 0.5rem 0.2rem var(--skin); ";
        tab.style.display = "block";
        slideToRight(tab, 250, 12);
    });
}

function slideToRight(element, start, end) {
    let id = null;
    let pos = start;
    clearInterval(id);
    id = setInterval(() => {
        if (pos == end) {
            clearInterval(id);
            return;
        } else {
            pos -= 1;
            element.style.transform = 'translateX(' + pos + '%)';
        }
    }, .5);
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
            pos += 1;
            element.style.transform = 'translateX(' + pos + '%)';
        }
    }, .5);
}
