@extends('layouts.admin_app')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Event From</h4></div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">Event From</div>
            <div class="panel-body">

                {!! Form::open(['route' => 'Event.store', 'method' => 'POST','class' => 'form-material','files'=>'true']) !!}
                {{ csrf_field() }}

                <div class="form-group">


                    <div class="col-md-6{{ $errors->has('Event_Picture') ? ' has-error' : '' }}">

                        <label>Events Picture</label>

                        <input type="file" class="form-control" name="Event_Picture">
                        @if ($errors->has('Event_Picture'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Event_Picture') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-6 {{ $errors->has('Event_name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Event_name" placeholder="Event Name">
                        @if ($errors->has('Event_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Event_name') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-md-6 {{ $errors->has('Event_desc') ? ' has-error' : '' }}">

                        <textarea  class="form-control" name="Event_desc" placeholder="Event Description"></textarea>
                        @if ($errors->has('Event_desc'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Event_desc') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Upload Events</button>

            </div>

            {!! Form::close() !!}


        </div>


        <div class="white-box">
            <table class="table table-striped" id="table">
                <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Event Picture (Full)</th>
                    <th>Event Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr class="item{{$event['id']}}">
                        <td>{{$event['event_name'] }}</td>
                        <td><img src="{{URL::to('public/').'/events/'.$event['event_photo']}}" width="200px"/></td>
                        <td><textarea class="form-control" disabled="disabled">{{$event['event_desc'] }}</textarea></td>
                        @if($event['event_status'] == 1)
                            <td><label class="btn btn-success">Active</label></td>
                        @else
                            <td><label class="btn btn-danger">Block</label></td>
                        @endif
                        <td>
                            @if($event['event_status'] == 1)
                                <a class="btn btn-danger btn-sm" href="{{ route('Event.edit', $event['id']) }}"
                                >Block
                                </a>
                            @else
                                <a href="{{ route('Event.edit', $event['id']) }}" class="btn btn-success btn-sm">Active
                                </a>
                            @endif


                        </td>
                        <td>
                            {{ Form::open(['method' => 'DELETE', 'route' => ['Event.destroy', $event['id']]]) }}
                            {{ Form::hidden('id', $event['id']) }}

                            <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span>
                            </button>

                            {{ Form::close() }}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                @if($events->lastPage() > 1)
                    @for($i=1 ;$i<=$events->lastpage();$i++)
                        <li class="page-item"><a class="page-link" href="{{$events->url($i)}}">{{$i}}</a></li>
                    @endfor
                @endif
            </ul>
        </div>
    </div>
    </div>

@endsection
