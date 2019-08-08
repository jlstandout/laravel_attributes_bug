@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <pre>
                        {{var_dump($user->toArray())}}
                    </pre>
                    <form method="POST" action="/home">
                        @csrf

                        <div class="form-group row">
                            <label for="size" class="col-md-4 col-form-label text-md-right">Size attribute</label>

                            <div class="col-md-6">
                                <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ $user->size }}" autocomplete="size" autofocus>
                                @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="favorite_numbers" class="col-md-4 col-form-label text-md-right">Favorite numbers separated by comma</label>

                            <div class="col-md-6">
                                <input id="favorite_numbers" type="text" class="form-control @error('favorite_numbers') is-invalid @enderror" name="favorite_numbers" value="{{ ($value = json_decode($user->favorite_numbers)) ? implode(', ', $value) : '' }}" autocomplete="favorite_numbers" autofocus>
                                @error('favorite_numbers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a class="btn pull-right" href="/clear_cache">Clear cache</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
