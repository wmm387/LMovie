@extends('admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>电影 <small>» 编辑电影条目</small></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">电影表单</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('wmm/movie') }}/{{ $movie->id }}">
                        {{ method_field("PUT") }}
						{{csrf_field()}}

						<div class="form-group">
    						<label for="title" class="col-sm-2 control-label">电影名称</label>
    						<div class="col-sm-9">
        						<input type="text" class="form-control" name="title" id="title"
        						value="{{ old('title')?old('title'):$movie->title }}">
    						</div>
						</div>

						<div class="form-group">
    						<label for="url" class="col-sm-2 control-label">分享网址</label>
    						<div class="col-sm-9">
        						<input type="text" class="form-control" name="url" id="url"
        						value="{{ old('url')?old('url'):$movie->url }}">
    						</div>
						</div>

						<div class="form-group">
    						<label for="desc" class="col-sm-2 control-label">电影介绍</label>
    						<div class="col-sm-9">
        						<input type="text" class="form-control" name="desc" id="desc"
        						value="{{ old('desc')?old('desc'):$movie->desc }}">
    						</div>
						</div>

                        <div class="form-group">
                            <label for="release_time" class="col-sm-2 control-label">上映年份</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="release_time" id="release_time"
                                value="{{ old('release_time')?old('release_time'):$movie->release_time }}">
                            </div>
                        </div>
                        @include('admin.layout.error')
                            <div class="form-group">
                                <div class="col-sm-9"></div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-plus-circle"></i>
                                        提交修改
                                    </button>
                                </div>
                            </div>

                        </form>

                 </div>
             </div>
        </div>
    </div>
</div>
@stop