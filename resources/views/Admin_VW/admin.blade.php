@extends('layouts.admin_app')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">New User</h4></div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">New User</div>
            <div class="panel-body">

                {!! Form::open(['route' => 'User.store', 'method' => 'POST','class' => 'form-material','files'=>'true']) !!}
                {{ csrf_field() }}

                <div class="form-group">

                    <div class="col-md-4{{ $errors->has('First-Name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="First-Name" placeholder="First Name">
                        @if ($errors->has('First-Name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('First-Name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('Middel-Name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Middel-Name" placeholder="Middel Name">
                        @if ($errors->has('Middel-Name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Middel-Name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('Last-Name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Last-Name" placeholder="Last Name">
                        @if ($errors->has('Last-Name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Last-Name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-4 {{ $errors->has('Register_Number') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Register_Number"
                               placeholder="Register Number">
                        @if ($errors->has('Register_Number'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Register_Number') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('Mobile_Number') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Mobile_Number"
                               placeholder="Mobile Number">
                        @if ($errors->has('Mobile_Number'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Mobile_Number') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('Occupation') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Occupation" placeholder="Occupation">
                        @if ($errors->has('Occupation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Occupation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-md-4 {{ $errors->has('Area') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Area" placeholder="Area">
                        @if ($errors->has('Area'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Area') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('City') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="City" placeholder="City">
                        @if ($errors->has('City'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('City') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('Pincode') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Pincode" placeholder="Pincode">
                        @if ($errors->has('Pincode'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Pincode') }}</strong>
                                    </span>
                        @endif
                    </div>


                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Save Data</button>

            </div>

            {!! Form::close() !!}
        </div>

        <div class="white-box">
            <table class="table table-striped" id="table">
                <thead>
                <tr>
                    <th>Register</th>
                    <th>Profile</th>
                    <th>First Name</th>
                    <th>Middel Name</th>
                    <th>Last Name</th>
                    <th>Mobile Number</th>
                    <th>Occupation</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="item{{$user['id']}}">
                        <td>{{$user['Register_Number']}}</td>
                        <td><img src="{{URL::to('public/').'/profile/'.$user['profile']}}" width="100px"/></td>
                        <td>{{$user['First_Name']}}</td>
                        <td>{{$user['Middel_Name']}}</td>
                        <td>{{$user['Last_Name']}}</td>
                        <td>{{$user['Mobile_Number']}}</td>
                        <td>{{$user['Occupation']}}</td>
                        <td><textarea disabled>{{$user['Area']}} {{$user['City']}} {{$user['Pincode']}}</textarea></td>
                        @if($user['Status'] == 1)
                            <td><label class="btn btn-success">Active</label></td>
                        @else
                            <td><label class="btn btn-danger">Block</label></td>
                        @endif
                        <td>
                            <button class="balance-modal btn btn-primary btn-sm"
                                    data-id="{{$user['id']}}"
                                    data-register="{{$user['Register_Number']}}"
                                    data-first="{{$user['First_Name']}}"
                                    data-middel="{{$user['Middel_Name']}}"
                                    data-last="{{$user['Last_Name']}}"
                                    data-mobile="{{$user['Mobile_Number']}}"
                                    data-occupation="{{$user['Occupation']}}"
                                    data-area="{{$user['Area']}}"
                                    data-city="{{$user['City']}}"
                                    data-pincode="{{$user['Pincode']}}"
                                    data-status="{{$user['Status']}}"
                            >
                                <span class='glyphicon glyphicon-pencil'></span>
                            </button>
                            <button class="delete-modal btn btn-danger btn-sm"
                                    data-id="{{$user['id']}}"
                                    data-register="{{$user['Register_Number']}}"
                                    data-first="{{$user['First_Name']}}"
                                    data-middel="{{$user['Middel_Name']}}"
                                    data-last="{{$user['Last_Name']}}"
                            >
                                <span class='glyphicon glyphicon-trash'></span>
                            </button>
                            @if($user['Status'] == 1)
                                <a class="btn btn-danger btn-sm" href="{{ route('User.edit', $user['id']) }}"
                                >Block
                                </a>
                            @else
                                <a href="{{ route('User.edit', $user['id']) }}" class="btn btn-success btn-sm">Active
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                @if($users->lastPage() > 1)
                    @for($i=1 ;$i<=$users->lastpage();$i++)
                        <li class="page-item"><a class="page-link" href="{{$users->url($i)}}">{{$i}}</a></li>
                    @endfor
                @endif
            </ul>
        </div>
    </div>
    </div>


    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>

                <div class="modal-body">

                    {!! Form::open(['method' => 'put','class' => 'form-horizontal','form-material','id' => 'formBalance']) !!}
                    {{ csrf_field() }}

                    <div class="form-group">

                        <input type="hidden" class="form-control" id="eid" name="eid">
                        <input type="hidden" class="form-control" id="eStatus" name="eStatus">

                        <div class="col-md-4">
                            <input type="text" class="form-control" id="eFirst-Name" name="eFirst-Name" placeholder="First Name">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" id="eMiddel-Name" name="eMiddel-Name" placeholder="Middel Name">
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" id="eLast-Name" name="eLast-Name" placeholder="Last Name">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="eRegister_Number" name="eRegister_Number"
                                   placeholder="Register Number">
                        </div>

                        <div class="col-md-4 ">
                            <input type="text" class="form-control" id="eMobile_Number" name="eMobile_Number"
                                   placeholder="Mobile Number">
                        </div>

                        <div class="col-md-4 ">
                            <input type="text" class="form-control" id="eOccupation" name="eOccupation" placeholder="Occupation">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-4 ">
                            <input type="text" class="form-control" id="eArea" name="eArea" placeholder="Area">
                        </div>

                        <div class="col-md-4 ">
                            <input type="text" class="form-control" id="eCity" name="eCity" placeholder="City">
                        </div>

                        <div class="col-md-4 ">
                            <input type="text" class="form-control" id="ePincode" name="ePincode" placeholder="ePincode">
                        </div>


                    </div>

                    </form>

                    <div class="enableContent">
                        Are You Sure Want to&nbsp;<span class="title"></span>&nbsp;Account.. ?
                        <span class="hidden id"></span>
                        <span class="hidden href"></span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer__action_button" class="glyphicon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--Form Edit Delete Modal--}}

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                    <div class="deleteContent">
                        Are You Sure Want to Delete <span class="title"></span> ?

                        <span class="hidden id"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer__action_button" class="glyphicon"></span>
                    </button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
