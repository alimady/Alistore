<div class="sidebar shadow">
    <div class="section_top">
        <div class="logo">
            <img src="{{ url('static/images/ali.png') }}" class="img-fluid" />
        </div>

        <div class="user">
            <span class="subtitle">Have a nice day ! </span>
           
            <div class="name">
            <a   data-toggle="tooltip" data-bs-placement="top" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }} &nbsp;<i class="fas fa-sign-out-alt"></i> </a>
            </div>

            <form  action="{{ route('admin.logout') }}" style="visibility: hidden;" method="POST" id="logout-form" >
                    @csrf                
                </form>
            <div class="email"></div>
        </div>
    </div>

    <div class="main">
        <ul>
             <li>
                <a href="{{ url('/admin/dashboard')   }}" class="{{ Route::is('dashboard*')? 'active' :'' }}"><i class="fas fa-home"></i> Dashboard</a>
            </li>
           
            <li>
                <a href="{{ url('admin/dashboard/products')   }}" class="{{ Route::is('products*')? 'active' :'' }}"><i class="fas fa-folder-open"></i> Products</a>
            </li>

            <li>
                <a href="{{ url('/admin/orders')   }}" class="{{ Route::is('orders*')? 'active' :'' }}"><i class="fas fa-clipboard-list"></i> Orders</a>
            </li>
            
            <li>
                <a href="{{ url('/admin/tables')   }}" class="{{ Route::is('tables*')? 'active' :'' }}"><i class="fas fa-clipboard-list"></i>  Tables </a>
            </li>
 
            
           
           
            
             
         </ul>
    </div>
</div>
