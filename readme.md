## "Cidadão de Olho" - Desafio Técnico de PHP da Codificar Sistemas

Esse projeto utiliza o Laravel como Framework e SQLite como banco de dados.

Após clonar o projeto você deve:

-   Criar uma cópia do arquivo `env.example` e renomear para `.env`
-   No arquivo `.env`, alterar a variável `DB_CONNECTION` para:

```
DB_CONNECTION=sqlite
```

-   E remover a variável `DB_DATABASE`
-   Criar o arquivo de banco de dados dessa forma:

```
$ cd ...caminho-do-projeto-clonado...
$ cd database
$ touch database.sqlite
```

-   Executar os comandos:

```
$ cd ...caminho-do-projeto-clonado...
$ composer install
$ npm install
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed //aqui ocorre a carga dos dados, pode demorar vários minutos
$ php artisan serve
```

-   Para obter a lista dos 5 deputados que mais pediram reembolso, utilize esse endpoint:

```
http://[url_padrao]/maiores-reembolsos
```

-   Para obter o ranking das redes sociais mais utilizadas pelos deputados, utilize esse endpoint:

```
http://[url_padrao]/redes-sociais
```

Foi criada uma classe para realizar as requisições HTTP, ela foi desenvolvida utilizando apenas funções presentes no PHP e é utilizada pelos Seeders para obter os dados do Web Service da ALMG.
