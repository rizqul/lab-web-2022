/*
*  Simple Animation Script by Sofyan Pujas
*  Github > http://github.com/sofyanox12
*/

const allTabs = document.querySelectorAll('.tab');
const sidebarButtons = document.querySelectorAll('.btn-side');
var view = {};

// console.log(view);

function showTable(button, classTab, route) {
    var tab = document.getElementsByClassName(classTab)[0];
    var button = document.getElementById(button);

    var routeTab = classTab.replace('-', '_');
    routeTab = routeTab.replace('_tab', '');

    // view = placedAjaxAnimation(route);


    button.addEventListener('click', function () {
        sidebarButtons.forEach(x => {
            x.disabled = false;
            x.style = "background-color : var(--beige); color : var(--dark);";
        });

        allTabs.forEach(x => {
            x.style.transform = 'translateX(200%)';
        });

        button.style =
            "background-color : var(--skin);"
            + "box-shadow: 0 0 0.5rem 0.2rem var(--skin); ";

        button.disabled = true;
        tab.style.display = "block";
        slideToRight(tab, 250, 12, route);

        let routing = routeTab;
        routing = 'view-' + routing;

        console.log('Route: ' + routing);

        sendData(routing, {table_name: routeTab, condition: 'true'});
    });
}

function slideToRight(element, start, end, route) {
    let id = null;
    let pos = start;
    clearInterval(id);
    id = setInterval(() => {
        if (pos == end) {
            clearInterval(id);

            // if (route != null) {
                // window.location.href
                //     = window.location.href.split('/').slice(0, 3).join('/')
                //     + route;
                // Use XMLHTTPRequest to take the response of the route

                // var server = new XMLHttpRequest();

                // server.onreadystatechange = () => {
                //     if (server.readyState == 4 && server.status == 200) {
                //         // const response = server.responseText;
                //         console.log(server.response);
                //         console.log(document.getElementById('status-view'));
                //     }
                // }

                // server.open('GET', route);
                // server.send();

                // $.ajax({
                //     url: route,
                //     type: 'GET',
                //     success: function (e) {
                //         view.product = e.showProducts;
                //         view.category = e.showCategories;
                //         view.seller = e.showSellers;
                //         view.permission = e.showPermissions;
                //         view.seller_permission = e.showSellerPerms;
                //     }
                // });

            //     placedAjaxAnimation(route);
            // }
            // console.log(view);
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

function showAlready(element, button) {
    var btn = document.getElementById(button);
    var element = document.getElementsByClassName(element)[0];

    sidebarButtons.forEach(x => {
        x.disabled = false;
        x.style = "background-color : var(--beige); color : var(--dark);";
    });

    element.style.display = 'block';
    element.style.transition = 'none';
    element.style.transform = 'translateX(12%)';

    btn.disabled = true;
}

document.getElementById('close-modal').addEventListener('click', function () {
    overlay.style.display = 'none';
});
