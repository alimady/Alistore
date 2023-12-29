@extends('Admin.dashboard.layout')
@section('title','Categories')
@section('breadcrumb')
<li class="breadcrumb-item">
<a href="{{ url('/admin/categories/0') }}" ><i class="far fa-folder-open" style="margin-right: 4px"></i>Categories</a>
</li>
@endsection


@section('content')
<div class="container-fluid">
   <div class="row">
       <div  class="col-md-3">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fas fa-plus" style="margin-right: 4px"></i>Add Category</h2>
            </div>

           <div class="inside">
 
             {!! Form::open(['url' => '','files'=>'true'])  !!}
             <label for="name">Category Name:</label>
             <div class="input-group">
                     <span class="input-group-text" id="basic-addon1">
                         <i class="far fa-keyboard"></i>
                     </span>
                 {!! Form::text('name',null,['class' => 'form-control'])  !!}
             </div>

             <label for="parent" class="mtop16">Parent category :</label>

             <div class="input-group">
                     <span class="input-group-text" id="basic-addon1">
                         <i class="far fa-keyboard"></i>
                     </span>
              <select name="parent" class="form-select">
                 <option value="0">Without category</option>
               <option value="{{ $cat->id?? '' }}"></option>
               </select>
             </div>


             <label for="type" class="mtop16">Type:</label>
             <div class="input-group">
                     <span class="input-group-text" id="basic-addon1">
                         <i class="far fa-keyboard"></i>
                     </span>
                    {{-- {!! Form::select('type',gettypesarray(),$type??'',['class' => "form-select",'disabled']) !!} --}}
                </div>

                <label for="img" class="mtop16">Icon:</label>
                <div class="custom-file">
                    {!! Form::file('icon',['class' => 'custom-file-input','id' =>'customFile' ,'accept' => 'image/*']) !!}
                    <label class="custom-file-label" for="customFile">Choose image</label>
                </div>
                {!! Form::submit('Save',['class' => 'btn btn-success mtop16'] ) !!}

             {!! Form::close() !!}
            </div>
        </div>

       </div>

       <div class="col-md-9">
        <div class="panel shadow">
            <div class="header">
             <h2 class="title"><i class="far fa-folder-open" style="margin-right: 4px"></i>Categories</h2>

            </div>
          <div class="inside">
              <nav class="nav nav-pills nav-fill">
               <a  class="nav-link" href=""><i class="fas fa-list"></i> {{ $k??'' }}</a>
             </nav>
              <table class="table mtop16">

                <thead>
                    <tr>
                        <td width="64"></td>
                        <td>Name</td>
                        <td width="160"></td>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>
                     {{-- <img src="{{ url('/uploads/'.$cat->file_path.'/'.$cat->icon) }}" class="img-fluid"> --}}
                     </td>

                  <td> ooo</td>
                  <td>
                    <div class="modef">
                      <a href="" data-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i> </a>
                      <a href="" data-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a>
                      <a href="" data-toggle="tooltip" data-bs-placement="top" title="Sub categories"><i class="fas fa-list-ul"></i></a>
                    </div>

                  </td>
                 </tr>
 
                </tbody>

              </table>


          </div>

        </div>
    </div>

   </div>


</div>
@endsection
