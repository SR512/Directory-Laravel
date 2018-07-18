@extends('layouts.admin_app')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">User Profile</h4></div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">User Profile</div>
            <div class="panel-body">
            </div>

            <div class="white-box">
                <table class="table table-striped" id="table">
                    <thead>
                    <tr>
                        <th>Profile</th>
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profiles as $profile)
                        <tr class="item{{$profile['id']}}">
                            <td>{{$profile['Profile']}}</td>
                            <td>{{$profile['User_Name']}}</td>
                            <td>{{$profile['Status']}}</td>
                            </td>
                            @if($profile['Status'] == 1)
                                <td><label class="btn btn-success">Active</label></td>
                            @else
                                <td><label class="btn btn-danger">Block</label></td>
                            @endif

                            @if($profile['Status'] == 1)
                                    <a class="btn btn-danger btn-sm" href="{{ route('Profile.edit', $profile['id']) }}"
                                    >Block
                                    </a>
                                @else
                                    <a href="{{ route('Profile.edit', $profile['id']) }}" class="btn btn-success btn-sm">Active
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <ul class="pagination">
                    @if($profiles->lastPage() > 1)
                        @for($i=1 ;$i<=$profiles->lastpage();$i++)
                            <li class="page-item"><a class="page-link" href="{{$profiles->url($i)}}">{{$i}}</a></li>
                        @endfor
                    @endif
                </ul>
            </div>
        </div>
    </div>

@endsection
