@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('order.store') }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                @php
                /** @var \App\Models\Products\Order $order */
                @endphp
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Заказ
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="card-title"></div>
                                    <div class="card-subtitle mb-2 text-muted"></div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#add_data" role="tab">Дополнительные данные</a>
                                        </li>
                                    </ul>
                                    <br>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="maindata" role="tabpanel">
                                            <div class="form-group">
                                                <label for="product">Название</label>
                                                <input name="product" value="{{ $product->name }}"
                                                    id="product"
                                                    type="text"
                                                    class="form-control"
                                                    minlength="3"
                                                    required
                                                    disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Цена</label>
                                                <input name="price"
                                                    id="price"
                                                    class="form-control"
                                                    value="{{ $product->price}}" disabled>
                                                <input name="product_id" type="hidden"
                                                    class="form-control"
                                                    value="{{ $product->id}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Статус</label>
                                                <input name="status"
                                                    id="status"
                                                    class="form-control"
                                                    value="Новый" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="comment">Комментарий</label>
                                                <textarea name="comment"
                                                    id="comment"
                                                    class="form-control"
                                                    rows="20">{{ $order->comment ?? old('comment') }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="add_data" role="tabpanel">
                                            <div class="form-group">
                                                <label for="customer">Покупатель</label>
                                                @if (!empty($customer))
                                                <input name="customer"
                                                    id="customer"
                                                    class="form-control"
                                                    value="{{ $customer }}" disabled>
                                                @else
                                                <input name="customer"
                                                    id="customer"
                                                    class="form-control"
                                                    value="{{ $customer ?? old('customer') }}"
                                                    required>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="amount">Количество</label>
                                                <input name="amount" value="1"
                                                    id="amount"
                                                    type="number"
                                                    min=1
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-primary">Заказать</button>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
                {{ $errors->first() }}
            </div>
        </div>
    </div>
    @endif

    @if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-success" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
    @endif
</div>
@endsection