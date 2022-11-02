document.getElementsByClassName('btn-add')[0].addEventListener('click', function () {
    document.getElementsByClassName('input-data')[0].style = 'display: block; transform: translate(100%, -50%); opacity: 50%;';
    document.getElementsByClassName('overlay')[0].style.display = 'block';
    resetField();
    animateBox();
}
);

document.getElementsByClassName('btn-close')[0].addEventListener('click', function () {
    document.getElementsByClassName('input-data')[0].style.display = 'none';
    document.getElementsByClassName('overlay')[0].style.display = 'none';
    resetField();
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

function animateBox() {
    let id = null;
    const elem = document.getElementsByClassName('input-data')[0];
    let pos = 100;

    clearInterval(id);

    id = setInterval(frame, 20);

    function frame() {
        if (pos == -50) {
            elem.style.opacity = 1;
            clearInterval(id);
            return;
        } else {
            pos -= 3;
            elem.style.opacity = -(pos*2) + '%';
            elem.style.transform = 'translate(' + pos + '%, -50%)';
        }
    }
}



