




# ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== =====
#	IMPORTANTE QUE O INCREMENT COMECE DO ID 2, DEVIDO A UM ERRO
# ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== =====

#SESSION 1
INSERT INTO public.questions
("name", "session")
VALUES(
	'QUESTÃO TEMPORARIA', '1'
),(
	'De que forma seu time tomou conhecimento do Programa Corredores Digitais?', '1'
),(
	'Setor de atuação da startup', '1'
),(
	'Tendência tecnológica', '1'
);


DELETE FROM public.questions wHERE id= 1;


#SESSION 2
INSERT INTO public.questions
("name", "session")
VALUES
(
	'Tipo de solução', '2'
),(
	'Estágio de desenvolvimento do produto', '2'
),(
	'Há quanto tempo o produto vem sendo desenvolvido?', '2'
),(
	'Qual a diferenciação do seu produto?', '2'
),(
	'Qual a barreira de cópia que existe no produto desenvolvido?', '2'
);


#SESSION 3
INSERT INTO public.questions
("name", "session")
VALUES
(
'O que você conhece sobre seus concorrentes?', 3
),(
'Qual o tamanho do seu mercado (TAM)?', 3
),(
'O quanto você conhece dos seus potenciais clientes?', 3
),(
'Como é seu mercado de atuação?', 3
),(
'Como está sua aquisição e crescimento de clientes?', 3
),(
'Como a sua startup está sendo notada ou percebida?', 3
),(
'Como está o domínio do seu funil de vendas?', 3
);


#SESSION 4
INSERT INTO public.questions
("name", "session")
VALUES
(
'Qual o modelo inicial de receita?', 4
),(
'Qual o estágio de receita da empresa?', 4
),(
'Você tem recursos financeiros para sustentar a operação por quanto tempo mais?', 4
);


#SESSION 5
INSERT INTO public.questions
("name", "session")
VALUES
(
'Como está sua proposta de valor?', 5
),(
'Com relação ao seu modelo de receita, em qual estágio você está?', 5
),(
'Você está preparado para escalar?', 5
);


#SESSION 6
INSERT INTO public.questions
("name", "session")
VALUES
(
'Qual a experiência do time no mercado da startup?', 6
),(
'Como está a composição/dedicação do time?', 6
),(
'Faixa etária dos integrantes do time', 6
),(
'Nível de conhecimento formal do setor da startup', 6
),(
'Vocês possuem desenvolvedor (CTO - Chief Technology Officer)?', 6
),(
'Como está a divisão societária da startup?', 6
);








#1.5. 2	De que forma seu time tomou conhecimento do Programa Corredores Digitais?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Amigos', 1, 2
),(
'Familiares', 1, 2
),(
'Professores', 1, 2
),(
'Facebook', 1, 2
),(
'Instagram', 1, 2
),(
'WhatsApp', 1, 2
),(
'Buscador (ex.: Google)', 1, 2
),(
'Site da SECITECE', 1, 2
),(
'Mídia (rádio, jornal, TV)', 1, 2
),(
'Material gráfico institucional (panfletos, cartazes)', 1, 2
),(
'Eventos itinerantes do programa (visita institucional, palestra, workshop, hackaton)', 1, 2
);




#SEÇÃO 2. INFORMAÇÕES SOBRE PRODUTO

#O preenchimento da Seção 2 do formulário eletrônico será obrigatório. Deverão ser fornecidas as seguintes informações:

#2.1  3	Tendência tecnológica
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Inteligência artificial e machine learning', 1, 3
),(
'Internet das coisas (IoT) e dispositivos inteligentes', 1, 3
),(
'Big data e análise aumentada', 1, 3
),(
'Espaços inteligentes e locais inteligentes', 1, 3
),(
'Blockchains e registro distribuído', 1, 3
),(
'Computação em nuvem e computação de borda', 1, 3
),(
'Realidade estendida', 1, 3
),(
'Gêmeos digitais', 1, 3
),(
'Processamento de linguagem natural', 1, 3
),(
'Interfaces de voz e chatbots', 1, 3
),(
'Visão computacional e reconhecimento facial', 1, 3
),(
'Cibersegurança e ciber-resiliência', 1, 3
),(
'Automação robótica de processos', 1, 3
),(
'Personalização em massa e micro-momentos', 1, 3
),(
'Outro', 1, 3
);



#2.2  4	Setor de atuação da startup
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Água', 1, 4
),(
'Biotecnologia', 1, 4
),(
'Construção e minerais não-metálicos', 1, 4
),(
'Economia criativa e turismo', 1, 4
),(
'Economia do mar', 1, 4
),(
'Eletrometalmecânico', 1, 4
),(
'Energia', 1, 4
),(
'Indústria agroalimentar', 1, 4
),(
'Logística', 1, 4
),(
'Meio ambiente', 1, 4
),(
'Produtos de consumo (couro & calçados; confecções; madeira & móveis)', 1, 4
),(
'Saúde', 1, 4
),(
'Segurança', 1, 4
),(
'Tecnologia da informação & comunicação', 1, 4
),(
'Outro', 1, 4
);



#2.3  5	Tipo de solução
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Plataforma digital', 2, 5
),(
'Aplicativo móvel', 2, 5
),(
'Aplicação de desktop', 2, 5
),(
'Software como serviço', 2, 5
),(
'Dispositivos conectados', 2, 5
),(
'Ainda em definição', 2, 5
),(
'Outro', 2, 5
);



#2.4. 6	Estágio de desenvolvimento do produto
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não tenho um produto pronto nem MVP. ', 2, 6
),(
'Tenho um MVP sem usuários.', 2, 6
),(
'Tenho um MVP com usuários beta.', 2, 6
),(
'Tenho um MVP com clientes pagantes.', 2, 6
),(
'Tenho um produto pronto, com clientes pagantes.', 2, 6
),(
'Tenho um produto avançado pronto para escalar.', 2, 6
);



#2.5. 7	Há quanto tempo o produto vem sendo desenvolvido?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não iniciou desenvolvimento.', 2, 7
),(
'Até 3 meses.', 2, 7
),(
'Entre 3 e 6 meses.', 2, 7
),(
'Entre 6 e 12 meses.', 2, 7
),(
'Entre 12 e 24 meses.', 2, 7
),(
'Mais de 24 meses.', 2, 7
);




#2.6. 8	Qual a diferenciação do seu produto?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Nosso produto é igual ou inferior aos dos demais concorrentes.', 2, 8
),(
'Nosso produto possui diferenciais, mas não foi validado com clientes reais.', 2, 8
),(
'Nosso produto é igual aos dos demais concorrentes, mas já validei o uso com clientes reais.', 2, 8
),(
'Nosso produto possui todos os recursos fundamentais mapeados e validados com os clientes, além de outros que os diferencia.', 2, 8
),(
'Nosso produto possui todos os recursos fundamentais mapeados e validados com os clientes, além de outros que os diferencia, e é considerado referência no mercado.', 2, 8
);



 

#2.7. 9	Qual a barreira de cópia que existe no produto desenvolvido?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Nosso produto não possui nenhuma barreira contra cópia dos concorrentes.', 2, 9
),(
'Nosso produto possui especificações e regulações, mas ainda não atendemos todas.', 2, 9
),(
'Nosso produto possui especificações e regulações, e já atendemos todas.', 2, 9
),(
'Já estou enquadrado em todas as regulações; meu produto é patenteável, mas ainda não pedi o registro.', 2, 9
),(
'Já estou enquadrado em todas as regulações e já tenho patente do produto.', 2, 9
);



#SEÇÃO 3. INFORMAÇÕES SOBRE MERCADO

#O preenchimento da Seção 3 do formulário eletrônico será obrigatório. Deverão ser fornecidas as seguintes informações:

#3.1. 10	O que você conhece sobre seus concorrentes?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não pesquisei possíveis concorrentes.', 3, 10
),(
'Encontrei alguns, mas não me comparei e não sei meus diferenciais.', 3, 10
),(
'Encontrei alguns e me comparei, mas não sei meus diferenciais.', 3, 10
),(
'Encontrei alguns, me comparei e tenho diferenciais relevantes.', 3, 10
),(
'Fiz uma ampla pesquisa e não encontrei nenhum concorrente nesse mercado.', 3, 10
);



