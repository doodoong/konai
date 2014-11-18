
<?php
  if($_POST['id'] === 'asdf') {
    if($_POST['password'] === '123'){
      echo 'right';
    } else {
      echo 'password wrong';
    }
    
  } else {
    echo 'id wrong';
  }
  ?>