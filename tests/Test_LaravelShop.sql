# >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
# 商城前台
# -------------------------
# 测试取消收藏
# -------------------------
insert tp_goods_collect values(null,1,56,unix_timestamp(now()));
select * from tp_goods_collect where user_id=1;
# >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
# 商城后台
# -------------------------
# 测试
# -------------------------