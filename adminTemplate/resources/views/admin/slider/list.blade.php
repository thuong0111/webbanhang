@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Title</th>
                <th>Links</th>
                <th>Image</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $key =>$slider)
                
            
                <tr>
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->name}}</td>
                    <td>{{$slider->url}}</td>
                    <td>
                        <a href="{{$slider->thumb}}" target="_blank">
                            <img src="{{$slider->thumb}}" alt="Err" width="50px">
                        </a>
                    </td>
                    <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                    <td>{{$slider->updated_at}}</td>
                    <td style="text-align: center; display:flex">
                        <a class="btn btn-primary btn-sm" href="/admin/sliders/add" style="width:30px">
                            <span class="icon" title="Add Slider"><i class="fas fa-plus"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{$slider->id}}" style="width:30px;margin: 0 2px 0 2px;">
                            <span class="icon" title="Edit Slider"><i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" 
                            onclick="removeRow({{$slider->id}}, '/admin/sliders/destroy')" style="width:30px">
                            <span class="icon" title="Delete Slider"><i class="fas fa-trash"></i>
                        </a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $sliders->links() !!}
@endsection