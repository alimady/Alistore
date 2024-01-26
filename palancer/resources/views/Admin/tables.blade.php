@extends('Admin.dashboard.layout')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-chart-bar"></i> Tables </h2>
        </div>
    </div>



   <br/>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Salones -->
                        <form method="GET" action="">
                            <select style="margin: auto auto 15px auto; width: 50%;" class="form-control" name="salon" onchange="">

                                <option value="zzz">ss</option>

                            </select>
                        </form>

                        <!-- Tables -->
                        <table class="table table-striped mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>qr</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">table A</th>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="slug" value="{{ $slug?? '' }}">
                                            <button class="btn btn-info" type="submit">generate</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

         <div class="col-lg-6">

            <div class="card" style="text-align: center">
                <div class="card-body">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/d/d0/QR_code_for_mobile_English_Wikipedia.svg" class="mrT20">

                    <form action="" id="qrcode_form" enctype="multipart/form-data" method="get" class="mrT30">
                       
                        <button id="action_button" type="submit" class="btn btn-info w-md">
                            <li class="bx bxs-download"></li> &nbsp;
                            download
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

 