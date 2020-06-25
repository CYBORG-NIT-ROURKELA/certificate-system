            $.ajax({
                url:'../apis/check_login.php',
                type: 'POST',
                success:function(response)
                {
                    // console.log(response);
                    response = JSON.parse(response);
                    if (response.status == "success") {
                      console.log(response.result);
                      $('.user_name').html("Welcome " + response.result.name);
                      $('.user_email').html(response.result.email);
                    }
                    else
                    {
                      swal('Login to continue!', '', 'error').then((value) => {
                        window.location = '../index.html';
                      });
                    }
                }
            });
    