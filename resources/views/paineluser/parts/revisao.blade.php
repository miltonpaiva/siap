
                    <!-- SESSÃO 00 REVISÃO DE DADOS -->
                    <div class="tab-pane fade show active" id="nav-section0" role="tabpanel" aria-labelledby="nav-section0-tab">

                      <fieldset id="section6" class="mt-3" style="padding: 10px">

                        <p class="text-dark" style="margin: 0px"><b>Nome da Startup</b></p>
                        <input type="text" class="form-control obrigatorio" session="nav-section0" name="startup[name]" id="startup_name" value="{{$startup['name']}}">
                        <br>
                        <p class="text-dark" style="margin: 0px"><b>Município</b></p>
                        <select class="form-control obrigatorio" session="nav-section0" name="startup[city]" id="startup_city">
                          <option value=""> --- </option>
                        </select>
                        <br>

                        <p class="text-dark" style="margin: 0px" ><b>Setor: </b></p>
                        <input type="hidden" name="startup[question][3][response]" value="{{@$responses[3]['id']}}">
                        <select class="form-control obrigatorio" session="nav-section0" name="startup[question][3][option]" id="startup_3_option" >
                          @foreach($options[3] as $question => $opt)
                          <option 
                            value="{{$opt['id']}}" 

                            @if(@$responses[3]['option'] == $opt['id'])
                            selected="true" 
                            @endif

                          ><!--END OF OPTION -->

                            {{$opt['name']}}</option>
                          @endforeach
                        </select>
                        <br>

                        <p class="text-dark" style="margin: 0px" ><b>Tendencia Tecnologia: </b></p>
                        <input type="hidden" name="startup[question][4][response]" value="{{@$responses[4]['id']}}">
                        <select class="form-control obrigatorio" session="nav-section0" name="startup[question][4][option]" id="startup_4_option" >
                          @foreach($options[4] as $question => $opt)
                          <option 
                            value="{{$opt['id']}}" 

                            @if(@$responses[4]['option'] == $opt['id'])
                            selected="true" 
                            @endif

                          ><!--END OF OPTION -->

                            {{$opt['name']}}</option>
                          @endforeach
                        </select>
                        <br>

                        <p class="text-dark" style="margin: 0px" ><b>Tipo de Solução: </b></p>
                        <input type="hidden" name="startup[question][5][response]" value="{{@$responses[5]['id']}}">
                        <select class="form-control obrigatorio" session="nav-section0" name="startup[question][5][option]" id="startup_5_option" >
                          @foreach($options[5] as $question => $opt)
                          <option 
                            value="{{$opt['id']}}" 

                            @if(@$responses[5]['option'] == $opt['id'])
                            selected="true" 
                            @endif

                          ><!--END OF OPTION -->

                            {{$opt['name']}}</option>
                          @endforeach
                        </select>
                        <br>

                      </fieldset>

                      <hr class="mt-5 mb-4"> <!-- separador -->

                      <fieldset>
                        <p class="text-dark"><b>Integrantes do time</b></p>

                        @foreach($startup['time'] as $t_id => $time)

                        <button id="btn_fade_{{$t_id}}" class="btn btn_fade btn-outline-secondary btn-lg btn-block mt-5 mb-5"> Participante: {{@$time['name']}} </button>
                        <div id="time_fade_{{$t_id}}" style="display: none;">

                            <div class="form-group">
                                <label class="pergunta" for="nome-compl">Nome Completo</label>
                                <input type="text" class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_nome-compl" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][nome]" aria-describedby="nomeclpHelp" value="{{@$time['name']}}">

                            </div>
                            <div class="form-row">
                                <div class="col-md-7 mb-3">
                                    <label class="pergunta" for="funcaop">Função no Projeto (negócio, produto ou marketing)</label>
                                    <select class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_funcaop" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][funcao]" aria-describedby="funcaopHelp" >
                                        <option 
                                          value="negócio"

                                          @if(@$time['function'] == 'negócio')
                                          selected="true" 
                                          @endif

                                        >Negócio</option>
                                        <option 
                                          value="Produto"

                                          @if(@$time['function'] == 'Produto')
                                          selected="true" 
                                          @endif

                                        >Produto</option>
                                        <option 
                                          value="Marketing"

                                          @if(@$time['function'] == 'Marketing')
                                          selected="true" 
                                          @endif

                                        >Marketing</option>
                                    </select>

                                </div>
                                <div class="col-md-5 mb-3">
                                    <label class="pergunta" for="datanasc">Data de Nascimento</label>
                                    <input 
                                      type="text" 
                                      class="form-control" 
                                      id="datanasc" 
                                      form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][datanasc]" 
                                      aria-describedby="datanascHelp" 
                                      value="{{@$time['data_nasc']}}"

                                      @if(@$time['data_nasc'] == '')
                                        style="border-color: red;"
                                      @endif
                                    >

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-5 mb-3">
                                  <label class="pergunta" for="rg">RG</label>
                                  <input type="text" class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_rg" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][rg]" maxlength="15" value="{{@$time['rg']}}">

                                </div>
                                <div class="col-md-2 mb-3">
                                  <label class="pergunta" for="orgemaissor">Órgão Emissor</label>
                                  <input type="text" class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_orgemaissor" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][orgemaissor]" value="SSP">

                                </div>
                                <div class="col-md-5 mb-3">
                                    <label class="pergunta" for="cpf">CPF</label>
                                    <input type="text" class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_cpf" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][cpf]" aria-describedby="cpfHelp" maxlength="14" value="{{@$time['cpf']}}">
                                    <small id="cpfHelp" class="form-text text-muted" style="display: none;">CPF inválido!</small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="pergunta" for="instensino">Instituição de Ensino</label>
                                    <input type="text" class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_instensino" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][instensino]" aria-describedby="instensinoHelp" value="{{@$time['institution']}}">

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="pergunta" for="curso">Curso</label>
                                    <input type="text" class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_curso" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][curso]" aria-describedby="cursoHelp" value="{{@$time['course']}}">

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="pergunta" for="categoria-projeto">Formação</label>
                                        <select class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_formacao" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][formacao]" value="{{@$time['formation']}}">
                                        <option 
                                          value="1"

                                          @if(@$time['formation'] == 1)
                                          selected="true" 
                                          @endif

                                        >Nível Médio Regular Incompleto</option>
                                        <option 
                                          value="2"

                                          @if(@$time['formation'] == 2)
                                          selected="true" 
                                          @endif

                                        >Nível Médio Regular Completo</option>
                                        <option 
                                          value="3"

                                          @if(@$time['formation'] == 3)
                                          selected="true" 
                                          @endif

                                        >Nível Médio Profissionalizante Incompleto</option>
                                        <option 
                                          value="4"

                                          @if(@$time['formation'] == 4)
                                          selected="true" 
                                          @endif

                                        >Nível Médio Profissionalizante Completo</option>
                                        <option 
                                          value="5"

                                          @if(@$time['formation'] == 5)
                                          selected="true" 
                                          @endif

                                        >Superior Completo</option>
                                        <option 
                                          value="6"

                                          @if(@$time['formation'] == 6)
                                          selected="true" 
                                          @endif

                                        >Superior Incompleto</option>
                                        <option 
                                          value="7"

                                          @if(@$time['formation'] == 7)
                                          selected="true" 
                                          @endif

                                        >Nível Técnico Incompleto</option>
                                        <option 
                                          value="8"

                                          @if(@$time['formation'] == 8)
                                          selected="true" 
                                          @endif

                                        >Nível Técnico Completo</option>
                                        </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                  <label class="pergunta" for="logradouro">Logradouro</label>
                                  <input type="text" class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_logradouro" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][logradouro]" value="{{@$time['address']}}">

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="pergunta" for="estadom">Estado</label>
                                    <input type="text" class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_estadom" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][estado]" value="{{$startup['state']}}">

                                  </div>
                                <div class="col-md-3 mb-3">
                                  <label class="pergunta" for="cidadem">Cidade</label>
                                  <input 
                                    type="text" 
                                    class="form-control obrigatorio" 
                                    session="nav-section0"
                                    id="cidadem" 
                                    form_fade="time_fade_{{$t_id}}" 
                                    name="time[{{$t_id}}][cidade]" 
                                    @if(@$time['city'])
                                    value="{{@$time['city']}}"
                                    @else
                                    value="{{@$startup['city']}}"
                                    @endif
                                  >

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="pergunta" for="emailmenbro">E-mail</label>
                                    <input type="text" class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_emailmenbro" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][emailmenbro]" value="{{@$time['email']}}">

                                </div>
                                <div class="col-md-3 mb-3">
                                      <label class="pergunta" for="telcontato">Telefone de contato</label>
                                      <input type="text" class="form-control obrigatorio" session="nav-section0" id="{{$t_id}}_telcontato" form_fade="time_fade_{{$t_id}}" name="time[{{$t_id}}][telcontato]" maxlength="14" value="{{@$time['telephone']}}">

                                  </div>
                                <div class="col-md-3 mb-3">
                                    <label class="pergunta" for="linkedin">Linked In</label>
                                    <input type="text" class="form-control " id="{{$t_id}}_linkedin" name="time[{{$t_id}}][linkedin]" value="{{@$time['linkedin']}}">

                                  </div>
                            </div>

                            <div class="form-group mb-5">
                                <label class="pergunta" for="comprovacao">Comprovação de Experiência e Conhecimento</label>
                                <div class="custom-file">
                                    <input type="text" class="form-control obrigatorio" session="nav-section0" value="{{@$attch[$time['id']]['archive']}}" disabled="true">
                                </div>
                            </div>
                            <button type="button" id="{{$t_id}}" class="btn btn-outline-secondary btn-lg btn-block mt-5 mb-5 remover">Remover: {{@$time['name']}}</button>
                        </div>

                        @endforeach

                        <div class="dados_membros"></div>

                        <button id="inclua_mais" class="btn btn-outline-secondary btn-lg btn-block mt-5 mb-5">Inclua + 1</button>

                      </fieldset>

                    </div>


