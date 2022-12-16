importJS('database');
importJS('animation');
importJS('manipulator');

window.onload = () => {

    // if (getURL().includes('products')) {
    //     showAlready('products-tab', 'show-products');

    // } else if (getURL().includes('categories')) {
    //     showAlready('categories-tab', 'show-categories');

    // } else if (getURL().includes('sellers')) {
    //     showAlready('sellers-tab', 'show-sellers');

    // } else if (getURL().includes('permissions')) {
    //     showAlready('permissions-tab', 'show-permissions');

    // } else if (getURL().includes('seller-permissions')) {
    //     showAlready('seller-permissions-tab', 'show-seller-permissions');

    // }

    // if (view.product) {
    //     showAlready('products-tab', 'show-products');
    // }

    // if (view.category) {
    //     showAlready('categories-tab', 'show-categories');
    // }

    // if (view.seller) {
    //     showAlready('sellers-tab', 'show-sellers');
    // }

    // if (view.permission) {
    //     showAlready('permissions-tab', 'show-permissions');
    // }

    // if (view.seller_permission) {
    //     showAlready('seller-permissions-tab', 'show-seller-permissions');
    // }



    setButton('add-product');
    setButton('add-category');
    setButton('add-seller');
    setButton('add-permission');
    setButton('add-seller-permission');

    showTable('show-products', 'products-tab', '/products');
    showTable('show-categories', 'categories-tab', '/categories');
    showTable('show-sellers', 'sellers-tab', '/sellers');
    showTable('show-permissions', 'permissions-tab', '/permissions');
    showTable('show-seller-permissions', 'seller-permissions-tab', '/seller-permissions');
}




