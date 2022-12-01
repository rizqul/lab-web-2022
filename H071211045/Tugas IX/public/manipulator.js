/*
*  Simple Manipulator Script by Sofyan Pujas
*  Github > http://github.com/sofyanox12
*/

const overlay = document.querySelector('.overlay');
const section = document.querySelectorAll('.requests section');

function setButton(buttonID) {
    const title = document.getElementById('modal-title');
    const button = document.getElementById(buttonID);

    button.addEventListener('click', function () {

        overlay.style.display = 'block';
        section.forEach(x => {
            x.style.display = 'none';
        });

        title.innerHTML = buttonID.includes('add') ?
            'Add ' + buttonID.split('-')[1] :
            'Edit ' + buttonID.split('-')[1];

        if (buttonID == 'add-product') {
            document.getElementById('sender').setAttribute('action', '/store-product-eloquent');
            // document.getElementById('sender').setAttribute('action', '/store-product-query');
            document.getElementById('product-modal').style.display = 'block';

        } else if (buttonID == 'add-category') {
            document.getElementById('sender').setAttribute('action', '/store-category-eloquent');
            // document.getElementById('sender').setAttribute('action', '/store-category-query');
            document.getElementById('category-modal').style.display = 'block';

        } else if (buttonID == 'add-seller') {
            document.getElementById('sender').setAttribute('action', '/store-seller-eloquent');
            // document.getElementById('sender').setAttribute('action', '/store-seller-query');
            document.getElementById('seller-modal').style.display = 'block';

        } else if (buttonID == 'add-permission') {
            document.getElementById('sender').setAttribute('action', '/store-permission-eloquent');
            // document.getElementById('sender').setAttribute('action', '/store-permission-query');
            document.getElementById('permission-modal').style.display = 'block';

        } else if (buttonID == 'add-seller-permission') {
            document.getElementById('sender').setAttribute('action', '/store-seller-permission-eloquent');
            // document.getElementById('sender').setAttribute('action', '/store-seller-permission-query');
            document.getElementById('seller-permission-modal').style.display = 'block';
        }

    });
}

document.querySelectorAll('.edit').forEach(x => {
    x.addEventListener('click', function () {
        x = this;
        const data = JSON.parse(x.getAttribute('data'));

        if (x.getAttribute('data-type') == 'product') {
            // get tag 'input' which has name
            $('input[name="product_name"]').val(data.name);
            $('select[name="seller_id"]').val(data.seller_id);
            $('input[name="category_id"]').val(data.category_id);
            $('input[name="product_price"]').val(data.price);
            $('input[name="product_status"]').val(data.status);
        } else if (x.getAttribute('data-type') == 'category') {
            $('input[name="category_name"]').val(data.name);
        }
    });
});

document.querySelectorAll('.delete').forEach(x => {
    x.addEventListener('click', function () {
        const id = this.getAttribute('data');
        x = this;
        if (x.getAttribute('data-type') == 'product') {
            window.location.href = '/delete-product/' + id;
            // getResponse('/delete-product/' + id);

        } else if (x.getAttribute('data-type') == 'category') {
            window.location.href = '/delete-category/' + id;
            // getResponse('/delete-category/' + id);

        } else if (x.getAttribute('data-type') == 'seller') {
            window.location.href = '/delete-seller/' + id;
            // getResponse('/delete-seller/' + id);

        } else if (x.getAttribute('data-type') == 'permission') {
            window.location.href = '/delete-permission/' + id;
            // getResponse('/delete-permission/' + id);

        } else if (x.getAttribute('data-type') == 'seller-permission') {
            window.location.href = '/delete-seller-permission/' + id;
            // getResponse('/delete-seller-permission/' + id);
        }

    });
});

// function getResponse(url) {
//     $.ajax({
//         type : 'GET',
//         success: function (resp) {
//             resp = JSON.parse(resp);
//             console.log(resp);
//             href.location.href = getURL()+ '/';
//         }

//     });
// }



