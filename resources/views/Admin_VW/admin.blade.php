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

                {!! Form::open(['route' => 'User.store', 'method' => 'POST','class' => 'form-horizontal','form-material','files'=>'true']) !!}
                {{ csrf_field() }}

                <div class="form-group">

                    <div class="col-md-4{{ $errors->has('First-Name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="First-Name"  placeholder="First Name">
                        @if ($errors->has('First-Name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('First-Name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('Middel-Name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Middel-Name"  placeholder="Middel Name">
                        @if ($errors->has('Middel-Name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Middel-Name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('Last-Name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Last-Name"  placeholder="Last Name">
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

                    <div class="col-md-4 {{ $errors->has('Mobile-Number') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Mobile-Number"
                               placeholder="Mobile Number">
                        @if ($errors->has('Mobile-Number'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Mobile-Number') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('Occupation') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Occupation"  placeholder="Occupation">
                        @if ($errors->has('Occupation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Occupation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-md-4 {{ $errors->has('Area') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Area"  placeholder="Area">
                        @if ($errors->has('Area'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Area') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('City') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="City"  placeholder="City">
                        @if ($errors->has('City'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('City') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-4 {{ $errors->has('State') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="State"  placeholder="State">
                        @if ($errors->has('State'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('State') }}</strong>
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
    </div>
@endsection
