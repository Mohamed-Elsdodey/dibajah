//Toastr Function
function myToast(heading, text, position, loaderBg, icon, hideAfter, stack) {
    "use strict";
    $.toast({
        heading: heading,
        text: text,
        position: position,
        loaderBg: loaderBg,
        icon: icon,
        hideAfter: hideAfter,
        stack: stack
    });
}