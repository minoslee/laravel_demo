@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">新增一篇文章</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>新增失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif
                            <script type="text/javascript" charset="utf-8" src="{{asset('laravel-u-editor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('laravel-u-editor/ueditor.all.js')}}"></script>


                            <form action="{{ url('admin/articles') }}" method="POST">
                            {!! csrf_field() !!}

                            <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题">
                            <br>
                            {{--<textarea id = 'container' name="body" rows="10" class="form-control" required="required" placeholder="请输入内容">--}}
                                <!-- 加载编辑器的容器 -->
                                <script id="container" name="body" type="text/plain">

                                </script>

                            {{--</textarea>--}}
                            <br>
                            <button class="btn btn-lg btn-info">新增文章</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function(){
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
    </script>
@endsection