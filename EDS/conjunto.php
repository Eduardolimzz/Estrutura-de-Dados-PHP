<?php

class Conjunto{

public function conjunto(){
        echo '<h3>Conjunto (Set) - Coleção sem duplicatas</h3>';
        
        // Usando array_unique para simular um conjunto
        $nomes = ['Ana', 'João', 'Ana', 'Maria', 'João', 'Pedro'];
        $set = array_unique($nomes);
        
        echo '<h4>Array com duplicatas:</h4>';
        echo '<pre>'; print_r($nomes); echo '</pre>';
        
        echo '<h4>Conjunto sem duplicatas:</h4>';
        echo '<pre>'; print_r($set); echo '</pre>';
        
        // Reindexando array
        $set = array_values($set);
        echo '<h4>Conjunto reindexado:</h4>';
        echo '<pre>'; print_r($set); echo '</pre>';
        
        // Implementação mais avançada com SplObjectStorage
        echo '<h4>Conjunto de objetos usando SplObjectStorage:</h4>';
        
        $objetoSet = new SplObjectStorage();
        
        $obj1 = new stdClass();
        $obj1->nome = 'Ana';
        
        $obj2 = new stdClass();
        $obj2->nome = 'Bruno';
        
        $objetoSet->attach($obj1);
        $objetoSet->attach($obj2);
        $objetoSet->attach($obj1); // Tentativa de duplicata (será ignorada)
        
        foreach ($objetoSet as $obj) {
            echo "Nome: {$obj->nome}<br>";
        }
        
        echo 'Total de objetos únicos: ' . $objetoSet->count() . '<br>';
    }
}