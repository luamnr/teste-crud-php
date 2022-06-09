# teste-php setup

## Preparar o container
```
docker-compose build
```

## Executar o container
```
docker-compose up -d
```
## Importar o "Teste.sql" via workbench ou dump
```
workbench => server => import data
```
---
# Desenvolvimento
php version => 7.2

user: MARIA

senha: 123

# Implementação de MVC sem framework.

O "ponto de entrada" do serviço é o index.php na raiz da pasta "src", o webserver do servidor docker foi configurado para reescrever todas as rotas para ele. Fazendo com que eu possa dinamicamente renderizar o controller da forma que preferir.

# Model 
No escopo do projeto há apenas duas tabelas no banco, sendo autorizacoes e usuarios, ambos implementados como objetos para a manipulação necessária. E para gerenciar acesso ao banco uma simples classe de conexão singletown usando o PDO foi criada.

# View
As views são totalmente baseadas nos templates providos, e seus elementos são renderizados usando php puro, sem uso de "template engines".

# Controller
O usuariocontroller é uma classe bem simples que herda de um controller base onde apenas implementa uma função de renderização. O usuariocontroller que fica com o trabalho pesado de cuidar das logicas das rotas.
