  <fieldset class="field_set mt-3" style="padding: 10px;display: none;" id="link_sttps" >
      <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Vinclular startups</strong> </legend>

      <div class="row">

        <div class="col-sm-12 col-md-12 mb-2">

          <input class="form-control" type="text" id="srch_startups" style="margin-bottom: 20px;" placeholder="Procure a Startup Aqui !!!">
          <div style="max-height: 200px;overflow: overlay;">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Vinclular</th>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Setor</th>
                  <th>Tecnologia</th>
                  <th>Vinculado</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Vincular</th>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Setor</th>
                  <th>Tecnologia</th>
                  <th>Vinculado</th>
                </tr>
              </tfoot>
              <tbody>

                @foreach($startups as $startup)

                  <tr id="line_{{$startup['id']}}" class="linha">
                    <td class="coluna" ref_tr="{{$startup['id']}}" id="{{$startup['id']}}">
                      <input 
                        type="checkbox" 
                        name="startups[{{$startup['id']}}]" 
                        id="check_startup_{{$startup['id']}}" 
                        value="{{$startup['id']}}"
                        style="width: 100%;height: 25px;"
                        {{@$startup['checked']}}
                      >
                    </td>
                    <td class="coluna" ref_tr="{{$startup['id']}}" id="{{$startup['id']}}">
                      <label for="check_startup_{{$startup['id']}}" style="width: 100%;height: 100%;margin: 0px;">
                        {{$startup['id']}}
                      </label>
                    </td>
                    <td class="coluna" ref_tr="{{$startup['id']}}" id="{{$startup['id']}}">
                      <label for="check_startup_{{$startup['id']}}" style="width: 100%;height: 100%;margin: 0px;">
                        {{$startup['name']}}
                      </label>
                    </td>
                    <td class="coluna" ref_tr="{{$startup['id']}}" id="{{$startup['id']}}">
                      <label for="check_startup_{{$startup['id']}}" style="width: 100%;height: 100%;margin: 0px;">
                        {{@$startup['tecno']}}
                      </label>
                    </td>
                    <td class="coluna" ref_tr="{{$startup['id']}}" id="{{$startup['id']}}">
                      <label for="check_startup_{{$startup['id']}}" style="width: 100%;height: 100%;margin: 0px;">
                        {{@$startup['setor']}}
                      </label>
                    </td>
                    <td class="coluna" ref_tr="{{$startup['id']}}" id="{{$startup['id']}}" style="padding: 5px;" >
                      @if(@$links[$startup['id']])
                        @foreach($links[$startup['id']] as $link)
                          <p style="margin: 0px; font-size: 12px;"> <b>{{$link}}</b>. </p><hr style="margin: 0px;" >
                        @endforeach
                      @endif
                    </td>
                  </tr>

                @endforeach

              </tbody>
            </table>
          </div>

        </div>

      </div>

  </fieldset>
  <script>
    function checkTypeUser() {
        var perfil = document.getElementById('perfil').value;
        var link_sttps = document.getElementById('link_sttps');
        if (perfil == 'Avaliador') {
            link_sttps.style.display = '';
        }else{
            link_sttps.style.display = 'none';
        }
    }

    checkTypeUser()
  </script>
  <script>
  //  SRIPT PARA BUSCA DE STARTUPS
  var input = document.getElementById('srch_startups');
  input.addEventListener("keyup", function(event) {
      srch_startups(event.target.value.toLowerCase());
  });
  function srch_startups(str) {
      var line_ids = [];
      var colunas = document.getElementsByClassName('coluna');
      for(key in colunas){
          if (colunas[key].id) {
              var data = colunas[key];
              var id_tr = data.getAttribute('ref_tr');

              var line = document.getElementById('line_' + id_tr);

              if (str == '' || str == ' ') {
                line.style.display = '';
              }else{
                var str_data = data.innerHTML
                str_data = str_data.toLowerCase();
                if (str_data.indexOf(str) > -1) {
                    line_ids.push('line_' + id_tr)
                }
              }
          }
      }

      var linhas = document.getElementsByClassName('linha');
      console.log(line_ids)
      for(key in linhas){
          if (linhas[key].id) {
              var line = linhas[key];
              console.log(line.id)


              if (line_ids.indexOf(line.id) > -1) {
                  line.style.display = '';
              }else{
                  line.style.display = 'none';
              }

              if (line_ids.length == 0) {line.style.display = 'none';}
              if (str == '' || str == ' ') {
                line.style.display = '';
              }
          }
      }
  }

  </script>