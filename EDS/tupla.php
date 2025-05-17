<?php
class Tupla{

public function tupla(){
        echo '<h3>Tupla simulada (array imutável)</h3>';
        
        // Definindo uma constante de array (simulando tupla)
        define('COORDENADAS', [10, 20, 30]);
        
        echo '<pre>'; print_r(COORDENADAS); echo '</pre>';
        echo 'X: ' . COORDENADAS[0] . ', Y: ' . COORDENADAS[1] . ', Z: ' . COORDENADAS[2] . '<br>';
        
        try {
            // Tentativa de modificar tupla (gerará erro)
            COORDENADAS[0] = 100;
        } catch (Error $e) {
            echo '<div style="color: red;">Erro: ' . $e->getMessage() . '</div>';
        }
        
        // Simulando tupla como resultado de função
        function obterPonto(): array {
            return [5, 10, 15]; // X, Y, Z
        }
        
        // Desestruturando array (novidade no PHP 7.1+)
        [$x, $y, $z] = obterPonto();
        echo "Ponto desestruturado: X=$x, Y=$y, Z=$z<br>";
    }
}