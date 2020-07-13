$(document).ready(function() {
    $.ajax({
        url: '../apis/check_login.php',
        type: 'POST',
        success: function(response) {
            // console.log(response);
            response = JSON.parse(response);
            if (response.status == "success") {
                var request = response.result.request;
                // console.log(request);
                var approval = response.result.approval;
                // console.log(approval)
                if (request == 0 && approval == 0) {
                    $('#status').html('Not requested');
                    $('#download').hide();
                } else if (request == 1 && approval == 0) {
                    $('#status').html('In process');
                    $('#download').hide();
                    $('#request').hide();
                } else if (request == 1 && approval == 1) {
                    $('#status').html('Approved! You can download your certificate');
                    $('#request').hide();
                };
            } else {
                // console.log(response);
                $('.status').html(response.result);
            }
        }
    });
})


$('#request').click(() => {
    var request = 1;
    $.ajax({
        url: '../apis/certificate.php',
        type: 'POST',
        data: {
            request: request
        },
        success: (response) => {
            // console.log(response.result);
            var response = JSON.parse(response);
            if (response.status == "success") {
                var request = response.result.request;
                // console.log(request);
                var approval = response.result.approval;
                // console.log(approval)
                if (request == 0 && approval == 0) {
                    $('#status').html('Not requested');
                    $('#download').hide();
                } else if (request == 1 && approval == 0) {
                    $('#status').html('In process');
                    $('#download').hide();
                    $('#request').hide();
                } else if (request == 1 && approval == 1) {
                    $('#status').html('Approved! You can download your certificate');
                    $('#request').hide();
                }

            } else {
                // console.log(response);
                $('.status').html(response.result);
            }
        }
    });
})