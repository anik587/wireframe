<div class="row" style="margin: 10px" >
    <div class="col-4" style="text-align: center">
        <label class="labeling"> TO DO LIST </label>

        <ul id="sortable1" class="connectedSortable">
            @foreach($todolist as $key=>$val)
                @if($val->status == '1')
                    <li class="ui-state-default" data-tag="1" data-priority="{{$val->priority_level}}"data-id="{{$val->id}}">
                        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$val->name}}({{$val->id}})</li>
                @endif
            @endforeach
        </ul>

    </div>
    <div class="col-4" style="text-align: center">
        <label class="labeling"> IN WORK </label>
        <ul id="sortable2" class="connectedSortable">
            @foreach($todolist as $key=>$val)
                @if($val->status == '2')
                    <li class="ui-state-default" data-tag="2" data-priority="{{$val->priority_level}}" data-id="{{$val->id}}">
                        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$val->name}}({{$val->id}})</li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="col-4" style="text-align: center">
        <label class="labeling"> DONE </label>
        <ul id="sortable3" class="connectedSortable">
            @foreach($todolist as $key=>$val)
                @if($val->status == '3')
                    <li class="ui-state-default" data-tag="3" data-priority="{{$val->priority_level}}" data-id="{{$val->id}}">
                        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$val->name}}({{$val->id}})</li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="col-md-12 col-12" style="padding: 10px"><a href="javascript:void(0)" id="saveChanges" class="btn btn-primary float-md-right">Save Changes</a></div>
</div>


