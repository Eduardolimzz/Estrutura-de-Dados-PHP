<?php
class Loops_iteradores{

public function iteradores(){
        echo '<h3>Diferentes tipos de iteração</h3>';
        
        $nomes = ['Lucas', 'João', 'Maria', 'Ana'];
        
        // Foreach - o mais usado
        echo '<h4>Foreach simples:</h4>';
        foreach ($nomes as $nome) {
            echo "Nome: $nome<br>";
        }
        
        // Foreach com índice
        echo '<h4>Foreach com índice:</h4>';
        foreach ($nomes as $indice => $nome) {
            echo "[$indice] => $nome<br>";
        }

        // For tradicional
        echo '<h4>For tradicional:</h4>';
        for ($i = 0; $i < count($nomes); $i++) {
            echo "Nome $i: " . $nomes[$i] . "<br>";
        }
        
        // While
        echo '<h4>While:</h4>';
        $i = 0;
        while ($i < count($nomes)) {
            echo "Nome $i: " . $nomes[$i] . "<br>";
            $i++;
        }
        
        // Do-while
        echo '<h4>Do-while:</h4>';
        $i = 0;
        do {
            echo "Nome $i: " . $nomes[$i] . "<br>";
            $i++;
        } while ($i < count($nomes));
        
        // Iterator com array_map (programação funcional)
        echo '<h4>Array_map:</h4>';
        $maiusculas = array_map(function($nome) {
            return strtoupper($nome);
        }, $nomes);
        
        echo '<pre>'; print_r($maiusculas); echo '</pre>';
        
        // Iterator com array_filter (programação funcional)
        echo '<h4>Array_filter:</h4>';
        $comecaComM = array_filter($nomes, function($nome) {
            return $nome[0] == 'M';
        });
        
        echo '<pre>'; print_r($comecaComM); echo '</pre>';
    }

}
    