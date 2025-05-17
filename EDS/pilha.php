<?php

class Pilha{

public function pilha(){
        echo '<h3>Pilha (Stack) - LIFO</h3>';
        
        // Usando SplStack (extensão SPL)
        $stack = new SplStack();
        $stack->push("Primeiro");
        $stack->push("Segundo");
        $stack->push("Terceiro");
        
        echo '<h4>Elementos na pilha:</h4>';
        foreach ($stack as $item) {
            echo "$item<br>"; // Saída: Terceiro, Segundo, Primeiro
        }
        
        echo '<h4>Retirando elementos da pilha:</h4>';
        echo "Retirado: " . $stack->pop() . "<br>"; // Terceiro
        echo "Retirado: " . $stack->pop() . "<br>"; // Segundo
        echo "Topo atual: " . $stack->top() . "<br>"; // Primeiro
        echo "Tamanho da pilha: " . $stack->count() . "<br>"; // 1
        
        // Simulando pilha com array
        echo '<h4>Pilha simulada com array:</h4>';
        $pilhaArray = [];
        array_push($pilhaArray, "A");
        array_push($pilhaArray, "B");
        array_push($pilhaArray, "C");
        
        echo "Elemento retirado: " . array_pop($pilhaArray) . "<br>"; // C
        echo "Elemento retirado: " . array_pop($pilhaArray) . "<br>"; // B
        echo "Elemento restante: " . end($pilhaArray) . "<br>"; // A
    }
}