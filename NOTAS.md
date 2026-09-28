1. Em que ficheiro estão as rotas da aplicação web?
pws1-app/routes/web.php
2. Em que pasta estão as views? Como se chama a view da página de boas-vindas?
pws1-app/resources/views
3. Em que ficheiro está o nome da base de dados? Porque é que esse ficheiro não vai para o GitHub?
pws1-app/.env, e não vai para o git pq esse ficheiro está incluido no pws1-app/.gitignore

4. rota /ola/<h1>Arminda, sem o e() no return deixa de isolar a variavel e acaba por usar o h1 como tag html

5. é erro 500, e assume a linha depois de onde deveria de estar o ";" porque ele não fecha a rota anterior, e não sabe o que fazer com uma nova rota dentro do codigo de outra rota. essa mesma rota deixa de estar definida também. 

6. abrir eventos/99 dá erro 404 por causa do empty que deixamos quando fizemos o loop de iteração. o eventos/abc não chega a entrar na função porque na rota ele pede exclusivamente carcteres numéricos com o ->whereNumber('id'), como não recebe esses caracteres nem sequer se mexe.