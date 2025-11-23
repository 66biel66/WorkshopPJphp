
# Workshop


#Controller -> controle de chamadas de URl



#Autoload -> A função dele é carregar automaticamente o arquivo de uma classe quando ela é usada pela primeira vez, eliminando a necessidade de fazer include ou require manualmente para cada arquivo de classe.


## WORKSHP/API


## Controller -> Serve como o ponto de entrada da aplicação.
Recebe todas as chamadas HTTP (via `index.php?param=rota`) e delega a requisição para o roteador (dispatcher), que identifica a ação e o `Endpoint`.


## Autoload -> Garante que as classes sejam carregadas automaticamente pelo seu namespace no momento em que são usadas.


## Métodos HTTP -> `mvc/generic/Acao.php`

Constantes definidas no dispatcher:
```php
const POST = "POST";
const PATCH = "PATCH";
const GET = "GET";
const PUT = "PUT";
const DELETE = "DELETE";
```

### GET -> Recuperar dados - Listar Usuários (Listar/Buscar).

### POST -> Cria um novo recurso ou executa a ação que modifica o estado (Criar Usuário).

### PUT -> Atualiza um recurso existente. Alterar todos os dados de um usuário existente. (Atualizar) – JSON.

### PATCH -> Atualização parcial de um recurso. Depende do Controller/DAO - Alterar E-mail ou Senha de um usuário (Atualização Parcial) – JSON.

### DELETE -> Remover um recurso (Remover um usuário).

## JSON -> Fluxo resumido
Requisição chega a ROTA → Controller → Rotas → Acao → JWTAuth → Controller → Service → DAO → Conexao/MySQL → retorno sobe e é enviado como JSON.

