@extends('admin.layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        <h3 class="panel-title" style="display: inline-block;">Posts&nbsp;&nbsp;&nbsp;&nbsp;</h3>
                        <button type="button" class="btn btn-primary create_movie">新建电影条目</button>
                    </div>
                    <div class="panel-body">

                        <table class="table table-bordered table-striped table-condensed">
                        <tbody>
                            <tr>
                                <th style="width: 10px">id</th>
                                <th>电影名</th>
                                <th>分享网址</th>
                                <th>电影介绍</th>
                                <th>操作</th>
                            </tr>
                            @foreach($movies as $movie)
                            <tr>
                                <td>{{$movie->id}}</td>
                                <td>{{$movie->title}}</td>
                                <td>{{$movie->url}}</td>
                                <td>{{$movie->desc}}</td>
                                <td>
                                    <button type="button" name="{{$movie->id}}" class="btn btn-primary edit_movie">编辑</button>
                                    <button type="button" name="{{$movie->id}}" class="btn btn-danger del_movie">删除</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$movies->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        $('.create_movie').click(function () {
            window.location.href="{{ url('wmm/movie/create') }}"
        })
        $('.edit_movie').click(function (event) {
            window.location.href="{{ url('wmm/movie/edit') }}" + '/' + event.toElement.name
        })
        $('.del_movie').click(function () {
            window.location.href="{{ url('wmm/movie/del') }}" + '/' + event.toElement.name
        })
    </script>
@stop