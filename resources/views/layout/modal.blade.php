

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" role='form' enctype="multipart/form-data"
                  action="{{route('store')}}" autocomplete="off">
                {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create To Do List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">



                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="exampleFormControlInput1">Task Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                           value="@if(isset($todoList->name) ){{$todoList->name }} @else {{old('name')}} @endif"
                                           aria-label="Name" aria-describedby="basic-addon1">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="strongError">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif



                                <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="exampleFormControlInput1">Task Type</label>
                                    <input type="text" name="type" class="form-control" placeholder="Name"
                                           value="@if(isset($todoList->type) ){{$todoList->type }} @else {{old('type')}} @endif"
                                           aria-label="Name" aria-describedby="basic-addon1">
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong class="strongError">{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                                    <label for="exampleFormControlSelect1">Task Status</label>
                                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">Select Type</option>
                                        <option @if(isset($todoList->status))@if($todoList->status == '1') selected @endif @elseif(old('status') == '1')selected @endif value="1">To Do</option>
                                        <option @if(isset($todoList->status))@if($todoList->status == '2') selected @endif @elseif(old('status') == '2')selected @endif value="2">In Work</option>
                                        <option @if(isset($todoList->status))@if($todoList->status == '3') selected @endif @elseif(old('status') == '3')selected @endif value="3">Done</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong class="strongError">{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>


                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
            </form>
        </div>
    </div>
</div>