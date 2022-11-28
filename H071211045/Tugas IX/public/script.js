const sidebarButtons = document.querySelectorAll('.btn-side');
const allTabs = document.querySelectorAll('.tab');
const overlay = document.querySelector('.overlay');
const requestInputs = document.querySelectorAll('.requests');

window.onload = () => {

    document.getElementById('close-modal').addEventListener('click', function () {
        overlay.style.display = 'none';
    });

    setButton('add-product');
    setButton('add-category');
    setButton('add-seller');
    setButton('add-permission');
    setButton('add-seller-permission');

    showTable('show-products', 'products-tab');
    showTable('show-categories', 'categories-tab');
    showTable('show-sellers', 'sellers-tab');
    showTable('show-permissions', 'permissions-tab');
    showTable('show-seller-permissions', 'seller-permissions-tab');
}

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

function setButton(buttonID) {
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
