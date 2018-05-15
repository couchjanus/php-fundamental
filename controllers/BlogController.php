<?php

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::index();
        $data['title'] = 'Blog Page ';
        $data['subtitle'] = 'Lorem Ipsum не є випадковим набором літер';
        $data['posts'] = $posts;
        $data['rowCount'] = count($posts);
        

        $this->_view->render('blog/index', $data);
    }

    public function show($vars)
    {
        extract($vars);
        $post = Post::getPostBySlug($slug);
        $data['breadcrumb'] = $this->breadcrumb->build(
            array(
                'All Blog Posts' => 'blog',
                $post['title'] => '',
            )
        );

        $data['title'] = 'Cats Blog ';
        $data['post'] = $post;
        $this->_view->render('blog/show', $data);

    }

    public function search()
    {
        //Флаг ошибок
        $data['errors'] = false;
        $result = false;
        
        if (isset($_POST) and !empty($_POST)) {
            
            $query = trim(strip_tags($_POST['query']));

            if (strlen($query) < 3) {
                $data['errors'][] = 'Слишком короткий поисковый запрос.';
            } else if (strlen($query) > 128) {
                $data['errors'][] = 'Слишком длинный поисковый запрос.';
            } else { 
                    $posts = Post::searchPost($query);
                    $num_rows = count($posts);
            
                if ($num_rows > 0) { 
                    $data['num_rows'] = 'По запросу <b>'.$query.'</b> найдено совпадений: '.$num_rows;
                } else {
                    $data['errors'][] = 'По вашему запросу ничего не найдено.';
                }
            }
        } else {
            $data['errors'][] = 'Задан пустой поисковый запрос.';
        }

        if ($data['errors'] == false) {
            $result = true;
            $data['posts'] = $posts;
        }
        $data['breadcrumb'] = $this->breadcrumb->build(
            array(
                'All Blog Posts' => 'blog',
            )
        );
        $data['success'] = $result;
        $data['title'] = 'Search Post Page ';
        
        $this->_view->render('blog/search', $data);
        
    }


    public function view($vars)
	{
		extract($vars);
		$post = Post::show($id);
        $data['title'] = 'Blog Post ';
        $data['subtitle'] = 'Lorem Ipsum не є випадковим набором літер';
        $data['post'] = $post;

		$this->_view->render('blog/show', $data);
    }
   
}