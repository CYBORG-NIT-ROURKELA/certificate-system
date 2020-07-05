            $.ajax({
                url:'../apis/login1.php',
                type: 'POST',
                success:function(response)
                {
                    // console.log(response);
                    response = JSON.parse(response);
                    if (response.status == "success") {
                      console.log(response.result);
                      $('.user_name').html("Welcome " + response.result.name);
                      $('.user_email').html(response.result.email);
                      $('.user_roll').html(response.result.rollno);
                      $('.user_phone').html(response.result.phoneno);
                      $('.user_address').html(response.result.adress);
                    }
                    else
                    {
                      swal('Admin Page!', '', 'error').then((value) => {
                        window.location = '../index.html';
                      });
                    }
                }
            });
    