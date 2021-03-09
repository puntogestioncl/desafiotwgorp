@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Publicación') }}</div>
                    <div class="card-body">
                        <h4>{{ $publication->title }}</h4>
                        <p>{{ $publication->content }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                @foreach($publication->comment as $comment)
                <div class="card mt-2">
                    <div class="card-header">{{ __('Comentario') }} de: {{ $comment->user->name }}
                    <span class="float-right">{{ $comment->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div class="card-body">
                        {{ $comment->content }}
                    </div>
                </div>
                @endforeach
            </div>
            @if(auth()->user()->hasComments($publication->id))
                <div class="col-md-12 mt-5">
                    {!! Form::open(['route' => 'comments.store', 'method' => 'POST', 'id' => 'form']) !!}
                    {!! Form::hidden('id', $publication->id, []) !!}
                    <div class="form-group">
                        {!! Form::label('comment', 'Ingrese su Comentario', ['class' => 'control-label']) !!}
                        {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'placeholder' => 'Escriba aquí...', 'rows' => 5]) !!}
                        @error('comment')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {!! Form::submit('ENVIAR', ['class' => 'mt-3 btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            @endif

        </div>
    </div>
@endsection
