@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Products\Product $product */
    @endphp
    <div class="container">
        <div class="card">
            <div class="card-body">
            @if($product->exists)
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8">
                        <span>Код {{ $product->id }}</span>
                        <h1 class="mt-2 mb-2"><span class="h2"><b>Название:</b><span> {{ $product->name }}</h1>
                        <h3 class="mt-2 mb-2"><b>Категория:</b> {{ $product->category->name }}</h3>
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="col-md-3">
                        <h2 class="mb-2">Цена {{ $product->price }} руб.</h2>
                        <a type="button" href="{{ route('order', $product->id) }}" class="btn btn-primary btn-lg">Заказать</a>
                    </div>
                </div>   
            @endif
            </div>
        </div>                         
    </div>
@endsection 