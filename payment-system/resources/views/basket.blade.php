@inject('basket', 'App\Support\Basket\Basket')
@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
    @if($items->isEmpty())
    <div class="alert alert-secondary" role="alert">
        محصولی در سبد خرید وجود ندارد.
        می توانید برای ادامه خرید به صفحه <a href="{{ route('products.index') }}">محصولات </a>بروید.
      </div>
    @else
    <div class="col-md-8">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">نام محصول</th>
                <th scope="col">قیمت</th>
                <th scope="col">تعداد</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($items as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ number_format($item->price) }} ریال</td>
                    <td>
                        <form action="{{ route('basket.update', $item->id) }}" method="POST" class="form-inline d-flex flex-row">
                            @csrf
                            <select name="quantity" id="quantity" class="form-control input-sm mr-sm-2">
                            @for($i=0; $i<=$item->stock; $i++)
                                <option {{ $item->quantity == $i ? 'selected':''}} >{{ $i }}</option>
                            @endfor
                            </select>
                            <button type="submit" class="btn btn-primary btm-sm">به روز رسانی</button>
                        </form>
                    </td>
              </tr>
                @endforeach


            </tbody>
          </table>
    </div>
    <div class="col-md-4">
        <table class="table">
            <thead>
              <tr>
                <th scope="row">پرداخت </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>مبلغ کل</td>
                <td>{{ number_format($basket->totalPrice()) }} ریال</td>
              </tr>
            </tbody>
          </table>
          <a type="button" class="btn btn-primary position-relative" href="{{ route('basket.index') }}">
           ثبت و ادامه

        </a>
    </div>
    @endif
</div>
</div>



  @endsection
