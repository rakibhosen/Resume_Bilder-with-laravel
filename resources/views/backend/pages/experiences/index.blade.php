@extends('backend.layout.master')

@section('content')

<div class="main-panel">
     <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
            <!-- start  modal Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
 Add experience
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ route('admin.experience.store') }}" method="post"  enctype="multipart/form-data">
                     {{ csrf_field() }}
               
                          
              <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" >
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Year</label>
              <input type="text" class="form-control" name="year" >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Location</label>
              <input type="text" class="form-control" name="location" >
            </div>
      
       
      

          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
                
       </form>
      </div>
  
    </div>
  </div>
</div>
            </div>
                <div class="card-body">
                
     <!-- ====== table start ===== -->
     <table class="table table-dark">
  <thead>
    <tr>
     <th>#</th>
     <th scope="col">Title</th>
     <th scope="col"> Description</th>
     <th scope="col">Year</th>
     <th scope="col"> Location</th>
  

     <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
 
    @foreach($experiences as $experience)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td>{{ $experience->title }}</td>
      <td>{{ $experience->description }} </td> 
      <td>{{ $experience->year }}</td>
      <td>{{ $experience->location }} </td> 

    <td><a href="#edit_experience{{ $experience->id }}" data-toggle="modal" class="btn btn-primary">Edit</a>

     <a href="#delete_experience{{ $experience->id }}" class="btn btn-danger" data-toggle="modal" >Delete</a>
      </td>

<!-- delete Modal............ -->
<div class="modal fade" id="delete_experience{{ $experience->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel "style="color:#0000;">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <h5>Are you sure ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <form action="{{route('admin.experience.delete',$experience->id) }}" method="post">
          {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Yes</button>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- edit modal ......................-->
            

<!-- Modal -->
<div class="modal fade" id="edit_experience{{ $experience->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="{{ route('admin.experience.update',$experience->id) }}" method="post"  enctype="multipart/form-data">
             {{ csrf_field() }}
                        
             <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Level</label>
              <input type="number" class="form-control" name="level" >
            </div>


          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
                
       </form>
      </div>
  
    </div>
  </div>
      </td>

    </tr>
    @endforeach

  </tbody>
</table>
     <!-- ====== table end ===== -->
              </div>
              </div>
          </div>
        </div>

@endsection