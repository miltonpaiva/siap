<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAP - Inscrição do Projetos</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="body-bg">

    <section style="overflow: hidden">
        <div class="container">
            <div class="mt-4 mb-3">
                <div class="card w-90 p-1 mx-auto">
                    <div class="row">
                        
                        <div class="col-sm-12 col-md-12">
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4"></div>
                                    <div class="col-sm-12 col-md-4">
                                        <ul class="progresso">
                                            <li class="ativo completo" rel="tooltip" title="Identificação do Projeto"></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>                    
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-4"></div>
                                </div>
                            </div>

                            <div class="card-body">
                                <form id="formulario" class="mx-auto">

                                    <fieldset>
                                        <h3 class="card-title mt-3">Identificação do Projeto</h3>
                                        <div class="form-group">
                                                <label for="estado">Estado sede da startup</label>
                                                <select class="form-control" id="estado"></select>
                                            <small id="estadoHelp" class="form-text text-muted">Campo obrigatório!</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="cidade">Município sede da startup</label>
                                                <select class="form-control" id="cidade"></select>
                                                <small id="cidadeHelp" class="form-text text-muted">Campo obrigatório!</small>
                                         </div>
                                         <div class="form-group">
                                            <label for="categoria-projeto">Categoria de projeto</label>
                                                <select class="form-control" id="categoria-projeto">
                                                <option value="" disabled selected>Escolher uma das respostas abaixo</option>
                                                <option value="Criação">Criação de Negócio</option>
                                                <option value="Tração">Tração de Negócio</option>
                                                </select>
                                                <small id="categoriaHelp" class="form-text text-muted">Campo obrigatório!</small>
                                         </div>
                                         <div class="form-group">
                                            <label for="tomou-conhecimento">De que forma seu time tomou conhecimento do Programa Corredores Digitais?</label>
                                                <select class="form-control" id="tomou-conhecimento">
                                                <option value="" disabled selected>Escolher uma das respostas abaixo</option>
                                                <option value="Amigos">Amigos</option>
                                                <option value="Familiares">Familiares</option>
                                                <option value="Professores">Professores</option>
                                                <option value="Facebook">Facebook</option>
                                                <option value="Instagram">Instagram</option>
                                                <option value="WhatsApp">WhatsApp</option>
                                                <option value="Buscador (ex.: Google)">Buscador (ex.: Google)</option>
                                                <option value="Site da SECITECE">Site da SECITECE</option>
                                                <option value="Mídia (rádio, jornal, TV)">Mídia (rádio, jornal, TV)</option>
                                                <option value="Material gráfico institucional (panfletos, cartazes)">Material gráfico institucional (panfletos, cartazes)</option>
                                                <option value="Eventos itinerantes do programa (visita institucional, palestra, workshop, hackaton)">Eventos itinerantes do programa (visita institucional, palestra, workshop, hackaton)</option>
                                                </select>
                                                <small id="tconhecimentoHelp" class="form-text text-muted">Campo obrigatório!</small>
                                         </div>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Forme 2 - Informações sobre o produto -->

                                    <fieldset >
                                        <h3 class="card-title mt-3">Informações sobre o produto</h3>
                                        
                                        <div class="form-group">
                                            <label for="tendenciat">Tendência tecnológica</label>
                                                
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios1" id="tendenciaRadios1" value="Inteligência artificial e machine learning." checked>
                                                    <label class="form-check-label" for="tendenciaRadios1">
                                                            Inteligência artificial e machine learning.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios2" id="tendenciaRadios2" value="Internet das coisas (IoT) e dispositivos inteligentes.">
                                                    <label class="form-check-label" for="tendenciaRadios2">
                                                            Internet das coisas (IoT) e dispositivos inteligentes.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios3" id="tendenciaRadios3" value="Big data e análise aumentada.">
                                                    <label class="form-check-label" for="tendenciaRadios3">
                                                            Big data e análise aumentada.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios4" id="tendenciaRadios4" value="Espaços inteligentes e locais inteligentes.">
                                                    <label class="form-check-label" for="tendenciaRadios4">
                                                         Espaços inteligentes e locais inteligentes.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios5" id="tendenciaRadios5" value="Blockchains e registro distribuído.">
                                                    <label class="form-check-label" for="tendenciaRadios5">
                                                           Blockchains e registro distribuído.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios6" id="tendenciaRadios6" value="Computação em nuvem e computação de borda.">
                                                    <label class="form-check-label" for="tendenciaRadios6">
                                                            Computação em nuvem e computação de borda.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios7" id="tendenciaRadios7" value="Realidade estendida.">
                                                    <label class="form-check-label" for="tendenciaRadios7">
                                                            Realidade estendida.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios8" id="tendenciaRadios8" value="Gêmeos digitais.">
                                                    <label class="form-check-label" for="tendenciaRadios8">
                                                            Gêmeos digitais.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios9" id="tendenciaRadios9" value="Processamento de linguagem natural.">
                                                    <label class="form-check-label" for="tendenciaRadios9">
                                                            Processamento de linguagem natural.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios10" id="tendenciaRadios10" value="Interfaces de voz e chatbots.">
                                                    <label class="form-check-label" for="tendenciaRadios10">
                                                        Interfaces de voz e chatbots.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios11" id="tendenciaRadios11" value="Visão computacional e reconhecimento facial.">
                                                    <label class="form-check-label" for="tendenciaRadios11">
                                                        Visão computacional e reconhecimento facial.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios12" id="tendenciaRadios12" value="Cibersegurança e ciber-resiliência.">
                                                    <label class="form-check-label" for="tendenciaRadios12">
                                                        Cibersegurança e ciber-resiliência.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios13" id="tendenciaRadios13" value="Automação robótica de processos.">
                                                    <label class="form-check-label" for="tendenciaRadios13">
                                                            Automação robótica de processos.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios14" id="tendenciaRadios14" value="Personalização em massa e micro-momentos.">
                                                    <label class="form-check-label" for="tendenciaRadios14">
                                                             Personalização em massa e micro-momentos.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tendenciaRadios15" id="tendenciaRadios15" value="Outro.">
                                                    <label class="form-check-label" for="tendenciaRadios15">
                                                            Outro.
                                                    </label>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="s_atuacao">Setor de atuação da startup</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios1" id="setoratRadios1" value="Água.">
                                                    <label class="form-check-label" for="setoratRadios1">
                                                            Água.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios2" id="setoratRadios2" value="Biotecnologia.">
                                                    <label class="form-check-label" for="setoratRadios2">
                                                            Biotecnologia.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios3" id="setoratRadios3" value="Construção e minerais não-metálicos.">
                                                    <label class="form-check-label" for="setoratRadios3">
                                                            Construção e minerais não-metálicos.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios4" id="setoratRadios4" value="Economia criativa e turismo.">
                                                    <label class="form-check-label" for="setoratRadios4">
                                                            Economia criativa e turismo.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios5" id="setoratRadios5" value="Economia do mar.">
                                                    <label class="form-check-label" for="setoratRadios5">
                                                            Economia do mar.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios6" id="setoratRadios6" value="Eletrometalmecânico.">
                                                    <label class="form-check-label" for="setoratRadios6">
                                                            Eletrometalmecânico.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios7" id="setoratRadios7" value="Energia.">
                                                    <label class="form-check-label" for="setoratRadios7">
                                                            Energia.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios8" id="setoratRadios8" value="Indústria agroalimentar.">
                                                    <label class="form-check-label" for="setoratRadios8">
                                                            Indústria agroalimentar.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios9" id="setoratRadios9" value="Logística.">
                                                    <label class="form-check-label" for="setoratRadios9">
                                                            Logística.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios10" id="setoratRadios10" value="Meio ambiente.">
                                                    <label class="form-check-label" for="setoratRadios10">
                                                            Meio ambiente.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios11" id="setoratRadios11" value="Produtos de consumo (couro & calçados; confecções; madeira & móveis).">
                                                    <label class="form-check-label" for="setoratRadios11">
                                                            Produtos de consumo (couro & calçados; confecções; madeira & móveis).
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios12" id="setoratRadios12" value="Saúde.">
                                                    <label class="form-check-label" for="setoratRadios12">
                                                            Saúde.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios13" id="setoratRadios13" value="Segurança.">
                                                    <label class="form-check-label" for="setoratRadios13">
                                                            Segurança.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios14" id="setoratRadios14" value="Tecnologia da informação & comunicação.">
                                                    <label class="form-check-label" for="setoratRadios14">
                                                            Tecnologia da informação & comunicação.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="setoratRadios15" id="setoratRadios15" value="Outro.">
                                                    <label class="form-check-label" for="setoratRadios15">
                                                            Outro.
                                                    </label>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipo_solucao">Tipo de solução</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tiposRadios1" id="tiposRadios1" value="Plataforma digital.">
                                                    <label class="form-check-label" for="tiposRadios1">
                                                            Plataforma digital.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tiposRadios2" id="tiposRadios2" value="Aplicativo móvel.">
                                                    <label class="form-check-label" for="tiposRadios2">
                                                            Aplicativo móvel.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tiposRadios3" id="tiposRadios3" value="Aplicação de desktop.">
                                                    <label class="form-check-label" for="tiposRadios3">
                                                            Aplicação de desktop.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tiposRadios4" id="tiposRadios4" value="Software como serviço.">
                                                    <label class="form-check-label" for="tiposRadios4">
                                                            Software como serviço.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tiposRadios5" id="tiposRadios5" value="Dispositivos conectados.">
                                                    <label class="form-check-label" for="tiposRadios5">
                                                            Dispositivos conectados.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tiposRadios6" id="tiposRadios6" value="Gera receita e gera lucro.">
                                                    <label class="form-check-label" for="tiposRadios6">
                                                             Gera receita e gera lucro.
                                                    </label>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="estagiotp">Estágio de desenvolvimento do produto</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="estagiodpRadios1" id="estagiodpRadios1" value="Não tenho um produto pronto nem MVP.">
                                                    <label class="form-check-label" for="estagiodpRadios1">
                                                            Não tenho um produto pronto nem MVP.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="estagiodpRadios2" id="estagiodpRadios2" value="Tenho um MVP sem usuários.">
                                                    <label class="form-check-label" for="estagiodpRadios2">
                                                            Tenho um MVP sem usuários.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="estagiodpRadios3" id="estagiodpRadios3" value="Tenho um MVP com usuários beta.">
                                                    <label class="form-check-label" for="estagiodpRadios3">
                                                            Tenho um MVP com usuários beta.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="estagiodpRadios4" id="estagiodpRadios4" value="Tenho um MVP com clientes pagantes.">
                                                    <label class="form-check-label" for="estagiodpRadios4">
                                                            Tenho um MVP com clientes pagantes.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="estagiodpRadios5" id="estagiodpRadios5" value="Tenho um produto pronto, com clientes pagantes.">
                                                    <label class="form-check-label" for="estagiodpRadios5">
                                                            Tenho um produto pronto, com clientes pagantes.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="estagiodpRadios6" id="estagiodpRadios6" value="Tenho um produto avançado pronto para escalar.">
                                                    <label class="form-check-label" for="estagiodpRadios6">
                                                            Tenho um produto avançado pronto para escalar.
                                                    </label>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Há quanto tempo o produto vem sendo desenvolvido?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="produtosdRadios1" id="produtosdRadios1" value="Não iniciou desenvolvimento.">
                                                    <label class="form-check-label" for="produtosdRadios1">
                                                         Não iniciou desenvolvimento.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="produtosdRadios2" id="produtosdRadios2" value="Até 3 meses.">
                                                    <label class="form-check-label" for="produtosdRadios2">
                                                         Até 3 meses.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="produtosdRadios3" id="produtosdRadios3" value="Entre 3 e 6 meses.">
                                                    <label class="form-check-label" for="produtosdRadios3">
                                                         Entre 3 e 6 meses.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="produtosdRadios4" id="produtosdRadios4" value="Entre 6 e 12 meses.">
                                                    <label class="form-check-label" for="produtosdRadios4">
                                                         Entre 6 e 12 meses.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="produtosdRadios5" id="produtosdRadios5" value="Entre 12 e 24 meses.">
                                                    <label class="form-check-label" for="produtosdRadios5">
                                                         Entre 12 e 24 meses.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="produtosdRadios6" id="produtosdRadios6" value="Mais de 24 meses.">
                                                    <label class="form-check-label" for="produtosdRadios6">
                                                         Mais de 24 meses.
                                                    </label>
                                                </div> 
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Qual a diferenciação do seu produto?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="diferenciacaopRadios1" id="diferenciacaopRadios1" value="Nosso produto é igual ou inferior aos dos demais concorrentes.">
                                                    <label class="form-check-label" for="diferenciacaopRadios1">
                                                         Nosso produto é igual ou inferior aos dos demais concorrentes.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="diferenciacaopRadios2" id="diferenciacaopRadios2" value="Nosso produto possui diferenciais, mas não foi validado com clientes reais.">
                                                    <label class="form-check-label" for="diferenciacaopRadios2">
                                                         Nosso produto possui diferenciais, mas não foi validado com clientes reais.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="diferenciacaopRadios3" id="diferenciacaopRadios3" value="Nosso produto é igual aos dos demais concorrentes, mas já validei o uso com clientes reais.">
                                                    <label class="form-check-label" for="diferenciacaopRadios3">
                                                        Nosso produto é igual aos dos demais concorrentes, mas já validei o uso com clientes reais.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="diferenciacaopRadios4" id="diferenciacaopRadios4" value="Nosso produto possui todos os recursos fundamentais mapeados e validados com os clientes, além de outros que os diferencia.">
                                                    <label class="form-check-label" for="diferenciacaopRadios4">
                                                        Nosso produto possui todos os recursos fundamentais mapeados e validados com os clientes, além de outros que os diferencia.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="diferenciacaopRadios5" id="diferenciacaopRadios5" value="Nosso produto possui todos os recursos fundamentais mapeados e validados com os
                                                    clientes, além de outros que os diferencia, e é considerado referência no mercado.">
                                                    <label class="form-check-label" for="diferenciacaopRadios5">
                                                        Nosso produto possui todos os recursos fundamentais mapeados e validados com os clientes, além de outros que os diferencia, e é considerado referência no mercado.
                                                    </label>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Qual a barreira de cópia que existe no produto desenvolvido?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="barreiraCopiaRadios1" id="barreiraCopiaRadios1" value="Nosso produto não possui nenhuma barreira contra cópia dos concorrentes.">
                                                    <label class="form-check-label" for="barreiraCopiaRadios1">
                                                        Nosso produto não possui nenhuma barreira contra cópia dos concorrentes.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="barreiraCopiaRadios2" id="barreiraCopiaRadios2" value="Nosso produto possui especificações e regulações, mas ainda não atendemos todas.">
                                                    <label class="form-check-label" for="barreiraCopiaRadios2">
                                                        Nosso produto possui especificações e regulações, mas ainda não atendemos todas.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="barreiraCopiaRadios3" id="barreiraCopiaRadios3" value="Nosso produto possui especificações e regulações, e já atendemos todas.">
                                                    <label class="form-check-label" for="barreiraCopiaRadios3">
                                                        Nosso produto possui especificações e regulações, e já atendemos todas.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="barreiraCopiaRadios4" id="barreiraCopiaRadios4" value="Já estou enquadrado em todas as regulações; meu produto é patenteável, mas ainda não
                                                    pedi o registro.">
                                                    <label class="form-check-label" for="barreiraCopiaRadios4">
                                                        Já estou enquadrado em todas as regulações; meu produto é patenteável, mas ainda não pedi o registro.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="barreiraCopiaRadios5" id="barreiraCopiaRadios5" value="Já estou enquadrado em todas as regulações e já tenho patente do produto.">
                                                    <label class="form-check-label" for="barreiraCopiaRadios5">
                                                        Já estou enquadrado em todas as regulações e já tenho patente do produto.
                                                    </label>
                                                </div>
                                        </div>
                                        
                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>

                                         <!-- Forme 3 - Informações sobre o mercado -->
                                         
                                    <fieldset >
                                        <h3 class="card-title mt-3">Informações sobre o mercado</h3>
                                        <div class="form-group">
                                            <label for="estagiotp">O que você conhece sobre seus concorrentes?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="concorrentesRadios1" id="concorrentesRadios1" value="Não pesquisei possíveis concorrentes.">
                                                    <label class="form-check-label" for="concorrentesRadios1">
                                                        Não pesquisei possíveis concorrentes.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="concorrentesRadios2" id="concorrentesRadios2" value="Encontrei alguns, mas não me comparei e não sei meus diferenciais.">
                                                    <label class="form-check-label" for="concorrentesRadios2">
                                                        Encontrei alguns, mas não me comparei e não sei meus diferenciais.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="concorrentesRadios3" id="concorrentesRadios3" value="Encontrei alguns e me comparei, mas não sei meus diferenciais.">
                                                    <label class="form-check-label" for="concorrentesRadios3">
                                                        Encontrei alguns e me comparei, mas não sei meus diferenciais.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="concorrentesRadios4" id="concorrentesRadios4" value="Encontrei alguns, me comparei e tenho diferenciais relevantes.">
                                                    <label class="form-check-label" for="concorrentesRadios4">
                                                        Encontrei alguns, me comparei e tenho diferenciais relevantes.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="concorrentesRadios5" id="concorrentesRadios5" value="Fiz uma ampla pesquisa e não encontrei nenhum concorrente nesse mercado.">
                                                    <label class="form-check-label" for="concorrentesRadios5">
                                                        Fiz uma ampla pesquisa e não encontrei nenhum concorrente nesse mercado.
                                                    </label>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="estagiotp">Qual o tamanho do seu mercado (TAM)?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tamRadios1" id="tamRadios1" value="Não sei responder essa pergunta.">
                                                    <label class="form-check-label" for="tamRadios1">
                                                        Não sei responder essa pergunta.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tamRadios2" id="tamRadios2" value="Não sei o número, mas não é grande.">
                                                    <label class="form-check-label" for="tamRadios2">
                                                        Não sei o número, mas não é grande.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tamRadios3" id="tamRadios3" value="Até R$500 milhões por ano.">
                                                    <label class="form-check-label" for="tamRadios3">
                                                        Até R$500 milhões por ano.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tamRadios4" id="tamRadios4" value="De R$500 milhões até R$1 bilhão por ano.">
                                                    <label class="form-check-label" for="tamRadios4">
                                                        De R$500 milhões até R$1 bilhão por ano.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tamRadios5" id="tamRadios5" value="Mais de R$1 bilhão por ano.">
                                                    <label class="form-check-label" for="tamRadios5">
                                                        Mais de R$1 bilhão por ano.
                                                    </label>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">O quanto você conhece dos seus potenciais clientes?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pclientesRadios1" id="pclientesRadios1" value="Não fiz nenhuma pesquisa com outros potenciais clientes.">
                                                    <label class="form-check-label" for="pclientesRadios1">
                                                        Não fiz nenhuma pesquisa com outros potenciais clientes.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pclientesRadios2" id="pclientesRadios2" value="Não fiz nenhuma pesquisa com outros potenciais clientes, mas me considero um cliente do meu produto.">
                                                    <label class="form-check-label" for="pclientesRadios2">
                                                        Não fiz nenhuma pesquisa com outros potenciais clientes, mas me considero um cliente do meu produto.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pclientesRadios3" id="pclientesRadios3" value="Fiz uma pesquisa com poucos potenciais clientes (< 10 ), para entender mais sobre o comportamento deles.">
                                                    <label class="form-check-label" for="pclientesRadios3">
                                                        Fiz uma pesquisa com poucos potenciais clientes (< 10 ), para entender mais sobre o comportamento deles.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pclientesRadios4" id="pclientesRadios4" value="Fiz uma pesquisa com vários potenciais clientes, para entender mais sobre o comportamento deles.">
                                                    <label class="form-check-label" for="pclientesRadios4">
                                                        Fiz uma pesquisa com vários potenciais clientes, para entender mais sobre o comportamento deles.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pclientesRadios5" id="pclientesRadios5" value="Fiz uma pesquisa com vários dos meus potenciais clientes, levantando os comportamentos, principais pontos críticos e dores.">
                                                    <label class="form-check-label" for="pclientesRadios5">
                                                        Fiz uma pesquisa com vários dos meus potenciais clientes, levantando os comportamentos, principais pontos críticos e dores.
                                                    </label>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Como é seu mercado de atuação?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="atuacaoRadios1" id="atuacaoRadios1" value="É um mercado já consolidado, com uma startup/empresa que domina.">
                                                    <label class="form-check-label" for="atuacaoRadios1">
                                                        É um mercado já consolidado, com uma startup/empresa que domina.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="atuacaoRadios2" id="atuacaoRadios2" value="É um mercado já consolidado, com mais de uma startup/empresa que exploram esse
                                                    mercado">
                                                    <label class="form-check-label" for="atuacaoRadios2">
                                                        É um mercado já consolidado, com mais de uma startup/empresa que exploram esse
                                                        mercado
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="atuacaoRadios3" id="atuacaoRadios3" value="É um mercado em desenvolvimento, que vem se consolidando, com alguns players de referência.">
                                                    <label class="form-check-label" for="atuacaoRadios3">
                                                        É um mercado em desenvolvimento, que vem se consolidando, com alguns players de referência.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="atuacaoRadios4" id="atuacaoRadios4" value="É um mercado em desenvolvimento, que vem se consolidando, sem nenhum player de referência ainda.">
                                                    <label class="form-check-label" for="atuacaoRadios4">
                                                        É um mercado em desenvolvimento, que vem se consolidando, sem nenhum player de referência ainda.                                                        
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="atuacaoRadios5" id="atuacaoRadios5" value="É um mercado novo, que vem crescendo e somos pioneiros.">
                                                    <label class="form-check-label" for="atuacaoRadios5">
                                                        É um mercado novo, que vem crescendo e somos pioneiros.                                                        
                                                    </label>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Como está sua aquisição e crescimento de clientes?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="aquisicaocliRadios1" id="aquisicaocliRadios1" value="Não temos clientes.">
                                                    <label class="form-check-label" for="aquisicaocliRadios1">
                                                           Não temos clientes.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="aquisicaocliRadios2" id="aquisicaocliRadios2" value="Temos poucos clientes, mas conquistamos novos de maneira não estruturada.">
                                                    <label class="form-check-label" for="aquisicaocliRadios2">
                                                        Temos poucos clientes, mas conquistamos novos de maneira não estruturada.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="aquisicaocliRadios3" id="aquisicaocliRadios3" value="Temos clientes e estamos começando a estruturar nossos processos de vendas.">
                                                    <label class="form-check-label" for="aquisicaocliRadios3">
                                                        Temos clientes e estamos começando a estruturar nossos processos de vendas.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="aquisicaocliRadios4" id="aquisicaocliRadios4" value="Temos clientes, processos estruturados de vendas e estamos crescendo até 10% ao mês,
                                                    nos últimos 3 meses.">
                                                    <label class="form-check-label" for="aquisicaocliRadios4">
                                                        Temos clientes, processos estruturados de vendas e estamos crescendo até 10% ao mês, nos últimos 3 meses.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="aquisicaocliRadios5" id="aquisicaocliRadios5" value="Temos clientes, processos estruturados de vendas e estamos crescendo mais de 10% ao mês, nos últimos 3 meses.">
                                                    <label class="form-check-label" for="aquisicaocliRadios5">
                                                        Temos clientes, processos estruturados de vendas e estamos crescendo mais de 10% ao mês, nos últimos 3 meses.
                                                    </label>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Como a sua startup está sendo notada ou percebida?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="strtuppercebidaRadios1" id="strtuppercebidaRadios1" value="Não estamos expostos em nenhum lugar, nem em rede sociais.">
                                                    <label class="form-check-label" for="strtuppercebidaRadios1">
                                                        Não estamos expostos em nenhum lugar, nem em rede sociais.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="strtuppercebidaRadios2" id="strtuppercebidaRadios2" value="Criamos nosso site e redes, mas ainda não geramos nenhum tipo de conteúdo.">
                                                    <label class="form-check-label" for="strtuppercebidaRadios2">
                                                        Criamos nosso site e redes, mas ainda não geramos nenhum tipo de conteúdo.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="strtuppercebidaRadios3" id="strtuppercebidaRadios3" value="Criamos nosso site e redes, geramos algum tipo de conteúdo e alguns clientes estão nos indicando.">
                                                    <label class="form-check-label" for="strtuppercebidaRadios3">
                                                        Criamos nosso site e redes, geramos algum tipo de conteúdo e alguns clientes estão nos indicando.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="strtuppercebidaRadios4" id="strtuppercebidaRadios4" value="Já temos relevância e indicações de alguns clientes, estamos ativos nas redes sociais, participamos de eventos e já ganhamos destaque em algumas mídias.">
                                                    <label class="form-check-label" for="strtuppercebidaRadios4">
                                                        Já temos relevância e indicações de alguns clientes, estamos ativos nas redes sociais, participamos de eventos e já ganhamos destaque em algumas mídias.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="strtuppercebidaRadios5" id="strtuppercebidaRadios5" value="Já temos relevância e indicações de vários clientes, estamos bem ativos nas redes
                                                    sociais, participamos de grandes eventos e já ganhamos destaque em grandes mídias.">
                                                    <label class="form-check-label" for="strtuppercebidaRadios5">
                                                        Já temos relevância e indicações de vários clientes, estamos bem ativos nas redes sociais, participamos de grandes eventos e já ganhamos destaque em grandes mídias.
                                                    </label>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Como está o domínio do seu funil de vendas?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="funilvendasRadios1" id="funilvendasRadios1" value="Não sei o que é um funil de vendas.">
                                                    <label class="form-check-label" for="funilvendasRadios1">
                                                        Não sei o que é um funil de vendas.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="funilvendasRadios2" id="funilvendasRadios2" value="Sei o que é, mas ainda não tenho um funil de vendas.">
                                                    <label class="form-check-label" for="funilvendasRadios2">
                                                        Sei o que é, mas ainda não tenho um funil de vendas.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="funilvendasRadios3" id="funilvendasRadios3" value="Tenho um funil, mas ainda não domino todas as etapas.">
                                                    <label class="form-check-label" for="funilvendasRadios3">
                                                        Tenho um funil, mas ainda não domino todas as etapas.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="funilvendasRadios4" id="funilvendasRadios4" value="Tenho um funil, tenho todas as etapas dominadas, mas ainda não performo da forma esperada.">
                                                    <label class="form-check-label" for="funilvendasRadios4">
                                                        Tenho um funil, tenho todas as etapas dominadas, mas ainda não performo da forma esperada.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="funilvendasRadios5" id="funilvendasRadios5" value="Tenho um funil, tenho todas as etapas dominadas e performando de acordo com o esperado.">
                                                    <label class="form-check-label" for="funilvendasRadios5">
                                                        Tenho um funil, tenho todas as etapas dominadas e performando de acordo com o esperado.
                                                    </label>
                                                </div>
                                        </div>

                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>
                                   
                                    <!-- Form 4 - Informações sobre Finanças -->

                                    <fieldset >
                                        <h3 class="card-title mt-3">Informações sobre finanças</h3>

                                        <div class="form-group">
                                            <label for="estagiotp">Qual o modelo inicial de receita?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="receitaRadios1" id="receitaRadios1" value="B2C (transação entre empresa e consumidor final).">
                                                    <label class="form-check-label" for="receitaRadios1">
                                                        B2C (transação entre empresa e consumidor final).
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="receitaRadios2" id="receitaRadios2" value="B2B (transação entre empresas).">
                                                    <label class="form-check-label" for="receitaRadios2">
                                                        B2B (transação entre empresas).
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="receitaRadios3" id="receitaRadios3" value="B2G (transação entre empresa e governo).">
                                                    <label class="form-check-label" for="receitaRadios3">
                                                        B2G (transação entre empresa e governo).
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="receitaRadios4" id="receitaRadios4" value="B2B2C (transação entre empresas visando consumidor final).">
                                                    <label class="form-check-label" for="receitaRadios4">
                                                        B2B2C (transação entre empresas visando consumidor final).
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="receitaRadios5" id="receitaRadios5" value="Em definição.">
                                                    <label class="form-check-label" for="receitaRadios5">
                                                          Em definição
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="receitaRadios6" id="receitaRadios6" value="Outo.">
                                                    <label class="form-check-label" for="receitaRadios6">
                                                          Outro
                                                    </label>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Qual o estágio de receita da empresa?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="est_receitaRadios1" id="est_receitaRadios1" value="Não gera receita, mas não tem custos e despesas.">
                                                    <label class="form-check-label" for="est_receitaRadios1">
                                                        Não gera receita, mas não tem custos e despesas.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="est_receitaRadios2" id="est_receitaRadios2" value="Não gera receita, mas tem custos e despesas.">
                                                    <label class="form-check-label" for="est_receitaRadios2">
                                                        Não gera receita, mas tem custos e despesas.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="est_receitaRadios3" id="est_receitaRadios3" value="Gera receita, mas ainda não cobre os custos e despesas.">
                                                    <label class="form-check-label" for="est_receitaRadios3">
                                                        Gera receita, mas ainda não cobre os custos e despesas.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="est_receitaRadios4" id="est_receitaRadios4" value="Gera receita, mas o suficiente para pagar as contas.">
                                                    <label class="form-check-label" for="est_receitaRadios4">
                                                        Gera receita, mas o suficiente para pagar as contas.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="est_receitaRadios5" id="est_receitaRadios5" value="Gera receita e gera lucro.">
                                                    <label class="form-check-label" for="est_receitaRadios5">
                                                        Gera receita e gera lucro.
                                                    </label>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Você tem recursos financeiros para sustentar a operação por quanto tempo mais?</label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="recfinanceiroRadios1" id="recfinanceiroRadios1" value="Não iniciei a operação.">
                                                    <label class="form-check-label" for="recfinanceiroRadios1">
                                                        Não iniciei a operação.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="recfinanceiroRadios2" id="recfinanceiroRadios2" value="Não tenho mais recursos financeiros.">
                                                    <label class="form-check-label" for="recfinanceiroRadios2">
                                                        Não tenho mais recursos financeiros.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="recfinanceiroRadios3" id="recfinanceiroRadios3" value="Tenho, para mais 1 até 6 meses.">
                                                    <label class="form-check-label" for="recfinanceiroRadios3">
                                                        Tenho, para mais 1 até 6 meses.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="recfinanceiroRadios4" id="recfinanceiroRadios4" value="Tenho, para mais 6 até 12 meses.">
                                                    <label class="form-check-label" for="recfinanceiroRadios4">
                                                        Tenho, para mais 6 até 12 meses.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="recfinanceiroRadios5" id="recfinanceiroRadios5" value="Tenho, para mais 12 até 18 meses.">
                                                    <label class="form-check-label" for="recfinanceiroRadios5">
                                                        Tenho, para mais 12 até 18 meses.
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="recfinanceiroRadios5" id="recfinanceiroRadios5" value="Tenho, para mais de 18 meses.">
                                                    <label class="form-check-label" for="recfinanceiroRadios5">
                                                        Tenho, para mais de 18 meses.
                                                    </label>
                                                </div>
                                        </div>

                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>
                                    
                                    <!-- Form 5 - Informações sobre modelo de negócio -->

                                    <fieldset >
                                        <h3 class="card-title mt-3">Informações sobre modelo de negócio</h3>
                                        
                                        <div class="form-group">
                                            <label for="estagiotp">Como está sua proposta de valor?</label>

                                                
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Com relação ao seu modelo de receita, em qual estágio você está?</label>

                                                
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Você está preparado para escalar?</label>

                                                
                                        </div>

                                        

                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>
                                    
                                    <!-- Form 6 - Identificação do time do projeto -->

                                    <fieldset >
                                        <h3 class="card-title mt-3">Identificação do time do projeto</h3>

                                        <div class="form-group">
                                            <label for="estagiotp">Qual a experiência do time no mercado da startup?</label>

                                                
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Como está a composição/dedicação do time?</label>

                                                
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Faixa etária dos integrantes do time</label>

                                                
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Nível de conhecimento formal do setor da startup</label>

                                                
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Vocês possuem desenvolvedor (CTO - Chief Technology Officer)?</label>

                                                
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Como está a divisão societária da startup?</label>

                                                
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">Dados dos membros:</label>

                                            
                                            <button type="button" class="btn btn-outline-secondary btn-lg btn-block inclua_mais mt-5 mb-5">Inclua + 1</button>
                                        </div>

                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>
                                    
                                    <!-- Form 7 - Inclusão de anexos do projeto -->

                                    <fieldset>
                                        <h3 class="card-title mt-3">Inclusão de anexos do projeto</h3>

                                        <div class="form-group">
                                            <label for="estagiotp">Vídeo:</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Vídeo</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">PDF:</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">PDF</label>
                                            </div>
                                        </div>
                                        
                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>
                                    
                                    <!-- Form 8 - Confirmação do termo de compromisso -->

                                    <fieldset >
                                        <h3 class="card-title mt-3">Confirmação do termo de compromisso</h3>
                                        

                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green enviar acao"> Enviar </button>
                                    </fieldset>
                        
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/form-inscricao-valid.js') }}"></script>
<script>
    $(document).ready(function(){
         carregar_json('estado');
         function carregar_json(id, cidade_id){
             var html = '';

             $.getJSON('https://gist.githubusercontent.com/letanure/3012978/raw/2e43be5f86eef95b915c1c804ccc86dc9790a50a/estados-cidades.json',
            function(data){
                 console.log(data);
                 if(id == 'estado' && cidade_id == null){
                    html += '<option disabled selected> Escolher o estado sede da equipe </option>'; 
                     for(var i = 0; i < data.estados.length; i++){
                         html += '<option value='+ data.estados[i].sigla +'>'+ data.estados[i].nome +'</option>'
                     }
                 }else{
                    html += '<option disabled selected> Escolher o município sede da equipe </option>'; 
                    for(var i = 0; i < data.estados.length; i++){
                        if(data.estados[i].sigla == cidade_id){
                            for(var j = 0; j < data.estados[i].cidades.length; j++){
                                html += '<option value='+ data.estados[i].cidades[j] +'>' + data.estados[i].cidades[j] + '</option>';
                            }
                        }
                     }
                 }

                 $('#'+id).html(html);
             });
         }

         $(document).on('change', '#estado', function(){
             var cidade_id = $(this).val();
             console.log(cidade_id);
             if(cidade_id != null){
                carregar_json('cidade', cidade_id);
                console.log(cidade_id);
             }
         });

         $("input:checkbox").on("click",function(){
   
            var inp = $(this);

            // desmarco tudo (menos o clicado) e removo a classe
            $("input:checkbox")
            .not(inp)
            .prop("checked", false)
            .removeClass("theone")

            // verifico se está checado e altero a classe
            inp
            .prop("checked", inp.is(":checked"))
            .toggleClass("theone");
        });
    });
   /* $(function () {
        $("[rel='tooltip']").tooltip();
    });*/
</script>
</body>
</html>