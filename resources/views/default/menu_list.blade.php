<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <!--按钮或搜索区域-->
                <div class="col-sm-12 text-xs-center">
                    <button data-action="modal" class="btn btn-default m-b-20" href="menu.php?act=add&id=0"><i class="fa fa-plus m-r-5"></i>添加顶级菜单</button>
                </div>
                <!--end--->
            </div>
            <div class="table-responsive">
                <div class="custom-dd dd" id="nestable_list_1">
                    <!---核心内容列表区域-->
                    <table class="table m-0 table-hover">
                        <thead>
                        <tr>
                            <th width="60">&nbsp;</th>
                            <th width="150">菜单名称</th>
                            <th width="300">菜单URL</th>
                            <th width="80">菜单状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($dataList as $key=>$parent)
                        <tr data-id="0">
                            <td>
                                @if(count($parent['sub_list']) != 0)
                                    <a class="on-default edit-row" href="#;" onclick="toggle_menu({{$parent['id']}})"><i class="fa fa-plus-square"></i></a>
                                @endif
                            </td>
                            <td><strong>{{$parent['name']}}</strong></td>
                            <td>{{$parent['url']}}</td>
                            <td>
                                @if($parent['status'] == 0)
                                    <span class="text-success">显示</span>
                                    @else
                                    <span class="text-danger">隐藏</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-default btn-sm" data-action="modal" href="/menu/edit/{{$parent['id']}}">编辑</a>
                                <a class="btn btn-default btn-sm" data-action="modal" href="/menu/add/{{$parent['id']}}">增加子菜单</a>
                            </td>
                        </tr>
                        @if(count($parent['sub_list']) != 0)
                        @foreach($parent['sub_list'] as $sub)
                        <tr data-id="{{$parent['id']}}" class="hidden">
                            <td>&nbsp;&nbsp;
                                @if(count($sub['child_list']) != 0)
                                <a class="on-default edit-row" href="#;" onclick="toggle_menu({{$sub['id']}})"><i class="fa fa-plus"></i></a>
                                @endif
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$sub['name']}}</td>
                            <td>{{$sub['url']}}</td>
                            <td>
                                @if($sub['status'] == 0)
                                <span class="text-success">显示</span>
                                @else
                                <span class="text-danger">隐藏</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-default btn-sm" data-action="modal" href="/menu/edit/{{$sub['id']}}">编辑</a>
                                <a class="btn btn-default btn-sm" data-action="modal" href="/menu/add/{{$sub['id']}}">增加子菜单</a>
                            </td>
                        </tr>
                        @if(count($sub['child_list']) != 0)
                        @foreach($sub['child_list'] as $child)
                        <tr data-id="{{$sub['id']}}" class="hidden">
                            <td>&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$child['name']}}</td>
                            <td>{{$child['url']}}</td>
                            <td>
                                @if($child['status'] == 0)
                                <span class="text-success">显示</span>
                                @else
                                    <span class="text-danger">隐藏</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-default btn-sm" data-action="modal" href="/menu/edit/{{$child['id']}}">编辑</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                    <!---内容区域end--->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function toggle_menu(pid) {
        $("tr").each(function () {
            if($(this).attr("data-id") == pid){
                $(this).toggleClass("hidden");
            }
        });
    }
</script>