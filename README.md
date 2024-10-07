# Teste Tecnico GOSAT

## Ambiente Docker configurado com o Laravel Sail.
[Laravel 11 Sail Documentação: https://laravel.com/docs/11.x/sail#installing-sail-into-existing-applications](https://laravel.com/docs/11.x/sail#installing-sail-into-existing-applications)

**Execute**
**./vendor/bin/sail up** ou **docker-compose up -d**

>[!NOTE]
	><p>Caso esteja usando Docker destop para windows é necessário clonar o repositório para dentro do Ubunto do WSL2</p>
	><p>Geralmente Linux/Ubuntu/home/usuario do WSL</p>

**Execute as migrations e seeds**
>[!NOTE]
	>Caso dentro do WSL **./vendor/bin/sail artisan migrate** **./vendor/bin/sail artisan db:seed**

## Documentação Postman
[Postman - Workspace publicado](https://documenter.getpostman.com/view/2516132/2sAXxP9Y9B)

***TesteTecnicoGosat***
[http://localhost/api/v1/simulacao/credito?cpf=123.123.123.12](http://localhost/api/v1/simulacao/credito?cpf=123.123.123.12)

| key | value |
|--- |--- |
| cpf | 111.111.111-11 |
| cpf | 123.123.123.12 |
| cpf | 222.222.222.22 |

[http://localhost/api/v1/simulacao/oferta?cpf=111.111.111-11&instituicao_id=1&codModalidade=MYN00JB280TE95YB](http://localhost/api/v1/simulacao/oferta?cpf=111.111.111-11&instituicao_id=1&codModalidade=MYN00JB280TE95YB)

| key | value |
|--- |--- |
| cpf | 111.111.111-11 |
| instituicao_id | 1 |
| codModalidade | MYN00JB280TE95YB |

[http://localhost/api/v1/simulacao/oferta/melhorOpcao?cpf=123.123.123.12](http://localhost/api/v1/simulacao/oferta/melhorOpcao?cpf=123.123.123.12)

| key | value |
|--- |--- |
| cpf | 123.123.123.12 |
