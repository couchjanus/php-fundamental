<?php

class BlogController
{

public function index()
    {   
        render('blog/index', ['title'=>'Our <b>Cats Blog</b>', 'posts'=>$posts, 'resCount'=>$resCount]);
    }
}