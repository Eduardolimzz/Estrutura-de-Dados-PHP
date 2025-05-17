<?php

class Enum{

public function enum(){
        echo '<h3>Enumeração (PHP 8.1+)</h3>';
        
        // Usando enum definido fora da classe
        echo 'Status Ativo: ' . Status::ATIVO->value . ' (' . Status::ATIVO->label() . ')<br>';
        echo 'Status Inativo: ' . Status::INATIVO->value . ' (' . Status::INATIVO->label() . ')<br>';
        
        // Usando enum no switch
        $status = Status::ATIVO;
        
        switch ($status) {
            case Status::ATIVO:
                echo "Status está ativo<br>";
                break;
            case Status::INATIVO:
                echo "Status está inativo<br>";
                break;
        }
        
        // Comparando enums
        $statusAtual = Status::ATIVO;
        echo 'StatusAtual é ATIVO? ' . 
             ($statusAtual === Status::ATIVO ? 'Sim' : 'Não') . '<br>';
        
        // Array de todos os casos
        echo '<h4>Todos os casos do Enum Status:</h4>';
        $casos = Status::cases();
        echo '<pre>'; print_r($casos); echo '</pre>';
        
        // Iterando os casos
        foreach (Status::cases() as $caso) {
            echo "Caso: {$caso->name}, Valor: {$caso->value}, Label: {$caso->label()}<br>";
        }
        
        // Enum sem valor (Unit Enum)
        echo '<h4>Enum sem valor (Unit Enum):</h4>';
        echo 'Direção Norte: ' . Direcao::NORTE->name . '<br>';
        echo 'Direção Sul: ' . Direcao::SUL->name . '<br>';
    }
}
    