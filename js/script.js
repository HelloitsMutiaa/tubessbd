const body = document.querySelector('body'),
      sidebar = body.getElementsByClassName('sidebar'),
      toggle = body.getElementsByClassName('toggle')


      toggle.onclick = function(){
          sidebar.classList.toggle("close");
      }