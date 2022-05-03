var input = document.getElementById('pwd'),
    icon = document.getElementById('icon');

   icon.onclick = function () {

    if (input.type === "password"){
        input.type = 'text'
        icon.className = 'fa fa-eye';
    }
    else {
        input.type = 'password';
        icon.className = 'fa fa-eye-slash';
    }

}

let input = document.getElementById('pass')
eye = document.getElementById('eye');

eye.onclick = function () {

if (input.type === "password"){
    input.type = 'text'
    eye.className = 'fa fa-eye';
}
else {
    input.type = 'password';
    eye.className = 'fa fa-eye-slash';
}

}