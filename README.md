# desafio
Sistema de cadastro e gerenciamento de documentos utilizando as tecnólogias Laravel, Bootstrap 5, JQuery e mysql.
##  Como usar
####Requisitos
- composer
- [Git](https://git-scm.com).

### Baixando o projeto

```bash
# Clonar esse repositório
$ git clone https://github.com/raicleysantana/controle-de-envio-de-documentos

# Navegue até o diretório
$ cd controle-de-envio-de-documentos

#Baixando as dependências
$ composer install
```

Na linha de comando **como administrador**:

### Banco de dados

- E necessário a criação de um banco de dados no phpmyadmin.
- Duplicar o arquivo .env.example e renomear para .env encontra as configurações de conexão
- Adicionar configurações do banco de dados nas variaveis de ambiente no arquivo .env. 

```bash
#Executando as migrations
$ php artisan migrate
```


### Rodando a aplicação

```bash
$ php artisan serve
# running on http://localhost:8000
```
