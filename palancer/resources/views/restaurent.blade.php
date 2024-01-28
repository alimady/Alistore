@extends('layouts.Home')
 @section('title')
 Home
 @endsection
 @section('cssFile')
 /site.css
 @endsection
 

 @section('content')
 <section>
<div class="home_action_bar">
    <div class="row">
        <div class="col-md-9">
            {!! Form::open(['url'=> '/search']) !!}
            <div class="input-group">
                <i class="fas fa-search"></i>
                {!! form::text('search_query',null,['class'=>'form-control search_field','placeholder'=>'Are you looking for something?','required']) !!}
                 <button class="btn" type="submit" id="button-addon2">Search</button>
              </div>
              {!! Form::close() !!}
        </div>
    </div>
</div>
</section>

 
<section>
<div class="container">

    <div id="products_list">
     </div>
     
    <div class="load_more_products">
      <a href="" id="load_more_products"> viewmore </a>
    </div>
</div>

</section>
@endsection
