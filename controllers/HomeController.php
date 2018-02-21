<?php

class HomeController extends Controller
{
    
    public function index()
    {   
        $title = 'Our <b>Cat Members</b>';

        $db = Connection::make();
        $db->exec("set names utf8");

        $sql = "SELECT * FROM posts ORDER BY id ASC";

        $res = $db->query($sql);

        $posts = $res->fetchAll(PDO::FETCH_ASSOC);
        $data['title'] = 'Admin Product List Page ';
        $data['posts'] = $posts;
        $data['title'] = $title;
        $this->_view->render('home/index', $data);

    }
    
}
