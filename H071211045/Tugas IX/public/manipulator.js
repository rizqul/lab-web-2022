/*
*  Simple Manipulator Script by Sofyan Pujas
*  Github > http://github.com/sofyanox12
*/

const overlay = document.querySelector('.overlay');
const requestInputs = document.querySelectorAll('.requests');


function setButton(buttonID, session) {
    const title = document.getElementById('modal-title');
    const button = document.getElementById(buttonID);

    button.addEventListener('click', function () {

        overlay.style.display = 'block';
        requestInputs[0].innerHTML = '';

        title.innerHTML = buttonID.includes('add') ?
            'Add ' + buttonID.split('-')[1] :
            'Edit ' + buttonID.split('-')[1];

        if (buttonID == 'add-product') {
            requestFor('Name', 'Name', 'product_name', 'text');
            requestFor('Seller\'s ID', 'Seller\' ID', 'seller_id', 'number');
            requestFor('Category\'s ID', 'Category\' ID', 'category_id', 'number');
            requestFor('Price', 'Price', 'product_price', 'number');
            requestFor('Status', 'Status', 'product_status', 'text');

        } else if (buttonID == 'add-category') {
            requestFor('Name', 'Name', 'category_name', 'text');
            requestFor('Status', 'Status', 'category_status', 'text');

        } else if (buttonID == 'add-seller') {
            requestFor('Name', 'Name', 'seller_name', 'text');
            requestFor('Address', 'Address', 'seller_address', 'text');
            requestFor('Gender', 'Gender', 'seller_gender', 'text');
            requestFor('Phone', 'Phone', 'seller_phone', 'text');
            requestFor('Status', 'Status', 'seller_status', 'text');

        } else if (buttonID == 'add-permission') {
            requestFor('Name', 'Name', 'permission_name', 'text');
            requestFor('Description', 'Description', 'permission_description', 'text');
            requestFor('Status', 'Status', 'permission_status', 'text');

        } else if (buttonID == 'add-seller-permission') {
            requestFor('Seller\'s ID', 'Seller\' ID', 'seller_id', 'number');
            requestFor('Permission\'s ID', 'Permission\' ID', 'permission_id', 'number');
            requestFor('Status', 'Status', 'seller_permission_status', 'text');
        }

    });
}

function requestFor(label, placeholder, request, type) {
    const labelElement = document.createElement('label');
    const inputElement = document.createElement('input');

    labelElement.innerHTML = label;
    labelElement.setAttribute('class', 'form-label');

    inputElement.setAttribute('class', 'form-control mb-2');
    inputElement.setAttribute('placeholder', placeholder);
    inputElement.setAttribute('name', request);
    inputElement.setAttribute('type', type);

    requestInputs[0].appendChild(labelElement);
    requestInputs[0].appendChild(inputElement);
}

