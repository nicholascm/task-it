

<li class="list-group-item card">
  <div class="container">
    <div class="row">
      <span>
      <form id = "completeForm{{$task->id}}" name = "completed" action = "{{ url('task/complete/'.$task->id) }}" method = "POST">
            {{ csrf_field() }}
            <button class = "btn btn-link"><i class="fa fa-square-o fa-lg"></i></button>
      </form>
         {{$task->name}}

       <div id = "editForm{{$task->id}}" style = "display: none">
           <form action = "{{url('task/update/'.$task->id)}}" method = "POST">
               {{csrf_field()}}
             <input name = "name"  class = "form-control" value = "{{$task->name}}">
             <button class = "saveButton btn btn-success">Save</button>
           </form>
       </div>
       <button class = "editButton btn btn-link" value = "{{$task->id}}"><i class="fa fa-pencil-square-o fa-lg"></i></button>
       <form action="{{ url('task/'.$task->id) }}" method="POST">

               {{ csrf_field() }}
               {{ method_field('DELETE') }}

             <button type = "submit" class = "btn btn-link"><i class="fa fa-trash-o fa-lg"></i></button>
       </form>
     </span>
    </div>
  </div>
</li>
