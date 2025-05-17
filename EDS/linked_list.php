<?php

class Linked_list{



public function listaLigada(){
        echo '<h3>Lista Ligada (Linked List)</h3>';
        
        $lista = new SplDoublyLinkedList();
        $lista->push('A');
        $lista->push('B');
        $lista->push('C');
        
        echo '<h4>Lista completa:</h4>';
        foreach ($lista as $item) {
            echo "$item<br>";
        }
        
        // Inserindo no início
        $lista->unshift('Z');
        
        // Removendo do final
        $ultimo = $lista->pop();
        echo "Item removido do final: $ultimo<br>";
        
        // Removendo do início
        $primeiro = $lista->shift();
        echo "Item removido do início: $primeiro<br>";
        
        echo '<h4>Lista após modificações:</h4>';
        foreach ($lista as $item) {
            echo "$item<br>";
        }
        
        // Modos de iteração
        echo '<h4>Iteração do fim para o início:</h4>';
        $lista->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO);
        foreach ($lista as $item) {
            echo "$item<br>";
        }
    }
}