@extends('layouts.admin_app')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Advertisement From</h4></div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">Advertisement From</div>
            <div class="panel-body">

                {!! Form::open(['route' => 'Advertisement.store', 'method' => 'POST','class' => 'form-material','files'=>'true']) !!}
                {{ csrf_field() }}

                <div class="form-group">


                    <div class="col-md-4{{ $errors->has('Banner_add') ? ' has-error' : '' }}">

                        <label>Banner Advertisement</label>

                        <input type="file" class="form-control" name="Banner_add">
                        @if ($errors->has('Banner_add'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Banner_add') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('Full_add') ? ' has-error' : '' }}">

                        <label>Full Advertisement</label>
                        <input type="file" class="form-control" name="Full_add">
                        @if ($errors->has('Full_add'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Full_add') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Upload Advertisement</button>

            </div>

            {!! Form::close() !!}


        </div>


        <div class="white-box">
            <table class="table table-striped" id="table">
                <thead>
                <tr>
                    <th>Advertisement Picture (Full)</th>
                    <th>Banner Advertisement Picture (Full)</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($adds as $add)
                    <tr class="item{{$add['id']}}">
                        <td><img src="{{URL::to('public/').'/uploads/'.$add['full_add']}}" width="100%"/></td>
                        <td><img src="{{URL::to('public/').'/uploads/'.$add['banner_add']}}" width="100%"/></td>
                        @if($add['Status'] == 1)
                            <td><label class="btn btn-success">Active</label></td>
                        @else
                            <td><label class="btn btn-danger">Block</label></td>
                        @endif
                      <td>
                        @if($add['Status'] == 1)
                            <a class="btn btn-danger btn-sm" href="{{ route('Advertisement.edit', $add['id']) }}"
                            >Block
                            </a>
                        @else
                            <a href="{{ route('Advertisement.edit', $add['id']) }}" class="btn btn-success btn-sm">Active
                            </a>
                        @endif


                      </td>
                        <td>
                            {{ Form::open(['method' => 'DELETE', 'route' => ['Advertisement.destroy', $add['id']]]) }}
                            {{ Form::hidden('id', $add['id']) }}

                            <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>

                            {{ Form::close() }}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                @if($adds->lastPage() > 1)
                    @for($i=1 ;$i<=$adds->lastpage();$i++)
                        <li class="page-item"><a class="page-link" href="{{$adds->url($i)}}">{{$i}}</a></li>
                    @endfor
                @endif
            </ul>
        </div>
    </div>
    </div>

@endsection
