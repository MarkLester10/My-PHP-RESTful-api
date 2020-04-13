<?php

//headers for HTTP requests

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initializing api
include_once('../core/initialize.php');

//instatiate post class

$post = new Post($db);

//blog post query

$post->id = isset($_GET['id']) ? $_GET['id']:die();
$post->read_single();

$post_arr=array(
    'id'=>$post->id,
    'title' => $post->title,
    'body'=> html_entity_decode($post->body),
    'author'=> $post->author,
    'category_id'=> $post->category_id,
    'category_name'=>$post->category_name
);

print_r(json_encode($post_arr));


