<?php
//特集ページは遅延して読み込み
$special_locale = array(
    //seo
    'keyword' => '東京,日本,旅遊,購物,優惠券,打折,折扣券,DHC,專題介紹',
    'description' => '有很多未在香港，台灣發售的DHC商品。日遊酷棒是可以以99元的價格任您選擇日本的家電賣場，百貨店，化妝品店可以享受大幅折扣的優惠券的網站。',
    'title' => '因爲是直營店，所以您可以放心購買，DHC特集｜日遊酷棒',
    'h1' => '因爲是直營店，所以您可以放心購買，DHC特集',
    'dhc_direct_management'=>'直營店',
    'dhc_sub_copy_text' => '純橄情煥采精華油至今已走過近30年的曆程。<br />DHC一貫追求並提供能夠百倍呵護肌膚，質量上乘，價格適中的産品。<br />之所以能夠在化妝品和健康食品行業取得No.1※的成績，<br />正是源自廣大顧客對DHC的信任和滿意，感謝您對DHC的支持！<br />※2010年1月1日 日本流通産業報 郵購，函授教育 銷售額排名',
    'dhc_h3_title_1' => '商品特點',
    'dhc_h4_text_1' => '生存在嚴酷自然環境中的植物，天生擁有超凡的自我保護成分和細胞機能，爲了拯救飽受壓力或因環境變化而失去平衡的肌膚，DHC不斷探求植物中能夠提高肌膚原有機能的成分，並將其運用于護膚領域，溫和作用，使肌膚保持健康狀態。',
    'dhc_h4_text_2' => '選取西班牙完全有機栽培的橄榄，手工采摘富含抗氧化成分的幼嫩果實，且僅收集果肉分離時自然滴落的“油之精華”。因爲珍貴，被西班牙權威機構授予了質量保證書。包括純橄情煥采精華油在內的DHC衆多護膚品，彩妝品均以其爲主要原料。',
    'dhc_h4_text_3' => '“滿足所有膚質的各種願望”一直是DHC的宗旨。爲了使敏感肌膚也能安心使用，DHC一概不添加多余的香料和色素。極力追求産品的安全性。從原料到配料，貫穿整個成品化過程，並始終以“不刺激肌膚”爲目標，將優質化妝品奉獻給顧客。',
    'dhc_photo_text_1' => '在商品琳琅滿目的DHC直營店裏，您可以在整齊陳列的DHC商品前面，<br />自由地利用試用裝來測試顔色和質感。<br />這裏除了有您熟悉的DHC商品，<br />還有在中國尚未上市的廣受好評的商品，您可買來做爲禮物饋贈親朋。<br />更可以享受到只適用于日本國內的促銷優惠價格，<br />光臨直營店時請一定別錯過。<br />此外，大部分店鋪都可以使用銀聯卡，<br />購物變得更加方便，更有樂趣。<br />店員們以直營店特有的真誠待客和熱情服務<br />迎接您的光臨。',
    'dhc_photo_text_2' => '在DHC直營店裏，除了可以嘗試産品的使用感和顔色外，<br />店員還將根據顧客的皮膚情況提出護膚建議和適用的産品。<br />此外，還提供快速化妝咨詢和化妝服務！<br />爲了滿足顧客“試過後再買！”的需要，<br />真誠爲您提出建議。',
    'dhc_h3_title_2' => '適合作爲禮品的DHC商品',
    'dhc_h3_title_3' => 'DHC直營店的優惠情況結介紹',
    'dhc_h5_title_1' => 'DHC深層卸妝油',
    'dhc_product_text_1' => '雖為“油”，卻能用水洗淨，實現劃時代的卸妝。只需輕輕按摩，不僅難以脫落的彩妝，就連毛孔內的污垢都能一併卸淨。在直營店內大受青睞的純植物卸妝油。',
    'dhc_h5_title_2' => 'DHC純欖護唇膏',
    'dhc_product_text_2' => '溫柔呵護雙唇的植物性護唇膏。主要含有橄欖精華油，並添加了各種植物精華和維生素E等。保濕效果優異，防止唇部乾燥。是一款一年四季都很暢銷的熱賣商品。',
    'dhc_h5_title_3' => 'DHC水嫩眼膜',
    'dhc_product_text_3' => '將富含橄欖葉精華等植物保濕成份的美容液密封於高分子凝膠中，製成眼部專用貼膜。能緊密貼合肌膚，並遠遠深入肌膚深層。<br />賦予眼部彈力和水潤，可貼著入睡。最適合送禮。',
    
);
global $con;
$con->locale = array_merge($con->locale,$special_locale);
?>
