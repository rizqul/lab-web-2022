import './bootstrap';
import { parseJSON } from 'jquery';

// Item
const modalLabel = document.getElementById('updating-label');
const formField = document.getElementById('form-field');

// Buttons
const buttonAdd = document.getElementById('add-button');
const buttonClose = document.getElementById('close-button');
const buttonEdit = document.querySelectorAll('.edit-button');
const buttonDelete = document.querySelectorAll('.delete-button');
const buttonSubmit = document.getElementById('submit-button');

// Events
buttonAdd.addEventListener('click', function () {

    modalLabel.innerHTML = 'Add a new Book';
    buttonSubmit.innerHTML = 'Add Book';
    buttonSubmit.classList.remove('bg-cooper');
    buttonSubmit.classList.add('bg-dark')
    formField.setAttribute("action", "/store");

    setField('book_name', '');
    setField('author', '');
    setField('category', '');
    setField('favorable', '');

    animateIn('overlay-modal', 'modal');
});

buttonClose.addEventListener('click', function () {
    animateOut('overlay-modal', 'modal');
});

buttonEdit.forEach(function (button) { // Looping untuk setiap button edit
    button.addEventListener('click', function () { // Apabila button edit spesifik di klik

        const data = parseJSON(button.getAttribute('data'));

        modalLabel.innerHTML = 'Edit this Book\'s data';
        buttonSubmit.innerHTML = 'Update Book';
        buttonSubmit.classList.remove('bg-dark');
        buttonSubmit.classList.add('bg-cooper');
        formField.setAttribute("action", "/edit");
        console.log(data);
        setField('edit-id', data.id);
        setField('book_name', data.book_name);
        setField('author', data.author);
        setField('category', data.category);
        setField('favorable', data.favorable);

        animateIn('overlay-modal', 'modal');
    });
});

buttonDelete.forEach(function (button) { // Looping untuk setiap button delete
    button.addEventListener('click', function () {
        setField('delete-id', button.getAttribute('data'));
        // console.log(button.getAttribute('data'));
        animateIn('overlay-delete', 'delete');

        document.getElementById('cancel-delete').addEventListener('click', function () {
            setField('delete-id', '');
            animateOut('overlay-delete', 'delete');
        });
    });
});

// Functions
function setField(id, x) {
    document.getElementById(id).value = x;
}

function animateIn(idOfOverlay, idOfModal) {
    const overlay = document.getElementById(idOfOverlay);
    const box = document.getElementById(idOfModal);
    let id = null;
    let pos = 100;
    let opacity = 50;
    overlay.style = 'display: block; opacity: ' + opacity + '%;';
    box.style = 'display: block; transform: translate(' + pos + '%, -50%); opacity: 50%;';

    clearInterval(id);

    id = setInterval(() => {
        if (pos <= -50) {
            overlay.style.opacity = 100 + '%';
            box.style.opacity = 1;
            clearInterval(id);
            return;
        } else {
            opacity += 1;
            pos -= 1.5;
            box.style.transform = 'translate(' + pos + '%, -50%)';
            overlay.style.opacity = opacity + '%';
        }
    }, 0.5);
}

function animateOut(idOfOverlay, idOfModal) {
    const overlay = document.getElementById(idOfOverlay);
    const box = document.getElementById(idOfModal);
    let id = null;
    let pos = -50;
    let opacity = 100;
    box.style = 'display: block; transform: translate('+ pos +'%, -50%); opacity: ' + opacity + '%;'; // Posisi Awal

    clearInterval(id);

    id = setInterval(() => {
        if (pos <= -250) {
            box.style.opacity = 0;
            overlay.style.opacity = 0;
            overlay.style.display = 'none';
            box.style.display = 'none';
            clearInterval(id);
            return ;
        } else {

            console.log(pos);
            pos -= 1.5;
            opacity -= 1;
            box.style.transform = 'translate(' + pos + '%, -50%)';
            overlay.style.opacity = opacity + '%';
        }
    }, 0.5);
}
