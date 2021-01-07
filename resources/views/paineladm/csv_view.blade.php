<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <?php
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
        if (strpos($url, 'herokuapp.com')):
    ?>
            <!-- PERMITIR CONTEUDO MISTO TEMPORAREAMENTE -->
            <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <?php endif; ?>

  <title>SIAP - Exportação de Projetos</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->

    @include('paineladm/parts/sidebar')

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->

        @include('paineladm/parts/nav')

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?php if (@$_SESSION['message']): ?>
          <div class="alert alert-<?= $_SESSION['message']['type']; ?>" role="alert" style="">
              <?= $_SESSION['message']['message']; ?>
          </div>
          <?php endif; ?>

          @if(@$message['message'] != '')
          <div class="alert alert-{{@$message['type']}}" role="alert" style="">
              {{@$message['message']}}
          </div>
          @endif

          @if($errors->any())
          <div class="alert alert-danger" role="alert" style="">
              {{$errors->first()}}
          </div>
          @endif

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Exportação</h1>

          @foreach ($columns as $table => $cols)
          <div class="card shadow mb-4">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Colunas de @if(@$translate[$table]) {{$translate[$table]}} @else {{$table}} @endif</h6>
	            </div>
	            <div class="card-body">

	              <form class="form-inline">

	                @foreach ($cols as $col)
	                <div class="form-group mx-sm-3 mb-2">
	                  <input type="checkbox" id="{{$table}}_{{$col}}" value="{{$col}}" class="check_cols" onchange="prepareData()" style="display: none;">
	                  <label for="{{$table}}_{{$col}}" id="label_{{$table}}_{{$col}}" >@if(@$translate[$col]) {{$translate[$col]}} @else {{$col}} @endif</label>
	                </div>
	                <br>
	                @endforeach

	              </form>

	            </div>
          </div>
          @endforeach

          @foreach ($questions as $fase => $questions)
          <div class="card shadow mb-4">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Questões de {{$fase}} (exibidas apenas questões de mesma categoria)</h6>
	            </div>
	            <div class="card-body">

	              <form class="form-inline">

	                @foreach ($questions as $quest)
	                <div class="form-group mx-sm-3 mb-2">
	                  <input type="checkbox" id="{{$fase}}_{{$quest['id']}}" q_type="{{@$quest['type']}}" value="{{$quest['id']}}" class="check_quests" onchange="prepareData()" style="display: none;">
	                  <label for="{{$fase}}_{{$quest['id']}}" id="label_{{$fase}}_{{$quest['id']}}" >
	                    {{$quest['name']}}
	                    @if( @$quest['type'] )
	                    ({{$quest['type']}})
	                    @else
	                    (ambos)
	                    @endif
	                  </label>
	                </div>
	                <br>
	                @endforeach

	              </form>

	            </div>
          </div>
          @endforeach

          @foreach ($critereas as $fase => $criterea)
          <div class="card shadow mb-4">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">
	              	Criterios de Avaliação de {{$fase}}
	              	(exibidas apenas criterios de mesma categoria)
	              </h6>
	            </div>
	            <div class="card-body">

	              <form class="form-inline">

	                @foreach ($criterea as $crite)
	                <div class="form-group mx-sm-3 mb-2">
	                  <input type="checkbox" id="{{$fase}}_{{$crite['id']}}_c" c_type="{{@$crite['type']}}" value="{{$crite['id']}}" class="check_crite" onchange="prepareData()" style="display: none;">
	                  <label for="{{$fase}}_{{$crite['id']}}_c" id="label_{{$fase}}_{{$crite['id']}}_c" >
	                    {{$crite['name']}} 
	                    ({{$crite['type']}})
	                  </label>
	                </div>
	                <br>
	                @endforeach

	              </form>

	            </div>
          </div>
          @endforeach

			<div class="card shadow mb-4" style="position: fixed;top: 10px;right: 10px;z-index: 1; max-width: 700px;">
			    <div class="card-header py-3">
			      <h6 class="m-0 font-weight-bold text-primary" style="float: left;" >Colunas do CSV</h6>
	      			<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;" onclick="gerarCSV()" >
					  Gerar CSV
					</button>

			    </div>
			    <div class="card-body" style="overflow: overlay" >

			      <form class="form-inline">
			        <div class="form-group mx-sm-3 mb-2" id="csv_selecionado">
			        </div>
			        <br>

			      </form>

			    </div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Gerar CSV</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="d-flex justify-content-center">
						<div class="spinner-border" role="status"  id="load">
						  <span class="sr-only">Loading...</span>
						</div>
			      	</div>
					<div class="alert alert-danger" role="alert" id="alert_error" style="display: none;" >
					  Não foi possivel gerar o CSV, verifique as colunas e tente novamente !
					</div>
					<div class="alert alert-success" role="alert" id="alert_ok" style="display: none;" >
					  Arquivo gerado com sucesso !!! <br>
					  Baixe ele clicando abaixo:
					</div>
			      </div>
			      <div class="modal-footer">
			        <a href="/files/startups.txt" download="startups.txt" target="_blank" class="btn btn-primary disabled " id="baixar" >
                  		Baixar CSV
                	</a>
			      </div>
			    </div>
			  </div>
			</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SIAP 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/datatables-demo.js') }}"></script>
  <script>
    var data = {};
    var has_error = false;

    function prepareData() {

      var selected_style = "background: rgb(26, 188, 156);color: black;border-radius: 10px;padding-left: 5px;padding-right: 5px;";

      data = {tables:{},questions:{},criterea:{}};
      data_coluns_csv = {csv_coluns:{}};

      // AÇÕES EM COLUNAS SIMPLES
      var checks_t = document.getElementsByClassName('check_cols');
      for(key in checks_t){

        if (checks_t[key].id) {

          var chck = checks_t[key];

          var label = document.getElementById('label_' + chck.id);

          if (chck.checked) {

            label.style = selected_style;
            var csv_column = label.innerText.trim();
            csv_column = csv_column.replace(/(\r\n|\n|\r)/gm, "");

            var table  = chck.id.split('_')[0];
            var column = chck.value;


            if (data['tables'][table]) {
              data['tables'][table]['columns'].push(column);
            }else{
              data['tables'][table] = {columns:[column]};
            }

            if (data_coluns_csv['csv_coluns'][table +  "_" + column]) {
              data_coluns_csv['csv_coluns'][table +  "_" + column]['column'].push(csv_column);
            }else{
              data_coluns_csv['csv_coluns'][table +  "_" + column] = {column:[csv_column]};
            }

          }else{
            label.style = '';
          }//endif
        }//endif
      }//endfor

      // AÇÕES EM QUESTÕES
      var checks_q = document.getElementsByClassName('check_quests');
      for(key in checks_q){

        if (checks_q[key].id) {

          var chck = checks_q[key];
          var label = document.getElementById('label_' + chck.id);
          if (chck.checked) {
            label.style = selected_style;
            var csv_column = label.innerText.trim();
            csv_column = csv_column.replace(/(\r\n|\n|\r)/gm, "");

            var fase   = chck.id.split('_')[0];
            var question = chck.id.split('_')[1];
            var type   = chck.getAttribute('q_type');

            if (type == '') { type = 'ambos'; }

            var data_question = {};
            data_question['id'] = question;
            data_question['type'] = type

            if (data['questions'][fase]) {
              data['questions'][fase]['questions'].push(data_question);
            }else{
              data['questions'][fase] = {questions:[data_question]};
            }

            if (data_coluns_csv['csv_coluns']['q_' + question]) {
              data_coluns_csv['csv_coluns']['q_' + question]['column'].push(csv_column);
            }else{
              data_coluns_csv['csv_coluns']['q_' + question] = {column:[csv_column]};
            }

          }else{
            label.style = "";
          }//endif
        }//endif
      }//endfor

      // AÇÕES EM CRITERIOS
      var checks_c = document.getElementsByClassName('check_crite');
      for(key in checks_c){

        if (checks_c[key].id) {

          var chck = checks_c[key];
          var label = document.getElementById('label_' + chck.id);
          if (chck.checked) {
            label.style = selected_style;
            var csv_column = label.innerText.trim();
            csv_column = csv_column.replace(/(\r\n|\n|\r)/gm, "");

            var fase   = chck.id.split('_')[0];
            var criterea = chck.id.split('_')[1];
            var type   = chck.getAttribute('c_type');

            var data_criterea = {};
            data_criterea['id'] = criterea;
            data_criterea['type'] = type

            if (data['criterea'][fase]) {
              data['criterea'][fase]['critereas'].push(data_criterea);
            }else{
              data['criterea'][fase] = {critereas:[data_criterea]};
            }

            if (data_coluns_csv['csv_coluns']['c_' + criterea]) {
              data_coluns_csv['csv_coluns']['c_' + criterea]['column'].push(csv_column);
            }else{
              data_coluns_csv['csv_coluns']['c_' + criterea] = {column:[csv_column]};
            }

          }else{
            label.style = "";
          }//endif
        }//endif
      }//endfor

      console.log(data);
      console.log(JSON.stringify(data));
      nomesColunas()
    }

    function nomesColunas() {
    	var div_names = document.getElementById('csv_selecionado');
		var content = ''

    	for(key in data_coluns_csv['csv_coluns']){
    		var name = data_coluns_csv['csv_coluns'][key]['column'][0];
    		if (name.length > 10) {
    			name = name.substring(0,10) + "..."
    		}
			name = name.toUpperCase();
    		content += "<label> <p>" + name + "</p><p style='color:red;font-size:30px'>;</p> </label>";
    	}

    	div_names.innerHTML = content;
    }

    function gerarCSV() {

    	var div_erro = document.getElementById('alert_error');
    	var load = document.getElementById('load');

		div_erro.style.display = 'none'
		load.style.display = ''

    	data_json = JSON.stringify(data);
    	var url = "/csv/generate?data=" + data_json;
    	send(url);
    }

    function send(url) {

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", url, true);

        xhttp.onreadystatechange = function(){

        	xhttp.addEventListener('error', console.log(has_error = true));

            if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

                var request_response = xhttp.responseText;
                console.log('url');
                console.log(url);
                if (request_response) {
                    if (JSON.parse(request_response)) {
                    	var response = JSON.parse(request_response)
                    	if (response['status'] == 200) {
							has_error = false;
							gerated()
                    	}else{
	                    	has_error = true;
	                        console.error(xhttp.responseText);
                    	}
                    }else{
                    	has_error = true;
                        console.error(xhttp.responseText);
                    }
                }
            }
        }

    	xhttp.send();

		checkErrors()
    }

    function checkErrors() {
    	var div_erro = document.getElementById('alert_error');
    	var load = document.getElementById('load');

		setTimeout(function(){
			if (has_error) {
				load.style.display = 'none';
				div_erro.style.display = ''
			}
		}, 5000);
    }

    function gerated() {
    	var div_ok = document.getElementById('alert_ok');
    	var load = document.getElementById('load');
    	var btn_baixar = document.getElementById('baixar');

		div_ok.style.display = ''
		load.style.display = 'none'
		btn_baixar.classList.remove("disabled");
    }

  </script>
</body>

</html>