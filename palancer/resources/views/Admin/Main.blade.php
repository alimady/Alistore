@extends('Admin.dashboard.layout')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
     <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-chart-bar"></i> Quick stats</h2>
        </div>
    </div>

    <div class="row mtop16 col-md-12">
      <div class="col-md-3">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fas fa-users"></i> Registered users</h2>
            </div>
            <div class="inside">
                <div class="big_count" style="display: block; font-size:3em;width:100%;text-align:center;">{{ $users ?? ""}}

                </div>
            </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fas fa-boxes"></i> Listed products</h2>
            </div>
            <div class="inside">
                <div class="big-count" style="display: block; font-size:3em;width:100%;text-align:center;"> 

                </div>
            </div>
        </div>
      </div>

       <div class="col-md-3">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fas fa-shopping-cart"></i> Orders today</h2>
            </div>
            <div class="inside">
                <div class="big_count" style="display: block; font-size:3em;width:100%;text-align:center;">0

                </div>
            </div>
        </div>
      </div>


      <div class="col-md-3 ">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fas fa-credit-card"></i> Billed today</h2>
            </div>
            <div class="inside">
                <div id="big_count" style="display: block; font-size:3em;width:100%;text-align:center;">0
                </div>
            </div>
        </div>
      </div>
    </div>
     

    </div>
</div>

@endsection