#3.2. 11	Qual o tamanho do seu mercado (TAM)?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não sei responder essa pergunta.', 3, 11
),(
'Não sei o número, mas não é grande.', 3, 11
),(
'Até R$500 milhões por ano.', 3, 11
),(
'De R$500 milhões até R$1 bilhão por ano.', 3, 11
),(
'Mais de R$1 bilhão por ano.', 3, 11
);



#3.3. 12	O quanto você conhece dos seus potenciais clientes?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não fiz nenhuma pesquisa com outros potenciais clientes.', 3, 12
),(
'Não fiz nenhuma pesquisa com outros potenciais clientes, mas me considero um cliente do meu produto.', 3, 12
),(
'Fiz uma pesquisa com poucos potenciais clientes (<10), para entender mais sobre o comportamento deles.', 3, 12
),(
'Fiz uma pesquisa com vários potenciais clientes, para entender mais sobre o comportamento deles.', 3, 12
),(
'Fiz uma pesquisa com vários dos meus potenciais clientes, levantando os comportamentos, principais pontos críticos e dores.', 3, 12
);



#3.4. 13	Como é seu mercado de atuação?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'É um mercado já consolidado, com uma startup/empresa que domina.', 3, 13
),(
'É um mercado já consolidado, com mais de uma startup/empresa que exploram esse mercado.', 3, 13
),(
'É um mercado em desenvolvimento, que vem se consolidando, com alguns players de referência.', 3, 13
),(
'É um mercado em desenvolvimento, que vem se consolidando, sem nenhum player de referência ainda.', 3, 13
),(
'É um mercado novo, que vem crescendo e somos pioneiros.', 3, 13
);



#3.5. 14	Como está sua aquisição e crescimento de clientes?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não temos clientes.', 3, 14
),(
'Temos poucos clientes, mas conquistamos novos de maneira não estruturada.', 3, 14
),(
'Temos clientes e estamos começando a estruturar nossos processos de vendas', 3, 14
),(
'Temos clientes, processos estruturados de vendas e estamos crescendo até 10% ao mês, nos últimos 3 meses.', 3, 14
),(
'Temos clientes, processos estruturados de vendas e estamos crescendo mais de 10% ao mês, nos últimos 3 meses.', 3, 14
);




#3.6. 15	Como a sua startup está sendo notada ou percebida?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não estamos expostos em nenhum lugar, nem em rede sociais.', 3, 15
),(
'Criamos nosso site e redes, mas ainda não geramos nenhum tipo de conteúdo.', 3, 15
),(
'Criamos nosso site e redes, geramos algum tipo de conteúdo e alguns clientes estão nos indicando.', 3, 15
),(
'Já temos relevância e indicações de alguns clientes, estamos ativos nas redes sociais, participamos de eventos e já ganhamos destaque em algumas mídias.', 3, 15
),(
'Já temos relevância e indicações de vários clientes, estamos bem ativos nas redes sociais, participamos de grandes eventos e já ganhamos destaque em grandes mídias.', 3, 15
);




#3.7. 16	Como está o domínio do seu funil de vendas?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não sei o que é um funil de vendas.', 3, 16
),(
'Sei o que é, mas ainda não tenho um funil de vendas.', 3, 16
),(
'Tenho um funil, mas ainda não domino todas as etapas.', 3, 16
),(
'Tenho um funil, tenho todas as etapas dominadas, mas ainda não performo da forma esperada.', 3, 16
),(
'Tenho um funil, tenho todas as etapas dominadas e performando de acordo com o esperado.', 3, 16
);



#SEÇÃO 4. INFORMAÇÕES SOBRE FINANÇAS

#O preenchimento da Seção 4 do formulário eletrônico será obrigatório. Deverão ser fornecidas as seguintes informações:

