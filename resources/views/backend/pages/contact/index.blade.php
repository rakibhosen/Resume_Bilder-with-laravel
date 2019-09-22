@extends('backend.layout.master')

@section('content')

<div class="main-panel">
     <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
            <!-- start  modal Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
 Add contact
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
      @include('backend.partials.message')

        <form action="{{ route('admin.contact.store') }}" method="post"  enctype="multipart/form-data">
                     {{ csrf_field() }}
               
                          
              <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" >
            </div>
           
            <div class="form-group">
              <label for="exampleInputEmail1">web</label>
              <input type="text" class="form-control" name="web" >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">gmail</label>
              <input type="text" class="form-control" name="gmail" >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">phone</label>
              <input type="text" class="form-control" name="phone" >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Portfolio link</label>
              <input type="text" class="form-control" name="link_url" >
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
     <th scope="col"> Web</th>
     <th scope="col">gmail</th>
     <th scope="col"> Phone</th>
     <th scope="col"> Link </th>
     <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
 
    @foreach($contacts as $contact)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td>{{ $contact->title }}</td>
      <td>{{ $contact->web }} </td> 
      <td>{{ $contact->gmail }}</td>
      <td>{{ $contact->phone }} </td> 
      <td>{{ $contact->link_url }} </td> 


    <td><a href="#edit_contact{{ $contact->id }}" data-toggle="modal" class="btn btn-primary">Edit</a>

     <a href="#delete_contact{{ $contact->id }}" class="btn btn-danger" data-toggle="modal" >Delete</a>
      </td>

<!-- delete Modal............ -->
<div class="modal fade" id="delete_contact{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

        <form action="{{route('admin.contact.delete',$contact->id) }}" method="post">
          {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Yes</button>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- edit modal ......................-->
            

<!-- Modal -->
<div class="modal fade" id="edit_contact{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="{{ route('admin.contact.update',$contact->id) }}" method="post"  enctype="multipart/form-data">
             {{ csrf_field() }}
                        
             <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" >
            </div>
           
            <div class="form-group">
              <label for="exampleInputEmail1">web</label>
              <input type="text" class="form-control" name="web" >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">gmail</label>
              <input type="text" class="form-control" name="gmail" >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">phone</label>
              <input type="text" class="form-control" name="phone" >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Portfolio link</label>
              <input type="text" class="form-control" name="link_url" >
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