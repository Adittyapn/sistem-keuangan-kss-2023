/*? no js js needed from me */
function restrictAlpha(e) {
    var x = e.which || e.keycode;
    if ((x >= 48 && x <= 57))
        return true;
    else
        return false;
}