#4.1. 17	Qual o modelo inicial de receita?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'B2C (transação entre empresa e consumidor final)', 4, 17
),(
'B2B (transação entre empresas)', 4, 17
),(
'B2G (transação entre empresa e governo)', 4, 17
),(
'B2B2C (transação entre empresas visando consumidor final)', 4, 17
),(
'Em definição', 4, 17
),(
'Outro', 4, 17
);
 


#4.2. 18	Qual o estágio de receita da empresa?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não gera receita, mas não tem custos e despesas.', 4, 18
),(
'Não gera receita, mas tem custos e despesas.', 4, 18
),(
'Gera receita, mas ainda não cobre os custos e despesas.', 4, 18
),(
'Gera receita, mas o suficiente para pagar as contas.', 4, 18
),(
'Gera receita e gera lucro.', 4, 18
);
 


#4.3. 19	Você tem recursos financeiros para sustentar a operação por quanto tempo mais?mais?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não iniciei a operação.', 4, 19
),(
'Não tenho mais recursos financeiros.', 4, 19
),(
'Tenho, para mais 1 até 6 meses.', 4, 19
),(
'Tenho, para mais 6 até 12 meses.', 4, 19
),(
'Tenho, para mais 12 até 18 meses.', 4, 19
),(
'Tenho, para mais de 18 meses.', 4, 19
);



#SEÇÃO 5. INFORMAÇÕES SOBRE MODELO DE NEGÓCIO

#O preenchimento da Seção 5 do formulário eletrônico será obrigatório. Deverão ser fornecidas as seguintes informações:

#5.1. 20	Como está sua proposta de valor?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não tenho uma proposta de valor clara e definida.', 5, 20
),(
'Imagino ter uma proposta de valor, mas ainda não definida completamente e nem validei com clientes.', 5, 20
),(
'Tenho a proposta clara e definida, mas não validada com o segmento de clientes.', 5, 20
),(
'Tenho a proposta clara e definida, mas validei com poucos clientes (<10).', 5, 20
),(
'Tenho a proposta clara, definida e validada com o segmento de clientes.', 5, 20
);
 


#5.2. 21	Com relação ao seu modelo de receita, em qual estágio você está?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Ainda não sei como vender o que estou fazendo.', 5, 21
),(
'Ainda não sei como vender o que estou fazendo, mas já tive clientes interessados.', 5, 21
),(
'Já tenho o modelo de negócio, mas ainda não validei ou validei com poucos clientes potenciais.', 5, 21
),(
'Já tenho o modelo de negócios definido, validado e já tenho os primeiros clientes.', 5, 21
),(
'Já tenho o modelo de negócios definido, validado e vendendo.', 5, 21
);
 


#5.3. 22	Você está preparado para escalar?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não, ainda não tenho meu produto definido e nem a forma de vendê-lo.', 5, 22
),(
'Não, ainda trabalho no modelo concierge e não tenho modelo de negócios definido.', 5, 22
),(
'Talvez, tenho o produto e o modelo definido, mas não ainda não definimos em qual segmento vamos escalar.', 5, 22
),(
'Sim, acredito que já estamos maduros em modelo de negócios e produtos para isso, mas ainda não começamos a escalar.', 5, 22
),(
'Sim, já estamos maduros em modelo de negócios e produtos, e já estamos escalando dessa forma.', 5, 22
);



#SEÇÃO 6.  IDENTIFICAÇÃO DO TIME DO PROJETO

#O preenchimento da Seção 6 do formulário eletrônico será obrigatório. Deverão ser fornecidas as seguintes informações:

#6.1. 23	Qual a experiência do time no mercado da startup?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Ninguém atuou ou esteve próximo deste mercado anteriormente.', 6, 23
),(
'Ninguém atuou neste mercado, mas alguém já teve relacionamento próximo (como cliente, fornecedor, consultor, etc).', 6, 23
),(
'Temos um ou mais insiders do mercado, mas que não atuam no dia a dia da startup (conselheiros, mentores, etc).', 6, 23
),(
'O time possui um insider do mercado, com grande experiência e que atua no dia a dia da startup.', 6, 23
),(
'O time possui mais de um insider do mercado, com grande experiência e que atuam no dia a dia da startup.', 6, 23
);



