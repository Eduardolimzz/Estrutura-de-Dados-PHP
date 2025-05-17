<?php

class Array_associativo{

public function arrayAssociativo(){
        $usuario = [
            'nome' => 'Eduardo',
            'idade' => 18,
            'curso' => 'Ciência da Computação'
        ];
        
        // Adicionando novo par chave-valor
        $usuario['cidade'] = 'São Paulo';
        
        // Verificando se chave existe
        if (array_key_exists('idade', $usuario)) {
            echo 'Idade existe no array<br>';
        }
        
        // Obtendo todas as chaves e valores
        $chaves = array_keys($usuario);
        $valores = array_values($usuario);
        
        echo '<h3>Array Associativo</h3>';
        echo '<pre>'; print_r($usuario); echo '</pre>';
        echo '<h4>Chaves:</h4>';
        echo '<pre>'; print_r($chaves); echo '</pre>';
        echo '<h4>Valores:</h4>';
        echo '<pre>'; print_r($valores); echo '</pre>';
    }
}
    
    ?>