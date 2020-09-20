INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(1, 'Amigos',2,1)
,(2, 'Familiares',2,1)
,(3, 'Professores',2,1)
,(4, 'Facebook',2,1)
,(5, 'Instagram',2,1)
,(6, 'WhatsApp',2,1)
,(7, 'Buscador (ex.: Google)',2,1)
,(8, 'Site da SECITECE',2,1)
,(9, 'Mídia (rádio, jornal, TV)',2,1)
,(10, 'Material gráfico institucional (panfletos, cartazes)',2,1)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(11, 'Eventos itinerantes do programa (visita institucional, palestra, workshop, hackaton)',2,1)
,(12, 'Inteligência artificial e machine learning',3,1)
,(13, 'Internet das coisas (IoT) e dispositivos inteligentes',3,1)
,(14, 'Big data e análise aumentada',3,1)
,(15, 'Blockchains e registro distribuído',3,1)
,(16, 'Realidade estendida',3,1)
,(17, 'Gêmeos digitais',3,1)
,(18, 'Processamento de linguagem natural',3,1)
,(19, 'Interfaces de voz e chatbots',3,1)
,(20, 'Visão computacional e reconhecimento facial',3,1)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(21, 'Cibersegurança e ciber-resiliência',3,1)
,(22, 'Automação robótica de processos',3,1)
,(23, 'Personalização em massa e micro-momentos',3,1)
,(24, 'Espaços inteligentes e locais inteligentes',3,1)
,(25, 'Computação em nuvem e computação de borda',3,1)
,(26, 'Outro',3,1)
,(27, 'Água',4,1)
,(28, 'Biotecnologia',4,1)
,(29, 'Construção e minerais não-metálicos',4,1)
,(30, 'Economia criativa e turismo',4,1)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(31, 'Economia do mar',4,1)
,(32, 'Eletrometalmecânico',4,1)
,(33, 'Energia',4,1)
,(34, 'Indústria agroalimentar',4,1)
,(35, 'Logística',4,1)
,(36, 'Meio ambiente',4,1)
,(37, 'Produtos de consumo (couro & calçados; confecções; madeira & móveis)',4,1)
,(38, 'Saúde',4,1)
,(39, 'Segurança',4,1)
,(40, 'Tecnologia da informação & comunicação',4,1)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(41, 'Outro',4,1)
,(42, 'Plataforma digital',5,2)
,(43, 'Aplicativo móvel',5,2)
,(44, 'Aplicação de desktop',5,2)
,(45, 'Software como serviço',5,2)
,(46, 'Dispositivos conectados',5,2)
,(47, 'Ainda em definição',5,2)
,(48, 'Outro',5,2)
,(49, 'Não tenho um produto pronto nem MVP. ',6,2)
,(50, 'Tenho um MVP sem usuários.',6,2)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(51, 'Tenho um MVP com usuários beta.',6,2)
,(52, 'Tenho um MVP com clientes pagantes.',6,2)
,(53, 'Tenho um produto pronto, com clientes pagantes.',6,2)
,(54, 'Tenho um produto avançado pronto para escalar.',6,2)
,(55, 'Não iniciou desenvolvimento.',7,2)
,(56, 'Até 3 meses.',7,2)
,(57, 'Entre 3 e 6 meses.',7,2)
,(58, 'Entre 6 e 12 meses.',7,2)
,(59, 'Entre 12 e 24 meses.',7,2)
,(60, 'Mais de 24 meses.',7,2)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(61, 'Nosso produto é igual ou inferior aos dos demais concorrentes.',8,2)
,(62, 'Nosso produto possui diferenciais, mas não foi validado com clientes reais.',8,2)
,(63, 'Nosso produto é igual aos dos demais concorrentes, mas já validei o uso com clientes reais.',8,2)
,(64, 'Nosso produto possui todos os recursos fundamentais mapeados e validados com os clientes, além de outros que os diferencia.',8,2)
,(65, 'Nosso produto possui todos os recursos fundamentais mapeados e validados com os clientes, além de outros que os diferencia, e é considerado referência no mercado.',8,2)
,(66, 'Nosso produto não possui nenhuma barreira contra cópia dos concorrentes.',9,2)
,(67, 'Nosso produto possui especificações e regulações, mas ainda não atendemos todas.',9,2)
,(68, 'Nosso produto possui especificações e regulações, e já atendemos todas.',9,2)
,(69, 'Já estou enquadrado em todas as regulações; meu produto é patenteável, mas ainda não pedi o registro.',9,2)
,(70, 'Já estou enquadrado em todas as regulações e já tenho patente do produto.',9,2)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(71, 'Não pesquisei possíveis concorrentes.',10,3)
,(72, 'Encontrei alguns, mas não me comparei e não sei meus diferenciais.',10,3)
,(73, 'Encontrei alguns e me comparei, mas não sei meus diferenciais.',10,3)
,(74, 'Encontrei alguns, me comparei e tenho diferenciais relevantes.',10,3)
,(75, 'Fiz uma ampla pesquisa e não encontrei nenhum concorrente nesse mercado.',10,3)
,(76, 'Não sei responder essa pergunta.',11,3)
,(77, 'Não sei o número, mas não é grande.',11,3)
,(78, 'Até R$500 milhões por ano.',11,3)
,(79, 'De R$500 milhões até R$1 bilhão por ano.',11,3)
,(80, 'Mais de R$1 bilhão por ano.',11,3)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(81, 'Não fiz nenhuma pesquisa com outros potenciais clientes.',12,3)
,(82, 'Não fiz nenhuma pesquisa com outros potenciais clientes, mas me considero um cliente do meu produto.',12,3)
,(83, 'Fiz uma pesquisa com poucos potenciais clientes (<10), para entender mais sobre o comportamento deles.',12,3)
,(84, 'Fiz uma pesquisa com vários potenciais clientes, para entender mais sobre o comportamento deles.',12,3)
,(85, 'Fiz uma pesquisa com vários dos meus potenciais clientes, levantando os comportamentos, principais pontos críticos e dores.',12,3)
,(86, 'É um mercado já consolidado, com uma startup/empresa que domina.',13,3)
,(87, 'É um mercado já consolidado, com mais de uma startup/empresa que exploram esse mercado.',13,3)
,(88, 'É um mercado em desenvolvimento, que vem se consolidando, com alguns players de referência.',13,3)
,(89, 'É um mercado em desenvolvimento, que vem se consolidando, sem nenhum player de referência ainda.',13,3)
,(90, 'É um mercado novo, que vem crescendo e somos pioneiros.',13,3)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(91, 'Não temos clientes.',14,3)
,(92, 'Temos poucos clientes, mas conquistamos novos de maneira não estruturada.',14,3)
,(93, 'Temos clientes e estamos começando a estruturar nossos processos de vendas',14,3)
,(94, 'Temos clientes, processos estruturados de vendas e estamos crescendo até 10% ao mês, nos últimos 3 meses.',14,3)
,(95, 'Temos clientes, processos estruturados de vendas e estamos crescendo mais de 10% ao mês, nos últimos 3 meses.',14,3)
,(96, 'Não estamos expostos em nenhum lugar, nem em rede sociais.',15,3)
,(97, 'Criamos nosso site e redes, mas ainda não geramos nenhum tipo de conteúdo.',15,3)
,(98, 'Criamos nosso site e redes, geramos algum tipo de conteúdo e alguns clientes estão nos indicando.',15,3)
,(99, 'Já temos relevância e indicações de alguns clientes, estamos ativos nas redes sociais, participamos de eventos e já ganhamos destaque em algumas mídias.',15,3)
,(100, 'Já temos relevância e indicações de vários clientes, estamos bem ativos nas redes sociais, participamos de grandes eventos e já ganhamos destaque em grandes mídias.',15,3)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(101, 'Não sei o que é um funil de vendas.',16,3)
,(102, 'Sei o que é, mas ainda não tenho um funil de vendas.',16,3)
,(103, 'Tenho um funil, mas ainda não domino todas as etapas.',16,3)
,(104, 'Tenho um funil, tenho todas as etapas dominadas, mas ainda não performo da forma esperada.',16,3)
,(105, 'Tenho um funil, tenho todas as etapas dominadas e performando de acordo com o esperado.',16,3)
,(106, 'B2C (transação entre empresa e consumidor final)',17,4)
,(107, 'B2B (transação entre empresas)',17,4)
,(108, 'B2G (transação entre empresa e governo)',17,4)
,(109, 'B2B2C (transação entre empresas visando consumidor final)',17,4)
,(110, 'Em definição',17,4)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(111, 'Outro',17,4)
,(112, 'Não gera receita, mas não tem custos e despesas.',18,4)
,(113, 'Não gera receita, mas tem custos e despesas.',18,4)
,(114, 'Gera receita, mas ainda não cobre os custos e despesas.',18,4)
,(115, 'Gera receita, mas o suficiente para pagar as contas.',18,4)
,(116, 'Gera receita e gera lucro.',18,4)
,(117, 'Não iniciei a operação.',19,4)
,(118, 'Não tenho mais recursos financeiros.',19,4)
,(119, 'Tenho, para mais 1 até 6 meses.',19,4)
,(120, 'Tenho, para mais 6 até 12 meses.',19,4)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(121, 'Tenho, para mais 12 até 18 meses.',19,4)
,(122, 'Tenho, para mais de 18 meses.',19,4)
,(123, 'Não tenho uma proposta de valor clara e definida.',20,5)
,(124, 'Imagino ter uma proposta de valor, mas ainda não definida completamente e nem validei com clientes.',20,5)
,(125, 'Tenho a proposta clara e definida, mas não validada com o segmento de clientes.',20,5)
,(126, 'Tenho a proposta clara e definida, mas validei com poucos clientes (<10).',20,5)
,(127, 'Tenho a proposta clara, definida e validada com o segmento de clientes.',20,5)
,(128, 'Ainda não sei como vender o que estou fazendo.',21,5)
,(129, 'Ainda não sei como vender o que estou fazendo, mas já tive clientes interessados.',21,5)
,(130, 'Já tenho o modelo de negócio, mas ainda não validei ou validei com poucos clientes potenciais.',21,5)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(131, 'Já tenho o modelo de negócios definido, validado e já tenho os primeiros clientes.',21,5)
,(132, 'Já tenho o modelo de negócios definido, validado e vendendo.',21,5)
,(133, 'Não, ainda não tenho meu produto definido e nem a forma de vendê-lo.',22,5)
,(134, 'Não, ainda trabalho no modelo concierge e não tenho modelo de negócios definido.',22,5)
,(135, 'Talvez, tenho o produto e o modelo definido, mas não ainda não definimos em qual segmento vamos escalar.',22,5)
,(136, 'Sim, acredito que já estamos maduros em modelo de negócios e produtos para isso, mas ainda não começamos a escalar.',22,5)
,(137, 'Sim, já estamos maduros em modelo de negócios e produtos, e já estamos escalando dessa forma.',22,5)
,(138, 'Ninguém atuou ou esteve próximo deste mercado anteriormente.',23,6)
,(139, 'Ninguém atuou neste mercado, mas alguém já teve relacionamento próximo (como cliente, fornecedor, consultor, etc).',23,6)
,(140, 'Temos um ou mais insiders do mercado, mas que não atuam no dia a dia da startup (conselheiros, mentores, etc).',23,6)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(141, 'O time possui um insider do mercado, com grande experiência e que atua no dia a dia da startup.',23,6)
,(142, 'O time possui mais de um insider do mercado, com grande experiência e que atuam no dia a dia da startup.',23,6)
,(143, 'Todos os integrantes full-time.',24,6)
,(144, 'Todos os integrantes part-time, ou seja, nenhum full-time.',24,6)
,(145, 'Todos os integrantes full-time + funcionários.',24,6)
,(146, 'Apenas um integrantes full-time + outros integrantes part-time.',24,6)
,(147, 'Empreendedor Solitário (sem equipe ou sócios).',24,6)
,(148, 'Menos de 20 anos.',25,6)
,(149, 'Entre 21 e 29 anos.',25,6)
,(150, 'Entre 30 e 34 anos. ',25,6)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(151, 'Entre 35 e 40 anos.',25,6)
,(152, 'Mais de 40 anos.',25,6)
,(153, 'Nenhum dos integrantes possuem formação no setor da startup.',26,6)
,(154, 'Pelo menos um integrante tem Ensino Superior Completo ou formação técnica no setor da startup.',26,6)
,(155, 'Pelo menos um integrante com Ensino Superior Completo no setor da startup.',26,6)
,(156, 'Pelo menos um dos integrantes com pós-graduação e pelo menos um founder com formação como especialista no setor da startup.',26,6)
,(157, 'Pelo menos um dos integrantes com pós-graduação e pelo menos um founder com formação como especialista no setor da startup.',26,6)
,(158, 'Não. Terceirizo todo desenvolvimento.',27,6)
,(159, 'Possuo uma pessoa part-time, mas que não possui participação acionária na startup.',27,6)
,(160, 'Possuo uma pessoa part-time e com participação acionária na startup.',27,6)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(161, 'Sim, possuo CTO, full-time, mas sem participação acionária na startup.',27,6)
,(162, 'Sim, possuo CTO, full-time e com participação acionária na startup.',27,6)
,(163, 'Sou o único sócio-fundador, mas tenho investidores que não atuam diretamente na startup e possuem mais de 31% de participação.',28,6)
,(164, 'Sou o único sócio-fundador, mas tenho investidores que não atuam diretamente na startup e possuem menos de 31% de participação.',28,6)
,(165, 'Sou o único sócio-fundador e 100% do investimento feito foi por mim. ',28,6)
,(166, 'Somos em mais de um founder e temos investidores que possuem mais de 31% da empresa.',28,6)
,(167, 'Somos em mais de um founder e detemos todas as ações da empresa.',28,6)
,(168, 'Somos em mais de um founder e temos investidores que possuem menos de 31% da empresa.',28,6)
,(173, 'teste',29,1)
,(174, 'teste 2',29,1)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(175, 'teste 2',29,1)
,(176, 'Francisco teste',29,1)
,(181, 'Mariana Chaves Antenor',29,1)
,(182, 'Luís Teobaldo da Silva',29,1)
,(183, 'Carlos Márcio Campos Lima',29,1)
,(184, 'Rafael Fernandes Vieira',29,1)
,(185, 'Renato Furtado de Mesquita',29,1)
,(186, 'Maria Simone Mendes Nunes',29,1)
,(187, 'Frederico Romel Maia Tavares',29,1)
,(188, 'Francisca Jeanne Sidrim De Figueiredo Mendonça',29,1)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(189, 'José Aureliano Arruda Ximenes De Lima',29,1)
,(190, 'Andrea Moura Da Costa Souza ',29,1)
,(191, 'Filipe Bessa Cordeiro',29,1)
,(192, 'Fco Leandro de Vasconcelos Lopes',29,1)
,(193, 'Matheus Fernandes do Nascimento Dantas',29,1)
,(194, 'Raquel de Oliveira Santos Lira',29,1)
,(195, 'Paulo Cicero Sousa',29,1)
,(196, 'Kelvia Aragão Fragoso',29,1)
,(197, 'Jarbas Nunes Vidal Filho',29,1)
,(198, 'Arnaldo Barreto',29,1)
;
INSERT INTO public."options"
(id, "name", question, "session")
VALUES

(199, 'Arnaldo Barreto',29,1)
,(200, 'Teste',29,1)
,(201, 'Teste',29,1)
,(202, 'SOMOS UM',29,1)
,(203, 'Cemp',29,1)
,(204, 'Cemp',29,1)
;