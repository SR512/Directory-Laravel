@extends('layouts.admin_app')

@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Article From</h4></div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">Article From</div>
            <div class="panel-body">

                {!! Form::open(['route' => 'Article.store', 'method' => 'POST','class' => 'form-material','files'=>'true']) !!}
                {{ csrf_field() }}

                <div class="form-group">


                    <div class="col-md-6{{ $errors->has('Article_Picture') ? ' has-error' : '' }}">

                        <label>Article Picture</label>

                        <input type="file" class="form-control" name="Article_Picture">
                        @if ($errors->has('Article_Picture'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Article_Picture') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-6 {{ $errors->has('Article_name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="Article_name" placeholder="Article Name">
                        @if ($errors->has('Article_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Article_name') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-md-6 {{ $errors->has('Article_desc') ? ' has-error' : '' }}">

                        <textarea  class="form-control" name="Article_desc" placeholder="Article Description"></textarea>
                        @if ($errors->has('Article_desc'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Article_desc') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Upload Article</button>

            </div>

            {!! Form::close() !!}


        </div>


        <div class="white-box">
            <table class="table table-striped" id="table">
                <thead>
                <tr>
                    <th>Article Name</th>
                    <th>Article Picture</th>
                    <th>Article Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr class="item{{$article['id']}}">
                        <td>{{$article['article_name'] }}</td>
                        <td><img src="{{URL::to('public/').'/articles/'.$article['article_picture']}}" width="200px"/></td>
                        <td><textarea class="form-control" disabled="disabled">{{$article['article_desc'] }}</textarea></td>
                        @if($article['article_status'] == 1)
                            <td><label class="btn btn-success">Active</label></td>
                        @else
                            <td><label class="btn btn-danger">Block</label></td>
                        @endif
                        <td>
                            @if($article['article_status'] == 1)
                                <a class="btn btn-danger btn-sm" href="{{ route('Article.edit', $article['id']) }}"
                                >Block
                                </a>
                            @else
                                <a href="{{ route('Article.edit', $article['id']) }}" class="btn btn-success btn-sm">Active
                                </a>
                            @endif


                        </td>
                        <td>
                            {{ Form::open(['method' => 'DELETE', 'route' => ['Article.destroy', $article['id']]]) }}
                            {{ Form::hidden('id', $article['id']) }}

                            <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span>
                            </button>

                            {{ Form::close() }}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <ul class="pagination">
                @if($articles->lastPage() > 1)
                    @for($i=1 ;$i<=$articles->lastpage();$i++)
                        <li class="page-item"><a class="page-link" href="{{$articles->url($i)}}">{{$i}}</a></li>
                    @endfor
                @endif
            </ul>
        </div>
    </div>
    </div>

@endsection
