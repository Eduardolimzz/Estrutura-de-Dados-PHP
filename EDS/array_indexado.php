<?php

class Array_indexado{



public function arrayIndexado(){
        $frutas = ['Maçã', 'Banana', 'Laranja'];
        
        // Adicionando elemento
        $frutas[] = 'Uva';
        
        // Removendo elemento
        unset($frutas[1]); // Remove Banana
        
        // Reindexando array
        $frutas = array_values($frutas);
        
        // Mostrando resultados
        echo '<h3>Array Indexado</h3>';
        echo '<pre>'; print_r($frutas); echo '</pre>';
        
        // Métodos úteis
        echo 'Total de itens: ' . count($frutas) . '<br>';
        echo 'Primeiro item: ' . reset($frutas) . '<br>';
        echo 'Último item: ' . end($frutas) . '<br>';
    }
}