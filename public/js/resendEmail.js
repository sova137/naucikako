/**
 * Created by Nikola on 10/4/2016.
 */
function resendEmail($user_id){

    $.get('/resendEmailVerification',"user_id=" + $user_id, function(data){
        alert(data);
    });
}