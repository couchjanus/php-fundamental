<?php

switch ($actionName) {

  case 'index':
  
    $db = makeConnection();
    
    $sql = 'SELECT * FROM posts';
    
    $data['posts'] = $db->query($sql);

    $data['title'] = "Hello There!";
    
    render('home/index', $data);

  break;
}
