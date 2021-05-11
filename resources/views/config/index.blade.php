@extends('layouts.dash')
@section('header')
<link rel="stylesheet" href="{{ asset('tinydash/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                    <h2 class="h3 mb-0 page-title">Configurações</h2>
                    </div>
                    <div class="col-auto">
                    </div>
              </div>

              <!-- TABELA -->
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">

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
