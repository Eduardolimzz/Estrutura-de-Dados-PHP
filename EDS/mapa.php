<?php

class Mapa{

public function mapa(){
        echo '<h3>Mapa usando SplObjectStorage</h3>';
        
        $storage = new SplObjectStorage();
        
        // Criando objetos para usar como chaves
        $user1 = new stdClass();
        $user1->id = 1;
        $user1->name = 'Alice';
        
        $user2 = new stdClass();
        $user2->id = 2;
        $user2->name = 'Bob';
        
        // Associando valores aos objetos
        $storage[$user1] = ['departamento' => 'TI', 'cargo' => 'Desenvolvedor'];
        $storage[$user2] = ['departamento' => 'RH', 'cargo' => 'Gerente'];
        
        echo '<h4>Objetos no mapa:</h4>';
        foreach ($storage as $user) {
            echo "Usuário: {$user->name}, Departamento: {$storage[$user]['departamento']}, 
                 Cargo: {$storage[$user]['cargo']}<br>";
        }
        
        // Verificando se um objeto existe no mapa
        echo '<h4>Verificações:</h4>';
        echo 'User1 existe? ' . ($storage->contains($user1) ? 'Sim' : 'Não') . '<br>';
        
        // Removendo um objeto
        $storage->detach($user1);
        echo 'User1 ainda existe após removê-lo? ' . 
             ($storage->contains($user1) ? 'Sim' : 'Não') . '<br>';
        
        // Contando objetos
        echo 'Total de objetos: ' . $storage->count() . '<br>';
    }
}
    
