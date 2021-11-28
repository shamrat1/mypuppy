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


                        <h1>Sub-Categories Types </h1>


                    </div>


                    <div class="col-sm-6">


                        <ol class="breadcrumb float-sm-right">


                            <li class="breadcrumb-item"><a href="#">Home</a></li>


                            <li class="breadcrumb-item active"> Sub-Categories Types</li>


                        </ol>


                    </div>


                </div>


            </div><!-- /.container-fluid -->


        </section>





        <!-- Main content -->


        <section class="content">


            <!-- Default box -->
        

            <div class="card">


                <div class="card-header">
                        <h3 class="text-center m-3 p-3 bg-primary text-light text-uppercase"><i class="fa fa-plus-square"></i> Sub-Category Types</h3>
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


                                    Sub Category Type


                                </th>
                                <th style="width: 40%">
                                
                                Sub Category Name

                                </th>
                                <th style="width: 40%">
                                
                                Action

                                </th>

                            </tr>


                        </thead>

            <?php $sub_categoryType = App\Models\SubCategoryType::orderBy('id','ASC')->get();
                            
            ?>

                        <tbody>

                @foreach ($sub_categoryType as $subcategoryType )
        

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


                                    <a>
                                     

                                        {{ $subcategoryType->subcategory_type }}


                                    </a>


                                    <br />





                                </td>
                                <td>


                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <?php $resSubCategory=App\Models\SubCategory::findOrFail($subcategoryType->subcategory_id); ?>
                                            <b> {{ $resSubCategory->subcategoryname }}</b>
                                        </li>





                                    </ul>


                                </td>




                                <td class="project-actions">
                                    <ul style="list-style:none;">
                                        
                                         <li style="padding-top:5px"><a href="#edit_{{ $subcategoryType->id }}" data-toggle="modal"
                                            class="btn btn-sm rounded-pill btn-outline-success"  title="Edit SubCategory Name" ><i class="far fa-edit" aria-hidden="true"> Edit SubCategory Name</i></a></li>  
                                       
                                    </ul>
                                </td>


                            </tr>

                            <!-- Button trigger modal for all the button -->
                <form action="{{ url('/update-subCategoryType') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <!-- Modal  2 #edit_-->


                <div class="modal fade" id="edit_{{ $subcategoryType->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                <input type="hidden" name="$subcategoryType_id" value="{{$subcategoryType->id}}" required>
                                <div class="form-group form-control-lg text-left">
                                    <b> Sub-Category Type : </b>    
                                    <input type="text" style="float: right" name="subcategory_type" value="{{ $subcategoryType->subcategory_type }}">
                                </div>
                                  <div class="form-group form-control-lg text-left">
                                  <strong>Select Sub-Category:</strong>
                                  
                                  <select name="subcategory_id" id="subcategory_id" class="form-control" size="1">
                                    
                                      <option   value="{{ $resSubCategory->subcategory_id }}" selected> {{ $resSubCategory->subcategoryname }} </option>
                                      <?php  $subcategories = App\Models\SubCategory::orderBy('subcategoryname','ASC')->get(); ?>
                                      
                                      @foreach ( $subcategories as $subcategory)
                                        
                                        <option  value="{{ $subcategory->id }}" >{{ $subcategory->subcategoryname }} </option> 
                                        
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
