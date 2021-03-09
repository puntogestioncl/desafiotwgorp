@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Contenido</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function (){
            $('.table').dataTable({
                processing: true,
                serverSide: true,
                ajax: 'listPost',
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'content', name: 'content'},
                    {data: 'actions', name: 'actions'},
                ]
            });
        })
    </script>
@endsection
