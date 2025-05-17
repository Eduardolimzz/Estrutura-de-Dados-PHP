<?php

use Dom\Notation;
use HRTime\StopWatch;
class DataStructures extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Carrega a biblioteca de session (útil para exemplos)
        $this->load->library('session');
        // Carrega ajudantes (helpers)
        $this->load->helper(['url', 'form']);
    }
    
    public function index(){
        $data['titulo'] = 'Exemplos de Estruturas de Dados em PHP 8.1';
        $this->load->view('templates/header', $data);
        $this->load->view('estruturas_dados/index', $data);
        $this->load->view('templates/footer');
    }
    
    // ARRAYS E COLEÇÕES
    
    // 1. Array indexado - elementos acessados por índice numérico
    public function arrayIndexado(){
        $frutas = ['Maçã', 'Banana', 'Laranja'];
        
        // Adicionando elemento
        $frutas[] = 'Uva';
        
        // Removendo elemento
        unset($frutas[1]); // Remove Banana
        
        // Reindexando array
        $frutas = array_values($frutas);
        
        // Mostrando resultados
        echo '<h3>Array Indexado</h3>';
        echo '<pre>'; print_r($frutas); echo '</pre>';
        
        // Métodos úteis
        echo 'Total de itens: ' . count($frutas) . '<br>';
        echo 'Primeiro item: ' . reset($frutas) . '<br>';
        echo 'Último item: ' . end($frutas) . '<br>';
    }
    
    // 2. Array associativo - elementos acessados por chaves definidas
    public function arrayAssociativo(){
        $usuario = [
            'nome' => 'Eduardo',
            'idade' => 18,
            'curso' => 'Ciência da Computação'
        ];
        
        // Adicionando novo par chave-valor
        $usuario['cidade'] = 'São Paulo';
        
        // Verificando se chave existe
        if (array_key_exists('idade', $usuario)) {
            echo 'Idade existe no array<br>';
        }
        
        // Obtendo todas as chaves e valores
        $chaves = array_keys($usuario);
        $valores = array_values($usuario);
        
        echo '<h3>Array Associativo</h3>';
        echo '<pre>'; print_r($usuario); echo '</pre>';
        echo '<h4>Chaves:</h4>';
        echo '<pre>'; print_r($chaves); echo '</pre>';
        echo '<h4>Valores:</h4>';
        echo '<pre>'; print_r($valores); echo '</pre>';
    }
    
    // 3. Array multidimensional - arrays dentro de arrays
    public function arrayMultidimensional(){
        $usuarios = [
            ['nome' => 'Ana', 'idade' => 20, 'habilidades' => ['PHP', 'JavaScript']],
            ['nome' => 'Bruno', 'idade' => 22, 'habilidades' => ['Python', 'SQL']],
        ];
        
        // Acessando dados aninhados
        echo '<h3>Array Multidimensional</h3>';
        echo 'Nome do primeiro usuário: ' . $usuarios[0]['nome'] . '<br>';
        echo 'Primeira habilidade do segundo usuário: ' . $usuarios[1]['habilidades'][0] . '<br>';
        
        // Adicionando novo usuário
        $usuarios[] = [
            'nome' => 'Carla',
            'idade' => 25,
            'habilidades' => ['Java', 'C#']
        ];
        
        echo '<pre>'; print_r($usuarios); echo '</pre>';
        
        // Arrays com chaves personalizadas
        $departamentos = [
            'ti' => [
                'gerente' => 'Marcos',
                'funcionarios' => ['Ana', 'Pedro', 'Julia']
            ],
            'rh' => [
                'gerente' => 'Claudia',
                'funcionarios' => ['Rafael', 'Teresa']
            ]
        ];
        
        echo '<h4>Departamentos:</h4>';
        echo '<pre>'; print_r($departamentos); echo '</pre>';
        echo 'Gerente de TI: ' . $departamentos['ti']['gerente'] . '<br>';
    }
    
    // 4. Objeto básico com stdClass
    public function objetosBasicos(){
        // Criando objeto vazio e adicionando propriedades
        $post = new stdClass();
        $post->titulo = "Título do post";
        $post->conteudo = "Conteúdo do post";
        $post->data = new DateTime('now');
        
        echo '<h3>Objeto StdClass</h3>';
        echo '<pre>'; print_r($post); echo '</pre>';
        
        // Convertendo array para objeto
        $array = ['nome' => 'Eduardo', 'email' => 'eduardo@email.com'];
        $objeto = (object) $array;
        
        echo '<h4>Array convertido para objeto:</h4>';
        echo '<pre>'; print_r($objeto); echo '</pre>';
        echo 'Nome: ' . $objeto->nome . '<br>';
        
        // Convertendo objeto para array
        $arrayDeVolta = (array) $objeto;
        
        echo '<h4>Objeto convertido para array:</h4>';
        echo '<pre>'; print_r($arrayDeVolta); echo '</pre>';
    }
    
    // 5. Iteradores e loops
    public function iteradores(){
        echo '<h3>Diferentes tipos de iteração</h3>';
        
        $nomes = ['Lucas', 'João', 'Maria', 'Ana'];
        
        // Foreach - o mais usado
        echo '<h4>Foreach simples:</h4>';
        foreach ($nomes as $nome) {
            echo "Nome: $nome<br>";
        }
        
        // Foreach com índice
        echo '<h4>Foreach com índice:</h4>';
        foreach ($nomes as $indice => $nome) {
            echo "[$indice] => $nome<br>";
        }

        // For tradicional
        echo '<h4>For tradicional:</h4>';
        for ($i = 0; $i < count($nomes); $i++) {
            echo "Nome $i: " . $nomes[$i] . "<br>";
        }
        
        // While
        echo '<h4>While:</h4>';
        $i = 0;
        while ($i < count($nomes)) {
            echo "Nome $i: " . $nomes[$i] . "<br>";
            $i++;
        }
        
        // Do-while
        echo '<h4>Do-while:</h4>';
        $i = 0;
        do {
            echo "Nome $i: " . $nomes[$i] . "<br>";
            $i++;
        } while ($i < count($nomes));
        
        // Iterator com array_map (programação funcional)
        echo '<h4>Array_map:</h4>';
        $maiusculas = array_map(function($nome) {
            return strtoupper($nome);
        }, $nomes);
        
        echo '<pre>'; print_r($maiusculas); echo '</pre>';
        
        // Iterator com array_filter (programação funcional)
        echo '<h4>Array_filter:</h4>';
        $comecaComM = array_filter($nomes, function($nome) {
            return $nome[0] == 'M';
        });
        
        echo '<pre>'; print_r($comecaComM); echo '</pre>';
    }
    
    // ESTRUTURAS DE DADOS AVANÇADAS
    
    // 6. Pilha (Stack) - LIFO (Last In, First Out)
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
    
    // 7. Fila (Queue) - FIFO (First In, First Out)
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
    
    // 8. Heap - Estrutura para prioridade
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
    
    // 9. Mapa (Map) - pares chave/valor com objetos como chaves
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
    
    // 10. Conjunto (Set) - coleção sem duplicatas
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
    
    // 11. Tupla (Array imutável em PHP)
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
    
    // 12. Enum (PHP 8.1+)
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
    
    // 13. Linked List (Lista Ligada) - usando SplDoublyLinkedList
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
    
    // 14. Árvore (Tree) - implementação simples
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
    
    // 15. Dicionário (Dictionary) - similar ao array associativo, mas mais estruturado
    public function dicionario(){
        echo '<h3>Dicionário (Dictionary)</h3>';
        
        // Implementação simples de uma classe Dictionary
        class Dictionary {
            private $data = [];
            
            public function set($key, $value) {
                $this->data[$key] = $value;
            }
            
            public function get($key, $default = null) {
                return $this->has($key) ? $this->data[$key] : $default;
            }
            
            public function has($key) {
                return array_key_exists($key, $this->data);
            }
            
            public function remove($key) {
                if ($this->has($key)) {
                    unset($this->data[$key]);
                    return true;
                }
                return false;
            }
            
            public function clear() {
                $this->data = [];
            }
            
            public function keys() {
                return array_keys($this->data);
            }
            
            public function values() {
                return array_values($this->data);
            }
            
            public function count() {
                return count($this->data);
            }
            
            public function toArray() {
                return $this->data;
            }
        }
        
        // Usando o Dictionary
        $dict = new Dictionary();
        $dict->set('nome', 'Carlos');
        $dict->set('idade', 30);
        $dict->set('profissao', 'Programador');
        
        echo 'Nome: ' . $dict->get('nome') . '<br>';
        echo 'Idade: ' . $dict->get('idade') . '<br>';
        echo 'Cidade: ' . $dict->get('cidade', 'Não informada') . '<br>';
        
        echo 'Tem profissão? ' . ($dict->has('profissao') ? 'Sim' : 'Não') . '<br>';
        
        $dict->remove('idade');
        echo 'Ainda tem idade? ' . ($dict->has('idade') ? 'Sim' : 'Não') . '<br>';
        
        echo '<h4>Chaves:</h4>';
        echo '<pre>'; print_r($dict->keys()); echo '</pre>';
        
        echo '<h4>Valores:</h4>';
        echo '<pre>'; print_r($dict->values()); echo '</pre>';
        
        echo '<h4>Array completo:</h4>';
        echo '<pre>'; print_r($dict->toArray()); echo '</pre>';
    }
    
    // 16. Cache usando SPL (File Cache)
    public function fileCache(){
        echo '<h3>Cache usando SplFileObject</h3>';
        
        // Caminho para o arquivo de cache (temporário)
        $cacheFile = APPPATH . 'cache/exemplo_cache.txt';
        
        // Verificando se o cache existe e é recente (menos de 60 segundos)
        $cacheExists = file_exists($cacheFile) && (time() - filemtime($cacheFile) < 60);
        
        if ($cacheExists) {
            echo 'Lendo dados do cache...<br>';
            $file = new SplFileObject($cacheFile, 'r');
            
            while (!$file->eof()) {
                echo $file->fgets() . '<br>';
            }
            
            echo 'Cache criado em: ' . date('H:i:s', filemtime($cacheFile));
        } else {
            echo 'Gerando novo cache...<br>';
            
            // Certifique-se de que o diretório existe
            if (!is_dir(dirname($cacheFile))) {
                mkdir(dirname($cacheFile), 0755, true);
            }
            
            // Simulando dados que demorariam para ser gerados
            $dados = [
                'timestamp' => time(),
                'mensagem' => 'Estes são dados em cache',
                'numeros' => [1, 2, 3, 4, 5]
            ];
            
            // Salvando no cache
            $file = new SplFileObject($cacheFile, 'w');
            $file->fwrite(json_encode($dados, JSON_PRETTY_PRINT));
            
            echo 'Dados salvos no cache às ' . date('H:i:s');
        }
    }
    
    // 17. Fixed Array (Array de tamanho fixo)
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
    
    // 18. Priority Queue (Fila de Prioridade)
    public function filaPrioridade(){
        echo '<h3>Fila de Prioridade (SplPriorityQueue)</h3>';
        
        $queue = new SplPriorityQueue();
        
        // Inserindo elementos com prioridades diferentes
        $queue->insert('Tarefa A', 1); // Prioridade baixa
        $queue->insert('Tarefa B', 3); // Prioridade alta
        $queue->insert('Tarefa C', 2); // Prioridade média
        $queue->insert('Tarefa D', 3); // Mesma prioridade alta
        
        echo '<h4>Elementos na fila de prioridade:</h4>';
        
        // Modo de extração padrão (SplPriorityQueue::EXTR_DATA)
        $queue->setExtractFlags(SplPriorityQueue::EXTR_DATA);
        
        // Clonando para não consumir a fila original
                    $queueCopy = clone $queue;
        
        while ($queueCopy->valid()) {
            echo $queueCopy->current() . "<br>";
            $queueCopy->next();
        }
        
        // Extração com prioridade
        echo '<h4>Extraindo com prioridade:</h4>';
        $queueForPriority = clone $queue;
        $queueForPriority->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        
        while ($queueForPriority->valid()) {
            $item = $queueForPriority->current();
            echo "Dados: {$item['data']}, Prioridade: {$item['priority']}<br>";
            $queueForPriority->next();
        }
        
        // Consumindo a fila original (vai do maior para o menor)
        echo '<h4>Consumindo a fila original:</h4>';
        while (!$queue->isEmpty()) {
            echo $queue->extract() . "<br>";
        }
    }
    
    // 19. Trabalhando com JSON
    public function jsonData(){
        echo '<h3>Trabalhando com JSON</h3>';
        
        // Array para JSON
        $dados = [
            'nome' => 'Eduardo',
            'cursos' => ['PHP', 'MySQL', 'JavaScript'],
            'detalhes' => [
                'idade' => 25,
                'cidade' => 'São Paulo'
            ]
        ];
        
        // Convertendo para JSON
        $json = json_encode($dados, JSON_PRETTY_PRINT);
        
        echo '<h4>JSON gerado:</h4>';
        echo '<pre>' . htmlspecialchars($json) . '</pre>';
        
        // Decodificando JSON para array
        $arrayDecodificado = json_decode($json, true);
        
        echo '<h4>Array decodificado:</h4>';
        echo '<pre>'; print_r($arrayDecodificado); echo '</pre>';
        
        // Decodificando JSON para objeto
        $objetoDecodificado = json_decode($json);
        
        echo '<h4>Objeto decodificado:</h4>';
        echo '<pre>'; print_r($objetoDecodificado); echo '</pre>';
        echo 'Nome: ' . $objetoDecodificado->nome . '<br>';
        echo 'Curso 1: ' . $objetoDecodificado->cursos[0] . '<br>';
        echo 'Idade: ' . $objetoDecodificado->detalhes->idade . '<br>';
        
        // Tratando erros de JSON
        $jsonInvalido = '{"nome": "João", "idade": 30,}'; // Vírgula extra
        
        $resultado = json_decode($jsonInvalido);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo '<div style="color: red;">Erro JSON: ' . json_last_error_msg() . '</div>';
        }
    }
    
    // 20. Closure (Funções anônimas)
    public function closure(){
        echo '<h3>Closure (Funções Anônimas)</h3>';
        
        // Função anônima básica
        $saudacao = function($nome) {
            return "Olá, $nome!";
        };
        
        echo $saudacao("Eduardo") . "<br>";
        
        // Função anônima com use (capturando variáveis externas)
        $mensagem = "Bem-vindo";
        $formatarMensagem = function($nome) use ($mensagem) {
            return "$mensagem, $nome!";
        };
        
        echo $formatarMensagem("João") . "<br>";
        
        // Arrow Functions (PHP 7.4+)
        $numeros = [1, 2, 3, 4, 5];
        
        // Forma antiga
        $quadrados1 = array_map(function($n) { return $n * $n; }, $numeros);
        
        // Arrow function
        $quadrados2 = array_map(fn($n) => $n * $n, $numeros);
        
        echo '<h4>Quadrados com função anônima:</h4>';
        echo '<pre>'; print_r($quadrados1); echo '</pre>';
        
        echo '<h4>Quadrados com arrow function:</h4>';
        echo '<pre>'; print_r($quadrados2); echo '</pre>';
        
        // Closures como callbacks
        $ordenar = function($a, $b) {
            return strlen($a) <=> strlen($b); // Ordenar por tamanho da string
        };
        
        $palavras = ['oi', 'olá', 'bem-vindo', 'hey'];
        usort($palavras, $ordenar);
        
        echo '<h4>Palavras ordenadas por tamanho:</h4>';
        echo '<pre>'; print_r($palavras); echo '</pre>';
    }
    
    // 21. Generators (Geradores)
    public function generators(){
        echo '<h3>Generators (Geradores)</h3>';
        
        // Função geradora simples
        function contagem($inicio, $fim) {
            for ($i = $inicio; $i <= $fim; $i++) {
                yield $i;
            }
        }
        
        echo '<h4>Contagem de 1 a 5:</h4>';
        foreach (contagem(1, 5) as $numero) {
            echo "$numero ";
        }
        echo "<br>";
        
        // Geradores com chaves
        function dadosUsuario() {
            yield 'nome' => 'Eduardo';
            yield 'idade' => 25;
            yield 'cidade' => 'São Paulo';
        }
        
        echo '<h4>Dados do usuário:</h4>';
        foreach (dadosUsuario() as $chave => $valor) {
            echo "$chave: $valor<br>";
        }
        
        // Geradores para trabalhar com grandes conjuntos de dados
        function lerArquivoGrande($arquivo) {
            $handle = fopen($arquivo, 'r');
            
            while (!feof($handle)) {
                yield fgets($handle);
            }
            
            fclose($handle);
        }
        
        // Exemplo de uso: (comentado pois precisa de um arquivo real)
        /*
        $arquivo = APPPATH . 'dados/exemplo.txt';
        foreach (lerArquivoGrande($arquivo) as $linha) {
            echo htmlspecialchars($linha) . "<br>";
        }
        */
        
        // Geradores para criar sequências infinitas
        function fibonacci() {
            $a = 0;
            $b = 1;
            
            yield $a;
            yield $b;
            
            while (true) {
                $c = $a + $b;
                $a = $b;
                $b = $c;
                yield $c;
            }
        }
        
        echo '<h4>Sequência de Fibonacci (primeiros 10):</h4>';
        $contador = 0;
        foreach (fibonacci() as $numero) {
            echo "$numero ";
            $contador++;
            if ($contador >= 10) break;
        }
        echo "<br>";
    }
    
    // 22. Typed Properties (PHP 7.4+) e Union Types (PHP 8.0+)
    public function typedProperties(){
        echo '<h3>Propriedades Tipadas (PHP 7.4+) e Union Types (PHP 8.0+)</h3>';
        
        // Classe com propriedades tipadas
        class Usuario {
            public string $nome;
            public int $idade;
            public ?string $email = null; // Nullable type
            public array $habilidades = [];
            
            // PHP 8.0+ Union Types
            public string|int $identificador; // Pode ser string ou inteiro
            
            // PHP 8.1+ - Propriedades somente leitura
            public readonly string $cpf;
            
            public function __construct(
                string $nome, 
                int $idade, 
                ?string $email = null, 
                array $habilidades = [],
                string|int $identificador = 0,
                string $cpf = ''
            ) {
                $this->nome = $nome;
                $this->idade = $idade;
                $this->email = $email;
                $this->habilidades = $habilidades;
                $this->identificador = $identificador;
                $this->cpf = $cpf;
            }
        }
        
        $usuario = new Usuario(
            'Eduardo',
            25,
            'eduardo@email.com',
            ['PHP', 'MySQL'],
            'ID123',
            '123.456.789-00'
        );
        
        echo '<pre>'; print_r($usuario); echo '</pre>';
        
        // Exibe informações sobre a classe
        $reflection = new ReflectionClass(Usuario::class);
        $properties = $reflection->getProperties();
        
        echo '<h4>Detalhes das propriedades:</h4>';
        foreach ($properties as $property) {
            echo $property->getName() . ': ';
            
            if ($property->hasType()) {
                $type = $property->getType();
                echo 'Tipo: ' . ($type instanceof ReflectionUnionType 
                      ? implode('|', array_map(fn($t) => $t->getName(), $type->getTypes()))
                      : $type->getName());
                
                echo ', Permite null: ' . ($type->allowsNull() ? 'Sim' : 'Não');
            } else {
                echo 'Sem tipo definido';
            }
            
            echo '<br>';
        }
    }
    
    // 23. Exemplo com Attributes (PHP 8.1+)
    public function attributes(){
        echo '<h3>Attributes (PHP 8.1+)</h3>';
        
        // Definindo um attribute
        #[Attribute]
        class Validacao {
            public function __construct(
                public string $regra,
                public string $mensagem
            ) {}
        }
        
        // Usando attributes
        class Formulario {
            #[Validacao('email', 'E-mail inválido')]
            public string $email;
            
            #[Validacao('min:8', 'Senha deve ter pelo menos 8 caracteres')]
            public string $senha;
            
            #[Validacao('required', 'Nome é obrigatório')]
            public string $nome;
        }
        
        // Lendo os attributes com reflection
        $reflection = new ReflectionClass(Formulario::class);
        $propriedades = $reflection->getProperties();
        
        echo '<h4>Validações definidas:</h4>';
        foreach ($propriedades as $prop) {
            $attributes = $prop->getAttributes(Validacao::class);
            
            foreach ($attributes as $attribute) {
                $validacao = $attribute->newInstance();
                echo "Campo: {$prop->getName()}, ";
                echo "Regra: {$validacao->regra}, ";
                echo "Mensagem: {$validacao->mensagem}<br>";
            }
        }
    }
    
    // 24. Trabalhando com Match Expression (PHP 8.0+)
    public function matchExpression(){
        echo '<h3>Match Expression (PHP 8.0+)</h3>';
        
        $status = 1;
        
        // Usando switch (modo tradicional)
        echo '<h4>Usando switch:</h4>';
        switch ($status) {
            case 1:
                echo "Ativo<br>";
                break;
            case 2:
                echo "Inativo<br>";
                break;
            case 3:
                echo "Pendente<br>";
                break;
            default:
                echo "Desconhecido<br>";
        }
        
        // Usando match (novo em PHP 8.0)
        echo '<h4>Usando match:</h4>';
        $statusTexto = match ($status) {
            1 => "Ativo",
            2 => "Inativo",
            3 => "Pendente",
            default => "Desconhecido",
        };
        
        echo "Status: $statusTexto<br>";
        
        // Match com condições múltiplas
        $valor = 15;
        
        $categoria = match (true) {
            $valor < 0 => "Negativo",
            $valor == 0 => "Zero",
            $valor > 0 && $valor <= 10 => "Pequeno",
            $valor > 10 && $valor <= 20 => "Médio",
            default => "Grande",
        };
        
        echo "Categoria do valor $valor: $categoria<br>";
        
        // Match com tipagem estrita
        echo '<h4>Match com tipagem estrita:</h4>';
        
        $valor1 = 1;
        $valor2 = "1";
        
        $resultado1 = match ($valor1) {
            1 => "Inteiro 1",
            "1" => "String 1",
            default => "Outro",
        };
        
        $resultado2 = match ($valor2) {
            1 => "Inteiro 1",
            "1" => "String 1",
            default => "Outro",
        };
        
        echo "Resultado 1: $resultado1<br>";
        echo "Resultado 2: $resultado2<br>";
    }
    
    // 25. Named Arguments (PHP 8.0+)
    public function namedArguments(){
        echo '<h3>Named Arguments (PHP 8.0+)</h3>';
        
        function criarUsuario(
            string $nome,
            string $email,
            int $idade = 18,
            bool $ativo = true,
            array $permissoes = []
        ): array {
            return [
                'nome' => $nome,
                'email' => $email,
                'idade' => $idade,
                'ativo' => $ativo,
                'permissoes' => $permissoes
            ];
        }
        
        // Modo tradicional (posicional)
        echo '<h4>Argumentos posicionais:</h4>';
        $usuario1 = criarUsuario('João', 'joao@email.com', 25, true, ['admin', 'editor']);
        echo '<pre>'; print_r($usuario1); echo '</pre>';
        
        // Usando named arguments
        echo '<h4>Named arguments:</h4>';
        $usuario2 = criarUsuario(
            nome: 'Maria',
            email: 'maria@email.com',
            permissoes: ['editor'],
            ativo: false
            // idade - usando o valor padrão
        );
        echo '<pre>'; print_r($usuario2); echo '</pre>';
        
        // Misturando posicionais e nomeados
        echo '<h4>Mistura de argumentos posicionais e nomeados:</h4>';
        $usuario3 = criarUsuario('Carlos', email: 'carlos@email.com', ativo: false);
        echo '<pre>'; print_r($usuario3); echo '</pre>';
    }
    
    // 26. Nullable Types e Union Types (PHP 8.0+)
    public function nullableUnionTypes(){
        echo '<h3>Nullable Types e Union Types</h3>';
        
        // Nullable Type
        function saudacao(?string $nome): string {
            return $nome ? "Olá, $nome!" : "Olá, visitante!";
        }
        
        echo saudacao("Eduardo") . "<br>";
        echo saudacao(null) . "<br>";
        
        // Union Types
        function processarDado(string|int|float $valor): string {
            $tipo = gettype($valor);
            return "Valor: $valor, Tipo: $tipo";
        }
        
        echo processarDado("texto") . "<br>";
        echo processarDado(123) . "<br>";
        echo processarDado(45.67) . "<br>";
        
        // Combinando Union Types e Nullable Types
        function validarEntrada(string|int|null $valor): bool {
            if ($valor === null) {
                return false;
            }
            
            if (is_string($valor)) {
                return strlen($valor) > 0;
            }
            
            return $valor > 0;
        }
        
        echo "Validação de 'abc': " . (validarEntrada('abc') ? 'Válido' : 'Inválido') . "<br>";
        echo "Validação de '': " . (validarEntrada('') ? 'Válido' : 'Inválido') . "<br>";
        echo "Validação de 5: " . (validarEntrada(5) ? 'Válido' : 'Inválido') . "<br>";
        echo "Validação de 0: " . (validarEntrada(0) ? 'Válido' : 'Inválido') . "<br>";
        echo "Validação de null: " . (validarEntrada(null) ? 'Válido' : 'Inválido') . "<br>";
    }
    
    // 27. Utilizando Intersaction Types (PHP 8.1+)
    public function intersectionTypes(){
        echo '<h3>Intersection Types (PHP 8.1+)</h3>';
        
        // Definindo interfaces
        interface Identificavel {
            public function getId(): int;
        }
        
        interface Nomeavel {
            public function getNome(): string;
        }
        
        // Classe que implementa ambas interfaces
        class Entidade implements Identificavel, Nomeavel {
            public function __construct(
                private int $id,
                private string $nome
            ) {}
            
            public function getId(): int {
                return $this->id;
            }
            
            public function getNome(): string {
                return $this->nome;
            }
        }
        
        // Função que aceita apenas objetos que implementam ambas interfaces
        function mostrarEntidade(Identificavel&Nomeavel $entidade): void {
            echo "ID: {$entidade->getId()}, Nome: {$entidade->getNome()}<br>";
        }
        
        $entidade = new Entidade(1, 'Produto A');
        mostrarEntidade($entidade);
        
        // Isso não funcionaria (comentado para não quebrar o código):
        /*
        class SomenteIdentificavel implements Identificavel {
            public function getId(): int {
                return 1;
            }
        }
        
        $obj = new SomenteIdentificavel();
        mostrarEntidade($obj); // Erro: Argument 1 must be of type Identificavel&Nomeavel
        */
    }
}

// Enums (PHP 8.1+)
enum Status: string {
    case ATIVO = 'ativo';
    case INATIVO = 'inativo';
    
    public function label(): string {
        return match($this) {
            self::ATIVO => 'Ativo',
            self::INATIVO => 'Inativo',
        };
    }
}

// Enum sem valor (Unit Enum)
enum Direcao {
    case NORTE;
    case SUL;
    case LESTE;
    case OESTE;
}