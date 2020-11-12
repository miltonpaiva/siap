  <fieldset class="field_set mt-3" style="padding: 10px;display: none;" id="link_sttps" >
      <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Vinclular startups</strong> </legend>

      <div class="row">

        <div class="col-sm-12 col-md-12 mb-2">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

                <tr>
                  <td>
                    <input 
                      type="checkbox" 
                      name="startups[{{$startup['id']}}]" 
                      id="check_startup_{{$startup['id']}}" 
                      value="{{$startup['id']}}"
                      style="width: 100%;height: 25px;"
                      {{@$startup['checked']}}
                    >
                  </td>
                  <td>
                    <label for="check_startup_{{$startup['id']}}" style="width: 100%;height: 100%;margin: 0px;">
                      {{$startup['id']}}
                    </label>
                  </td>
                  <td>
                    <label for="check_startup_{{$startup['id']}}" style="width: 100%;height: 100%;margin: 0px;">
                      {{$startup['name']}}
                    </label>
                  </td>
                  <td>
                    <label for="check_startup_{{$startup['id']}}" style="width: 100%;height: 100%;margin: 0px;">
                      {{@$startup['tecno']}}
                    </label>
                  </td>
                  <td>
                    <label for="check_startup_{{$startup['id']}}" style="width: 100%;height: 100%;margin: 0px;">
                      {{@$startup['setor']}}
                    </label>
                  </td>
                  <td style="padding: 5px;" >
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