<?php 

class Post_model extends CI_Model{
    public function __read(){
        $query ="SELECT * FROM posts ";
        $stmt = $this->db->query($query);//conectar o banco de dados com CodeIgniter

       //$result = $stmt->result_array();//voltar com uma lista de informações

       // var_dump($result);//consultando o banco de dados
     
        return $stmt->result_array();//retornando os resultados com um array
    }

    public function get_post_by_id(int $id){
        $query = "SELECT * FROM posts WHERE id = ?";
        $stmt = $this->db->query($query, array($id));
        return $stmt->row_array();//retorna o post encontrado
}
}