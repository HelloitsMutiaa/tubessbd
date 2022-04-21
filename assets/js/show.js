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