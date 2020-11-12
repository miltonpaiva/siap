                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Ação</th>
                      <th>Nota Total</th>
                      <th>Experiência</th>
                      <th>Alinhamento</th>
                      <th>Operação</th>
                      <th>Status</th>
                      <th>Startup</th>
                      <th>Qtd. Time</th>
                      <th>Cidade</th>
                      <th>Região</th>
                      <th>Categoria</th>
                      <th>Avaliador</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Ação</th>
                      <th>Nota Total</th>
                      <th>Experiência</th>
                      <th>Alinhamento</th>
                      <th>Operação</th>
                      <th>Status</th>
                      <th>Startup</th>
                      <th>Qtd. Time</th>
                      <th>Cidade</th>
                      <th>Região</th>
                      <th>Categoria</th>
                      <th>Avaliador</th>
                    </tr>
                  </tfoot>
                  <tbody>

                    @foreach($ratings as $key => $rating)

                      <tr
                            @if($rating['startup']['stage'] == 'complete')
                              class="table-danger"
                            @endif

                            @if($rating['startup']['stage'] == 'rated')
                              class="table-warning"
                            @endif
                      >
                        <td>
                          <select onchange="redirectAction(this)" >
                            <option disabled="true" value="" selected="true" >---</option>

                            <option value="{{ route('startup.view', $rating['startup']['id']) }}" >
                                Vis. Projeto
                            </option>

                            @if($rating['startup']['stage'] == 'rated' || $rating['startup']['stage'] == 'approved' || $rating['startup']['stage'] == 'complete_attractive' || $rating['startup']['stage'] == 'rated_attractive')
                            <option value="{{ route('startup.rating.view', [$rating['startup']['id'], $rating['user']['id']]) }}" >
                                Vis. Av. Prontidão
                            </option>
                            @endif

                            @if($rating['startup']['stage'] == 'rated')
                              <option value="{{ route('startup.aprov', [$rating['startup']['id']]) }}">
                                  Aprov. 2° Fase
                              </option>
                              <option value="{{ route('startup.reprov', [$rating['startup']['id']]) }}">
                                  Não Habilitar
                              </option>
                            @endif

                            @if($rating['startup']['stage'] == 'complete')
                              <option value="{{ route('startup.rating.view.action', $rating['startup']['id']) }}" >
                                  Aval. Prontidão
                              </option>
                            @endif

                            @if($rating['startup']['stage'] == 'complete_attractive')
                            <option value="{{ route('startup.rating.attractive.view', $rating['startup']['id']) }}" >
                                Aval. Atratividade
                            </option>
                            <option value="{{ route('attractive.response.view', $rating['startup']['id']) }}" >
                                Form. Atratividade
                            </option>
                            @endif

                            @if($rating['startup']['stage'] == 'rated_attractive')
                            <option value="{{ route('attractive.response.view', $rating['startup']['id']) }}" >
                                Form. Atratividade
                            </option>
                            <option value="{{ route('attractive.rating.view', [$rating['startup']['id'], $rating['user']['id']]) }}" >
                                Vis. Av. Atratividade
                            </option>
                            @endif

                          </select>
                        </td>
                        <td>{{$rating['total']}}</td>
                        <td>
                          <p style="margin: 0px; font-size: 12px;"> Tecnologia: <b>{{@$notes[$key][1]}}</b>. </p><hr style="margin: 0px;" >
                          <p style="margin: 0px; font-size: 12px;"> Setor: <b>{{@$notes[$key][2]}}</b>.</p><hr style="margin: 0px;" >
                          <p style="margin: 0px; font-size: 12px;"> Time: <b>{{@$notes[$key][3]}}</b>.</p><hr style="margin: 0px;" >
                          <p style="margin: 0px; font-size: 12px;"> Mulheres: <b>{{@$notes[$key][4]}}</b>.</p>
                        </td>
                        <td>
                          <p style="margin: 0px; font-size: 12px;"> Produto: <b>{{@$notes[$key][5]}}</b>. </p><hr style="margin: 0px;" >
                          <p style="margin: 0px; font-size: 12px;"> Setor: <b>{{@$notes[$key][7]}}</b>. </p><hr style="margin: 0px;" >
                          <p style="margin: 0px; font-size: 12px;"> Tecnologias: <b>{{@$notes[$key][6]}}</b>.</p>
                        </td>
                        <td>
                          <p style="margin: 0px; font-size: 12px;"> Produto: <b>{{@$notes[$key][8]}}</b>. </p><hr style="margin: 0px;" >
                          <p style="margin: 0px; font-size: 12px;"> Vendas: <b>{{@$notes[$key][9]}}</b>. </p>
                        </td>
                        <td>
                          @if($rating['startup']['stage'] == 'rated')
                            Aguardando Habilitação
                          @endif
                          @if($rating['startup']['stage'] == 'approved')
                            Em Atratividade
                          @endif
                          @if($rating['startup']['stage'] == 'complete_attractive')
                            Aguardando 2° avaliação
                          @endif
                          @if($rating['startup']['stage'] == 'complete')
                            Aguardando 1° avaliação
                          @endif
                        </td>
                        <td>{{$rating['startup']['name']}}</td>
                        <td>{{$rating['startup']['qtd_prtc']}}</td>
                        <td>{{$rating['startup']['city']}}</td>
                        <td>{{$rating['startup']['region']}}</td>
                        <td>{{$rating['startup']['category']}}</td>
                        <td>{{$rating['user']['name']}}</td>
                      </tr>

                    @endforeach

                  </tbody>
                </table>

