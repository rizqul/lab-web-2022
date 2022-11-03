document.getElementsByClassName('btn-add')[0].addEventListener('click', function () {
    resetField();
    document.getElementsByClassName('overlay')[0].style.display = 'block';
    animateBox('input-data');
}
);

document.getElementsByClassName('btn-close')[0].addEventListener('click', function () {
    resetField();
    document.getElementsByClassName('input-data')[0].style.display = 'none';
    document.getElementsByClassName('overlay')[0].style.display = 'none';
}
);

function resetField() {
    document.getElementById('save-button').innerHTML = 'Add Data';
    document.getElementById('project_name').value = '';
    document.getElementById('head_staff').value = '';
    document.getElementById('research_code').value = '';
    document.getElementById('status').value = '';
    document.getElementById('save-button').className = 'btn btn-primary';
}

function animateBox(className) {
    let id = null;
    const elem = document.getElementsByClassName(className)[0];
    elem.style = 'display: block; transform: translate(100%, -50%); opacity: 50%;';
    let pos = 100;

    clearInterval(id);

    id = setInterval(frame, 1);

    function frame() {
        if (pos == -50) {
            elem.style.opacity = 1;
            clearInterval(id);
            return;
        } else {
            pos -= 1.5;
            // elem.style.opacity = -(pos*2) + '%';
            elem.style.transform = 'translate(' + pos + '%, -50%)';
        }
    }
}