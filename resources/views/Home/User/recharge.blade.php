<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>账户资金-{$tpshop_config['shop_info_store_title']}</title>
    <meta http-equiv="keywords" content="{$tpshop_config['shop_info_store_keyword']}" />
    <meta name="description" content="{$tpshop_config['shop_info_store_desc']}" />
    <!-- <link rel="stylesheet" href="__STATIC__/css/index.css" type="text/css"> -->
    <link rel="stylesheet" href="{{URL::asset('Static/css/page.css')}}" type="text/css">
    <script src="{{URL::asset('Static/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{URL::asset('Static/js/slider.js')}}"></script>

</head>

<body>
<!--------头部开始-------------->
{{--<include file="Public/header" />--}}
@include('Home.Public.header')
<!--------头部结束-------------->

<div class="layout ov-hi">
    <div class="breadcrumb-area">    
	    <foreach name="navigate_user" key="k" item="v">
	        <if condition="$k neq '首页'"> > </if>  
            <a href="{$v}">{$k}</a> 
        </foreach>
    </div>
</div>
<div class="layout pa-to-10 fo-fa-ar">
    <!--菜单-->
    {{--<include file="User/menu" />--}}
    @include('Home.User.menu')
    <!--菜单-->
    <div class="fr wi940">
        <div class="he50 wddd">
            <div class="fl ddd-h2">
                <h2><span>我的钱包</span></h2>
            </div>
        </div>
        <div class="aboutmoney mywallets" style="display:black">
            <div class="usermoney">
                <div class="usertop">
                    <h2>账户概况</h2>
                    <div class="usercontent">
                        <ul class="account-balance">
                            <li>
                                <div class="balance"><p>账户余额</p></div>
                                <div class="account"><h3>￥{$user.user_money}</h3></div>
                                <div class="topup">
                                    <span class="tuchong"><a  onclick="mywalletstopup()">充值</a></span>
                                    <span>|</span>
                                    <span><a href="{{url('home/user/withdrawals')}}">提现</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="balance"><p>积分</p></div>
                                <div class="account"><h3>{$user.pay_points}</h3></div>
                                <div class="topup"><span>100积分=1元</span></div>
                            </li>
                        </ul>
                    </div>
                    <div class="userc">
                        <ul>
                            <li><span>我的账户</span></li>
                            <li><span>我的积分</span></li>
                        </ul>
                    </div>
                </div>
                <div class="userdown">
                    <div class="userdown-top">
                        <ul>
                            <a href="{{url('home/user/recharge')}}"><li <if condition="$_GET['type'] eq ''">class="alllist"</if>>充值记录</li></a>
                            <a href="{:U('Home/User/recharge',array('type'=>1))}"><li <if condition="$_GET['type'] eq 1">class="alllist"</if>>消费记录</li></a>
                        </ul>
                    </div>
                    <hr style="height: 1px; background: #dedede; border: none; margin-top: -2px;" />
                    <if condition="$_GET['type'] neq 1">
                    <div class="userdown-down recharge_log">
                        <div class="ttmt">
                            <ul>
                                <li>时间</li><li>状态</li><li>金额</li><li>支付方式</li>
                            </ul>
                        </div>
                        <foreach name="recharge_list" item="vo">
                        <div class="ttmt-list">
                            <ul>
                                <li>{$vo.ctime|date='Y-m-d H:i:s',###}</li>
                                <li><if condition="$vo[pay_status] eq 0">待支付<else/>已支付</if></li>
                                <li>￥{$vo.account}</li>
                                <li>{$vo.pay_name}</li>
                            </ul>
                        </div>
                        </foreach>
                    </div>
                    <div class="recharge_log">{$page}</div>
                    <else/>
                   <div class="userdown-down consume_log">
                        <div class="ttmt">
                            <ul>
                                 <li>消费时间</li><li>金额</li><li>订单号</li><li>描述</li>
                            </ul>
                        </div>
                        <foreach name="consume_list" item="vv">
                        <div class="ttmt-list">
                            <ul>
                                <li>{$vv.change_time|date='Y-m-d H:i:s',###}</li>
                                <li>￥{$vv.user_money}</li>
                                <li>{$vv.order_sn}</li>
                                <li>{$vv.desc}</li>
                            </ul>
                        </div>
                        </foreach>
                    </div>
                    <div class="consume_log">{$page2}</div>
                    </if>
                </div>
            </div>
        </div>
        <div class="aboutmoney addmon" style="display:none">
            <div class="usermoney topup-money">
                <div class="userdown-top network-topup">
                    <ul>
                        <li class="alllist" style="margin-left: -1px">网银充值</li>
                    </ul>
                    <p onclick="mywalletsa();">返回我的钱包</p>
                </div>
                <hr style="height: 1px; background: #dedede; border: none; margin-top: -2px;" />
                <div class="choicetu">
                    <p>选择充值金额：</p>
                    <div class="monettu">
                        <div class="fop-main">
                            <div class="m-tagbox m-multi-tag">

                                <a href="javascript:void(0)" rel="50" class="tag-item">￥50.00<i class="t-check tptig"></i></a>

                                <a href="javascript:void(0)" rel="100" class="tag-item">￥100.00<i class="t-check"></i></a>

                                <a href="javascript:void(0)" rel="200" class="tag-item">￥200.00<i class="t-check"></i></a>

                                <a href="javascript:void(0)" rel="500" class="tag-item">￥500.00<i class="t-check"></i></a>
                                
                                <div class="tag-define" data_id="tag_157">
                                    <span class="define-label" style="display: block;"><i class="i-pen"></i><em>输入金额</em></span>
                                    <input type="text" class="define-input" id="input_val" style="display: none;">
                                 </div>
                            </div>
                        </div>
                        <div class="fop-choice">
                            <form action="" method="post"  id="recharge_form">
                                <div class="orde-sjyy">
                                    <div class="bsjy-g">
                                        <dl>
                                            <dd>
                                             <div class="order-payment-area">
                                                 <div class="dsfzfpte">
                                                     <b>选择支付方式</b>                               
                                                 </div>
                                                 <div class="po-re dsfzf-ee">
                                                     <ul>
                                                     	<foreach name="paymentList" item="v"  key="k">      
                                                     	<li>
					                                    	<div class="payment-area">
					                                        	<input type="radio"  value="pay_code={$v['code']}" class="radio vam" name="pay_radio" <if condition="$k eq 'alipay'">checked</if>>
					                                            <label for="">
					                                            	<img src="/plugins/{$v['type']}/{$v['code']}/{$v['icon']}" width="120" height="40" onClick="change_pay(this);" />
					                                            </label>
					                                        </div>
                                                         </li>
                                                         </foreach>                              
                                                     </ul>
                                                 </div>
                                             </div>
                                            <!--第三方网银支付 start-->
                                             <foreach name="bankCodeList" item="v"  key="k">
                                              <div class="order-payment-area">
                                                    <div class="dsfzfpte">
                                                       <b>{$paymentList[$k]['name']}</b>
                                                       <em>网银支付</em>
                                                    </div>
                                                    <div class="po-re dsfzf-ee">
                                                        <ul>
                                                        <foreach name="v" item="v2"  key="k2">
                                                          <li>
				                                            <div class="payment-area">
				                                                <input type="radio" name="pay_radio" class="radio vam" value="pay_code={$k}&bank_code={$v2}" id="input-ALIPAY-1">
				                                                <label for="">
				                                            	<img src="__STATIC__/images/images-out/{$bank_img[$k2]}" width="120" height="40" onClick="change_pay(this);"/>
				                                                </label>
				                                            </div>
                                                           </li>
                                                        </foreach>                                                               
                                                        </ul>
                                                    </div> 
                                                </div>
                                                </foreach>                   
                                            <!--第三方网银支付 end -->                             
                                            </dd>
                                        </dl>
                                        <input type="hidden" name="account" id="add_money" value="50">
                                        <div class="order-payment-action-area">                    
                                            <a class="button-style-5 button-confirm-payment" href="javascript:void(0);" onclick="recharge_submit()">确认支付方式</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
<div class="he80"></div>
<!--------footer-开始-------------->
{{--<include file="Public/footer2" />--}}
@include('Home.Public.footer2')
<!--------footer-结束-------------->
</body>
<script>
    $(function () {
         $(".userdown-top ul li").click(function () {
            $(this).addClass('alllist').siblings().removeClass('alllist');
         });
    });
    
    function mywalletsa() {
        $('.mywallets').show();
        $('.addmon').hide();
    };
    function mywalletstopup() {
       $('.addmon').show();
       $('.mywallets').hide();
    };

    $(document).ready(function() {
        $(document).on('click','.tag-item',function(){
            $(this).find('.t-check').addClass('tptig').parent().siblings().find('.t-check').removeClass('tptig');           
            $('#add_money').val($(this).attr('rel'));
        });
        $('.tag-define').click(function(){
            var goods_id = $(this).attr('data_id').substr(4);
            $(this).find('.define-label').hide();
            $(this).find('.define-input').show().focus();
            $(this).find('.define-input').blur(function(){
                var ce = $(this).val();
                ce = ce.replace(/\D|^0/g,'')                           
                $(this).parent('.tag-define').siblings('.tag-item').each(function(){
                    var a_text = $(this).text();
                    if(ce == a_text && ce != ''){
                        alert('已有该标签!');
                        ce = '';
                        $('.define-input').val('');
                    }
                });
                if(ce == ''){
                    $(this).prev('.define-label').show();
                    $(this).hide();
                }else{

                }
            })
        });
        
    });

    $(function () {
        //高亮显示
        var active = '{$active_status}';
        if(!active)
            active = 'ALL';
        $('.wddd-li li').removeClass('wddd-red');
        $('#'+active).addClass('wddd-red');

        $("#h-s").mouseover(function () {
            $('.ec-ta-x').css('left','124px');
            $('.ec-ta-x').css('width','110px');
            $(this).addClass("cullent");
        });
        $("#h-s").mouseout(function () {
            $('.ec-ta-x').css('left','0px');
            $('.ec-ta-x').css('width','124px');
            $(this).removeClass("cullent");
        });
        $("#q-s").mouseover(function () {
            $('.ec-ta-x').css('left','0px');
            $(this).addClass("cullent");
        });
        $("#q-s").mouseout(function () {
            $('.ec-ta-x').css('left','0px');
        });
    });
    
    function recharge_submit(){
    	var input_val = parseInt($('#input_val').val());
    	if(input_val>0){
    		$('#add_money').val(input_val);
    	}
    	var account = $('#add_money').val();
    	if(isNaN(account) || parseInt(account)<=0 || account==''){
    		alert('请输入正确的充值金额');
    		return false;
    	}
    	$('#recharge_form').submit();
    }
    
//    function switchTab(obj,showdiv){
//    	$(obj).siblings().removeClass('alllist');
//    	$(obj).addClass('alllist');
//    	if(showdiv == 'recharge_log'){
//    		$('.recharge_log').show();
//    		$('.consume_log').hide();
//    	}else{
//    		$('.recharge_log').hide();
//    		$('.consume_log').show();
//    	}
//    }
</script>
</html>