@extends('layouts.app')

@section('content')

    <style>
        ul {
            list-style-type: none;
        }
              ul  .list-group{
            margin-bottom: 10px;
            overflow:scroll;
            -webkit-overflow-scrolling: touch;
        }

    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


            <div class="container-fluid">


                <div class="row mb-2">


                    <div class="col-sm-6">


                        <h1>Sub-Category Types </h1>


                    </div>


                    <div class="col-sm-6">


                        <ol class="breadcrumb float-sm-right">


                            <li class="breadcrumb-item"><a href="#">Home</a></li>


                            <li class="breadcrumb-item active"> Sub-Category Types</li>


                        </ol>


                    </div>


                </div>


            </div><!-- /.container-fluid -->


        </section>





        <!-- Main content -->


        <section class="content">


            

            <div class="card">


                <div class="card-header">
                        <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fas fa-mobile-alt"></i> Sub-Category Types</h3>
                </div>
                
  
                <div class="card-header">
                <span class="searchAlign">  
                    <div id="editor"></div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success" onclick="exportTableToExcel('myTable')">Excel</button>
                        <button type="button" class="btn btn-success" onclick="createPDF()" id="btPrint" > PDF</button>
                    
                    </div></span>
                <span style="float: right">
                <input type="text" style="padding: 4px;padding-bottom: 8px;" name="myInput" id="myInput" class="search"  placeholder="Search..">
                <button type="button"  class="btn btn-outline-secondary ">Search</button>
                
                </span>
            </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="card-body p-0" id="tab">
                    

                    <table id="myTable" class="table table-striped projects">


                        <thead>


                            <tr>


                                <th style="width: 1%">


                                    #


                                </th>


                                <th style="width: 10%">


                                    S No.


                                </th>

                                <th style="width: 20%">


                                    Sub Category Name


                                </th>
                                <th style="width: 40%">


                                </th>


                            </tr>


                        </thead>

            <?php $sub_categoryTypes = App\Models\SubCategoryType::orderBy('id','ASC')->get();
                            
            ?>

                        <tbody>

                @foreach ($sub_categoryTypes as $subcategoryType )
        

                            <tr>


                                <td>


                                    #


                                </td>


                                <td>


                                    <a>
                                     

                                        {{ $subcategoryType->id }}


                                    </a>


                                    <br />





                                </td>

                                <td>


                                    <ul class="list-inline">


                                        <li class="list-inline-item">


                                            <b> {{ $subcategoryType->subcategory_type }}</b>




                                        </li>





                                    </ul>


                                </td>




                                <td class="project-actions">
                                    <ul style="list-style:none;">
                                        
                                         <li style="padding-top:5px"><a href="#logo_{{ $subcategoryType->id }}" data-toggle="modal"
                                            class="btn btn-sm rounded-pill btn-outline-success"  title="Edit SubCategory Name" ><i class="far fa-edit" aria-hidden="true"> Edit SubCategory Name</i></a></li>  
                                    </ul>
                                </td>


                            </tr>

                            <!-- Button trigger modal for all the button -->
                <form action="{{ url('/update-subcategory-types') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <!-- Modal  2 #logo-->


                <div class="modal fade" id="logo_{{ $subcategoryType->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">


                    <div class="modal-dialog modal-dialog-centered" role="document">


                        <div class="modal-content">


                            <div class="modal-header">


                                <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $subcategoryType->subcategory_type }} SubCategory-Type</h5>


                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                                    <span aria-hidden="true">&times;</span>


                                </button>


                            </div>


                            <div class="modal-body">
                                <input type="hidden" name="subcategoryType_id" value="{{$subcategoryType->id}}" required>
                                <div class="form-group form-control-lg text-left">
                                    <b> Sub-Category Type: </b>    
                                    <input type="text" style="float: right" name="subcategory_type" value="{{ $subcategoryType->subcategory_type }}">
                                </div>
                                  <div class="form-group form-control-lg text-left">
                                  <strong>Select SubCategory:</strong>
                                  
                                  <select name="subcategory_id" id="subcategory_id" class="form-control" size="1">
                                      
                                      @if($subcategoryType->subcategory_id!="")
                                      <?php $selectedSubCategory = App\Models\SubCategory::findOrFail($subcategoryType->subcategory_id); ?>
                                      <option   value="{{ $selectedSubCategory->id }}" selected> {{ $selectedSubCategory->subcategoryname }} </option>
                                      @endif
                                      
                                      
                                      <?php  $subCategories = App\Models\SubCategory::orderBy('subcategoryname','ASC')->get(); ?>
                                      
                                      @foreach ( $subCategories as $subCategory)
                                        
                                        <option  value="{{ $subCategory->id }}" >{{ $subCategory->subcategoryname }} </option> 
                                        
                                      @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                            </div>


                            <div class="modal-footer">


                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                                <button type="submit" class="btn btn-primary">Save changes</button>


                            </div>


                        </div>


                    </div>


                </div>


            </form>
            <!--\subcategorytype_{{ $subcategoryType->id }}-->
            
            <form action="{{ url('/save-subcategoryType') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <!-- Modal  2 #logo-->


                <div class="modal fade" id="subcategorytype_{{ $subcategoryType->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">


                    <div class="modal-dialog modal-dialog-centered" role="document">


                        <div class="modal-content">


                            <div class="modal-header">


                                <h5 class="modal-title" id="exampleModalLongTitle">Add New Sub-Category for {{ $subcategoryType->subcategoryname }} </h5>


                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                                    <span aria-hidden="true">&times;</span>


                                </button>


                            </div>


                            <div class="modal-body">
                                <input type="hidden" name="subcategory_id" value="{{$subcategoryType->id}}" required>
                                <div class="form-group form-control-lg text-left">
                                    <b> Sub-Category Name: </b>    
                                    <input type="text" style="float: right" name="subcategoryname" value="{{ $subcategoryType->subcategoryname }}" readonly>
                                </div>
                                  <div class="form-group form-control-lg text-left">
                                    <b> SubCategory-type: </b>    
                                    <input type="text" style="float: right" name="subcategory_type" placeholder="Enter SubCategory-Type">
                                </div>
                                <br>
                                <br>
                            </div>


                            <div class="modal-footer">


                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                                <button type="submit" class="btn btn-primary">Save changes</button>


                            </div>


                        </div>


                    </div>


                </div>


            </form>
