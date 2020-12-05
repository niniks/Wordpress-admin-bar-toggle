<?php 

function activate_admin_bar_toggle(){
      if(is_user_logged_in() && !is_admin()){
       echo  "
       <script>       
       document.addEventListener('DOMContentLoaded', function(){
         //Get  wordpress admin bar
        var adminBar = document.getElementById('wpadminbar'); 
        adminBar.style.transition = 'all 300ms ease-in-out'

        //Create button element
        var toggleButton = document.createElement('button');
        toggleButton.innerHTML = 'Hide admin bar';
        
        //Style toggle button nicely
        toggleButton.style.border = 0;
        toggleButton.style.padding = '2px 15px';
        toggleButton.style.position = 'fixed';
        toggleButton.style.right = '15px';
        toggleButton.style.bottom = '15px';
        toggleButton.style.background = '#000000cc';
        toggleButton.style.color = '#fff';
        toggleButton.style.borderRadius = '4px';
        toggleButton.style.height = 'auto';
        //Set attr id for references
        toggleButton.setAttribute('id', 'toggle_button');

        //Append button to the wordpress admin bar
        adminBar.appendChild(toggleButton);

        //List for toggle button click event
        document.getElementById('toggle_button').addEventListener('click', function(){
          if(adminBar.style.background == 'transparent'){
            adminBar.querySelector('.quicklinks').style.opacity = 1;
          adminBar.style.background = '';
          adminBar.style.top = 0;
          toggleButton.innerHTML = 'Hide admin bar';

          } else {
            adminBar.querySelector('.quicklinks').style.opacity = 0;
          adminBar.style.background = 'transparent';
          adminBar.style.top = '-100px';
          toggleButton.innerHTML = 'Show admin bar';

          }

        },false)
       }, false);
       </script>
       ";
      }

  }
  add_action( 'wp_footer', 'activate_admin_bar_toggle' );
