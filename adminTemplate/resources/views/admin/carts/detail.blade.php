@extends('admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            <li>Customer Name: <strong>{{ $customer->name }}</strong></li>
            <li>Phone: <strong>{{ $customer->phone }}</strong></li>
            <li>Adress: <strong>{{ $customer->address }}</strong></li>
            <li>
               @foreach ($adr_customers as $adr_customer)
                    CiTy: <strong>{{ $adr_customer->tenTP }}</strong>
                    District: <strong>{{ $adr_customer->tenQH }}</strong>
                    Ward: <strong>{{ $adr_customer->tenPX }}</strong>
               @endforeach
            </li>
            <li>Email: <strong>{{ $customer->email }}</strong></li>
            <li>Content: <strong>{{ $customer->content }}</strong></li>
        </ul>
    </div>

    <div class="carts">
        @php $total = 0; @endphp
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">IMG</th>
                <th class="column-2">Product</th>
                <th class="column-3">Price</th>
                <th class="column-4">Quantity</th>
                <th class="column-5">Size</th>
                <th class="column-5">Color</th>
                <th class="column-5">Payment Pethods</th>
                <th class="column-5">Active</th>
                <th class="column-6">Total</th>
            </tr>

            @foreach($carts as $key => $cart)
                @php
                    $price = $cart->price * $cart->pty;
                    $total += $price;
                @endphp
                <tr>
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px">
                        </div>
                    </td>
                    <td class="column-2">{{ $cart->product->name }}</td>
                    <td class="column-3">{{ number_format($cart->price, 0, '', '.') }}</td>
                    <td class="column-4">{{ $cart->pty }}</td>
                    <td class="column-5">
                        @foreach ($S_customers as $key => $Size)
                            {{$Size->tensize}}
                        @endforeach
                    </td>
                    <td class="column-5">
                        @foreach ($M_customers as $key => $Mau)
                            {{$Mau->tenmau}}
                        @endforeach
                    </td>
                    <td class="column-6">
                        @foreach ($ctcart as $key => $cts)
                        {{$cts->tenthanhtoan}}
                    @endforeach
                        
                    <td class="column-7">
                        @foreach ($ctcart as $key => $cts)
                        {{$cts->tenTT}}
                    @endforeach
                    </td>
                    <td class="column-8">{{ number_format($price, 0, '', '.') }}</td>
                </tr>
            @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="4" class="text-right" style="font-size:20px; font-family: emoji;
                        font-weight: bold;">
                        Total Money:
                    </td>
                    <td style="font-size:20px; font-family: emoji; font-weight: bold;">
                        {{ number_format($total, 0, '', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection


