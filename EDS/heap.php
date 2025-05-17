<?php

class Heap{

public function heap(){
        echo '<h3>Heap (Árvore de Prioridade)</h3>';
        
        // SplMaxHeap - organiza em ordem decrescente
        $maxHeap = new SplMaxHeap();
        $maxHeap->insert(10);
        $maxHeap->insert(40);
        $maxHeap->insert(30);
        $maxHeap->insert(20);
        
        echo '<h4>SplMaxHeap (maior valor no topo):</h4>';
        foreach ($maxHeap as $item) {
            echo "$item<br>"; // Saída: 40, 30, 20, 10
        }
        
        // SplMinHeap - organiza em ordem crescente
        $minHeap = new SplMinHeap();
        $minHeap->insert(10);
        $minHeap->insert(40);
        $minHeap->insert(30);
        $minHeap->insert(20);
        
        echo '<h4>SplMinHeap (menor valor no topo):</h4>';
        foreach ($minHeap as $item) {
            echo "$item<br>"; // Saída: 10, 20, 30, 40
        }
        
        // Heap personalizado
        class PrioridadeTarefa extends SplHeap {
            // Define como comparar os elementos (crucial para heap personalizado)
            protected function compare($valor1, $valor2) {
                return $valor1['prioridade'] <=> $valor2['prioridade'];
            }
        }
        
        $tarefas = new PrioridadeTarefa();
        $tarefas->insert(['nome' => 'Tarefa A', 'prioridade' => 3]);
        $tarefas->insert(['nome' => 'Tarefa B', 'prioridade' => 1]);
        $tarefas->insert(['nome' => 'Tarefa C', 'prioridade' => 5]);
        
        echo '<h4>Heap personalizado (tarefas por prioridade):</h4>';
        foreach ($tarefas as $tarefa) {
            echo "Tarefa: {$tarefa['nome']}, Prioridade: {$tarefa['prioridade']}<br>";
        }
    }
        
}