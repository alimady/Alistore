@extends('Admin.dashboard.layout')
@section('title',' Edit Categories')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/categories') }}"><i class="far fa-folder-open" style="margin-right: 4px;"></i>Categories</a>
</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-edit"></i>Edit Category</h2>
                </div>
                <form action="{{ route('categories.update',$category->id) }}" class="form-submit" enctype="multipart/form-data">
                    @csrf
                    <div class="inside">
                        <label for="name">Category Name:</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                            {!! Form::text('name',$category->name,['class' => 'form-control']) !!}
                        </div>

                        <label for="parent" class="mtop16">Parent category :</label>

                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                            <select name="parent_id" class="form-select">
                                <option value="">Without category</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" @if($cat->id==$category->parent_id) selected @endif>{{ $cat->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="type" class="mtop16">Status:</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                            {!! Form::select('status',['active' => 'Active', 'inactive' => 'Inactive'],$category->status); !!}
                        </div>

                        <label for="img" class="mtop16">Icon:</label>
                        <div class="custom-file">
                            {!! Form::file('icon',['class' => 'custom-file-input','id' =>'customFile' ,'accept' => 'image/*']) !!}
                            <label class="custom-file-label" for="customFile">Choose image</label>
                        </div>
                        {!! Form::submit('Save',['class' => 'btn btn-success mtop16'] ) !!}
                    </div>
            </div>
        </div>

        </form>
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-edit"></i>Icon</h2>
                </div>

                <div class="inside">
                    <img src="https://thewellco.co/wp-content/uploads/2022/03/HM-Conscious-Collection-Organic-Baby-Clothes.jpeg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.form-submit').on('submit', function(event) {
        event.preventDefault()
        const url = $(this).attr('action')
        console.log(url)
        $.ajax({
            url: $(this).attr('action'),
            dataType: "json",
            data: $(this).serialize(),
            type: 'PUT',
            success: function(response) {
                console.log(response)
            }
        });


        // $.post($(this).attr('action'), $(this).serialize())
        //     .done((data) => {
        //         console.log(data)
        //         $(':text').text(data.name)
        //         $('img').attr('src', 'https://www.realsimple.com/thmb/QHkrGeiLf4vEV5342LyWEmv5cvI=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/Real-Simple-work-clothes-for-women-affordable-v1-951a9c4310ee4db59e64f2f66b0fdcfe.jpg')
        //     })
    })
</script>
@endsection