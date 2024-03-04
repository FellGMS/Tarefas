
# Projeto Tarefas - Laravel

O projeto "Tarefas" é uma aplicação simples em Laravel que simula um sistema CRUD para gerenciamento de tarefas usando arrays.

## Funcionalidades

- **CRUD**: Criar, ler, atualizar e deletar tarefas.
- **Interface Simples**: Interaja com as tarefas através de uma interface web básica.

## Começando

Clone o repositório e instale as dependências:

```bash
git clone https://github.com/FellGMS/Tarefas.git
cd Tarefas
composer install
php artisan serve
```

Acesse `http://localhost:8000/Tarefas` para visualizar a aplicação.

## API Endpoints

- **Listar Tarefas**: `GET /tarefas`
- **Criar Tarefa**: `POST /tarefas` com o campo `tarefa`
- **Detalhes da Tarefa**: `GET /tarefas/{id}`
- **Atualizar Tarefa**: `PUT /tarefas/{id}` com o campo `tarefa`
- **Deletar Tarefa**: `DELETE /tarefas/{id}`


## Autor

- Fellipe Gomes - [LinkedIn](https://www.linkedin.com/in/fellipeggomes)

## Repositório

- [GitHub - Projeto Tarefas](https://github.com/FellGMS/Tarefas)
