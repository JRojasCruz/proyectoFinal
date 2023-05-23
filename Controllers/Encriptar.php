<?php
  $con = password_hash("123456",PASSWORD_BCRYPT);
  // if(password_verify("LOSPOLLITOS",$con)){
  //   echo "bien";
  // }
  // else{
  //   echo "mal";
  // }

  echo $con;