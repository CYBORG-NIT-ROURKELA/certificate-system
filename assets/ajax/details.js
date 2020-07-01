$.ajax({
	 url:'../apis/fetch.php',
                type: 'POST',
                
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.name);  
                     $('#adress').val(data.adress);  
                     $('#phoneno').val(data.phoneno);  
                     $('#email').val(data.email);  
                      
                     
                }  
           });  
