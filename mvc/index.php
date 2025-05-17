<?php

define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');//caminho
require_once BASEPATH.'core/CodeIgniter.php';//carregar CodeIgniter
$CI = & get_instance();//criar uma instancia
$CI->load->controller('home');
$posts = (new Post_model())->read();

foreach ($posts as $post){
 echo $post ->titulo.'<br>';
}



?>