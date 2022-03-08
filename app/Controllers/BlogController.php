<?php

namespace App\Controllers;

use Database\DBConnection;

class BlogController extends Controller {
    
    public function index(){
        return $this->view('blog.index');
    }

    public function show($id){
        $db = new DBConnection('blogdb_jm', 'localhost', 'root', '0000');
        $req = $db->getPDO()->query('SELECT * FROM posts');
        $posts = $req->fetchAll();
        foreach ($posts as $post) {
            echo $post->title;
        }
        return $this->view('blog.show', compact('id'));
    }
}