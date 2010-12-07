<?php
//特集ページは遅延して読み込み
$special_locale = array(
    //seo
    'keyword' => '东京,日本,旅游,购物,优惠券,打折,折扣券,Dr.Ci:Labo,专题介绍',
    'description' => '皮肤科专家研制的药用化妆品Dr.Ci:Labo。日游酷棒是可以以99元的价格无限量获取在日本的家电卖场,百货店,化妆品店可以享受大幅折扣的优惠券的网站。',
    'title' => '日本现在最畅销的化妆品Dr.Ci:Labo的专题介绍｜日游酷棒',
    'h1' => '日本现在最畅销的化妆品Dr.Ci:Labo的专题介绍',
    'venusfort_h2_point_wrap' => '我们的特色',
    'venusfort_h2_point_wrap_title_1' => '全方位的对外服务',
    'venusfort_h2_point_wrap_text_1' => '我们力图为中国游客提供舒适，便利的购物环境。馆内常年设有会说中文的工作人员，约30家店铺提供免税服务。此外，馆内所有店铺（销售推车除外）都可使用银联卡结算。',
    'venusfort_h2_point_wrap_title_2' => '从羽田机场出发仅15分钟',
    'venusfort_h2_point_wrap_text_2' => '羽田机场14号乘车处设有直达维纳斯城堡的机场巴士。即使手持旅行箱等大件行李，乘机场巴士15分钟后就能立即享受购物和美食的乐趣。',
    'venusfort_h2_point_wrap_title_3' => '馆内景点及服务设施',
    'venusfort_h2_point_wrap_text_3' => '馆内设有自动寄存柜，ATM取款机及供携带幼儿顾客放心使用的哺乳室等服务设施。',
 
 
    'venusfort_h2_about' => '关于维纳斯城堡',
    'venusfort_h2_about_text' => '中世纪欧洲古典街道风格的大型主题购物中心。<br />随时间流逝不断变化的天幕演绎“白天～黄昏～夜空” 戏剧化的世界，展示不同于外部的典雅、娴静的氛围空间。 2009年12月，3楼卖场隆重推出东京23区首家“都市型奥特莱斯”，全馆变身为楼层特色鲜明的垂直型综合购物中心。',
    
    'venusfort_title_logo' => '全新标志',
    'venusfort_title_logo_title' => '将拥有不同性质、特色的「三楼层」标志化',
    'venusfort_title_logo_text_1' => '3F＝代表天空的蓝色',
    'venusfort_title_logo_text_2' => '2F＝代表原有维纳斯城堡的粉红色',
    'venusfort_title_logo_text_3' => '1F＝代表大地的绿色',
    
    'venusfort_title_floor' => '楼层构成',
    'venusfort_title_floor_title_1' => '3楼',
    'venusfort_title_floor_text_1' => '东京23区首家 “都市型奥特莱斯” 诞生。以流行服饰、家居用品为中心，集聚日本国内外约50家品牌店。尤其汇聚了在 “涩谷/原宿” 备受年轻人喜爱的、最合时宜的奥特莱斯精品店。',
    'venusfort_title_floor_title_2' => '2楼',
    'venusfort_title_floor_text_2' => '作为引领时尚潮流的魅力楼层，2楼浓缩最新的流行趋势，增添化妆品、珠宝首饰等深受欢迎的商品种类。“巴宝莉蓝标系列”、精选资生堂等日本原产化妆品的专卖店“MUSEE DE PEAU ”等备受关注。',
    'venusfort_title_floor_title_3' => '1楼',
    'venusfort_title_floor_text_3' => '1楼主要销售儿童、宠物、运动等生活类商品，品种多样、种类齐全，是适合全家老少同乐的楼层。2010年4月，日本老牌家电连锁店 “Laox” 隆重开业，主打商品有数码家电,日本精工及卡西欧等精美手表。',

    'venusfort_h2_access' => '交通路线',
    'venusfort_access_map' => '访问地图',
    'venusfort_access_map_title_1' => '从羽田机场出发',
    'venusfort_access_map_text_1' => '● 请乘开往“调色板城”方向的“机场豪华巴士”',
    'venusfort_access_map_text_2' => '● 请乘开往“东京国际展览馆”方向的“京急机场巴士”，在“调色板城前”下车',
    'venusfort_access_map_title_2' => '从成田机场出发',
    'venusfort_access_map_text_3' => '● 请乘开往“东京日航饭店”或“台场太平洋大酒店”方向的“机场豪华巴士”',
);
global $con;
$con->locale = array_merge($con->locale,$special_locale);
?>
