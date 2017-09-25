@extends('admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="row page-title-row">
        <div class="col-md-6">
            <h3>电影 <small>» 列表</small></h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('wmm/movie/create') }}" class="btn btn-success btn-md">
                <i class="fa fa-plus-circle"></i>创建电影条目
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            <table id="posts-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>电影名称</th>
                    <th>分享网址</th>
                    <th>电影介绍</th>
                    <th>上映时间</th>
                    <th data-sortable="false">操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td><a target="_blank" href="{{ $movie->url }}">{!! str_limit($movie->url, 30, '...') !!}</a></td>
                    <td>{{ $movie->desc }}</td>
                    <td>{{ $movie->release_time }} </td>
                    <td>
                        <a href="{{url('wmm/movie/edit')}}/{{$movie->id}}" class="btn btn-sm btn-info">
                            <i class="fa fa-edit"></i>编辑
                        </a>
                        <a href="{{url('wmm/movie/delete')}}/{{$movie->id}}" class="btn btn-sm btn-danger"
                            onclick="javascript:return del();">
                            <i class="fa fa-eye"></i> 删除
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
            {{$movies->links()}}
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
    function del() {
        var msg = "确定删除?"
        if (confirm(msg) == true) {
            return true
        }else {
            return false
        }
    }
</script>
@stop