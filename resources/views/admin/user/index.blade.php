@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">用户管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <a href="{{route('register') }}" class="btn btn-lg btn-primary">新增</a>

                        @foreach ($users as $user)
                            <hr>
                            <div class="user">
                                <h4>{{ $user->name }}</h4>
                                <div class="content">
                                    <p>
                                        {{$user->id }}<br/>
                                        {{$user->email}}<br/>
                                        {{$user->created_at}}<br/>
                                    </p>
                                </div>
                            </div>
                            <a href="{{ url('admin/article/'.$user->id.'/edit') }}" class="btn btn-success">编辑</a>
                            <form action="{{ url('admin/article/'.$user->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection