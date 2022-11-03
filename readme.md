# Teste Superlógica

## Tecnologias e Soluçõees

1. [Docker](https://www.docker.com/)
2. [Docker Compose](https://docs.docker.com/compose/)
3. [PestPHP/Pest](https://pestphp.com/docs/pest/) - Pacote para realização de testes unitários.
4. [NGINX](https://www.nginx.com/)
5. [MariaDB](https://mariadb.org/)
6. [**helyederson/hnslm-framework**](https://github.com/Resodx/hnslm-framework) - Micro-framework básico que desenvolvido para fins de estudo e prática durante o desenvolvimento do projeto da superlogica, sendo assim, integra o projeto de teste. O pacote gerencia questões como conexão, dependências e estrutura MVC. O mesmo também se encontra disponível no [**packagist**](https://packagist.org/packages/helyederson/hnslm-framework).
7. [zircote/swagger-php - Packagist](https://packagist.org/packages/zircote/swagger-php) - Geração do JSON de documentação OpenApi.
8. [PDO](https://www.php.net/manual/en/book.pdo.php) - **PHP Data Objects** para conexão com MariaDB e segurança contra SQL Injection.
9. [JQuery](https://jquery.com/)
10. [Bootstrap](https://getbootstrap.com/)
11. [Font Awesome](https://fontawesome.com/)
 
## Requisitos Mí­nimos

- Possuir Docker e Docker Compose instalados na máquina que irá executar a aplicação.

- Docker Desktop com WSL2.

- GIT

## Instalação

### Todos os comandos abaixo são executados no sistema WSL2.

- Clonar o [repositório](https://github.com/Resodx/dev-superlogica.git).

```

git clone https://github.com/Resodx/dev-superlogica.git

```

- O arquivo `.env` na raiz permite a configuração dos parâmetros do banco de dados antes da montagem do projeto.

- Na pasta raiz em que o repositório clonado execute os comandos:

```

docker-compose up -d --build

docker ps

```

- Verificar se todos os containers constam como **`started`**
- Executar o seguinte comando para o composer instalar as dependências

```
docker exec -it superlogicatest composer install
```

- Em seguida execute os testes unitários através do PEST com a seguinte linha de comando

```

docker exec -it superlogicatest ./vendor/bin/pest

```
Os testes unitários certificam-se que os modelos e a API estão funcionando corretamente. Todos os 25 testes devem estar como **`passed`**.

## Pasta `app`

- Pasta onde se concentra a regra de negócio da aplicação seguindo a arquitetura MVC.

- Todas as classes utilizadas estendem o micro-famework [**helyederson/hnslm-framework**](https://github.com/Resodx/hnslm-framework)

## Pasta `public`
- Pasta raiz onde se encontra o index.php, favicon.ico e style.css

## Pasta `tests`

- Pasta criada pelo PEST para concentrar os testes unitários

## Pasta `docker-compose`

- Pasta contendo os arquivos para o build do projeto utilizando o Docker.

## Home

- Após a configuração do projeto, a [página inicial localhost](http://localhost/) permite navegar pelos três exercícios desenvolvidos. Os exercícios também podem ser acessados através dos links abaixo.
--[Exercício 1](http://localhost/ex1)
--[Exercício 2](http://localhost/ex2)
--[Exercício 3](http://localhost/ex3)


## Swagger

- Para ter acesso a documentação da API, basta acessar a rota: http://localhost/swagger, copiar o json gerado e colar no [swagger editor](https://editor.swagger.io/)