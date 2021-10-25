/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(window).on('load' ,function() {
    // Notification message
    if(($("#message").val() !== null) && (typeof($("#message").val()) !== "undefined")){
        notification($("#message").val());
    }
});

/* Notification message */
function notification(message)
{
    message = message.split("_");
    if(message[0] === "success") toastr.success(message[1]);
    else if(message[0] === "info") toastr.info(message[1]);
    else if(message[0] === "error") toastr.error(message[1]);
}