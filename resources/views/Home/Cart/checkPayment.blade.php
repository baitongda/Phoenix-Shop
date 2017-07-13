<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>成功提交订单-{$tpshop_config['shop_info_store_title']}</title>
<meta http-equiv="keywords" content="{$tpshop_config['shop_info_store_keyword']}" />
<meta name="description" content="{$tpshop_config['shop_info_store_desc']}" />
</head>
<body>
<script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('js/global.js')}}"></script>
<script src="{{asset('js/pc_common.js')}}"></script>
<script src="{{asset('js/layer/layer.js')}}"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
@include("Home/Public/siteTopbar")
    <div class="order-header">
    	<div class="layout after">
        	<div class="fl">
            	<div class="logo pa-to-36 wi345">
                	<a href="/"><img src="" alt=""></a>
                </div>
            </div>
        	<div class="fr">
            	<div class="pa-to-36 progress-area">
                	<div class="progress-area-wd" style="display:none">我的购物车</div>
                	<div class="progress-area-tx" style="display:none">填写核对订单信息</div>
                	<div class="progress-area-cg">成功提交订单</div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout after-ta order-ha">
    	<div class="erhuh">
        	<i class="icon-succ"></i>
            <h3>订单提交成功，请您尽快付款！</h3>
            <p class="succ-p">
            订单号：&nbsp;&nbsp;{{$order->order_sn}}&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
            付款金额（元）：&nbsp;&nbsp;<b>{{$order->total_amount}}</b>&nbsp;<b>元</b></p>
            <div class="succ-tip">
            	请您在&nbsp;&nbsp;<b>{{date('Y-m-d',strtotime($order->valid_time))}}</b>&nbsp;日前完成支付，否则订单将自动取消
            </div>
        </div>
        <div class="ddxq-xiaq">
        	<a href="{{url('home/order/orderDetail',['id'=>$order->order_id])}}">
            	订单详情
                <i></i>
            </a>
        </div>
    <!--
    -->
    <form action="{:U('Home/Payment/getCode')}" method="post" name="cart4_form" id="cart4_form">
        <div class="orde-sjyy">
        	{{--<h3 class="titls">选择支付方式</h3>--}}
            <div class="bsjy-g">
            	<dl>
            		<dd>
					{{--
						<div class="order-payment-area">
                        	<div class="dsfzfpte">
                            	<b>选择支付方式</b>
                            </div>
                            <div class="po-re dsfzf-ee">
                            	<ul>
                                <foreach name="paymentList" item="v"  key="k">
                            		<li>
                                    	<div class="payment-area">
                                        	<input type="radio" id="input-ALIPAY-1" value="pay_code={$v['code']}" class="radio vam" name="pay_radio" >
                                            <label for="">
                                            	<img src="/plugins/{$v['type']}/{$v['code']}/{$v['icon']}" width="120" height="40" onClick="change_pay(this);" />
                                            </label>
                                        </div>
                                    </li>
                                </foreach>
                            	</ul>
                            </div>
                        </div>
                     --}}
                    <!--第三方网银支付 start-->
                    {{--<foreach name="bankCodeList" item="v"  key="k">
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
                    </foreach>--}}
                    <!--第三方网银支付 end -->

                    </dd>
            	</dl>
                <div class="order-payment-action-area">
                    <a class="button-style-5 button-confirm-payment" href="javascript:void(0);" onClick="$('#cart4_form').submit();" >确认支付</a>
                </div>
            </div>
        </div>
        <input type="hidden" name="order_id" value="{{$order->order_id}}" />
    </form>

    </div>
<!--------footer-开始-------------->
@include("Home.Public.footer")
<!--------footer-结束-------------->
<script>
    $(document).ready(function(){
        $("input[name='pay_radio']").first().trigger('click');
    });
    // 切换支付方式
    function change_pay(obj)
    {
        $(obj).parent().siblings('input[name="pay_radio"]').trigger('click');
    }
</script>
</body>
</html>
