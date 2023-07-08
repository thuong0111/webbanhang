
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('app/css/admin/main.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('app/images/logoDulich.ico') }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css') }}"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Booking App</title>
    <style type="text/css">
    .admin-button-list{
    /* line-height: 9rem; */
    padding: 1.5rem 0
}

.admin-button-list .cl-btn{
    margin-bottom: 1.5rem;
}
#title-data {
    font-size: 2rem;
    margin-top: 2rem;
    font-family: -webkit-body;
}

#title-data i {
    margin: auto 1rem;
    color: orange;
}

.admin-button-list div button{
border: none;
font-size: 1.8rem;
background: none;
color: #344767;
}
.admin-button-list .cl-btn .table{
line-height: 3;
font-size: 1.7rem;
margin-top: -1rem;
padding-left: 3rem;
}

.admin-button-list .cl-btn .table a {
text-decoration: none;
color: darkgreen;
}

#title-imglog {
    font-size: 1.6rem;
    display: flex;
    align-items: center;
    color: orange;
    font-family: -webkit-body;

    padding-right: 1rem;
    padding-left: 1rem;
}

.admim-header{
width: 18%;
/* padding-left: 3rem; */
height: fit-content;
border-right: solid 2px #D3D3D3;
border-left: solid 2px #D3D3D3;
border-bottom: solid 2px #D3D3D3;
border-top: solid 2px #D3D3D3;
}

.admin-app{
border-bottom: solid 2px #D3D3D3;

}

#body-admin {
background-color: #f8f9fa !important;
font-family: tahoma;
}

.admin-button-list .cl-btn button i {
box-shadow: 0px 0px 10px 1px #dcdcdc;
padding: 1rem;
border-radius: 12px;
color: blue;
}

#btn-table{
display: block;
border-radius: 5px;
margin: 0px 17px 0 26px;
box-shadow: inset 0px 0px 31px -36px;
margin-bottom: 3rem;
}

/* table */

.create a{
text-decoration: none;
color: navy;
font-weight: bold;
}

.create{
text-align: center;
width: 14.5rem;
border-radius: 7px;
background: red;
border: none;
box-shadow: 0px 0px 25px -3px;
padding: 20px;


margin-left: 73.5rem;
margin-top: 10rem;
margin-bottom: 4rem;
}

table, th, td {
border: 1px solid white;
border-collapse: collapse;
}
th, td {
background-color: #d3d3d338;
}

.table-main-right{
margin: auto 7rem;
font-size: 1.4rem;
}

.table-main-right .title-admin-table th {
    padding: 1rem;
    background-color: orange;
    color: white;
}

.content-admin-table th {
    font-size: 1.4rem;
    font-weight: 100;
    height: 11rem;
}

.content-admin-table th i {
    font-size: 2rem;
    padding: 13px;
}

.content-admin-table button {
    border: none;
    background: none;
}

.xem-chi-tiet {
    text-decoration: none;
    text-shadow: 2px 2px 8px #FF0000;
}
a:hover{
    color: red;
}

a{
    text-decoration: none;
    color: black;
    font-size: 20px;
    font-family: bold;

}
    </style>
</head>

<body id="body-admin">

    <div style="display: flex; margin-top: 135px">
        <header class="admim-header">
            <div class="admin-app">
               <div style="display: flex; justify-content: center; padding: 17px 0 0 0;">
                    <div><img style="width:4rem" src="{{asset('img/team-1.jpg')}}" alt=""></div>
                    <div id="title-imglog"><b>Thông Tin  <br> </b></div>
               </div>
            </div>
            <div class="admin-button-list">
                {{-- <div class="cl-btn">
                    <button> <i class="fa-solid fa-gauge"></i> <a href="{{ route('dashboard') }}"> Dashboard </a></button>
                </div> --}}
                <div class="cl-btn">
                    {{-- <button onclick="handelOnclickTable('btn-table') "> <i class="fa-solid fa-layer-group"></i> Tables </button> --}}
                    <i class="fa-solid fa-people-roof"></i> <a href="{{ route('profile') }}">Thông Tin</a> <br>
                    {{-- <div class="table" id="btn-table" style="display: none">
                        <i class="fa-solid fa-hotel"></i> <a href="{{ route('admin-hotel') }}"> Table Hotel </a> <br>
                        <i class="fa-solid fa-people-roof"></i> <a href="{{ route('admin-roomtype' )}}"> Table Roomtype </a> <br>
                        <i class="fa-brands fa-ups"></i> <a href="""> Tabel Service</a> <br>
                        <i class="fa-solid fa-street-view"></i> <a href="{{ route('admin-address' )}}"> Table Address </a> <br>
                    </div> --}}
                </div>

                <div class="cl-btn">
                    <i class="fa-regular fa-message"></i> <a href="{{route('history_order') }}"> Lịch Sử Đặt Hàng </a> <br>

                    {{-- <button onclick="handelOnclickBilling('admin-billing')"> <i class="fa-solid fa-file-invoice-dollar" style="padding-left: 1.3rem; padding-right: 1.3rem;"></i> Billing </button> --}}
                    {{-- <div class="table" id="admin-billing" style="display: none; margin-top:1rem">
                        <i class="fa-brands fa-hornbill"></i> <a href="{{ route('getAllBill') }}"> Bill </a> <br>
                        <i class="fa-regular fa-message"></i> <a href="{{ route('getAllFeedback' )}}"> Feedback </a> <br>
                        <i class="fa-regular fa-rectangle-xmark"></i> <a href="{{ route('getAllCancelReservation') }}"> Cancel Reservation </a> <br>
                    </div> --}}
                </div>

                <div class="cl-btn">
                {{-- <button> <i class="fa-solid fa-id-card-clip"></i> <a style="text-decoration: none" href=" {{ route('admin-profile') }} "> Profile </a> </button> --}}
                </div>
                <div class="cl-btn">

                    {{-- <button onclick="handelOnclickDiagram('admin-diagram')"> <i class="fa-solid fa-chart-line"></i> Diagram </button> --}}
                    {{-- <div class="table" id="admin-diagram" style="display: none; margin-top:1rem">
                        <i class="fa-solid fa-hotel"></i> <a href="{{ route('admin-hotel') }}"> Hotel Statistics </a> <br>
                        <i class="fa-solid fa-cart-shopping"></i> <a href="{{ route('admin-roomtype' )}}"> Payment Statistics </a> <br>
                        <i class="fa-solid fa-user-clock"></i> <a href="""> User Statistics </a> <br>
                        <i class="fa-solid fa-chart-pie"></i> <a href="{{ route('admin-address' )}}"> Revenue Statistics </a> <br>
                    </div> --}}
                </div>
            </div>
        </header>

        <main style="width:80%">

            @yield('main-admin')

        </main>

        {{-- @include('') --}}

    </div>

</body>

<script src="{{ asset("app/js/display/admin/main.js") }}"></script>

</html>