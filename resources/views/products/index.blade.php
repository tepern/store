@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Цена, руб.</th>
                                    <th>Категория</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $product)
                                @php
                                    /** @var \App\Models\Products\Product $product */
                                @endphp
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfood></tfood>
                        </table>
                    </div>
                </div>
            </div>
            @if($paginator->total() > $paginator->count())
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{ $paginator->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection