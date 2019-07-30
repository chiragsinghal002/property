function register1()
{
    $('#successRegister').html('Loading Please wait!!');
    $('.btn-success1').hide();
    
    var fullname = document.getElementById('fullname').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var password = document.getElementById('password').value;
	 $.ajax({
            type: 'get',
            url: 'action/submission.php?fullname='+fullname+'&email='+email+'&phone='+phone+'&password='+password+'&action=register',
           // data: $('form').serialize(),
            success: function (data) {
                $('.btn-success1').show();
                $('#successRegister').html(data);
               //$('.successRegister').fadeIn(10000).hide();
               // $('.errorRegister').fadeOut(200).hide();
            }
          });
}

//Login
function login1()
{
    $('#successRegister').html('Loading Please wait!!');
    $('.btn-success1').hide();
    
    
    var email = document.getElementById('email').value;
    
    var password = document.getElementById('password').value;
	 $.ajax({
            type: 'get',
            url: 'action/submission.php?email='+email+'&password='+password+'&action=login',
           // data: $('form').serialize(),
            success: function (data) {
              if(data=="Successfully logged in")
                {
                    window.location="../dealer/post_property.php";
                }
                $('.btn-success1').show();                
                $('#successRegister').html(data);
               //$('.successRegister').fadeIn(10000).hide();
               // $('.errorRegister').fadeOut(200).hide();
            }
          });
}

 