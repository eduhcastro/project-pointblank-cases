<?php
if(@$_COOKIE['_robot'] != null){
   
}else{
    echo  '<script src="https://www.google.com/recaptcha/api.js?render=6Ld6k6kZAAAAAFHbKGC5CUE0e1jTy9FFiiEl2cyW"></script>';
    echo '<script> grecaptcha.ready(function() {
        grecaptcha.execute(\'6Ld6k6kZAAAAAFHbKGC5CUE0e1jTy9FFiiEl2cyW\', {action: \'userForm\'}).then(function(token) {
            console.log(token);     
        });
    });</script>';
}

?>