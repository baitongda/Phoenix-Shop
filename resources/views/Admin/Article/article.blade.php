{{--<include file="Public/min-header"/>--}}
@include('admin.Public.min-header')
<script type="text/javascript">
    window.UEDITOR_Admin_URL = "__ROOT__/Public/plugins/Ueditor/";
    var URL_upload = "{$URL_upload}";
    var URL_fileUp = "{$URL_fileUp}";
    var URL_scrawlUp = "{$URL_scrawlUp}";
    var URL_getRemoteImage = "{$URL_getRemoteImage}";
    var URL_imageManager = "{$URL_imageManager}";
    var URL_imageUp = "{$URL_imageUp}";
    var URL_getMovie = "{$URL_getMovie}";
    var URL_home = "{$URL_home}";    
</script>

{{--<load href="__ROOT__/Public/plugins/Ueditor/ueditor.config.js"/>--}}
{{--<load href="__ROOT__/Public/plugins/Ueditor/ueditor.all.js"/>--}}
<link href="{{URL::asset('plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
<script src="{{URL::asset('plugins/daterangepicker/moment.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>

<div class="wrapper">
    {{--<include file="Public/breadcrumb"/>--}}
    @include('admin.Public.breadcrumb')
   	<section class="content">
       <div class="row">
			<div class="col-md-12">
			
			<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">发布文章</h3>
                  <a href="{{url('admin/Article/articleList')}}" data-toggle="tooltip" title="" class="btn btn-default pull-right" data-original-title="返回"><i class="fa fa-reply"></i></a>
                </div>
                <form class="form-horizontal" action="{{url('admin/Article/articleList')}}" id="add_post" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">文章标题</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="title" >
                      </div>
                    </div>
                   <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">文章类别</label>
                      <div class="col-sm-2">
                        	<select class="small form-control" name="cat_id" id="cat_id">
                        		<option value="0">选择分类</option>
                                @foreach($arr as $k=>$v)
                                    <option value="{{$k}}">{{$v}}</option>
                                @endforeach
                        	</select>
                      </div>
                    </div>
                    <div class="form-group">
                    	<label for="text" class="col-sm-2 control-label">banner图</label>                   	
                    	<div class="col-sm-8">
                            <input type="file" class="form-control" style="width:350px;" name="thumb" id="thumb">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="text" class="col-sm-2 control-label">seo关键字</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="keywords"  >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="text" class="col-sm-2 control-label">外部链接</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="link"  >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="text" class="col-sm-2 control-label">发布时间</label>
                      <div class="col-sm-8">
                            <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">
                                            <i class="glyphicon glyphicon-calendar fa fa-calendar">
                                            </i>
                                    </span>
                                <input type="text" class="form-control" id ="publish_time" name="publish_time"  >
                            </div>                        
                      </div>
                    </div>                   
                    <div class="form-group">
                      <label for="text" class="col-sm-2 control-label">是否显示</label>
                      <div class="col-sm-5">
                        <div class="col-sm-2">
                           <label><input type="radio" name="is_open" value="1" checked="checked">显示</label>
                        </div>
                         <div class="col-sm-3">
                           <label><input type="radio" name="is_open" value="0">不显示</label>
                        </div>
                      </div>
                    </div>    
                    <div class="form-group">
	                    <label class="control-label col-sm-2">网页描述</label>
	                    <div class="col-sm-8">
				        <textarea class="form-control" id="post_description" name="description" title=""></textarea>
	                    </div>
                      </div>                        
                    <div class="form-group">
	                    <label class="control-label col-sm-2">文章内容</label>
	                    <div class="col-sm-8">
				        {{--<textarea class="span12 ckeditor" id="post_content" name="content" title="">--}}
				            {{--{$info.content}--}}
				        {{--</textarea>--}}
                            <script type="text/javascript" charset="utf-8" src="{{URL::asset('admins/style/ueditor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{URL::asset('admins/style/ueditor/ueditor.all.min.js')}}"> </script>
                            <script type="text/javascript" charset="utf-8" src="{{URL::asset('admins/style/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                            <script id="editor" name="content" type="text/plain" style="width:710px;height:400px;"></script>
                            <script type="text/javascript">
                            var ue = UE.getEditor('editor');
                            </script>
                            <style>
                                .edui-default{line-height: 28px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; height:20px;}
                                div.edui-box{overflow: hidden; height:22px;}
                            </style>
	                    </div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2"></label>
                    	 <div class="col-sm-8">
                    	 	<button type="reset" class="btn btn-default">重置</button>
                    	  	<button type="button"  onclick="checkForm()" class="btn btn-info pull-right">提交</button>
                    	 </div>
                    </div>
                  </div>
                  <div class="box-footer row">

                  </div>
                </form>
              </div>

          </div>
	   </div>
	</section>
</div>

<script type="text/javascript">
    var editor;
    $(function () {
        //具体参数配置在  editor_config.js 中
        var options = {
            zIndex: 999,
            initialFrameWidth: "100%", //初化宽度
            initialFrameHeight: 400, //初化高度
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign',//允许的最大字符数 'fullscreen',
            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: true
         /*   autotypeset: {
                mergeEmptyline: true,        //合并空行
                removeClass: true,           //去掉冗余的class
                removeEmptyline: false,      //去掉空行
                textAlign: "left",           //段落的排版方式，可以是 left,right,center,justify 去掉这个属性表示不执行排版
                imageBlockLine: 'center',    //图片的浮动方式，独占一行剧中,左右浮动，默认: center,left,right,none 去掉这个属性表示不执行排版
                pasteFilter: false,          //根据规则过滤没事粘贴进来的内容
                clearFontSize: false,        //去掉所有的内嵌字号，使用编辑器默认的字号
                clearFontFamily: false,      //去掉所有的内嵌字体，使用编辑器默认的字体
                removeEmptyNode: false,      //去掉空节点
                                             //可以去掉的标签
                removeTagNames: {"font": 1},
                indent: false,               // 行首缩进
                indentValue: '0em'           //行首缩进的大小
            }*/
        };
        editor = new UE.ui.Editor(options);
        editor.render("post_content");
    });  
    
    
	$('#publish_time').daterangepicker({
		format:"YYYY-MM-DD",
		singleDatePicker: true,
		showDropdowns: true,
		minDate:'2016-01-01',
		maxDate:'2030-01-01',
		startDate:'{{date('Y-m-d', time())}}',
	    locale : {
            applyLabel : '确定',
            cancelLabel : '取消',
            fromLabel : '起始时间',
            toLabel : '结束时间',
            customRangeLabel : '自定义',
            daysOfWeek : [ '日', '一', '二', '三', '四', '五', '六' ],
            monthNames : [ '一月', '二月', '三月', '四月', '五月', '六月','七月', '八月', '九月', '十月', '十一月', '十二月' ],
            firstDay : 1
        }
	});
	
	function checkForm(){
		if($('input[name="title"]').val() == ''){
			alert("请填写文章标题！");
			return false;
		}
		if($('#cat_id').val() == '' || $('#cat_id').val() == 0){
			alert("请选择文章类别！");
			return false;
		}
		if($('#post_content').val() == ''){
			alert("请填写文章内容！");
			return false;
		}
		$('#add_post').submit();
	}
</script>
</body>
</html>