# Estrutura de Dados em PHP com CodeIgniter 3

Este projeto foi desenvolvido como base de estudos para entender como utilizar diferentes **estruturas de dados do PHP 8.1** dentro do framework **CodeIgniter 3**, utilizando HMVC.

O objetivo é demonstrar, de forma prática, como cada tipo de estrutura de dados pode ser manipulada, visualizada e aplicada no contexto de um sistema web.

---

## 🧠 Tecnologias utilizadas

- **PHP 8.1**
- **CodeIgniter 3**
- Servidor local (wamp)

---

## 📚 Funções e Estruturas de Dados

Cada uma das funções do controller `Post` representa uma estrutura de dados diferente do PHP:

| Função | Estrutura de Dados | Descrição |
|--------|--------------------|-----------|
| `arrayIndexado()` | Array indexado | Lista simples com índice numérico. |
| `arrayAssociativo()` | Array associativo | Pares chave-valor |
| `arrayMultidimensional()` | Array multidimensional | Array dentro de outro array (tipo tabela). |
| `objetoStd()` | Objeto (`stdClass`) | Objeto genérico com atributos dinâmicos. |
| `iteradorForeach()` | Iterador (foreach) | Percorre arrays de forma simples. |
| `pilha()` | Pilha (`SplStack`) | Estrutura LIFO (último a entrar, primeiro a sair). |
| `fila()` | Fila (`SplQueue`) | Estrutura FIFO (primeiro a entrar, primeiro a sair). |
| `heap()` | Heap (`SplMaxHeap`) | Estrutura de dados hierárquica baseada em prioridades. |
| `mapa()` | Mapa (`SplObjectStorage`) | Associa objetos a dados (tipo chave-valor orientado a objetos). |
| `conjunto()` | Conjunto (`array_unique`) | Estrutura que remove elementos duplicados. |
| `tupla()` | Tupla (simulada) | Lista imutável simulada com `define()`. |
| `usarEnum()` | Enum (`enum`) | Estrutura nativa do PHP 8.1 para representar estados fixos. |

---

## 📌 Requisitos

- PHP >= 8.1
- Navegador moderno
- Servidor Apache/Nginx com CodeIgniter 3 configurado

---

##  Autor

**Eduardo Lima**  
Estudante de Ciência da Computação — IESB  
Contato: [github.com/Eduardolimzz](https://github.com/Eduardolimzz)

---


Este projeto é livre para fins educacionais.
