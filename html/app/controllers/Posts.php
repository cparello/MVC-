<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 3/14/2019
 * Time: 11:07 AM
 */

class Posts extends Controller
{
    private $postModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        //get posts
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_error' => '',
                'body_error' => ''
            ];

            if (empty($data['title'])) {
                $data['title_error'] = 'Please enter a title';
            }
            if (empty($data['body'])) {
                $data['body_error'] = 'Please enter text in the body';
            }

            if (empty($data['title_error']) && empty($data['body_error'])) {
                if ($this->postModel->addPost($data)) {
                    flash('post_added', 'Post Added');
                    redirect('posts');
                } else {
                    die('ERRRRRRRROR');
                }
            } else {
                $this->view('posts/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'body' => ''
            ];

            $this->view('posts/add', $data);
        }
    }
}
