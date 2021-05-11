@extends('layouts.dash')
@section('header')
<link rel="stylesheet" href="{{ asset('tinydash/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<div class="container-fluid">
@if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
          <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                    <h2 class="h3 mb-0 page-title">Empreendimentos</h2>
                    </div>
                    <div class="col-auto">
                    <a href="{{route('empreendimentos.update')}}" class="btn btn-primary"><span class="fe fe-filter fe-12 mr-2"></span>Atualizar lista</a>
                    </div>
              </div>

              <!-- TABELA -->
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Link</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if($empreendimentos)
                            @foreach($empreendimentos as $ac)
                          <tr>
                            <td>{{$ac->post_id}}</td>
                            <td><span class="avatar-lg"><img src="{{asset($ac->foto)}}" alt="{{$ac->titulo}}" class="avatar-img"></span></td>
                            <td>{{$ac->titulo}}</td>
                            <td>{{$ac->categoria}}</td>
                            <td><a href="{{$ac->link}}" target="_blank" rel="noopener noreferrer">{{$ac->link}}</a></td>
                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Visualizar</a>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div>
              <!-- END TABELA -->

            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
@endsection
@section('footer')
<script src="{{ asset('tinydash/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>
      $('#dataTable-1').DataTable(
      {
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese.json"
        },
        autoWidth: true,
        "lengthMenu": [
          [16, 32, 64, -1],
          [16, 32, 64, "Todos"]
        ],
      });
    </script>
@endsection
