<?php

class Post extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Post_model');
    }
    public function index(){
        $posts = $this->Post_model->__read();//chama o metodo para pegar todos os posts
        $data['posts'] = $posts;//colocando posts em um array
        $this->load->view('post_view',$data);//carregando view e passando dados
    }
    //exibir detalhes de um post com base no id de parametro
    public function post($id){
        $post = $this->Post_model->get_post_id($id);
        if($post){//verifica se a variavel post contem um valor
            $data['post'] = $post;
            $this->load->view('post_detail',$data);
        }else{
            echo"Post não encontrado";
        var_dump($post);//debug
        }
    }
}