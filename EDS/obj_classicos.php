<?php

class Obj_classicos{

public function objetosBasicos(){
        // Criando objeto vazio e adicionando propriedades
        $post = new stdClass();
        $post->titulo = "Título do post";
        $post->conteudo = "Conteúdo do post";
        $post->data = new DateTime('now');
        
        echo '<h3>Objeto StdClass</h3>';
        echo '<pre>'; print_r($post); echo '</pre>';
        
        // Convertendo array para objeto
        $array = ['nome' => 'Eduardo', 'email' => 'eduardo@email.com'];
        $objeto = (object) $array;
        
        echo '<h4>Array convertido para objeto:</h4>';
        echo '<pre>'; print_r($objeto); echo '</pre>';
        echo 'Nome: ' . $objeto->nome . '<br>';
        
        // Convertendo objeto para array
        $arrayDeVolta = (array) $objeto;
        
        echo '<h4>Objeto convertido para array:</h4>';
        echo '<pre>'; print_r($arrayDeVolta); echo '</pre>';
    }
}