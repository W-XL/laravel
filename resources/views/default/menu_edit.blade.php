<form action="/menu/do_edit/{{$info['id']}}" method="post" enctype="multipart/form-data" data-toggle="ajaxform" id="myform" class="form-horizontal" role="form" data-animation="modal" data-parsley-validate novalidate>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">菜单</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="col-md-3 control-label">父级菜单</label>
            {{csrf_field()}}
            <div class="col-md-9">
                <select name="pid" required class="form-control">
                    @foreach($parents as $p)
                        {{$info['pid']}}
                    <option value="{{$p['id']}}" @if($p['id'] == $info['pid']) selected @endif>{{$p['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">菜单名字</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" value="{{$info['name']}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">URL</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="url" value="{{$info['url']}}" required/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">状态</label>
            <div class="col-md-9">
                <select class="form-control" name="status">
                    <option value="0" @if($info['status'] == 0) selected @endif>显示</option>
                    <option value="1" @if($info['status'] == 1) selected @endif>不显示</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">禁用</label>
            <div class="col-md-9">
                <select class="form-control" name="is_del">
                    <option value="0" @if($info['status'] == 0) selected @endif>启用</option>
                    <option value="1" @if($info['status'] == 1) selected @endif>禁用</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="id" value="{{$info['id']}}" />
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">保存</button>
    </div>
</form>