const base=location.protocol+'//'+location.host;
const route=document.getElementsByName('routeName')[0].getAttribute('content');
const csrfToken=document.getElementsByName('csrf-token')[0].getAttribute('content');
//const currency=document.getElementsByName('currency')[0].getAttribute('content');
//const auth=document.getElementsByName('auth')[0].getAttribute('content');
var products_list_ids_temp=[];
var page=1;
var http=new XMLHttpRequest();
const load_more_products=document.getElementById('load_more_products');
const loader=document.getElementById('loader');
const products_list=document.getElementById('products_list');



 console.log("yyyyyyyyyy")

   window.onload=function(){
    loader.style.display='none';
    }
document.addEventListener('DOMContentLoaded',function(){
     
 if(load_more_products){
    load_more_products.addEventListener('click',function(e){
            e.preventDefault();
            load_products();

        });
    }

if (route=="home"){
load_products('home');
}

}
);



function load_products(section){
    url=base+'/products?page='+page;
    http.open('GET',url,true);
    http.setRequestHeader('X-CSRF-TOKEN',csrfToken);
    http.send();
    http.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            page=page+1;
            var data=this.responseText;
            data=JSON.parse(data);
            if(data.length==0 ){
                load_more_products.style.display='none';

            }

            if(data.next_page_url==null){
                load_more_products.style.display='none';
            }

            data.data.forEach(function(product,index){
            products_list_ids_temp.push(product.id);
             var div="";
             div+='<div class="product">';
             div+='<div class="image">';
             div+='<div class="overlay">';
             div+='<div class="btns">';
            div+='<a href=""><i class="fas fa-cart-plus"></i></a>';
             div+='</div>';
             div+='</div>';
             div+='<img  class="image" src="'+product.image+'">'
             div+='</div>';
              div+='<div class="title">'+product.name+'</div>';
             div+='<div class="price">'+product.price+'$</div>';
             div+='<div class="options"></div>';
             div+='</a>';
             div+='</div>';
             products_list.innerHTML+=div;
             });
             products_list_ids_temp=[];
        }



    }

}

  