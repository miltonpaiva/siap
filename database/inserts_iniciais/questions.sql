




-- ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== =====
--	IMPORTANTE QUE O INCREMENT COMECE DO ID 2, DEVIDO A UM ERRO
-- ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== =====

--SESSION 1
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


--SESSION 2
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


--SESSION 3
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


--SESSION 4
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


--SESSION 5
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


--SESSION 6
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



--SESSION 1
INSERT INTO public.questions
("name", "session")
VALUES(
	'Quem foi o Articulador que apoiou a Startup?', '1'
);


DELETE FROM public.questions wHERE id= 1;
