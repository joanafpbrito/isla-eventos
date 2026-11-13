1. Em que ficheiro estão as rotas da aplicação web?
pws1-app/routes/web.php
2. Em que pasta estão as views? Como se chama a view da página de boas-vindas?
pws1-app/resources/views
3. Em que ficheiro está o nome da base de dados? Porque é que esse ficheiro não vai para o GitHub?
pws1-app/.env, e não vai para o git pq esse ficheiro está incluido no pws1-app/.gitignore

4. rota /ola/<h1>Arminda, sem o e() no return deixa de isolar a variavel e acaba por usar o h1 como tag html

5. é erro 500, e assume a linha depois de onde deveria de estar o ";" porque ele não fecha a rota anterior, e não sabe o que fazer com uma nova rota dentro do codigo de outra rota. essa mesma rota deixa de estar definida também. 

6. abrir eventos/99 dá erro 404 por causa do empty que deixamos quando fizemos o loop de iteração. o eventos/abc não chega a entrar na função porque na rota ele pede exclusivamente carcteres numéricos com o ->whereNumber('id'), como não recebe esses caracteres nem sequer se mexe.

7. Aqui percebi que não fiz exatamente o que pedia no enunciado. Porque assumi que como era na mesma listagem era na mesma rota. Acabei por criar um “tipo” que é o próximos em vez de um url novo. 
Mas suponho que o Laravel funcione estilo Cascade, logo se tivéssemos criado uma rota depois de eventos/{id}em que o a seguir a “/” são palavras ia dar erro porque ele ia procurar um id = proximos. Estando a rota protegida por apenas aceitar números já avançava para a próxima rota? Acredito que seja isso

8. A rota eventos/tipo/{tipo} nunca irá entrar em conflito com eventos/{id}, porque eventos/{id} está a espera de receber numeros, então eventos/tipo são letras ele nao vai nunca tentar entrar naquela rota

9. PL04 - Parte E - usando o script alert no titulo do evento, despoleta um pop-up de alerta. Mas como no componente o titulo nao está preparado para receber codigo, mostra tudo na integra como string no website. Colocando o {!! !!} deixa o componente preparado para interpretar codigo, assim o pop up aparece e a parte da string que é codigo não fica a mostra

10. PL04 - Desafio - Então, usamos o @stack e o @yield no ficheiro de layout principal para normalizar o sitio das coisas e dar-lhes nomes. Depois reutilizamos esse design através do @push e do @section. 
Os primeiros permitem dizer “neste sitio podes receber vários tipos de coisas, mas apenas 1 coisa” e os segundos permitem-nos dizer, o que vai caber em cada 1 desses sítios. Então, se para cada página quiser uma cor de fundo diferente, no layout abro caminho para isso com o @satck e depois em cada página uso o @push para indicar qual a cor efetivamente. Assim como o @yield, “aqui vais receber alguma coisa” e com o @section indico qual o tipo de coisa. Nos primeiros identificamos o nome, e nos segundos chamamos por esse nome. 

11. PL05 - Parte A - SQLSTATE[42S02]: Base table or view not found: 1146 Table 'isla_eventos.sessions' doesn't exist (Connection: mysql, Host: 127.0.0.1, Port: 3307, Database: isla_eventos, SQL: select * from `sessions` where `id` = IBOdyz0Ye3vsjzLLvSTTn7Vr4epVmd9dXE9MkDcX limit 1)
Ao ver o erro acredito que tenha algo a ver a configuração inicial do laravel. 

12. PL05 - Parte B - titulo : varchar(150); data : date; vagas : smallint(5); Unsigned em BD significa que o valor não pode ser negativo. Apenas maior ou igual a 0

13. O batch da minha migração é o 2.

14. Com o rollback, reverte a ultima migração. Neste caso a tabela eventos desapareceu no phpmy admin. No entanto o ficheiro continua lá. E se correr status outra vez mostra que a migração está pendente.

