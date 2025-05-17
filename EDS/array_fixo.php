<?php

class Array_fixo{

public function arrayFixo(){
        echo '<h3>Array de Tamanho Fixo (SplFixedArray)</h3>';
        
        // Criando array de tamanho fixo
        $array = new SplFixedArray(5);
        
        // Definindo valores
        $array[0] = 'A';
        $array[1] = 'B';
        $array[2] = 'C';
        $array[3] = 'D';
        $array[4] = 'E';
        
        echo '<pre>'; print_r($array); echo '</pre>';
        
        try {
            // Isto causará uma exceção
            $array[5] = 'F'; // Índice fora do limite
        } catch (RuntimeException $e) {
            echo '<div style="color: red;">Erro: ' . $e->getMessage() . '</div>';
        }
        
        // Alterando o tamanho
        $array->setSize(10);
        echo 'Novo tamanho: ' . $array->getSize() . '<br>';
        
        // De array normal para SplFixedArray e vice-versa
        $normalArray = ['X', 'Y', 'Z'];
        $fixedArray = SplFixedArray::fromArray($normalArray);
        
        echo '<h4>Array fixo a partir de array normal:</h4>';
        echo '<pre>'; print_r($fixedArray); echo '</pre>';
        
        $backToNormal = $fixedArray->toArray();
        echo '<h4>De volta para array normal:</h4>';
        echo '<pre>'; print_r($backToNormal); echo '</pre>';
    }
}