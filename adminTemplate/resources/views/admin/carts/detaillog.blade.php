@extends('admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            @foreach ( $cthd as $cthds)
            <li>Tên: <strong>{{ $cthds->name }}</strong></li>
            <li>SĐT: <strong>{{ $cthds->phone }}</strong></li>
            <li>Địa Chỉ: <strong>{{ $cthds->address }}</strong></li>
            <li>Email: <strong>{{ $cthds->email }}</strong></li>
            <li>Ghi Chú: <strong>{{ $cthds->content }}</strong></li>
            @endforeach
        </ul>
    </div>

    <div class="carts">
        
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">Image</th>
                <th class="column-2">Name Product</th>
                <th class="column-3">Price</th>
                <th class="column-4">Quantity</th>
                <th class="column-5">Size</th>
                <th class="column-5">Color</th>
                <th class="column-6">Total</th>
            </tr>

            @foreach($ctproducts as $key => $ctproduct)
                
                <tr>
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="{{ $ctproduct->thumb }}" alt="IMG" style="width: 100px">
                        </div>
                    </td>
                    <td class="column-2">{{ $ctproduct->name }}</td>
                    <td class="column-3">{{ number_format($ctproduct->price, 0, '', '.') }}</td>
                    <td class="column-4">{{ $ctproduct->SL }}</td>
                    <td class="column-5">
                        @foreach ($sizes as $key => $Size)
                            {{$Size->size}}
                        @endforeach
                    </td>
                    <td class="column-5">
                        @foreach ($maus as $key => $Mau)
                            {{$Mau->mau}}
                        @endforeach
                    </td>
                    <td class="column-6">{{ number_format($ctproduct->thanhtien, 0, '', '.') }}</td>
                </tr>
            @endforeach
                {{-- <tr>
                    <td></td>
                    <td></td>
                    <td colspan="4" class="text-right" style="font-size:20px; font-family: emoji;
                        font-weight: bold;">
                        Total Money
                    </td>
                    <td style="font-size:20px; font-family: emoji; font-weight: bold;">
                        {{ number_format($total, 0, '', '.') }}
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
@endsection


