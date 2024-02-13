<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Learning Laravel

[documentation](https://laravel.com/docs)

[Laracasts](https://laracasts.com)

## Sobre o projeto

Sistema de gestão...

- [Simple, fast routing engine](https://laravel.com/docs/routing).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

### Comandos

- ```php artisan -V``` **Mostra a versão do Laravel**
- ```php artisan serve``` **Sobe a aplição em um servidor próprio, usado para dev**
- ```php artisan list``` **Mostra a lista de comandos do artesão**
- ```php artisan route:list``` **Mostra a lista de rottas da aplicação**
- ```php artisan make:model NomeDoModelo -m``` **Cria modelos o parametro -m é para criar uma migration junto com o Model**
- ```php artisan migrate``` **Executa as migrações**
- ```php artisan make:migration create_fornecedores_table``` **Comando para criar migrations separadas**
- ```php artisan make:migration alter_fornecedors_new_colluns``` **Comando para criar migrations para atualizar minha tabela**
- ```php artisan migrate:rollback ``` **Comando para reverter uma migration na ultima migration executada** ( parametro define a quantidade de etapas quero reverter "--step=2")
- ```php artisan migrate:status ``` **Comando que lista situação das migrações**
- ```php artisan migrate:reset ``` **Comando executa todos os rollbacks do laravel**
- ```php artisan migrate:refresh ``` **Comando executa todos os rollbacks do laravel e depois recria tudo novamente**
- ```php artisan migrate:fresh ``` **Comando executa todos os dropa o laravel e depois recria tudo novamente**
- ```php artisan make:seeder FornecedorSeeder ``` **Comando cria um seeder para popular o banco**
- ```php artisan db:seede ``` **Comando executa os seeders (mas é preciso registrar os seeders no DatabaseSeeder.php)**
- ```php artisan db:seede --class=SiteContatoSeeder``` **Comando executa os seeders com atributo --class=NOMECLASSE para executar apenas o seeder desejado**
- ```php artisan make:factory SiteContatoFactory --model=SiteContato``` **Comando cria uma nova factory**

## Usando Tinker

### Criando um niovo registro 

   - Nesse comando no terminal integrado inicializamos o tinker
```php artisan tinker```
    Agora criamos uma variavel e atribuimos a ela a Classe Fornecedor
```$fornecedor  = new \App\Fornecedor();```
    Agora estamos criando os atributos com seus respectivos valores
    em nossa classe
```$fornecedor->nome = 'jamario';```

```$fornecedor->site = 'jamario.com.br';```

```$fornecedor->uf = 'GO';```

```$fornecedor->email = 'jamariobatista@gmail.com';```
    Aqui apenas imprimimos os atributos do nosso objeto de classe
```print_r($fornecedor->getAttributes());```
    Pronto se tudo estiver correto conforme os requisitos do
    Banco de dados o tinker ira criar um novo registro
```$fornecedor->save()```

### Deletando um registro

```$fornecedor  = new \App\Fornecedor;```
    Usando metodo finde que busca o dado passando por parametro o id
```$fornecedor  = Fornecedor::find(1);```
    Nesse momento nossa variavel irá ter o objeto encontrado
    ao usar o atributo delete ele apaga o registro
```$fornecedor->delete();```

### Usando softDelete

- O metodo continua iqual ao deletar a diferença está em criar
um campo novo no banco chamado softdelete  e na migration usar corretamente
o comando  $table->softDeletes(); com isso o Orm do Laravel
 sempre vai manter o dado e registrar a data de remoção, o metodo listar não vai
apresentar aquela tupla

```$fornecedor  = new \App\Fornecedor;```
```$fornecedor  = Fornecedor::find(1);```
```$fornecedor->delete();```

- No caso de querer realmente remover o registro basta usar a intrução:
```$fornecedor->forceDelete();```

### retornar registros
```$fornecedor  = new \App\Fornecedor;```
```$fornecedor  = Fornecedor::all();```

- Caso queira retornar registros deletados usar:
```$fornecedor  = Fornecedor::withTrashed()->get();``` - retorna itens deletados ou não
```$fornecedor  = Fornecedor::onlyTrashed()->get()``` - retorna apenas itens deletados

### Retornando item deletado por softdelete

```$fornecedor  = Fornecedor::withTrashed()->get();```
```$fornecedor[0]->restore();```

## Middlewares

### Criando novo middleware

```php artisan make:middleware NomeMiddleware```