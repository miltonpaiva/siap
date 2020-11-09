# SIAP

Sistema em laravel(7) para captação de startups

## Instalação:

Muitas duvidas podem ser tiradas na documentação do  [laravel](https://laravel.com/docs/7.x/).

- Na raiz do projeto execute os seguintes comandos a principio:


```bash
composer update
```

```bash
php artisan key:generate
```

- após isso confugure o arquivo ".env" com as configurações do banco de dados e então rode as migrates:

```bash
php artisan migrate
```

- Logo após isso abra algum SGBD de sua preferencia e execute os scripts de alimentação inicial:

1- /database/inserts_iniciais/formations.sql

2- /database/inserts_iniciais/questions.sql

3- /database/inserts_iniciais/options.sql

4- /database/inserts_iniciais/criterea.sql


## Alimetação do banco de teste

- Ainda com algum SGBD, execute os scripts de alimentação do banco de testes, na seguinte ordem:

1- /database/iserts_bd_teste/startups.sql

2- /database/iserts_bd_teste/users.sql

3- /database/iserts_bd_teste/participants.sql

4- /database/iserts_bd_teste/attachments.sql

5- /database/iserts_bd_teste/responses.sql