#6.2. 24	Como está a composição/dedicação do time?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Todos os integrantes full-time.', 6, 24
),(
'Todos os integrantes part-time, ou seja, nenhum full-time.', 6, 24
),(
'Todos os integrantes full-time + funcionários.', 6, 24
),(
'Apenas um integrantes full-time + outros integrantes part-time.', 6, 24
),(
'Empreendedor Solitário (sem equipe ou sócios).', 6, 24
);
 


#6.3. 25	Faixa etária dos integrantes do time
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Menos de 20 anos.', 6, 25
),(
'Entre 21 e 29 anos.', 6, 25
),(
'Entre 30 e 34 anos. ', 6, 25
),(
'Entre 35 e 40 anos.', 6, 25
),(
'Mais de 40 anos.', 6, 25
);
 


#6.4. 26	Nível de conhecimento formal do setor da startup
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Nenhum dos integrantes possuem formação no setor da startup.', 6, 26
),(
'Pelo menos um integrante tem Ensino Superior Completo ou formação técnica no setor da startup.', 6, 26
),(
'Pelo menos um integrante com Ensino Superior Completo no setor da startup.', 6, 26
),(
'Pelo menos um dos integrantes com pós-graduação e pelo menos um founder com formação como especialista no setor da startup.', 6, 26
),(
'Pelo menos um dos integrantes com pós-graduação e pelo menos um founder com formação como especialista no setor da startup.', 6, 26
);
 


#6.5. 27	Vocês possuem desenvolvedor (CTO 'Chief Technology Officer)?', 6, 
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Não. Terceirizo todo desenvolvimento.', 6, 27
),(
'Possuo uma pessoa part-time, mas que não possui participação acionária na startup.', 6, 27
),(
'Possuo uma pessoa part-time e com participação acionária na startup.', 6, 27
),(
'Sim, possuo CTO, full-time, mas sem participação acionária na startup.', 6, 27
),(
'Sim, possuo CTO, full-time e com participação acionária na startup.', 6, 27
);
 


#6.6. 28	Como está a divisão societária da startup?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Sou o único sócio-fundador, mas tenho investidores que não atuam diretamente na startup e possuem mais de 31% de participação.', 6, 28
),(
'Sou o único sócio-fundador, mas tenho investidores que não atuam diretamente na startup e possuem menos de 31% de participação.', 6, 28
),(
'Sou o único sócio-fundador e 100% do investimento feito foi por mim. ', 6, 28
),(
'Somos em mais de um founder e temos investidores que possuem mais de 31% da empresa.', 6, 28
),(
'Somos em mais de um founder e detemos todas as ações da empresa.', 6, 28
),(
'Somos em mais de um founder e temos investidores que possuem menos de 31% da empresa.', 6, 28
);


#SESSION 1
INSERT INTO public.questions
("name", "session")
VALUES(
	'Quem foi o Articulador que apoiou a Startup?', '1'
);


#Quem foi o Articulador que apoiou a Startup?
INSERT INTO public."options"
("name", "session", question)
VALUES(
'Mariana Chaves Antenor',29, 1
),(
'Luís Teobaldo da Silva',29, 1
),(
'Carlos Márcio Campos Lima',29, 1
),(
'Rafael Fernandes Vieira',29, 1
),(
'Renato Furtado de Mesquita',29, 1
),(
'Maria Simone Mendes Nunes',29, 1
),(
'Frederico Romel Maia Tavares',29, 1
),(
'Francisca Jeanne Sidrim De Figueiredo Mendonça',29, 1
),(
'José Aureliano Arruda Ximenes De Lima',29, 1
),(
'Andrea Moura Da Costa Souza ',29, 1
),(
'Filipe Bessa Cordeiro',29, 1
),(
'Fco Leandro de Vasconcelos Lopes',29, 1
),(
'Matheus Fernandes do Nascimento Dantas',29, 1
),(
'Raquel de Oliveira Santos Lira',29, 1
),(
'Paulo Cicero Sousa',29, 1
),(
'Kelvia Aragão Fragoso',29, 1
),(
'Jarbas Nunes Vidal Filho',29, 1
);

