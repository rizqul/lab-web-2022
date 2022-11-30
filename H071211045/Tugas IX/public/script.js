importJS('animation');
importJS('database');
importJS('manipulator');

window.onload = () => {

    document.getElementById('close-modal').addEventListener('click', function () {
        overlay.style.display = 'none';
        sessionStorage.setItem('token', 'Wakwau');

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




