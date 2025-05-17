<?php

class Fila{

public function fila(){
        echo '<h3>Fila (Queue) - FIFO</h3>';
        
        // Usando SplQueue
        $queue = new SplQueue();
        $queue->enqueue("A");
        $queue->enqueue("B");
        $queue->enqueue("C");
        
        echo '<h4>Elementos na fila:</h4>';
        foreach ($queue as $item) {
            echo "$item<br>"; // Saída: A, B, C
        }
        
        echo '<h4>Retirando elementos da fila:</h4>';
        echo "Retirado: " . $queue->dequeue() . "<br>"; // A
        echo "Retirado: " . $queue->dequeue() . "<br>"; // B
        echo "Próximo: " . $queue->bottom() . "<br>"; // C
        echo "Tamanho da fila: " . $queue->count() . "<br>"; // 1
        
        // Simulando fila com array
        echo '<h4>Fila simulada com array:</h4>';
        $filaArray = [];
        array_push($filaArray, "X");
        array_push($filaArray, "Y");
        array_push($filaArray, "Z");
        
        echo "Elemento retirado: " . array_shift($filaArray) . "<br>"; // X
        echo "Elemento retirado: " . array_shift($filaArray) . "<br>"; // Y
        echo "Elemento restante: " . reset($filaArray) . "<br>"; // Z
    }
}