<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 3/10/2019
 * Time: 10:03 PM
 */

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts(): array
    {
        $this->db->query('SELECT *, p.id, u.id  FROM posts p LEFT JOIN users u ON p.id=u.id ORDER BY p.created_at DESC ');

        return $this->db->resultSet();
    }

    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts (title, user_id, body) VALUES (:title, :user_id, :body)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
