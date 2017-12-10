@extends('layouts.app')

@section('content')
    @include('UEditor::head');
    <script type="text/javascript" charset="utf-8" src="{{asset('laravel-u-editor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('laravel-u-editor/ueditor.all.js')}}"></script>
    <script src="{{asset('laravel-u-editor/ueditor.parse.js')}}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">修改文章</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>修改失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/articles/'.$article->id) }}" method="POST">
                            {{method_field('PUT')}}
                            {!! csrf_field() !!}
                            <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题" value = "{{$article->title}}">
                            <br>
                            {{--<textarea id = 'container' name="body" rows="10" class="form-control" required="required" placeholder="请输入内容" >{{$article->body}}></textarea>--}}
                            {{--<br>--}}
                            <script id = 'container' name = 'body' type="text/plain">
                                {!! $article->body !!}
                            </script>
                            <button class="btn btn-lg btn-info">修改文章</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function(){
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
    </script>
@endsection