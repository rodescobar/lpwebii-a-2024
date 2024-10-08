
# Linguagem de Programação Web II

Continuidade do conteúdo Linguagem de Programação Web I (PHP), nesta disciplina iremos trabalhar com o PHP utilizando o framework [Laravel](https://laravel.com/)

A disciplina será dividida em módulos, iremos trabalhar com pequenos blocos em Laravel e ao final da disciplina você será capaz de trabalhar com Laravel visando o mercado de trabalho.

## Nota final
- A nota final será de no máximo 10 pontos
- Estes pontos serão divididos em:

### 1. Avaliação ao final do Semestre
- Nota máxima 5,00 pontos
- Data da avaliação a ser definida
- Quem define a data da avaliação é a ITE e será postada no calendário da ITE
- Avaliação escrita
  - Poderá ser utilizado os computadores da ITE para a avaliação.
  - Não haverá acesso a internet
  - Não será possível o uso de cosulta
  - É extremamente proibido o uso de celulares ou componentes eletrônicos pessoais
  - A prova deverá ser transcrita a tinta para folha de prova


### 2. Avaliação durante o Semestre
- Nota máxima 5,00 pontos
- A avaliação será feita na forma de trabalho
- INDIVIDUAL
- A nota será dividida em
  - 2,5 referente as entregas (datas estão na imagem a seguir)
    - 0,5 ponto por entrega e correção no mesmo dia
  - 2,5 referente a apresentação (datas estão na imagem a seguir)
    - É obrigatória a presença de todos os alunos durante a apresentação, inclusive os que já tenham apresentado o trabalho
  - Caso o aluno falte no dia da apresentação, os pontos referentes a data serão perdidos
    - Salvo o aluno apresente um atestado conforme previsto no Regimento Educacional fornecido pela ITE.


## Datas das aulas
- Haverá aula todos os dias letivos existentes no calendário, salvo exista alguma orientação contrária informada pela ITE ou pelo coordenador.

## Contato com o Professor
- Todo o contato com o professor deverá ser feito através de e-mail [rodrigo.noescobar@gmail.com](mailto:rodrigo.noescobar@gmail.com)
- Não responderei mais perguntas via WhatsApp

## Lista de presença
- Serão feitas duas chamadas, sendo:
    - Primeira entre 19h10 e 20h20, referente a primeira e segunda aula
    - Segunda entre 21h e 22h, referente a terceira e quarta aula
- Dúvidas sobre presença, verificar Regimento Educacional
- Atestados NÃO são dados ao professor e sim a secretaria da ITE

## Avaliação Substitutiva
- Todo o conteúdo será cobrado

## Exame
- TODO o conteúdo será cobrado

## Dúvidas?
- Leia novamente este documento





# Documentação do Trabalho

#### Entregas e Correção
- Todas as entregas deverão ser feitas através de um repositório GIT criado pelo aluno
- A correção será feita em horário de aula entre aluno e professor

#### Entrega Final
- A entrega final deverá ser feita no **dia 01/11/2024**
- **HORÁRIO MÁXIMO** de entrega **19h20**
- Deverá ser enviado e-mail com o **assunto** *Avaliação LPWEBII - Tuma B - Projeto Cafeteria (nome do seu projeto)*
- Entrega fora do horário ou a não entrega, resultará na nota final sendo a soma das entregas feitas até o dia 01/11/2024 às 18h59.

## Calendário
![Calendário](calendario/tabela.png)

## Outros materiais
[Drive](https://drive.google.com/drive/folders/1UGSLJfwW-U2OIks-HUKDeGNACRsldsyA?usp=sharing)

## Aula 03 - 27/08/2024
- (Rotas no Laravel)[https://laravel.com/docs/11.x/structure#the-routes-directory]
- (Layout no Laravel)[https://laravel.com/docs/11.x/blade#extending-a-layout]

## Aula 04 - 03/09/2024
- [Authorization](https://laravel.com/docs/11.x/starter-kits)
- [Migration](https://laravel.com/docs/11.x/migrations#main-content)
- [Seed](https://laravel.com/docs/11.x/seeding#running-seeders)
- [Model](https://laravel.com/docs/11.x/eloquent#table-names)
- [Controller](https://laravel.com/docs/11.x/controllers#main-content)

## Aula 05 - 10/09/2024 - Exercício
- Utilizando o conteúdo ministrado na Aula 03, crie um novo projeto em Laravel para simular uma área administrativa.
  - Você deverá criar 5 rotas simulando o acesso à 5 áreas de seu Admin
  - Não é necessário criar Controller, ou seja, a rota pode chamar diretamente a View
  - Você deverá criar os 5 links do menu ao lado esquerdo
  - Você deverá utilizar o conceito de template
  - Você deverá utilizar o template deste [link](https://coreui.io/product/free-bootstrap-admin-template/)

## Aula 07 - 24/09/2024
- Finalização de CRUD categoria

## Aula 09 - 01/10/2024
- Utilizando o seu projeto crie o primeiro CRUD para uma tabela.
- Lembrando:
  - Criação de migration (caso você ainda não possua o bando de dados) 
  
  ``php artisan create:migration create_<NOME_TABELA>_table`` 

  - Criação de model

  ``php artisan create:model <NOME_DA_TABELA>``

  - Criação do controller

  ``php artisan create:controller <NOME_DA_TABELA>Controller``

  - Criação das views

  ``php artisan create:view <NOME_DA_VIEW>``

## Aula 10 - 08/10/2024
- Criação do CRUD de produtos, com relacionamento entre tabelas
[MATERIAL](passo_a_passo_crud_produtos/readme.md)