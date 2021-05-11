@extends('layouts.dash')

@section('content')
<div class="container-fluid">


          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title">Olá, {{ Auth::user()->name }}!</h2>
                </div>
                <div class="col-auto">
                  <form class="form-inline">
                    <div class="form-group">
                      <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="mb-2 align-items-center">
                <div class="card shadow mb-4">
                  <div class="card-body">
                    <div class="row mt-1 align-items-center">
                      <div class="col-12 col-lg-4 text-left pl-4">
                        <p class="mb-1 small text-muted">Acessos em {{now()->monthName}}</p>
                        <span class="h3">{{$totalAcessos}}</span>
                        <span class="small text-muted">0%</span>
                        <span class="fe fe-arrow-up text-success fe-12"></span>
                        <p class="text-muted mt-2"> Todos os acessos referentes ao mês de {{now()->monthName}}.</p>
                      </div>
                      <div class="col-6 col-lg-2 text-center py-4">
                        <p class="mb-1 small text-muted">Acessos hoje</p>
                        <span class="h3">{{isset($acessos[date('d')]) ? count($acessos[date('d')]) : 0}}</span><br />
                        <span class="small text-muted">0%</span>
                        <span class="fe fe-arrow-up text-success fe-12"></span>
                      </div>
                      <div class="col-6 col-lg-2 text-center py-4 mb-2">
                        <p class="mb-1 small text-muted">Novos Cadastros</p>
                        <span class="h3">0</span><br />
                        <span class="small text-muted">0%</span>
                        <span class="fe fe-arrow-up text-success fe-12"></span>
                      </div>
                      <div class="col-6 col-lg-2 text-center py-4">
                        <p class="mb-1 small text-muted">Conversões</p>
                        <span class="h3">0</span><br />
                        <span class="small text-muted">0%</span>
                        <span class="fe fe-arrow-up text-success fe-12"></span>
                      </div>
                      <div class="col-6 col-lg-2 text-center py-4">
                        <p class="mb-1 small text-muted">Indicações concluídas</p>
                        <span class="h3">0</span><br />
                        <span class="small text-muted">0%</span>
                        <span class="fe fe-arrow-down text-danger fe-12"></span>
                      </div>
                    </div>
                    <div class="chartbox mr-4" style="overflow-x:auto">
                      <div id="areaChart"></div>
                    </div>
                  </div> <!-- .card-body -->
                </div> <!-- .card -->
              </div>
              <div class="row items-align-baseline">
                <div class="col-md-12 col-lg-4">
                  <div class="card shadow eq-card mb-4">
                    <div class="card-body mb-n3">
                      <div class="row items-align-baseline h-100">
                        <div class="col-md-9 col-8 my-3">
                          <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Repasses</strong></p>
                          <h3>R$ 0,00</h3>
                          <p class="text-muted">Repasses referentes ao mês de {{now()->monthName}}</p>
                        </div>
                        <div class="col-md-3 col-4 my-3 text-center">
                        <span class="fe fe-32 fe-dollar-sign text-muted mb-0"></span>
                        </div>
                        <div class="col-md-6 border-top py-3">
                          <p class="mb-1"><strong class="text-muted">Realizado</strong></p>
                          <h4 class="mb-0">R$ 0,00</h4>
                        </div> <!-- .col -->
                        <div class="col-md-6 border-top py-3">
                          <p class="mb-1"><strong class="text-muted">Bloqueado</strong></p>
                          <h4 class="mb-0">R$ 0,00</h4>
                        </div> <!-- .col -->
                      </div>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->
                <div class="col-md-12 col-lg-8">
                <div class="card shadow">
                    <div class="card-header">
                      <strong class="card-title">Links mais acessados</strong>
                      <a class="float-right small text-muted" href="#!">Ver todos</a>
                    </div>
                    <div class="card-body">
                        @if($links)
                      <div class="list-group list-group-flush my-n3 text-md-left text-center">
                          @foreach($links as $link)
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-md-auto mb-md-0 mb-1">
                              <span class="fe fe-globe fe-24"></span>
                            </div>
                            <div class="col-md mb-md-0 mb-2">
                              <small><strong>{{$link->url}}</strong></small>
                              <div class="my-0 text-muted small">{{$link->titulo}}</div>
                            </div>
                            <div class="col-md-auto">
                              <small class="badge badge-pill badge-primary text-white pt-2">{{$link->totalAcesso}} visualizações</small>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div> <!-- / .list-group -->
                        @endif
                    </div> <!-- / .card-body -->
                  </div>
                </div>
              </div> <!-- .row -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
@endsection

<?php
$month = date('m');
$year = date('Y');

$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);
$final_date = strtotime(date('d-m-Y'));

$end_time = strtotime("+1 day", $final_date);
$num = 1;
for($i=$start_time; $i<$end_time; $i+=86400)
{
    $totais[] = isset($acessos[$num]) ? count($acessos[$num]) : 0;
   $list[] = date('Y-m-d', $i).' GMT';
   $num++;
}

?>
<script>
var totais = [<?php echo implode(", ", $totais); ?>];
var diasMes = [<?php echo "'" . implode("','", $list) . "'"; ?>];
</script>

@section('footer')
<script src="{{ asset('tinydash/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/apexcharts.custom.js') }}"></script>
<script>

      $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });

      $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
      $('.input-phoneus').mask('(00) #0000-0000');
      $('.input-mixed').mask('AAA 000-S0S');
      $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function()
      {
        'use strict';
        window.addEventListener('load', function()
        {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form)
          {
            form.addEventListener('submit', function(event)
            {
              if (form.checkValidity() === false)
              {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script>
      var uptarg = document.getElementById('drag-drop-area');
      if (uptarg)
      {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
        {
          endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) =>
        {
          console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
      }
    </script>
@endsection
