<?php

class Array_multidimensional{

public function arrayMultidimensional(){
        $usuarios = [
            ['nome' => 'Ana', 'idade' => 20, 'habilidades' => ['PHP', 'JavaScript']],
            ['nome' => 'Bruno', 'idade' => 22, 'habilidades' => ['Python', 'SQL']],
        ];
        
        // Acessando dados aninhados
        echo '<h3>Array Multidimensional</h3>';
        echo 'Nome do primeiro usuário: ' . $usuarios[0]['nome'] . '<br>';
        echo 'Primeira habilidade do segundo usuário: ' . $usuarios[1]['habilidades'][0] . '<br>';
        
        // Adicionando novo usuário
        $usuarios[] = [
            'nome' => 'Carla',
            'idade' => 25,
            'habilidades' => ['Java', 'C#']
        ];
        
        echo '<pre>'; print_r($usuarios); echo '</pre>';
        
        // Arrays com chaves personalizadas
        $departamentos = [
            'ti' => [
                'gerente' => 'Marcos',
                'funcionarios' => ['Ana', 'Pedro', 'Julia']
            ],
            'rh' => [
                'gerente' => 'Claudia',
                'funcionarios' => ['Rafael', 'Teresa']
            ]
        ];
        
        echo '<h4>Departamentos:</h4>';
        echo '<pre>'; print_r($departamentos); echo '</pre>';
        echo 'Gerente de TI: ' . $departamentos['ti']['gerente'] . '<br>';
    }
}
    