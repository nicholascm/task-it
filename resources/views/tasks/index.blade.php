@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
    <form action = "/logout" method = "GET">
        <button type = "submit" class = "btn btn-link" >Log Out</button>
    </form>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
    
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>


    <!-- Current Tasks -->

    @if (count($tasks) == 0)
    <div class = "container">
        <h2 class = "text-center">No Tasks added yet!</h2>
    </div>
    @endif

    @if (count($tasks) > 0)
    <div class = "container">


    <h3 class = "text-center">Tasks  <i class="fa fa-check-square fa-lg"></i></h3>


    <div class = "col-md-8 col-md-offset-2 col-xs-12"
     <ul class = "list-group">
       @foreach($tasks as $task)
           @if($task->completed == FALSE)
           <li class="list-group-item card">
             <div class="container">
               <div class="row">
                 <div class = "col-md-6 col-xs-10">
                 <form id = "completeForm{{$task->id}}" name = "completed" action = "{{ url('task/complete/'.$task->id) }}" method = "POST">
                       {{ csrf_field() }}
                       <button class = "btn btn-link"><i class="fa fa-square-o fa-lg"></i></button>
                 </form>
                    <span id = "taskName{{$task->id}}">{{$task->name}}</span>
                    <span id = "editForm{{$task->id}}" style = "display: none">
                      <form class = "form-inline" action = "{{url('task/update/'.$task->id)}}" method = "POST">
                          {{csrf_field()}}
                        <input name = "name"  class = "form-control" value = "{{$task->name}}">
                        <button class = "saveButton btn btn-success">Save</button>
                      </form>
                  </span>
                 </div>
                 <div class = "col-md-2 col-xs-2">
                  <button class = "editButton btn btn-link" value = "{{$task->id}}"><i class="fa fa-pencil-square-o fa-lg"></i></button>
                  <form action="{{ url('task/'.$task->id) }}" method="POST">

                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        <button type = "submit" class = "btn btn-link"><i class="fa fa-trash-o fa-lg"></i></button>
                  </form>
                </div>
               </div>
             </div>
           </li>
           @endif
        @endforeach
    </ul>
      <!--@each('tasks.incompleteTaskItem', $tasks, 'task') -->

<!--
      <li class="list-group-item card">
          <div class="row">
            <div class="col-xs-12">
              <form id = "completeForm{{$task->id}}" name = "completed" action = "{{ url('task/complete/'.$task->id) }}" method = "POST">
                    {{ csrf_field() }}
                  <input class = "completionCheckbox" id ="{{$task->id}}" type = "checkbox" name = "completed" value = "{{$task->id}}">
              </form>



              <div id = "taskName{{$task->id}}" class = "taskName">{{$task->name}}</div>

              <div class = "col-xs-12 pull-right">

              <div id = "editForm{{$task->id}}" style = "display: none">
                  <form action = "{{url('task/update/'.$task->id)}}" method = "POST">
                      {{csrf_field()}}
                    <input name = "name"  class = "form-control" value = "{{$task->name}}">
                    <button class = "saveButton btn btn-success">Save</button>
                  </form>
              </div>
                <button value = "{{$task->id}}" class = "editButton btn btn-primary">Edit</button>

                <form action="{{ url('task/'.$task->id) }}" method="POST">

                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                <button class = "btn btn-alert">Delete</button>
                </form>
                </div>
          </div>
      </div>
     </li>
-->

            <h3 class = "text-center">Completed Tasks</h3>

            <ul class = "list-group">
            @foreach($tasks as $task)
                @if($task->completed != FALSE)
                <li class="list-group-item card">
             <div class="container">
               <div class="row">
                 <div class = "col-md-6 col-xs-10">
                 <form id = "completeForm{{$task->id}}" name = "completed" action = "{{ url('task/complete/'.$task->id) }}" method = "POST">
                       {{ csrf_field() }}
                       <button class = "btn btn-link"><i class="fa fa-check-square-o fa-lg"></i></button>
                 </form>
                    {{$task->name}}
                 </div>
                 <div class = "col-md-2 col-xs-2">
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
                </div>
               </div>
             </div>
           </li>
              @endif
            @endforeach
            </ul>
      </div>
    </div>
    @endif
@endsection
