@extends('Admin.dashboard.layout')
@section('title','Products')
@section('breadcrumb')
<li class="breadcrumb-item">
  <a href=""><i class="far fa-folder-open" style="margin-right: 4px"></i>Products</a>
</li>
@endsection


@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="panel shadow">
        <div class="header">
          <h2 class="title"><i class="fas fa-plus" style="margin-right: 4px"></i>Add Product</h2>
        </div>

        <div class="inside">

          {!! Form::open(['url' => '#','files'=>'true','class'=>'form-submit']) !!}
          <label for="name">Product Name:</label>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
              <i class="far fa-keyboard"></i>
            </span>
            {!! Form::text('name',null,['class' => 'form-control']) !!}
          </div>

          <!-- <label for="parent" class="mtop16">Parent category :</label>
           
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
              <i class="far fa-keyboard"></i>
            </span>
            
            
          </div> -->

          <label for="name" class="mt-3">Product Description:</label>
          <div class="input-group ">
            <span class="input-group-text" id="basic-addon1">
              <i class="far fa-keyboard"></i>
            </span>
            {!! Form::textarea('name',null,['class' => 'form-control','rows' => 3]) !!}
          </div> 

          <label for="type" class="mtop16">Status:</label>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
              <i class="far fa-keyboard"></i>
            </span>
            {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive']); !!}
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
            <a class="nav-link" href=""><i class="fas fa-list"></i> --</a>
          </nav>
          <table class="table mtop16">

            <thead>
              <tr>
                <td width="64"></td>
                <td>ID</td>
                <td>Name</td>
                <td>Parent Id</td>
                <td>Created At</td>
                <td>Status</td>
                <td width="160"></td>
              </tr>
            </thead>
            <tbody class="categories">

            <tr>
                <td>
                  <img src="https://thumbs.dreamstime.com/b/businessman-icon-vector-male-avatar-profile-image-profile-businessman-icon-vector-male-avatar-profile-image-182095609.jpg" class="img-fluid">
                </td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                 

                <td>
                  <div class="modef">
                    <a href="" data-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i> </a>
                    <a href="" data-toggle="tooltip" class="delete-action" data-bs-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('.form-submit').on('submit', function(event) {
      event.preventDefault()
      $.post($(this).attr('action'), $(this).serialize())
        .then(function(data) {

          $('.categories').append(
            `
        <tr>
                  <td>
                      <img src="https://thumbs.dreamstime.com/b/businessman-icon-vector-male-avatar-profile-image-profile-businessman-icon-vector-male-avatar-profile-image-182095609.jpg" class="img-fluid"> 
                  </td>
                  <td>${data.id}</td>
                  <td>${data.name}</td>
                  <td>${data.parent_id ?? ''}</td>
                  <td>${data.created_at}</td>
                  <td>${data.status}</td>
                  <td>
                    <div class="modef">
                      <a href="${'/categories/'+data.id+'/edit'}"  data-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i> </a>
                      <a href="${'/categories/delete/'+data.id}" data-toggle="tooltip" class="delete-action" data-bs-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a>
                      <a href="" data-toggle="tooltip" data-bs-placement="top" title="Sub categories"><i class="fas fa-list-ul"></i></a>
                    </div>
                  </td>
                 </tr>
          `
          )
        })
        .fail(function(response) {
          console.log('fail', response)
          Swal.fire(response.responseJSON.data.message);


        })
    })


  })
</script>


<script type="text/javascript">
  $(".categories").on('click', '.delete-action', function(event) {
    event.preventDefault()
    const url = $(this).attr('href')
    const $this = $(this)
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: url,
          data: {
            _token: '{{csrf_token()}}'
          },
          type: 'DELETE',

        }).done(function(response) {
          $this.parent().closest('tr').remove();
          swalWithBootstrapButtons.fire({
            title: "Deleted!",
            text: "Category has been deleted.",
            icon: "success"
          });
        });

      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire({
          title: "Cancelled",
          text: "Your imaginary file is safe :)",
          icon: "error"
        });
      }
    });
  })
</script>
@endsection