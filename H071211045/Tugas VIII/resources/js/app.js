import './bootstrap';

const modal = document.getElementById('modal');

// Buttons
const buttonAdd = document.getElementById('add-button');
const buttonClose = document.getElementById('close-button');

buttonAdd.addEventListener('click', function() {
    modal.style.display = 'block';
});

buttonClose.addEventListener('click', function() {
    modal.style.display = 'none';
});
