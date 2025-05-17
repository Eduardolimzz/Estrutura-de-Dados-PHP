<?php

class Arvore{

public function arvore(){
        echo '<h3>Estrutura de Árvore</h3>';
        
        // Definindo uma classe de Nó para árvore
        class No {
            public $valor;
            public $filhos = [];
            
            public function __construct($valor) {
                $this->valor = $valor;
            }
            
            public function adicionarFilho($no) {
                $this->filhos[] = $no;
            }
        }
        
        // Construindo uma árvore
        $raiz = new No('Raiz');
        
        $filho1 = new No('Filho 1');
        $filho2 = new No('Filho 2');
        
        $neto1 = new No('Neto 1.1');
        $neto2 = new No('Neto 1.2');
        $neto3 = new No('Neto 2.1');
        
        $filho1->adicionarFilho($neto1);
        $filho1->adicionarFilho($neto2);
        $filho2->adicionarFilho($neto3);
        
        $raiz->adicionarFilho($filho1);
        $raiz->adicionarFilho($filho2);
        
        // Função para percorrer a árvore recursivamente
        function percorrerArvore($no, $nivel = 0) {
            $espacos = str_repeat('&nbsp;&nbsp;', $nivel);
            echo "{$espacos}└─ {$no->valor}<br>";
            
            foreach ($no->filhos as $filho) {
                percorrerArvore($filho, $nivel + 1);
            }
        }
        
        echo '<h4>Estrutura da árvore:</h4>';
        percorrerArvore($raiz);
    }
}
    