# Challenge Alura Back-end 5 edição

> :construction: Projeto em construção :construction:

## Versão em Symfony
> [Versão em Symfony](https://github.com/DaniPoletto/challenge-alura-back-end-5-symfony)

## O que é um challenge
São 4 semanas de desafios propostos pela plataforma de ensino Alura com o objetivo de praticar construindo um projeto. Toda semana são disponibilizados desafios e o aluno deve usar o material de apoio fornecido a cada semana para resolver o desafio proposto. 

### Projeto
Essa edição tem como objetivo construir uma api de plataforma de streaming. 

### Desafios de cada semana
- [X] <b>1ª semana</b> - CRUD de videos e testes de api utilizando Postman

- [ ] <b>2ª semana</b> - Nesta segunda semana do desafio o objetivo é criar mais de um modelo/entidade, rotas CRUD e relacionais, buscas na base via parâmetros de query, fazer testes de unidade e integração.

- [ ] <b>3ª e 4ª semana</b> - Na última fase do desafio o objetivo será a implementação de mais funcionalidades: paginação, autenticação; deploy da aplicação.-

## Tecnologias utilizadas
[Laravel 8](https://laravel.com/) com PHP 7.3.5. 

## Como inicializar o projeto
1 - Baixar os arquivos do repositório utilizando git clone

2 - Instalar as dependências do projeto
``` componser install```

3 - Editar o arquivo .env com as credencias do banco de dados

4 - Rodar as migrations
```
php artisan migrate
```

5 - Subir o servidor
``` 
php artisan serve
```

## URL Base
 > http://127.0.0.1:8000/api/

## Rotas

### Videos
#### Retornar videos
| Verbo | Recurso |
|---| ---|
|GET | /videos |

![Video](https://github.com/DaniPoletto/challenge-alura-back-end-5-laravel/blob/main/get_videos.jpg)

#### Retornar um video
| Verbo | Recurso |
|---| ---|
|GET | /videos/{id} |

![Video](https://github.com/DaniPoletto/challenge-alura-back-end-5-laravel/blob/main/get_video.jpg)

#### Cadastrar um video
| Verbo | Recurso |
|---| ---|
|POST | /videos |

![Video](https://github.com/DaniPoletto/challenge-alura-back-end-5-laravel/blob/main/post_video.jpg)

#### Atualizar um video
| Verbo | Recurso |
|---| ---|
|PUT | /videos/{id} |

![Video](https://github.com/DaniPoletto/challenge-alura-back-end-5-laravel/blob/main/update_video.jpg)

#### Deletar um video
| Verbo | Recurso |
|---| ---|
|DELETE | /videos/{id} |

![Video](https://github.com/DaniPoletto/challenge-alura-back-end-5-laravel/blob/main/delete_video.jpg)
