/*
*  Simple Database Script by Sofyan Pujas
*  Github > http://github.com/sofyanox12
*/

// define if not exist an object named 'view'
// if (typeof view === 'undefined') {

// }


function placedAjaxAnimation(route) {
    $.ajax({
        url: route,
        type: 'GET',
        success: function (response) {
            return response;
        }
    });
}

function sendData(route, data) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url: route,
        type: 'POST',
        data: data,
        success: function (e) {
            // console.log('Data Fetched: ' + data);
        }
    });
}
