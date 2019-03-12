<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 3/10/2019
 * Time: 3:17 PM
 */

class Pages extends Controller
{
    private $postModel;

    public function __construct()
    {
//        echo "pages loaded";
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();

        $data = [
            'title' => 'Shareposts',
            'description' => 'Simple social network built on MVC framework.'
        ];


        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'ABOUT',
            'description' => 'About page text goes here..'
        ];
        $this->view('pages/about', $data);
    }

}
