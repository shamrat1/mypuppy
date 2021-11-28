@extends('layouts.app')

@section('content')

<style>
    ul {
        list-style-type: none;
    }
    /*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}
    .autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
    
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Products </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">          
            <div class="bg-dark-gray border rounded border-dark mb-3 p-3">
                
                <a href="{{ url('products/create') }}" class="pull-right btn btn-success text-uppercase">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>  Add Product
                </a>
                </div>

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    <div class="card bg-dark-gray border rounded border-dark">
                        <div class="card-header">
                            <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fas fa-mobile-alt"></i> Products</h3>
                        </div>
                        
   
  
                        <div class="card-header">
                                    

                            <span class="searchAlign">  
                                <div id="editor"></div>
                                <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-success" onclick="exportTableToExcel('myTable')">Excel</button>
                                    <button type="button" class="btn btn-success" onclick="createPDF()" id="btPrint" > PDF</button>
                                
                                </div></span>
                             <form autocomplete="off" action="{{ url('search') }}" method ="GET">
                                @csrf
                               
                                <span class="autocomplete" style="width:300px;float: right;">
                                      
                                    <input type="text" style="padding: 4px;padding-bottom: 8px;" name="myData" id="myInput" class="search"  placeholder="Search..">
                                    <button type="submit"  class="btn btn-outline-secondary" onclick="search()">Search</button>
                                
                                </span>
                            </form>
                            </div>
                <div id="tab">
                    <h5 class="text-left m-3 p-3 bg-success text-light text-uppercase">All {{ $products->total()}} Products </h5> 
            
                
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sub-Category</th>
                        <th scope="col">Sub-Category Type</th>
                        <th scope="col">Product Type</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
     
            
            @if($products->count())
                @foreach($products as $product)
                <tbody>
                    <tr>
                        <td>
                           {{ $product->id }}
                        </td>
                        <td>{{$product->name}}</td>
                        <td>
                          <?php $selCategory= App\Models\Category::findOrFail($product->category); ?>  
                            {{$selCategory->category_name}}</td>
                        <td>
                             <?php $selSubCategory= App\Models\SubCategory::findOrFail($product->subcategory); ?>  
                            {{ $selSubCategory->subcategoryname }} </td>
                        <td>
                            <?php $selSubCategoryType= App\Models\SubCategoryType::findOrFail($product->subcategory_type); ?> 
                            {{$selSubCategoryType->subcategory_type}}</td>
                        
                            @if($product->product_type!="")
                            <td>   
                                <?php $selProductType= App\Models\ProductType::findOrFail($product->product_type); ?> 
                                {{$selProductType->product_type}}
                            </td>
                            @else
                             <td class="alert-danger p-2">Empty  
                            </td>   
                            @endif
                        <td>
                            <div class="row">
                                <div class="column p-2"><a href="{{ route('product.gallery',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-success" title="Gallery"><i class="fas fa-image" aria-hidden="true"> Gallery</i></a></div>
                                <div class="column p-2"><a href=" {{ route('product.size',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-success"  title="Size" ><i class="far fa-edit" aria-hidden="true"> Size</i></a></div>
                                <div class="column p-2"><a href=" {{ route('product.show',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-success"  title="Show" ><i class="fa fa-eye" aria-hidden="true"> Show</i></a></div>
                                <div class="column p-2"><a href=" {{ route('product.edit',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-success"  title="Edit" ><i class="far fa-edit" aria-hidden="true"> Edit</i></a></div>
                                
                                <?php
                                  $check = DB::table('new_prods')
                                          ->where('new_id', '=', $product->id)
                                          ->first();

                                  if($check ==''){
                                  ?>
                                      <div class="column p-2"><a href=" {{ route('product.add_to_New',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-dark"  title="Add To New Product List" ><i class="fas fa-star">Add to New</i></a></div>
                                  <?php } else {?>
                                <div class="column p-2"> 
                                          <a href=" {{ route('product.remove_from_new',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-danger"  title="Remove From New Product List" ><i class="fas fa-star-half-alt"></i> Remove From New</a></div>
                                  <?php }?>
                                
                                <?php
                                  $check = DB::table('sales')
                                          ->where('sale_id', '=', $product->id)
                                          ->first();

                                  if($check ==''){
                                  ?>
                                      <div class="column p-2"><a href=" {{ route('product.add_Sale',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-dark"  title="Sales" ><i class="fas fa-star">Add to Sales</i></a></div>
                                  <?php } else {?>
                                      <div class="column p-2"> 
                                          <a href=" {{ route('product.remove_Sale',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-danger"  title="Remove From Sales" ><i class="fas fa-star-half-alt"></i> Remove From Sales</a></div>
                                  <?php }?>
                                  
                                  <?php
                                  $check = DB::table('favourites')
                                          ->where('fav_id', '=', $product->id)
                                          ->first();

                                  if($check ==''){
                                  ?>
                                      <div class="column p-2"><a href="{{ route('product.add_favourite',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-primary"  title="Add to Best Selling" ><i class="fas fa-star">Add to Best Selling</i></a></div>
                                  <?php } else {?>
                                      <div class="column p-2"> 
                                          <a href="{{ route('product.remove_favourite',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-danger"  title="Remove From Best Selling" ><i class="fas fa-star-half-alt"></i> Remove From Best Selling</a></div>
                                  <?php }?>
                                  
                                  <?php
                                  $check = DB::table('monthly_sales')
                                          ->where('sale_id', '=', $product->id)
                                          ->first();

                                  if($check ==''){
                                  ?>
                                      <div class="column p-2"><a href=" {{ route('product.add_monthlySale',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-primary"  title="Add to Monthly Sale" ><i class="fa fa-calendar-check" aria-hidden="true"></i> Add to Monthly Sale</a></div>
                                  <?php } else {?>
                                      <div class="column p-2"> 
                                          <a href=" {{ route('product.remove_monthlySale',$product->id) }}" class="btn btn-sm rounded-pill btn-outline-danger"  title="Remove From Monthly Sale" ><i class="fa fa-calendar-times" aria-hidden="true"></i> Remove From Monthly Sale</a></div>
                                  <?php }?>
                                  
                                <div class="column p-2"><a id="{{$product->id}}" href="{{ route('product_delete',$product->id) }} " class="btn btn-sm rounded-pill btn-outline-danger delete_product"><i class="fa fa-trash" aria-hidden="true"> Delete</i></a></div>
                            </div>
                        </td>
                    </tr>
                </div> <!-- col-6 / end -->
               
                @endforeach
            @endif
        </table>
       
</div>

    
</div>  
<div class="row" >
    <div class="col-3 h4">{{ $products->links() }}</p>
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    function autocomplete(inp, arr) {
          /*the autocomplete function takes two arguments,
          the text field element and an array of possible autocompleted values:*/
          var currentFocus;
          /*execute a function when someone writes in the text field:*/
          inp.addEventListener("input", function(e) {
              var a, b, i, val = this.value;

              
              /*close any already open lists of autocompleted values*/
              closeAllLists();
              if (!val) { return false;}
              currentFocus = -1;
              /*create a DIV element that will contain the items (values):*/
              a = document.createElement("DIV");
              
              a.setAttribute("id", this.id + "autocomplete-list");
              a.setAttribute("class", "autocomplete-items");
              /*append the DIV element as a child of the autocomplete container:*/
              this.parentNode.appendChild(a);

              
             
              /*for each item in the array...*/
              for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                  /*create a DIV element for each matching element:*/
                  b = document.createElement("DIV");
                  /*make the matching letters bold:*/
                  b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                  b.innerHTML += arr[i].substr(val.length);
                  /*insert a input field that will hold the current array item's value:*/
                  b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                  /*execute a function when someone clicks on the item value (DIV element):*/
                  b.addEventListener("click", function(e) {
                      /*insert the value for the autocomplete text field:*/
                      inp.value = this.getElementsByTagName("input")[0].value;
                      /*close the list of autocompleted values,
                      (or any other open lists of autocompleted values:*/
                      closeAllLists();
                  });
                  a.appendChild(b);
                }
              }
          });
          /*execute a function presses a key on the keyboard:*/
          inp.addEventListener("keydown", function(e) {
              var x = document.getElementById(this.id + "autocomplete-list");
              if (x) x = x.getElementsByTagName("div");
              if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
              } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
              } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                  /*and simulate a click on the "active" item:*/
                  if (x) x[currentFocus].click();
                }
              }
          });
          function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
          }
          function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
              x[i].classList.remove("autocomplete-active");
            }
          }
          function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
              if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
              }
            }
          }
          /*execute a function when someone clicks in the document:*/
          document.addEventListener("click", function (e) {
              closeAllLists(e.target);
          });
        }
        
        /*An array containing all the device names in the world:*/
        
         var devices = [
            @foreach ($products as $product)
                 '{{ $product->name }}' , 
            @endforeach
            ];
             //alert(devices);
        /*initiate the autocomplete function on the "myInput" element, and pass along the devices array as possible autocomplete values:*/
        autocomplete(document.getElementById("myInput"), devices);

        
        
    
    $( document ).ready(function() {
        
        $(".delete_product").click(function(){
            var product_id = $(this).attr('id');
            $.ajax({
                type: "GET",
                url: "product_delete",
                data: {'product_id' : product_id},
                success: function(data) {
                    window.location.href = "{{ url('product')}}";
                   $('.delete_success_div').removeClass('d-none');
                   $('.delete_success_html').html('Product Deleted Successfully');
                    
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
          });
        
       
    });
  </script>
@endsection


