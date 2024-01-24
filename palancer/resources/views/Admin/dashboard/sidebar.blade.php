<div class="sidebar shadow">
    <div class="section_top">
        <div class="logo">
            <img src="{{ url('static/images/ali.png') }}" class="img-fluid" />
        </div>

        <div class="user">
            <span class="subtitle">Have a nice day ! </span>
            <div class="name">
                 <a href="{{ url('/logout') }}" data-toggle="tooltip" data-bs-placement="top" title="Logout"><i class="fas fa-sign-out-alt"></i> </a>
            </div>

            <div class="email"></div>
        </div>
    </div>

    <div class="main">
        <ul>
             <li>
                <a href="{{ url('/admin')   }}" class="lk-dashboard"><i class="fas fa-home"></i> Dashboard</a>
            </li>
           
            <li>
                <a href="{{ url('/admin/categories')   }}" class="{{ Route::currentRouteName('categories.*')? 'active' :'' }}"><i class="fas fa-folder-open"></i> Categories</a>
            </li>
            
            <li>
                <a href="{{ url('/admin/products/0')  }}" class="lk-products lk-product_add lk-edit_products lk-product_gallery_add lk-product_search "><i class="fas fa-boxes"></i> products</a>
            </li>
 
             <li>
                <a href="{{ url('/admin/orders/all')   }}" class="lk-orders_list"><i class="fas fa-clipboard-list"></i> Orders</a>
            </li>
           
            <li>
                <a href="{{ url('/admin/users/all')   }}" class="lk-mange_permission lk-users lk-user_edit"><i class="fas fa-user-friends"></i> Users</a>
            </li>
            
            <li>
                <a href="{{ url('/admin/slider')   }}" class="lk-slider"><i class="far fa-images"></i>Slider</a>
            </li>
            
            <li>
                <a href="{{ url('/admin/settings')   }}" class="lk-configuration"><i class="fas fa-cogs"></i> Configuration</a>
            </li>
         </ul>
    </div>
</div>