<!--\show show_subcategorytype_{{ $subcategoryType->id }} -->
            


                <!-- Modal  2 #logo-->


                <div class="modal fade" id="show_subcategorytype_{{ $subcategoryType->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">


                    <div class="modal-dialog modal-dialog-centered"  style="max-width: 1350px!important;height:100%!important;"  role="document">


                        <div class="modal-content">


                            <div class="modal-header">


                                <h5 class="modal-title" id="exampleModalLongTitle">Show Sub-Category for {{ $subcategoryType->subcategoryname }}</h5>


                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                                    <span aria-hidden="true">&times;</span>


                                </button>


                            </div>


                            <div class="modal-body" style="min-height:450px!important;">
                                
                                <div class="form-group form-control-lg text-left">
                                   <?php $myid=$subcategoryType->id;
                                   $j=1;
                                    $subcategoryTypetypes=App\Models\SubCategoryType::query()->where('subcategory_id','LIKE', $myid)->get(); ?>
                                   
                                       <ul class="list-group">
                                       @foreach($subcategoryTypetypes as $data)
                                       
                                           <li class="p-2 border bg-info"> {{ $j }} . &nbsp{{ $data->subcategory_type }} </li>
                                       
                                       <?php $j++ ?>
                                        @endforeach
                                        </ul>
                                   
                                </div>

                            </div>


                            <div class="modal-footer">


                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>


                        </div>


                    </div>


                </div>


            

                            @endforeach




                            
                        </tbody>


                    </table>


                </div>


                <!-- /.card-body -->


            </div>


            <!-- /.card -->


            
            

            <!-- **************************************************************** -->


        </section>


        <!-- /.content -->



    </div>

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
