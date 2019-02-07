-- MySQL dump 10.13  Distrib 5.5.55, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: rabbit_rabbitforever
-- ------------------------------------------------------
-- Server version	5.5.55-0+deb8u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cmn_announcement`
--

DROP TABLE IF EXISTS `cmn_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmn_announcement` (
  `sid` bigint(20) NOT NULL AUTO_INCREMENT,
  `seq` bigint(20) DEFAULT NULL,
  `topic_en` varchar(255) NOT NULL,
  `topic_tc` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `content_en` text NOT NULL,
  `content_tc` text,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmn_announcement`
--

LOCK TABLES `cmn_announcement` WRITE;
/*!40000 ALTER TABLE `cmn_announcement` DISABLE KEYS */;
INSERT INTO `cmn_announcement` VALUES (1,1,'test',NULL,'http://www.yahoo.com','<b>Testing Bold</b><br/>\r\nThis is a testing bold Body',NULL,NULL,'2013-10-24 10:35:11','2013-10-24 02:35:13',NULL,NULL);
/*!40000 ALTER TABLE `cmn_announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cmn_blog`
--

DROP TABLE IF EXISTS `cmn_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmn_blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `blog_date` datetime DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` text,
  `content_cm` text,
  `language_code` varchar(255) DEFAULT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmn_blog`
--

LOCK TABLES `cmn_blog` WRITE;
/*!40000 ALTER TABLE `cmn_blog` DISABLE KEYS */;
INSERT INTO `cmn_blog` VALUES (1,'2017-02-18 13:09:56','頭髮','在很久以前，讀過倪匡先生一本小說叫\"頭髮\" 內容 大致上講~地球人原本是另一個不知名星球上的一些被 判終身監禁的罪犯，地球就是這些罪犯的監獄，那時的星球人還會飛，頭髮就在飛行中有著一定的用途，只是地球有些極美味的東西叫\"地肥\"，在吃得多地肥的情況下，外星罪犯的飛行能力漸漸地失去，頭髮的用途也隨之而消失，而頭髮的唯一用途就只有遮掩頭顱。 到現今世代頭髮還有一個很重要的任務，就是讓人類看起來更\"美\"。當你還有頭髮或是發覺頭開始偷偷背叛你，想離你而去時，就要開始為頭髮去做點挽留工作了。 正常人每天大約會掉落50條頭髮左右，最多也不超過100條，頭髮撤退有著很多原因，攝取太多高脂肪使血液現酸性；銅攝取不足；壓力太大使頭皮血管收縮；或是焦慮憂愁使血液循環 差，使營養無法到達細胞及毛囊；等等以至掉髮過多髮。 不同髮質問題，有著不同的原因。 不過，要知頭髮需要什麼營養，要吃些什麼，要怎麼樣保養，上網一查所有答案一覧無遺，無需我多講，在這裡想分享些頗有趣的民間偏方 : 偏方一 : 梳頭～ 每天梳頭最少100 下 ，要由前梳向後，由後梳回前，由左梳向右，又由右梳向左，一百回。 偏方二: 按摩~ 每晚睡前 按摩頭皮十分鐘，當然最好用手按啦！ 偏方三 : 用鹽水洗頭~ 首先洗淨頭髮後，再用鹽水在頭皮上按摩一至兩分鐘，當然之後要用清水沖洗乾淨喇。 偏方四 : (最有效)吸引力法則~ 常常想著“我有一頭烏黑亮麗的秀髮，我有一頭烏黑亮麗的秀髮，我有我有，頭髮頭髮”  以上方法並不代表本 blog 立場，而且，見仁見智，信不信由你。～完～','<p>在很久以前，讀過倪匡先生一本小說叫&quot;頭髮&quot; 內容 大致上講~地球人原本是另一個不知名星球上的一些被 判終身監禁的罪犯，地球就是這些罪犯的監獄，那時的星球人還會飛，頭髮就在飛行中有著一定的用途，只是地球有些極美味的東西叫&quot;地肥&quot;，在吃得多地肥的情況下，外星罪犯的飛行能力漸漸地失去，頭髮的用途也隨之而消失，而頭髮的唯一用途就只有遮掩頭顱。</p>\n\n<p>到現今世代頭髮還有一個很重要的任務，就是讓人類看起來更&quot;美&quot;。當你還有頭髮或是發覺頭開始偷偷背叛你，想離你而去時，就要開始為頭髮去做點挽留工作了。 正常人每天大約會掉落50條頭髮左右，最多也不超過100條，頭髮撤退有著很多原因，攝取太多高脂肪使血液現酸性；銅攝取不足；壓力太大使頭皮血管收縮；或是焦慮憂愁使血液循環 差，使營養無法到達細胞及毛囊；等等以至掉髮過多髮。 不同髮質問題，有著不同的原因。</p>\n\n<p>不過，要知頭髮需要什麼營養，要吃些什麼，要怎麼樣保養，上網一查所有答案一覧無遺，無需我多講，在這裡想分享些頗有趣的民間偏方 :</p>\n\n<p>偏方一 : 梳頭～ 每天梳頭最少100 下 ，要由前梳向後，由後梳回前，由左梳向右，又由右梳向左，一百回。</p>\n\n<p>偏方二: 按摩~ 每晚睡前 按摩頭皮十分鐘，當然最好用手按啦！</p>\n\n<p>偏方三 : 用鹽水洗頭~ 首先洗淨頭髮後，再用鹽水在頭皮上按摩一至兩分鐘，當然之後要用清水沖洗乾淨喇。</p>\n\n<p>偏方四 : (最有效)吸引力法則~ 常常想著&ldquo;我有一頭烏黑亮麗的秀髮，我有一頭烏黑亮麗的秀髮，我有我有，頭髮頭髮&rdquo;</p>\n\n<p>以上方法並不代表本 blog 立場，而且，見仁見智，信不信由你。</p>\n\n<p>～完～</p>\n','LANG_TC',1,'emilywong','emilywong','2017-02-18 18:09:56','2017-02-18 18:09:56','						'),(2,'2017-02-05 17:08:43','朋友','某日，跟老板開會時講到Wechat 我說我沒玩這個，老板說有點像 facebook 。 開完會返埋位，手痕痕的開了個 wechat account，誰知原來一開，wechat 就會“拼拎彭柵”自把自為地走去add 我 phonebook 入面所有人(如有wechat 者)， 首當其衝者是我老板，他忽然大叫: 你開咗wechat呀！。噢！ 我就這樣中伏了。不過開了兩天，會回應我 add 的朋友不多，呀吓！莫非我中了傳說中的“相識滿天下，知心無幾人”毒咒? 哈哈！是個有趣的實驗 ! 不過這世界什麼都是“等價交換”又名“ 有因有果”，友情是需要時間跟誠意去經營。這樣又有幾多人能滿天下所相識的都是知己? 也許我比較懶，也許我比較“慎重而嚴謹”的結交好友，也許我很會找借口。 什麼都好 ! 現今科技的進步，又令人類在生活領域中多了一番新體驗。','<p>某日，跟老板開會時講到Wechat 我說我沒玩這個，老板說有點像 facebook 。 開完會返埋位，手痕痕的開了個 wechat account，誰知原來一開，wechat 就會“拼拎彭柵”自把自為地走去add 我 phonebook 入面所有人(如有wechat 者)， 首當其衝者是我老板，他忽然大叫: 你開咗wechat呀！。噢！ 我就這樣中伏了。不過開了兩天，會回應我 add 的朋友不多，呀吓！莫非我中了傳說中的“相識滿天下，知心無幾人”毒咒? 哈哈！是個有趣的實驗 ! 不過這世界什麼都是“等價交換”又名“ 有因有果”，友情是需要時間跟誠意去經營。這樣又有幾多人能滿天下所相識的都是知己? 也許我比較懶，也許我比較“慎重而嚴謹”的結交好友，也許我很會找借口。 什麼都好 ! 現今科技的進步，又令人類在生活領域中多了一番新體驗。</p>','LANG_TC',1,'emilywong','emilywong','2017-02-05 09:08:43','2017-02-05 09:08:43',NULL),(3,'2017-02-05 17:05:42','同是90後年輕人不同的我見','某天上火車前，中伏地買了兩磅散散甩甩到無可再散的龍眼。上到火車坐低刹那膠袋一甩手，滿地眼龍。正在狼狽地收拾殘局之際，對面一對原本只低著頭打手機大約二十多歲的年輕男女，二話不說，一個箭步，眼明手快地幫我收拾了大部分企圖逃走的龍眼們後，絕對不用我說聲謝的姿態，不發一言頭也不回地走回自己位，繼續打機。誰說90 後不會顧自及人，這些90後卻型可愛到不得了。 不過世上同一個世紀的人類卻有著不同的個性。某次為客人訂貨，訂貨資料太多，所以只好請客人跟某店一位新店員聯絡。這位90後店員收了所有資料後，我跟他聯絡過，他還說會盡快安排。一個星期後我sent 了e-mail 問進度，他卻連一個字也不回。到兩個星期過去再 sent email ，email address 已經是 unable to deliver。太奇怪，我只好找回之前聯絡過的 Manager 詢問，他卻說沒有我客戶的資料。原來這名90後新店員在接手我訂單時已經 辭職了，做到月尾就會走。但他卻沒有在臨走前，安排好自己的交接手續，由得客人自生自滅，自己走了就不再跟自己有關!? 這種不負責任的賴皮態度，無論去到那裡都總會一事無成。 90後嘅人種，其實有好多種。','<p>某天上火車前，中伏地買了兩磅散散甩甩到無可再散的龍眼。上到火車坐低刹那膠袋一甩手，滿地眼龍。正在狼狽地收拾殘局之際，對面一對原本只低著頭打手機大約二十多歲的年輕男女，二話不說，一個箭步，眼明手快地幫我收拾了大部分企圖逃走的龍眼們後，絕對不用我說聲謝的姿態，不發一言頭也不回地走回自己位，繼續打機。誰說90 後不會顧自及人，這些90後卻型可愛到不得了。 不過世上同一個世紀的人類卻有著不同的個性。某次為客人訂貨，訂貨資料太多，所以只好請客人跟某店一位新店員聯絡。這位90後店員收了所有資料後，我跟他聯絡過，他還說會盡快安排。一個星期後我sent 了e-mail 問進度，他卻連一個字也不回。到兩個星期過去再 sent email ，email address 已經是 unable to deliver。太奇怪，我只好找回之前聯絡過的 Manager 詢問，他卻說沒有我客戶的資料。原來這名90後新店員在接手我訂單時已經 辭職了，做到月尾就會走。但他卻沒有在臨走前，安排好自己的交接手續，由得客人自生自滅，自己走了就不再跟自己有關!? 這種不負責任的賴皮態度，無論去到那裡都總會一事無成。 90後嘅人種，其實有好多種。</p>','LANG_TC',1,'emilywong','emilywong','2017-02-05 09:05:42','2017-02-05 09:05:42',NULL),(4,'2017-01-17 06:17:51','目擊有人跳軌事件','某個星期日晚上大約十時，我在九龍塘火車站上到月台時，由於車已經“嘟嘟嘟”地叫，我沒有追車，慢慢行去車頭方向，其間車門還未關上，聽到有個女人在大叫，起初聽不懂說話內容，因為她講類似普通話，後來行近見她一個大字型的橫跨車箱與月台之間，不斷向下望，好像跌了些什麼落路軌下面，叫著不要開車，。車當然堅持地關門，女人只好彈回月台，但死都站在黃線以外，一面不斷望月台底的路軌位置一面大叫“飛處鳥”。車在她身邊飛過，險象環生，月台上有個貌似國內人的男人叫她返回月台，說著叫港鐵職員幫她。但女人沒有理會，等車開走， 武功 高強的她二話不說就“咚”一聲跳落路軌，高興地拾回跌在路軌下的東西。我還以為她掉了部手提電話，但原來是一封利是。剛才叫她找職員的那個男人一個箭步上前，一手把她拉回月台，過程好快，只在5至10秒間的事。由於兩面線烈車都剛開走，所以留在月台的乘客不多，又事出突然，所以沒有乘客影到相。當男人把女人拉上來時不停罵她“你要錢不要命吖”（國語）。\r\n到底封利事是否內藏巨款? 還是那女人危機意識低到以為以她那所向披靡的武功強至可擋列車? \r\n之後不知有沒有職員捉到她，如果捉到，港鐵又依法辦事的話，那麼罰款分分鐘貴過用命換回來的那封利是！','<p>某個星期日晚上大約十時，我在九龍塘火車站上到月台時，由於車已經“嘟嘟嘟”地叫，我沒有追車，慢慢行去車頭方向，其間車門還未關上，聽到有個女人在大叫，起初聽不懂說話內容，因為她講類似普通話，後來行近見她一個大字型的橫跨車箱與月台之間，不斷向下望，好像跌了些什麼落路軌下面，叫著不要開車，。車當然堅持地關門，女人只好彈回月台，但死都站在黃線以外，一面不斷望月台底的路軌位置一面大叫“飛處鳥”。車在她身邊飛過，險象環生，月台上有個貌似國內人的男人叫她返回月台，說著叫港鐵職員幫她。但女人沒有理會，等車開走， 武功 高強的她二話不說就“咚”一聲跳落路軌，高興地拾回跌在路軌下的東西。我還以為她掉了部手提電話，但原來是一封利是。剛才叫她找職員的那個男人一個箭步上前，一手把她拉回月台，過程好快，只在5至10秒間的事。由於兩面線烈車都剛開走，所以留在月台的乘客不多，又事出突然，所以沒有乘客影到相。當男人把女人拉上來時不停罵她“你要錢不要命吖”（國語）。\r\n到底封利事是否內藏巨款? 還是那女人危機意識低到以為以她那所向披靡的武功強至可擋列車? \r\n之後不知有沒有職員捉到她，如果捉到，港鐵又依法辦事的話，那麼罰款分分鐘貴過用命換回來的那封利是！</p>','LANG_TC',1,'emilywong','emilywong','2017-01-28 19:13:59','2017-01-28 19:14:01',NULL),(5,'2017-03-01 09:35:53','寫一首詩','前路就算迷迷糊， 被遺忘了的朋友噢！請不用悲傷，總會過去的， 也都只是夢一場，過去了就 哼一句歌！ 高聲歌唱吧！我的朋友噢!風像稅局一般吹! 雲像鬼怪一般飃! 時針放肆地在跑著，地平線上沒有路是平坦的。我親愛的朋友吖， 請不用悲傷，總會過去的，只要一直笑著走， 總會遇見橙黃色發著光的小路，嗯！跟你微笑著。','<p>前路就算迷迷糊， 被遺忘了的朋友噢！</p>\n\n<p>請不用悲傷，總會過去的， 也都只是夢一場，</p>\n\n<p>過去了就 哼一句歌！ 高聲歌唱吧！我的朋友噢!</p>\n\n<p>風像稅局一般吹! 雲像鬼怪一般飃! 時針放肆地在跑著，</p>\n\n<p>地平線上沒有路是平坦的。</p>\n\n<p>我親愛的朋友吖， 請不用悲傷，總會過去的，</p>\n\n<p>只要一直笑著走， 總會遇見橙黃色發著光的小路，</p>\n\n<p>嗯！跟你微笑著。</p>\n','LANG_TC',1,'emilywong','emilywong','2017-03-01 14:35:53','2017-03-01 14:35:53','						'),(6,'2017-01-19 06:17:56','捧著米粉的大媽','有一天，跑到巴士站又送巴士尾，因此，目擊一件離奇打尖事件。由於送了一班車，所以在站頭排第一，而貼住格離巴士線的人就排得滿滿的。不久格離線巴士來了，大家開始上車之際，忽然不知從那裡跑來一個操大陸口音大媽，一個箭步跑到隊頭上車，起初大家以為她有熟人排在前頭，後來才知原來她打尖，她不但打尖，最離奇的是她手上捧著一碟炒米粉，沒錯，是一個紙碟上面放著炒米粉，當有人乘客叫她不要打尖，不要 帶米粉上車吃之時，身手敏捷的她，已一個箭步跑上了車，繼而潛藏於車箱內，連巴士車長也來不及反應，事情就這樣完結。\r\n所以別小看她是阿婆，民間有高手，而且，人無恥一定無敵。','<p>有一天，跑到巴士站又送巴士尾，因此，目擊一件離奇打尖事件。由於送了一班車，所以在站頭排第一，而貼住格離巴士線的人就排得滿滿的。不久格離線巴士來了，大家開始上車之際，忽然不知從那裡跑來一個操大陸口音大媽，一個箭步跑到隊頭上車，起初大家以為她有熟人排在前頭，後來才知原來她打尖，她不但打尖，最離奇的是她手上捧著一碟炒米粉，沒錯，是一個紙碟上面放著炒米粉，當有人乘客叫她不要打尖，不要 帶米粉上車吃之時，身手敏捷的她，已一個箭步跑上了車，繼而潛藏於車箱內，連巴士車長也來不及反應，事情就這樣完結。\r\n所以別小看她是阿婆，民間有高手，而且，人無恥一定無敵。</p>','LANG_TC',1,'emilywong','emilywong','2017-01-28 19:15:08','2017-01-28 19:15:10',NULL),(8,'2017-02-18 13:01:58','都市傳聞~恐怖實驗室','《傳說~恐怖實驗》大約於1940年，二次世界大戰前半期，俄羅斯( 前蘇聯) 進行一個「睡眠剝奪實驗」。先於監牢囚犯內招募實驗對象，只要可以連續不眠不休三十日，就可以無罪釋放作為做實驗品的交換條件，最後揀選了五名政治犯作實驗對象。只是這個實驗過不了二十日就要被迫終止，而且結果是悲劇收塲。 《實驗設備》 科學家先張五人安置在一個密室，密室內有食物、水、厠所、書本等日常用品。由於1940年代沒有CCTV，所以只靠對講機通話，以及一個可以監察室內情況的窗戶，從而取得實驗中的資料。除了以上物品外，還有在通風系統，科學家在通風系統內加入高濃度興奮劑，以防止實驗對象睡著，並且一路監察氧氣含量。 《實驗開始 》 第一天~開始的幾天不眠的情況下，實驗對象的行為大至上都是正常，看書，談天，吃東西。 第四日~這些人的言談內容其實已經開始趨向悲觀跟憤怒。 第六日~實驗對象有幻覺，而且開始互不交談，行為古怪，在房內沒意識地行來行去。研究人員只以為是興奮劑作用。 第九日~有實驗對象精神崩潰，不停亂叫，又不停跑，來回不停跑三個小時。最奇怪是除了一個人有怪行為外，其他四人卻完全沒反應。期間有人用糞便塗在紙上，貼在窗前，令研究員不能從窗戶監察，只能從對講機跟密室內溝通。 第十二日~研究員因害怕實驗對象會死亡，就對室內實驗者講出交換條件，如果實驗對象可以尊守某些規條，就可以釋放其中一人，可是一直沒有回覆。 第十五日~研究人員開出條件後三日才有一人以好陰沉聲回答說: 「其實我們已經不雖要自由了。」研究員和軍人都覺得好有問題，就決定去開密室門，看裡面發生什麼事。在進入前查看室內興奮劑濃度，以這個濃度的興奮劑劑量，室內的人類應該進行激烈行動，可是室內十分平靜。 於事跟室內通話說: 「我們即將進入，你們要遠離門口。」室內仍然是同一個人出聲說:「我們不雖要自由啦！」 《進入密室》 (第一名實驗死者) 終於開門進入，一片死寂，只聽到一個人好像魔鬼般的尖叫聲和怪叫，一直在叫讓著要回興奮劑。士兵進入後眼前景象打士兵嚇得大叫。室內 瀰漫嘔心氣息， 臭氣熏天，其中一個實驗對象明顯死去。胸部被劏開，腸流到滿地，有些肉還跑到浴室的去水位去。而其他四人的胸口都有不同程度的被撕開，這四人卻仍然生存，但如喪屍般發著狂，期間連士兵也害怕起來，當時還有兩位士兵被這些人攻擊而死。 (第二名實驗死者 )而其中一位接受實驗者的脾臟爆裂，爆出大量血液。由於無法控制正在發狂的實驗對象，軍方只好重放興奮劑，重放後這四人開始平靜下來，幾經困難才制服這四人後，張他們送院。到醫院後這四人仍然異於常人極限孔武有力地掙扎，於是醫生就給他們打嗎啡，而且是正常人所能接受劑量的十陪，期間這四人不停地叫「more more 」。應該是嗎啡起了舒緩作用，所以想要多些，只是三分鐘後第二個被實驗者，就因藥物過量而當塲死亡。 (第三名實驗死者) 跟著餘下三人不停的要求興奮劑。跟著醫生想為第三人做手術，因為胸口被撕開，什麼樣都要把它連好，但卻因這人不停孔武有力地掙扎，所以用了大量麻醉藥，最後又因用藥過多而死亡。 (第四及第五名實驗死者) 其餘兩人卻說：「不用麻醉藥，就這樣做手術吧！」，醫生只好在沒用麻醉藥下做手術，但最後都救不了，由於，兩人身上傷勢太重，又在發狂，醫生判斷不能醫治下，軍方以槍射殺，兩人雙繼身亡。 《實驗報告》 實驗對象於十五天內於不明原因下相繼死亡，實驗失敗。 《結論》~長期不能睡會有幻覺， 悲觀，發狂，什至死亡，但又會變得能擁有超出人類極限，能人所不能地孔武有力的特異功能啊！ 通常來說，睡眠剝奪可能會導致： 肌肉疼痛， 頭腦糊塗，（間歇性）失憶，,情緒低落， 出現幻覺 ，手震， 頭疼 ，心神不定， 畏寒 ，眼球充血， 眼袋， 血壓升高 ，荷爾蒙水平升高， 患糠尿病風險上升， 患纖維肌痛風險上升， 易怒 ，眼球震顫， 肥胖， 打呵欠， 類似於精神疾病的症狀 參考文獻 National Institute of Neurological Disorders and Stroke – Brain Basics: Understanding SleepSleep deprivation remains red-hot question~完~','<p>《傳說~恐怖實驗》</p>\n\n<p>大約於1940年，二次世界大戰前半期，俄羅斯( 前蘇聯) 進行一個「睡眠剝奪實驗」。先於監牢囚犯內招募實驗對象，只要可以連續不眠不休三十日，就可以無罪釋放作為做實驗品的交換條件，最後揀選了五名政治犯作實驗對象。只是這個實驗過不了二十日就要被迫終止，而且結果是悲劇收塲。</p>\n\n<p>《實驗設備》</p>\n\n<p>科學家先張五人安置在一個密室，密室內有食物、水、厠所、書本等日常用品。由於1940年代沒有CCTV，所以只靠對講機通話，以及一個可以監察室內情況的窗戶，從而取得實驗中的資料。除了以上物品外，還有在通風系統，科學家在通風系統內加入高濃度興奮劑，以防止實驗對象睡著，並且一路監察氧氣含量。</p>\n\n<p>《實驗開始 》</p>\n\n<p>第一天~開始的幾天不眠的情況下，實驗對象的行為大至上都是正常，看書，談天，吃東西。</p>\n\n<p>第四日~這些人的言談內容其實已經開始趨向悲觀跟憤怒。</p>\n\n<p>第六日~實驗對象有幻覺，而且開始互不交談，行為古怪，在房內沒意識地行來行去。研究人員只以為是興奮劑作用。</p>\n\n<p>第九日~有實驗對象精神崩潰，不停亂叫，又不停跑，來回不停跑三個小時。最奇怪是除了一個人有怪行為外，其他四人卻完全沒反應。期間有人用糞便塗在紙上，貼在窗前，令研究員不能從窗戶監察，只能從對講機跟密室內溝通。</p>\n\n<p>第十二日~研究員因害怕實驗對象會死亡，就對室內實驗者講出交換條件，如果實驗對象可以尊守某些規條，就可以釋放其中一人，可是一直沒有回覆。</p>\n\n<p>第十五日~研究人員開出條件後三日才有一人以好陰沉聲回答說: 「其實我們已經不雖要自由了。」研究員和軍人都覺得好有問題，就決定去開密室門，看裡面發生什麼事。在進入前查看室內興奮劑濃度，以這個濃度的興奮劑劑量，室內的人類應該進行激烈行動，可是室內十分平靜。 於事跟室內通話說: 「我們即將進入，你們要遠離門口。」室內仍然是同一個人出聲說:「我們不雖要自由啦！」</p>\n\n<p>《進入密室》</p>\n\n<p>(第一名實驗死者)</p>\n\n<p>終於開門進入，一片死寂，只聽到一個人好像魔鬼般的尖叫聲和怪叫，一直在叫讓著要回興奮劑。士兵進入後眼前景象打士兵嚇得大叫。室內 瀰漫嘔心氣息， 臭氣熏天，其中一個實驗對象明顯死去。胸部被劏開，腸流到滿地，有些肉還跑到浴室的去水位去。而其他四人的胸口都有不同程度的被撕開，這四人卻仍然生存，但如喪屍般發著狂，期間連士兵也害怕起來，當時還有兩位士兵被這些人攻擊而死。</p>\n\n<p>(第二名實驗死者 )</p>\n\n<p>而其中一位接受實驗者的脾臟爆裂，爆出大量血液。由於無法控制正在發狂的實驗對象，軍方只好重放興奮劑，重放後這四人開始平靜下來，幾經困難才制服這四人後，張他們送院。到醫院後這四人仍然異於常人極限孔武有力地掙扎，於是醫生就給他們打嗎啡，而且是正常人所能接受劑量的十陪，期間這四人不停地叫「more more 」。應該是嗎啡起了舒緩作用，所以想要多些，只是三分鐘後第二個被實驗者，就因藥物過量而當塲死亡。</p>\n\n<p>(第三名實驗死者)</p>\n\n<p>跟著餘下三人不停的要求興奮劑。跟著醫生想為第三人做手術，因為胸口被撕開，什麼樣都要把它連好，但卻因這人不停孔武有力地掙扎，所以用了大量麻醉藥，最後又因用藥過多而死亡。</p>\n\n<p>(第四及第五名實驗死者)</p>\n\n<p>其餘兩人卻說：「不用麻醉藥，就這樣做手術吧！」，醫生只好在沒用麻醉藥下做手術，但最後都救不了，由於，兩人身上傷勢太重，又在發狂，醫生判斷不能醫治下，軍方以槍射殺，兩人雙繼身亡。</p>\n\n<p>《實驗報告》</p>\n\n<p>實驗對象於十五天內於不明原因下相繼死亡，實驗失敗。</p>\n\n<p>《結論》</p>\n\n<p>~長期不能睡會有幻覺， 悲觀，發狂，什至死亡，但又會變得能擁有超出人類極限，能人所不能地孔武有力的特異功能啊！</p>\n\n<p>通常來說，睡眠剝奪可能會導致：</p>\n\n<p>肌肉疼痛， 頭腦糊塗，（間歇性）失憶，,情緒低落， 出現幻覺 ，手震， 頭疼 ，心神不定， 畏寒 ，眼球充血， 眼袋， 血壓升高 ，荷爾蒙水平升高， 患糠尿病風險上升， 患纖維肌痛風險上升， 易怒 ，眼球震顫， 肥胖， 打呵欠， 類似於精神疾病的症狀</p>\n\n<p>參考文獻</p>\n\n<p><a class=\"external text\" href=\"http://www.ninds.nih.gov/disorders/brain_basics/understanding_sleep.htm\" rel=\"nofollow\">National Institute of Neurological Disorders and Stroke &ndash; Brain Basics: Understanding Sleep</a></p>\n\n<p><a class=\"external text\" href=\"http://www.abc.net.au/pm/content/2006/s1754821.htm\" rel=\"nofollow\">Sleep deprivation remains red-hot question</a></p>\n\n<p>~完~</p>\n','LANG_TC',1,'emilywong','emilywong','2017-02-18 18:01:58','2017-02-18 18:01:58','						'),(9,'2017-03-01 09:36:52','70 年代香港騙案一則 ','70年代的某天，幾個來自不同國家的外國人，分別到香港警處報案，聲稱原本來香港找筆友，但最後懷疑自己被騙財。事源這些外國人，分別在自己國家的報章上，認識了一位香港女孩做筆友，女孩一直聲稱要一面讀書，一面要工作供養父親，所以就算想用三十元做個簽證出國也沒有，於是這些人分別都寄了三十元給香港女孩做簽證用。女孩收到後， 竟然說錢又給爸爸搶去了，而沒錢做簽證到外國去探筆友。但為了要報答對方，而寄了上半身的裸照給對方，然後聲稱很想見對方，可是沒錢買機票。就這樣這些人就從不同國家，分別每人寄了一筆足以來回他們國家機票價錢的金額給那女孩，可是之後沒有回覆，所以前來香港，根據地址找她，但根據地址只找到郵政信箱。警方懷疑是 一宗騙案，於是派員於信箱附近埋伏 ，不久就見有人到郵箱取信，於是上前 拘捕 疑犯。有趣的是疑犯是個四十多歲，有家室的銀行男職員。經一番盤問，得知，原來這名男子有一天經過廟街，看到一幅很漂亮的日本裸女照， 靈機一觸就，帶住這張相到晒相店，張裸照分成兩半，上半身照晒 200張，下半身照晒200張，全身照晒200張，以假照去騙不同國家筆友的錢財，在短短幾個月就總共騙得二百三十四萬港幣(70年代這個數足以買兩個千尺 豪宅)。要不是有筆友來港找他而東窗事發，他還打算用餘下的200張下半身裸照和200張全裸，跟不同國家筆友 繼續行騙。要不是他太貪心，騙得二百多萬就收手，又要不是他放聰明點久不久換一個郵箱，也許結局一定有所不同。','<p>70年代的某天，幾個來自不同國家的外國人，分別到香港警處報案，聲稱原本來香港找筆友，但最後懷疑自己被騙財。</p>\n\n<p><br />\n事源這些外國人，分別在自己國家的報章上，認識了一位香港女孩做筆友，女孩一直聲稱要一面讀書，一面要工作供養父親，所以就算想用三十元做個簽證出國也沒有，於是這些人分別都寄了三十元給香港女孩做簽證用。女孩收到後， 竟然說錢又給爸爸搶去了，而沒錢做簽證到外國去探筆友。但為了要報答對方，而寄了上半身的裸照給對方，然後聲稱很想見對方，可是沒錢買機票。就這樣這些人就從不同國家，分別每人寄了一筆足以來回他們國家機票價錢的金額給那女孩，可是之後沒有回覆，所以前來香港，根據地址找她，但根據地址只找到郵政信箱。</p>\n\n<p><br />\n警方懷疑是 一宗騙案，於是派員於信箱附近埋伏 ，不久就見有人到郵箱取信，於是上前 拘捕 疑犯。</p>\n\n<p>有趣的是疑犯是個四十多歲，有家室的銀行男職員。經一番盤問，得知，原來這名男子有一天經過廟街，看到一幅很漂亮的日本裸女照， 靈機一觸就，帶住這張相到晒相店，張裸照分成兩半，上半身照晒 200張，下半身照晒200張，全身照晒200張，以假照去騙不同國家筆友的錢財，在短短幾個月就總共騙得二百三十四萬港幣(70年代這個數足以買兩個千尺 豪宅)。</p>\n\n<p>要不是有筆友來港找他而東窗事發，他還打算用餘下的200張下半身裸照和200張全裸，跟不同國家筆友 繼續行騙。要不是他太貪心，騙得二百多萬就收手，又要不是他放聰明點久不久換一個郵箱，也許結局一定有所不同。</p>\n','LANG_TC',1,'emilywong','emilywong','2017-03-01 14:36:52','2017-03-01 14:36:52','						'),(10,'2017-03-01 15:36:02','大龍蝦','大龍蝦美國有個主持訪問捉龍蝦的漁夫 ～主持 : 為什麼別人捉的龍蝦那麼大，你捉的卻那麼小？漁夫 : 不是呀！很大吖 ！主持 ：那麼小 ! 還說大 ？漁夫 ： 很大呀！你近啲睇咪大囉！ 哈哈哈','<p>大龍蝦<br />\n<br />\n美國有個主持訪問捉龍蝦的漁夫 ～<br />\n主持 : 為什麼別人捉的龍蝦那麼大，你捉的卻那麼小？<br />\n漁夫 : 不是呀！很大吖 ！<br />\n主持 ：那麼小 ! 還說大 ？<br />\n漁夫 ： 很大呀！你近啲睇咪大囉！ 哈哈哈</p>\n','LANG_TC',1,'emilywong','emilywong','2017-03-01 20:36:02','2017-03-01 20:36:02','						'),(12,'2017-03-08 15:23:02','Drawing','      Step one                                  Step two                                  Step three                           Completion\n\n                \n\n \n\n \n\n ','<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Step one&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Step two&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Step three&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Completion</p>\n<p><img src=\"../images/uploads/17197872_10212065282731165_1559553857_n.jpg\" alt=\"step one\" width=\"188\" height=\"250\" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src=\"../images/uploads/17176044_10212065282131150_287512301_o.jpg\" alt=\"step two\" width=\"188\" height=\"250\" />&nbsp;&nbsp;&nbsp;&nbsp; <img src=\"../images/uploads/17197828_10212065282331155_2134818453_n.jpg\" alt=\"Finished\" width=\"189\" height=\"251\" />&nbsp;&nbsp;&nbsp;&nbsp; <img src=\"../images/uploads/17200669_10212065282491159_1652597082_o.jpg\" alt=\"Final\" width=\"189\" height=\"252\" /></p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>','LANG_TC',1,'emilywong','emilywong','2017-03-08 20:23:02','2017-03-08 20:23:02','						'),(13,'2017-03-09 08:25:22','Hand made picket',' \r\n\r\n預備工具: 白布袋, 白紙, 布用防水七色彩筆, B號素描筆\r\n\r\n\r\n\r\nTool preparing\r\n\r\n**********************************************************************************************************************************************\r\n\r\n張所想要的圖先畫在紙上\r\n\r\n      \r\n\r\nUnderlay one                                   Underlay two                                Underlay three                            Final underlay  \r\n\r\n \r\n\r\n***********************************************************************************************************************************************\r\n\r\n畫好後放於布袋內, 印出圖案.\r\n\r\n      \r\n\r\nCopying one                                    Copying two                                  Final copying\r\n\r\n************************************************************************************************************************************************\r\n\r\n最後用布用彩筆上色便完成\r\n\r\n\r\n\r\nCompletion\r\n\r\n*************************************************************************************************************************************************\r\n\r\nP.S. 布用彩筆防水而且于脫色, 可用在布類品上,例如: T恤, 白布鞋或布袋等\r\n\r\n*************************************************************************************************************************************************','<p>&nbsp;</p>\n<p>預備工具: 白布袋, 白紙, 布用防水七色彩筆, B號素描筆</p>\n<p><img src=\"../images/uploads/17160886_10212064344027698_1735457506_n.jpg\" alt=\"Tool preparing \" width=\"206\" height=\"267\" /></p>\n<p>Tool preparing</p>\n<p>**********************************************************************************************************************************************</p>\n<p>張所想要的圖先畫在紙上</p>\n<p><img src=\"../images/uploads/17198327_10212064332827418_761274821_n.jpg\" alt=\"Underlay one\" width=\"207\" height=\"276\" />&nbsp; <img src=\"../images/uploads/17204395_10212064333227428_235538107_n.jpg\" alt=\"Underlay two\" width=\"208\" height=\"277\" />&nbsp; <img src=\"../images/uploads/17199108_10212064334467459_1513545366_n.jpg\" alt=\"underlay three\" width=\"206\" height=\"275\" /> &nbsp;<img src=\"../images/uploads/17198961_10212064335067474_1834403195_n.jpg\" alt=\"Final underlay\" width=\"206\" height=\"275\" /></p>\n<p>Underlay one&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; Underlay two&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; Underlay three &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; Final underlay&nbsp;&nbsp;</p>\n<p>&nbsp;</p>\n<p>***********************************************************************************************************************************************</p>\n<p>畫好後放於布袋內, 印出圖案.</p>\n<p><img src=\"../images/uploads/17204417_10212064335867494_240885092_n.jpg\" alt=\"copying two\" width=\"211\" height=\"280\" /> &nbsp; <img src=\"../images/uploads/17203548_10212064337427533_1822628072_n.jpg\" alt=\"copying one\" width=\"209\" height=\"279\" /> &nbsp; <img src=\"../images/uploads/17198526_10212064336867519_587160961_n.jpg\" alt=\"Final copying\" width=\"209\" height=\"279\" /></p>\n<p>Copying one&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Copying two&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Final copying</p>\n<p>************************************************************************************************************************************************</p>\n<p>最後用布用彩筆上色便完成</p>\n<p><img src=\"../images/uploads/17204184_10212064338027548_616003326_n.jpg\" alt=\"completion\" width=\"297\" height=\"396\" /></p>\n<p>Completion</p>\n<p>*************************************************************************************************************************************************</p>\n<p>P.S. 布用彩筆防水而且于脫色, 可用在布類品上,例如: T恤, 白布鞋或布袋等</p>\n<p>*************************************************************************************************************************************************</p>','LANG_TC',1,'emilywong','emilywong','2017-03-09 13:25:22','2017-03-09 13:25:22','						'),(14,'2017-03-10 08:13:01','股票基礎 Lesson 1 手寫筆記','page 1\n\npage 2\n\npage 3\n\npage 4','<p>page 1</p>\n<p><img src=\"../images/uploads/snapshot_1489068733657.png\" alt=\"Page 1\" width=\"768\" height=\"960\" /></p>\n<p>page 2</p>\n<p><img src=\"../images/uploads/snapshot_1489068745553.png\" alt=\"Page 2\" width=\"768\" height=\"960\" /></p>\n<p>page 3</p>\n<p><img src=\"../images/uploads/snapshot_1489068754745.png\" alt=\"Page 3\" width=\"768\" height=\"960\" /></p>\n<p>page 4</p>\n<p><img src=\"../images/uploads/snapshot_1489068762618.png\" alt=\"Page 4\" width=\"768\" height=\"960\" /></p>','LANG_TC',4,'manpakhong','manpakhong','2017-03-10 13:13:01','2017-03-10 13:13:01','						'),(15,'2017-03-15 08:51:49','頭飾 Hand made head omament','Hand Made Head Omament\r\n\r\n\r\n\r\nLoyout\r\n\r\n**********\r\n\r\n \r\n\r\nTools and Materials\r\n\r\n**********\r\n\r\n\r\n\r\nCut and combine\r\n\r\n\r\n\r\n\r\nFinishing','<p>Hand Made Head Omament</p>\n<p><img src=\"../images/uploads/17264268_10212098268915799_3915014067348478189_n.jpg\" alt=\"layout\" width=\"300\" height=\"300\" /></p>\n<p>Loyout</p>\n<p>**********</p>\n<p><img src=\"../images/uploads/17103768_10212098252315384_6703261321544962384_n.jpg\" alt=\"Tools\" width=\"300\" height=\"300\" /> <img src=\"../images/uploads/17265160_10212098268075778_6353964148019815987_n.jpg\" alt=\"materials\" width=\"300\" height=\"300\" /></p>\n<p>Tools and Materials</p>\n<p>**********</p>\n<p><img src=\"../images/uploads/17103491_10212098269395811_6823862389319336730_n.jpg\" alt=\"drawing 1\" width=\"296\" height=\"296\" /><img src=\"../images/uploads/17201075_10212098268275783_1252891920257556583_n.jpg\" alt=\"step part II\" width=\"300\" height=\"300\" /><img src=\"../images/uploads/17202717_10212098268395786_1247538079432419431_n.jpg\" alt=\"step part III\" width=\"300\" height=\"300\" /></p>\n<p>Cut and combine</p>\n<p><img src=\"../images/uploads/17156196_10212096598794047_4241567711970465613_n.jpg\" alt=\"final\" width=\"299\" height=\"317\" /></p>\n<p>Finishing</p>','LANG_TC',1,'emilywong','emilywong','2017-03-15 12:51:49','2017-03-15 12:51:49','						'),(22,'2017-03-14 06:46:52','Integration Management','The customer wants to make a change to the project scope. The first action is to evaluate the impact of a change.\nIt includes the consideration of:\n\nthe project schedule,\ncost,\nquality,\nrisk,\nresources, and\ncustomer satisfaction.\n\nDue to corporate restructuring, the project sponsor, a major stakeholder, and the CEO have left the company. The project manager\'s project is past the halfway point and the remaining members of the management team have been lukewarm toward the project. The new CEO does not place a high value on project management methodology, and the project team is nervous about its future. Under these circumstances, the project manager\'s primary responsibility is to:\ninteract with others in a professional manner while completing the project. The project manager\'s primary responsibility is:\n\nto complete the project he was charactered and approved to complete\nto make sure the project is still nessary, and to determine whether it needs to change based on the customer\'s need.\n\nProviding accurate and truthful reports are always part of a project manager\'s professional and social responsibility. However, completing the project in a professional manner is the primary responsibility.','<p>The customer wants to make a change to the project scope. The first action is to evaluate the impact of a change.<br />It includes the consideration of:</p>\n<ul style=\"list-style-type: circle;\">\n<li>the project schedule,</li>\n<li>cost,</li>\n<li>quality,</li>\n<li>risk,</li>\n<li>resources, and</li>\n<li>customer satisfaction.</li>\n</ul>\n<p>Due to corporate restructuring, the project sponsor, a major stakeholder, and the CEO have left the company. The project manager\'s project is past the halfway point and the remaining members of the management team have been lukewarm toward the project. The new CEO does not place a high value on project management methodology, and the project team is nervous about its future. Under these circumstances, the project manager\'s primary responsibility is to:<br />interact with others in a professional manner while completing the project. The project manager\'s primary responsibility is:</p>\n<ul style=\"list-style-type: circle;\">\n<li>to complete the project he was charactered and approved to complete</li>\n<li>to make sure the project is still nessary, and to determine whether it needs to change based on the customer\'s need.</li>\n</ul>\n<p>Providing accurate and truthful reports are always part of a project manager\'s professional and social responsibility. However, completing the project in a professional manner is the primary responsibility.</p>','LANG_EN',51,'manpakhong','manpakhong','2017-03-14 10:46:52','2017-03-14 10:46:52','						'),(23,'2017-03-17 13:12:43','股票基礎 Lesson2 手寫筆記','page 1\n\n\n\n\n\npage 2\n\n\n\n\n\npage 3\n\n\n\n\n\npage 4\n\n\n\n\n\npage 5\n\n\n\n','<p>page 1</p>\n<p><img src=\"../images/uploads/stock_lesson2 _1.png\" alt=\"stock_lesson2_1\" width=\"768\" height=\"960\" /></p>\n<p>page 2</p>\n<p><img src=\"../images/uploads/stock_lesson2 _2.png\" alt=\"stock_lesson2_2\" width=\"768\" height=\"960\" /></p>\n<p>page 3</p>\n<p><img src=\"../images/uploads/stock_lesson2 _3.png\" alt=\"stock_lesson2_3\" width=\"768\" height=\"960\" /></p>\n<p>page 4</p>\n<p><img src=\"../images/uploads/stock_lesson2 _4.png\" alt=\"stock_lesson2_4\" width=\"768\" height=\"960\" /></p>\n<p>page 5</p>\n<p><img src=\"../images/uploads/stock_lesson2 _5.png\" alt=\"stock_lesson2_5\" width=\"768\" height=\"960\" /></p>','LANG_TC',4,'manpakhong','manpakhong','2017-03-17 17:12:43','2017-03-17 17:12:43','						'),(24,'2017-03-19 15:26:33','Closing','The Close Procurements process is part of the Closing Process Group.\n\nAgreement Closure is not a process. The Contract Closure process was listed in the PMBOK 3rd Edition as part of the Closing process group. HOwever, This process has been renamed the Close Procurements process in the PMBOK 4th and 5th Edition.\n\nQ: You are involved in the Close Procurements process. The seller disagrees with you over several issues. According to the agreement, a third party will be used to settle the dispute. The findings of the third party are binding. The type of proceeding you will be using is arbitration.\n\nArbitration - is a type of negotiation where a third party is used and the third party\'s findings are binding. In arbitration, a neutural party hears and resolves a dispute. (Rita Mulcahy)\n\nMeditation - is a special type of negotiation whereby a third party is used as the negotiator of the settlement. However, the findings of the third party are not binding.\nNegotiation -  generally occurs between the two parties. Both parties discuss the issues and reach an agreement on the result.\nAuditing - occures when a procurement is reviewed to identify the successes and failures of the Project Procurement Management knowledge area.','<p>The Close Procurements process is part of the Closing Process Group.</p>\n<p>Agreement Closure is not a process. The Contract Closure process was listed in the PMBOK 3rd Edition as part of the Closing process group. HOwever, This process has been renamed the Close Procurements process in the PMBOK 4th and 5th Edition.</p>\n<p>Q: You are involved in the Close Procurements process. The seller disagrees with you over several issues. According to the agreement, a third party will be used to settle the dispute. The findings of the third party are binding. The type of proceeding you will be using is arbitration.</p>\n<ul style=\"list-style-type: circle;\">\n<li>Arbitration - is a type of negotiation where a third party is used and the third party\'s findings are binding. In arbitration, a neutural party hears and resolves a dispute. (Rita Mulcahy)</li>\n<li>Meditation - is a special type of negotiation whereby a third party is used as the negotiator of the settlement. However, the findings of the third party are not binding.</li>\n<li>Negotiation -&nbsp; generally occurs between the two parties. Both parties discuss the issues and reach an agreement on the result.</li>\n<li>Auditing - occures when a procurement is reviewed to identify the successes and failures of the Project Procurement Management knowledge area.</li>\n</ul>','LANG_EN',51,'manpakhong','manpakhong','2017-03-19 19:26:33','2017-03-19 19:26:33','						'),(25,'2017-03-19 14:55:52','Executing','As a project manager, you are NOT responsible for maintaining strong personal relations with the customer to be protected if anything goes wrong in the project. Seeking personal favors from the customer at the cost of the project is unethical. The first and foremost responsibility of a project manager is to protect the interests of the project and the customer. It is highly irresponsible to protect your interests instead of the project\n\n\nIt is your responsibility as project manager to provide correct and acurate data in all esimates, protect the interests of the customer in the project, or ensure that your vendors sign the non-disclosure agreement if outsourcing the project work requires sharing confidential information with customer\'s approval.\n','<p>As a project manager, you are NOT responsible for maintaining strong personal relations with the customer to be protected if anything goes wrong in the project. Seeking personal favors from the customer at the cost of the project is unethical. The first and foremost responsibility of a project manager is to protect the interests of the project and the customer. It is highly irresponsible to protect your interests instead of the project</p>\n<p>It is your responsibility as project manager to provide correct and acurate data in all esimates, protect the interests of the customer in the project, or ensure that your vendors sign the non-disclosure agreement if outsourcing the project work requires sharing confidential information with customer\'s approval.</p>','LANG_EN',51,'manpakhong','manpakhong','2017-03-19 18:55:52','2017-03-19 18:55:52','						'),(26,'2017-03-19 15:23:33','Project Integration Management','Project Integration Management Overview\n\n\n\n','<p>Project Integration Management Overview</p>\n<p><img src=\"../images/uploads/projectIntegrationManagementOverview.jpg\" alt=\"Project Integration Management Overview\" width=\"812\" height=\"884\" /></p>','LANG_EN',51,'manpakhong','manpakhong','2017-03-19 19:23:33','2017-03-19 19:23:33','						'),(27,'2017-03-20 14:36:19','Planning - Plan Cost Managment','Q: You are producing a document that includes the cost control variance thresholds, units of measure, and level of accuracy. Which document are you creating?\n\nwork performance information\ncost baseline\nactivity cost estimates\ncost management plan\n\nAnswer is: cost management plan\n\nThe cost management plan is the document that includes the cost control variance thresholds, units of measure, and level of accuracy. It is created during the Plan Cost Management process.\n\nNone of the other options include this information. Work performance information is created in the Control Costs process and includes the calculated cost variance, schedule variance, cost performance index, schedule performance index, and other work performance calculations. The cost baseline is created in the Determine Budget process and includes the approved budget. The activity cost estimates are created in the Estimate Costs process and include all estimated costs for the project.\n\nRita\'s PMP Exam Prep:\n\n\nThe cost management plan may include:\n\n\nSpecifications for how estimates should be stated (in what currency) - Units of measure\n\nThe level of accuracy needed for estimates\n\nReporting formats to be used\n\nRules for measuring cost performance\n\nWhether costs will include both direct costs (those costs directly attributable to the project) and indirect costs (costs not directly attributable to any one project, such as overhead costs)\n\nGuidelines for the establishment of a cost baseline for measuring against as part of project monitoring and controlling (the cost baseline will ultimately be established in Determine Budget)\n\nControl thresholds\n\nCost change control procedures\n\nInformation on control accounts\n\nInformation about how the Estimate Costs, Determine Budget, and Control Costs processes will be conducted\n\nFunding decisions\n\nMethods for documenting costs\n\nGuidelines for dealing with potential fluctuations in resource costs and exchange rates\n\nRoles and responsibilities for various cost activities\n','<p>Q: You are producing a document that includes the cost control variance thresholds, units of measure, and level of accuracy. Which document are you creating?</p>\n<ol style=\"list-style-type: lower-alpha;\">\n<li>work performance information</li>\n<li>cost baseline</li>\n<li>activity cost estimates</li>\n<li>cost management plan</li>\n</ol>\n<p>Answer is: cost management plan</p>\n<p>The cost management plan is the document that includes the cost control variance thresholds, units of measure, and level of accuracy. It is created during the Plan Cost Management process.</p>\n<p>None of the other options include this information. Work performance information is created in the Control Costs process and includes the calculated cost variance, schedule variance, cost performance index, schedule performance index, and other work performance calculations. The cost baseline is created in the Determine Budget process and includes the approved budget. The activity cost estimates are created in the Estimate Costs process and include all estimated costs for the project.</p>\n<p>Rita\'s PMP Exam Prep:</p>\n<p>The cost management plan may include:</p>\n<ul style=\"list-style-type: circle;\">\n<li>Specifications for how estimates should be stated (in what currency) - Units of measure</li>\n<li>The level of accuracy needed for estimates</li>\n<li>Reporting formats to be used</li>\n<li>Rules for measuring cost performance</li>\n<li>Whether costs will include both direct costs (those costs directly attributable to the project) and indirect costs (costs not directly attributable to any one project, such as overhead costs)</li>\n<li>Guidelines for the establishment of a cost baseline for measuring against as part of project monitoring and controlling (the cost baseline will ultimately be established in Determine Budget)</li>\n<li>Control thresholds</li>\n<li>Cost change control procedures</li>\n<li>Information on control accounts</li>\n<li>Information about how the Estimate Costs, Determine Budget, and Control Costs processes will be conducted</li>\n<li>Funding decisions</li>\n<li>Methods for documenting costs</li>\n<li>Guidelines for dealing with potential fluctuations in resource costs and exchange rates</li>\n<li>Roles and responsibilities for various cost activities</li>\n</ul>','LANG_EN',51,'manpakhong','manpakhong','2017-03-20 18:36:19','2017-03-20 18:36:19','						'),(28,'2017-03-20 14:11:44','Rita\'s Process Chart','\n\n\n\n','<p><img src=\"../images/uploads/pmpRitaProcessChart.jpg\" alt=\"Rita\'s Process Chart\" width=\"1158\" height=\"1442\" /></p>\n<p>&nbsp;</p>','LANG_EN',51,'manpakhong','manpakhong','2017-03-20 18:11:44','2017-03-20 18:11:44','						'),(29,'2017-03-20 14:39:27','Planning - Plan Cost Management (Two techniques)','The Plan Cost Management - to answer two questions:\n\n\nHow will I go about planning cost for the project?\n\nHow will I effectively manage the project to cost baseline, control costs, and manage cost variances?\n\n\nTwo techniques:\n\n\nReturn on investment\n\nDiscounted Cash Flow\n\n\n\n','<p>The Plan Cost Management - to answer two questions:</p>\n<ol>\n<li>How will I go about planning cost for the project?</li>\n<li>How will I effectively manage the project to cost baseline, control costs, and manage cost variances?</li>\n</ol>\n<p>Two techniques:</p>\n<ol>\n<li>Return on investment</li>\n<li>Discounted Cash Flow</li>\n</ol>\n<p>&nbsp;</p>','LANG_EN',51,'manpakhong','manpakhong','2017-03-20 18:39:27','2017-03-20 18:39:27','						'),(30,'2017-03-20 15:06:30','The Cost Management Process','The Cost Management Process	Done During\nPlan Cost Management	Planning process group\nEstimate Costs	Planning process group\nDetermine Budget	Planning process group\nControl Costs	Monitoring and controlling process group\n\n ','<table style=\"height: 116px; border-color: Black;\" border=\"Black\" width=\"852\">\n<tbody>\n<tr>\n<td style=\"width: 418px;\"><strong>The Cost Management Process</strong></td>\n<td style=\"width: 418px;\"><strong>Done During</strong></td>\n</tr>\n<tr>\n<td style=\"width: 418px;\">Plan Cost Management</td>\n<td style=\"width: 418px;\">Planning process group</td>\n</tr>\n<tr>\n<td style=\"width: 418px;\">Estimate Costs</td>\n<td style=\"width: 418px;\">Planning process group</td>\n</tr>\n<tr>\n<td style=\"width: 418px;\">Determine Budget</td>\n<td style=\"width: 418px;\">Planning process group</td>\n</tr>\n<tr>\n<td style=\"width: 418px;\">Control Costs</td>\n<td style=\"width: 418px;\">Monitoring and controlling process group</td>\n</tr>\n</tbody>\n</table>\n<p>&nbsp;</p>','LANG_EN',51,'manpakhong','manpakhong','2017-03-20 19:06:30','2017-03-20 19:06:30','						'),(31,'2017-03-20 15:21:37','The Cost Management Process - Inputs to Estimating Costs','The cost management plan - This plan developed in the Plan Cost Management process documents the methods you\'ll use to estimate costs, as well as the level of accuracy required for estimates.\n\nThe scope baseline - In order to create an estimate, you need to know the details of what you are estimating; this includes knowing what is out of scope and  what constraints have been placed on the project. This information can be found by looking at all the components of the scope baseline (the project scope statement, WBS, and WBS dictionary).\n\nProject schedule - This is one of the key inputs to estimating, as the schedule includes the activities, the resources needed to complete the work, and information about when the work will occur. Keep in mind that you need a schedule before you can come up with a budget. You need to develop a time-phase spending plan to control project expenditures.\n\nHuman resource management plan - The human resource management plan lists the human resources intended to be used for the project. This resources have costs associated with them. Another part of the human resource management plan, reward systems can increase productivity and save money, but they are still a cost item and need to be estimated.\n\nRisk register - The risk management process can save time and money, but there are costs associated with the efforts to deal proactively with risks. Risks are an input to this process because they influence how costs are estimated, but they can also be an output because our choices related to estimating costs have associated risks.\n\nPolicies and historical records related to estimating, templates, processes, procedures, lessons learned, and historical information (i.e., organizational process assets) - Historical records from past projects can be highly beneficial in creating estimates for a current project. Organizational policies and standardized templates related to estimating can also make this effort faster and easier.\n\nCompany culture and existing systems that the project will have to deal with or can use (i.e., enterprise environmental factors) - For cost estimating, this includes marketplace conditions and commercial cost databases. You might review the different sources from which supplies might be procured and at what costs as part of estimating.\n\nProject management costs - It is imporotant to understand that part of the expense of a project comes from the costs associated with project management activities. Although project management efforts save money on projects overall, they do incur costs and should be included in the project cost estimates. These include not only costs associated with the efforts of the project manager but also those associated with status reports, change analysis, etc.\n','<ol>\n<li>The cost management plan - This plan developed in the Plan Cost Management process documents the methods you\'ll use to estimate costs, as well as the level of accuracy required for estimates.</li>\n<li>The scope baseline - In order to create an estimate, you need to know the details of what you are estimating; this includes knowing what is out of scope and&nbsp; what constraints have been placed on the project. This information can be found by looking at all the components of the scope baseline (the project scope statement, WBS, and WBS dictionary).</li>\n<li>Project schedule - This is one of the key inputs to estimating, as the schedule includes the activities, the resources needed to complete the work, and information about when the work will occur. Keep in mind that you need a schedule before you can come up with a budget. You need to develop a time-phase spending plan to control project expenditures.</li>\n<li>Human resource management plan - The human resource management plan lists the human resources intended to be used for the project. This resources have costs associated with them. Another part of the human resource management plan, reward systems can increase productivity and save money, but they are still a cost item and need to be estimated.</li>\n<li>Risk register - The risk management process can save time and money, but there are costs associated with the efforts to deal proactively with risks. Risks are an input to this process because they influence how costs are estimated, but they can also be an output because our choices related to estimating costs have associated risks.</li>\n<li>Policies and historical records related to estimating, templates, processes, procedures, lessons learned, and historical information (i.e., organizational process assets) - Historical records from past projects can be highly beneficial in creating estimates for a current project. Organizational policies and standardized templates related to estimating can also make this effort faster and easier.</li>\n<li>Company culture and existing systems that the project will have to deal with or can use (i.e., enterprise environmental factors) - For cost estimating, this includes marketplace conditions and commercial cost databases. You might review the different sources from which supplies might be procured and at what costs as part of estimating.</li>\n<li>Project management costs - It is imporotant to understand that part of the expense of a project comes from the costs associated with project management activities. Although project management efforts save money on projects overall, they do incur costs and should be included in the project cost estimates. These include not only costs associated with the efforts of the project manager but also those associated with status reports, change analysis, etc.</li>\n</ol>','LANG_EN',51,'manpakhong','manpakhong','2017-03-20 19:21:37','2017-03-20 19:21:37','						'),(32,'2017-03-23 17:13:30','股票基礎 Lesson 3 手寫筆記','page 1\n\n\n\n\n\npage 2\n\n\n\n\n\npage 3\n\n\n\n\n\npage 4\n\n\n\n\n\npage 5\n\n\n\n\n\npage 6\n\n\n\n\n\npage 7\n\n\n\n\n\npage 8\n\n\n\n\n\npage 9\n\n\n\n','<p>page 1</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149028744179720170323_220056_000000.png\" alt=\"lesson3_1\" width=\"768\" height=\"960\" /></p>\n<p>page 2</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149028745237020170323_220102_000000.png\" alt=\"Lesson3_2\" width=\"768\" height=\"960\" /></p>\n<p>page 3</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149028747102620170323_220106_000000.png\" alt=\"Lesson3_3\" width=\"768\" height=\"960\" /></p>\n<p>page 4</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149028747888820170323_220425_000000.png\" alt=\"Lesson3_4\" width=\"768\" height=\"960\" /></p>\n<p>page 5</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149028748612120170323_220113_000000.png\" alt=\"Lesson3_5\" width=\"768\" height=\"960\" /></p>\n<p>page 6</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149028749300420170323_220520_000000.png\" alt=\"Lesson3_6\" width=\"768\" height=\"960\" /></p>\n<p>page 7</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149028750392220170323_220550_000000.png\" alt=\"Lesson3_7\" width=\"768\" height=\"960\" /></p>\n<p>page 8</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149028751506420170323_220619_000000.png\" alt=\"Lesson3_8\" width=\"768\" height=\"960\" /></p>\n<p>page 9</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149028752271320170323_220641_000000.png\" alt=\"Lesson3_9\" width=\"768\" height=\"960\" /></p>','LANG_TC',4,'manpakhong','manpakhong','2017-03-23 21:13:30','2017-03-23 21:13:30','						'),(35,'2017-03-26 13:02:56','小孩與鬼','英國一些偏遠的地方，有著很多古舊的建築物，有些可租住的樓房可能有上百年歷史。\n這次是一家大少入住一幢有過百年的房子，房子很大，有多個房間，這家人除了一對夫婦外還有一位外婆和一個四歲小孩。\n起初沒什麼不妥，但漸漸外婆發覺孫仔常常自言自語，不是孩童式自己跟自己玩，而是好像有人跟他對答。而且有時忽然失去孩子蹤影，但每每都在地牢位置找到他。\n於是一天婆婆決定跟蹤孫仔，孫仔這回又落到地牢，奇怪的是，地牢門自動開啟，孫仔熟練地向地牢走下去，並且似乎一面走，一面跟誰說話似的。外婆緊緊地跟著，行到房盡頭原來還有一度不顯眼的木門，外婆在想，搬來這麼久都不知地牢盡頭還有房。走過木門後是一條狹窄通道，隱約有點點光，孫仔不停向前走， 終於停在一個房門外，門慢慢的自動打開，這時外婆一個箭步上前，一面拉著自己孫仔，一面探頭進房，嚇然看到一副白骨在房裡。孫仔向著白骨叫 ：「叔叔 ! 今天我們玩什麼吖！」這時婆婆跑跑跌跌的拉著孫仔跑回地面。\n由於發現白骨，外婆告訴孫仔爸爸後，爸爸決定通知警方。當謷方到塲時怪事又發生，剛才婆婆是馮著一點點光才看到白骨，但警方如沒有電筒照明，跟本就什麼也看不到。\n跟據警方調查所得，原來這副白骨是一名成年白人，而且是自然死亡，死亡時間應該有過百年，跟據他身邊的証物，証實他是一位傳教士。 \n也許這位傳教士想自己靜靜地死去，但死後卻一直沒人發現他的遺體，所以唯有出現在孩子面前，讓他把這訊息傳遞出來，希望自己的遺體得以入土為安。','<p>英國一些偏遠的地方，有著很多古舊的建築物，有些可租住的樓房可能有上百年歷史。</p>\n<p>這次是一家大少入住一幢有過百年的房子，房子很大，有多個房間，這家人除了一對夫婦外還有一位外婆和一個四歲小孩。</p>\n<p>起初沒什麼不妥，但漸漸外婆發覺孫仔常常自言自語，不是孩童式自己跟自己玩，而是好像有人跟他對答。而且有時忽然失去孩子蹤影，但每每都在地牢位置找到他。</p>\n<p>於是一天婆婆決定跟蹤孫仔，孫仔這回又落到地牢，奇怪的是，地牢門自動開啟，孫仔熟練地向地牢走下去，並且似乎一面走，一面跟誰說話似的。外婆緊緊地跟著，行到房盡頭原來還有一度不顯眼的木門，外婆在想，搬來這麼久都不知地牢盡頭還有房。走過木門後是一條狹窄通道，隱約有點點光，孫仔不停向前走， 終於停在一個房門外，門慢慢的自動打開，這時外婆一個箭步上前，一面拉著自己孫仔，一面探頭進房，嚇然看到一副白骨在房裡。孫仔向著白骨叫 ：「叔叔 ! 今天我們玩什麼吖！」這時婆婆跑跑跌跌的拉著孫仔跑回地面。</p>\n<p>由於發現白骨，外婆告訴孫仔爸爸後，爸爸決定通知警方。當謷方到塲時怪事又發生，剛才婆婆是馮著一點點光才看到白骨，但警方如沒有電筒照明，跟本就什麼也看不到。</p>\n<p>跟據警方調查所得，原來這副白骨是一名成年白人，而且是自然死亡，死亡時間應該有過百年，跟據他身邊的証物，証實他是一位傳教士。</p>\n<p>也許這位傳教士想自己靜靜地死去，但死後卻一直沒人發現他的遺體，所以唯有出現在孩子面前，讓他把這訊息傳遞出來，希望自己的遺體得以入土為安。</p>','LANG_TC',1,'emilywong','emilywong','2017-03-26 17:02:56','2017-03-26 17:02:56','						'),(36,'2017-03-29 07:13:06','黑死病( 四 )','黑死病(四) \r\n\r\n當年德國亦有黑死病爆發，不過比起其他國家的死亡人數為少。事源，當年有一位吹笛人，聲稱可以用笛聲引所有老鼠走進河裡去浸死，但條件是要一千個金幣。\r\n\r\n起初德國政府應承事後付一千個金幣，但！當吹笛人完成任務，消滅大量老鼠之後，德國政府卻食言，只給這吹笛人五十個金幣。\r\n\r\n吹笛人大怒，決定報仇。就用笛聲催眠所有小孩，令這些小孩一個跟一個的走進山洞，再也沒有回來。','<p>黑死病(四)</p>\n<p>當年德國亦有黑死病爆發，不過比起其他國家的死亡人數為少。事源，當年有一位吹笛人，聲稱可以用笛聲引所有老鼠走進河裡去浸死，但條件是要一千個金幣。</p>\n<p>起初德國政府應承事後付一千個金幣，但！當吹笛人完成任務，消滅大量老鼠之後，德國政府卻食言，只給這吹笛人五十個金幣。</p>\n<p>吹笛人大怒，決定報仇。就用笛聲催眠所有小孩，令這些小孩一個跟一個的走進山洞，再也沒有回來。</p>','LANG_TC',1,'emilywong','emilywong','2017-03-29 11:13:06','2017-03-29 11:13:06','						'),(37,'2017-03-29 07:14:33','黑死病 (三)','黑死病 (三) \r\n\r\n在馬賽黑死病爆發初期，一眾天主教徒質疑天主教，為何他們那麼虔誠，卻沒有得到保佑大家生命，令信眾遇上黑死病！？當時不少信眾轉向相信女巫，而觸怒教庭。教庭下令屠殺所有女巫，由於避免女巫死後轉化為貓，所以連同所有貓咪都 一拼殺害。殺掉大量貓咪，報應隨之而來。就是令老鼠除去天敵後就大量繁殖，黑死病盡情大型爆發。 ','<p>黑死病 (三)</p>\n<p>在馬賽黑死病爆發初期，一眾天主教徒質疑天主教，為何他們那麼虔誠，卻沒有得到保佑大家生命，令信眾遇上黑死病！？當時不少信眾轉向相信女巫，而觸怒教庭。教庭下令屠殺所有女巫，由於避免女巫死後轉化為貓，所以連同所有貓咪都 一拼殺害。殺掉大量貓咪，報應隨之而來。就是令老鼠除去天敵後就大量繁殖，黑死病盡情大型爆發。</p>','LANG_TC',1,'emilywong','emilywong','2017-03-29 11:14:33','2017-03-29 11:14:33','						'),(38,'2017-03-30 16:12:46','黑死病(二)','黑死病(二)\n\n有歷史以來，分別爆發過三次大型黑死病：\n\n第一段時期 ：公元六世紀\n\n第二段時期 ：十七世紀\n\n第三段時期 ：十九世紀\n\n三段時期以十七世紀最為嚴重：\n\n1629年 一1631年 意大利黑死病(温疫)\n\n1665年 一1666年 倫敦黑死病(温疫)\n\n1679年 維也納黑死病(温疫)\n\n1720年 一1722年 馬賽黑死病(温疫)\n\n參考文獻\n\nStéphane Barry and Norbert Gualde, \"The Biggest Epidemics of History\"（La plus grande épidémie de l\'histoire, in L\'Histoire n°310, June 2006, pp.38 (article from pp.38 to 49, the whole issue is dedicated to the Black Plague, pp.38-60）','<p>黑死病(二)</p>\n<p>有歷史以來，分別爆發過三次大型黑死病：</p>\n<p>第一段時期 ：公元六世紀</p>\n<p>第二段時期 ：十七世紀</p>\n<p>第三段時期 ：十九世紀</p>\n<p>三段時期以十七世紀最為嚴重：</p>\n<p>1629年 一1631年 意大利黑死病(温疫)</p>\n<p>1665年 一1666年 倫敦黑死病(温疫)</p>\n<p>1679年 維也納黑死病(温疫)</p>\n<p>1720年 一1722年 馬賽黑死病(温疫)</p>\n<p><span class=\"reference-text\">參考文獻</span></p>\n<p><span class=\"reference-text\">St&eacute;phane Barry and Norbert Gualde, \"The Biggest Epidemics of History\"（<em>La plus grande &eacute;pid&eacute;mie de l\'histoire</em>, in <em><a class=\"new\" title=\"L\'Histoire（頁面不存在）\" href=\"https://zh.wikipedia.org/w/index.php?title=L%27Histoire&amp;action=edit&amp;redlink=1\">L\'Histoire</a></em> n&deg;310, June 2006, pp.38 (article from pp.38 to 49, the whole issue is dedicated to the Black Plague, pp.38-60）</span></p>','LANG_TC',1,'emilywong','manpakhong','2017-03-30 20:12:46','2017-03-30 20:12:46','						'),(39,'2017-04-05 09:05:54','黑死病 (一)','黑死病 (一) \r\n\r\n黑死病又名 瘟疫，起源於亞洲西南部，1340年代後源絲綢之路散落於歐洲地方。死亡人數多至七千五百萬人。病者由於皮下出血，所以看起來外觀是黑黑的，所以稱之為黑死病。 \r\n\r\n黑死病病毒原本只潛藏於農田泥土內，於公元六世紀，有一粿慧星撞落地球，而引起大量灰塵飛起， 掩蓋歐洲大部份土地，使泥地下的黑死病病菌就隨風飄浮在空氣中四處散播。 \r\n\r\n根據病歷學家研究指出，黑死病病菌在六世紀飄出地面後一直潛藏到十七及十九世紀。之後黑死病病毒潛藏於跳蝨內吸食營養，跳蝨就在老鼠身上吸血生存。但當時黑死病細菌受某種因數影響，而於短時間內大量繁殖， 不斷繁殖而逼爆倒塞跳蝨胃部，食物落不到胃部， 以至不斷嚼食老鼠血， 由於跳蝨食極也得不到營養而死亡。就這樣黑死病病毒由跳蝨死屍爆出傳到老鼠身上，老鼠亦因黑死病而紛紛死亡，引至黑死病病菌隨著空氣散播。\r\n\r\n參考文獻\r\n\r\nCohn, Samuel K. Jr. The Black DeathTransformed: Disease and Culture in Early Renaissance Europe. A Hodder Arnold. 2003: 336. ISBN 978-0-340-70646-6.','<p><span class=\"_5yl5\">黑死病 (一) </span></p>\n<p><span class=\"_5yl5\">黑死病又名 瘟疫，起源於亞洲西南部，1340年代後源絲綢之路散落於歐洲地方。死亡人數多至七千五百萬人。病者由於皮下出血，所以看起來外觀是黑黑的，所以稱之為黑死病。 </span></p>\n<p><span class=\"_5yl5\">黑死病病毒原本只潛藏於農田泥土內，於公元六世紀，有一粿慧星撞落地球，而引起大量灰塵飛起， 掩蓋歐洲大部份土地，使泥地下的黑死病病菌就隨風飄浮在空氣中四處散播。 </span></p>\n<p><span class=\"_5yl5\">根據病歷學家研究指出，黑死病病菌在六世紀飄出地面後一直潛藏到十七及十九世紀。之後黑死病病毒潛藏於跳蝨內吸食營養，跳蝨就在老鼠身上吸血生存。但當時黑死病細菌受某種因數影響，而於短時間內大量繁殖， 不斷繁殖而逼爆倒塞跳蝨胃部，食物落不到胃部， 以至不斷嚼食老鼠血， 由於跳蝨食極也得不到營養而死亡。就這樣黑死病病毒由跳蝨死屍爆出傳到老鼠身上，老鼠亦因黑死病而紛紛死亡，引至黑死病病菌隨著空氣散播。</span></p>\n<p><span class=\"_5yl5\">參考文獻</span></p>\n<p><span class=\"_5yl5\"><span class=\"reference-text\"><cite class=\"citation book\">Cohn, Samuel K. Jr. The Black DeathTransformed: Disease and Culture in Early Renaissance Europe. A Hodder Arnold. 2003: 336. <a class=\"internal mw-magiclink-isbn\" href=\"https://zh.wikipedia.org/wiki/Special:%E7%BD%91%E7%BB%9C%E4%B9%A6%E6%BA%90/9780340706466\">ISBN 978-0-340-70646-6</a>.</cite></span></span></p>','LANG_TC',1,'emilywong','emilywong','2017-04-05 13:05:54','2017-04-05 13:05:54','						'),(40,'2017-03-30 16:07:44','股票基礎 Lesson 4 手寫筆記','page 1\n\n\n\npage 2\n\n\n\npage 3\n\n\n\npage 4\n\n\n\npage 5\n\n\n','<p>page 1</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149088931872920170330_205417_000000.png\" alt=\"lesson 4 page 1\" width=\"768\" height=\"960\" /></p>\n<p>page 2</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149088932836820170330_205436_000000.png\" alt=\"lesson 4 page 2\" width=\"768\" height=\"960\" /></p>\n<p>page 3</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149088933851020170330_205449_000000.png\" alt=\"lesson 4 page 3\" width=\"768\" height=\"960\" /></p>\n<p>page 4</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149088934838320170330_205501_000000.png\" alt=\"lesson 4 page 4\" width=\"768\" height=\"960\" /></p>\n<p>page 5</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149088935698720170330_205512_000000.png\" alt=\"lesson 4 page 5\" width=\"768\" height=\"960\" /></p>','LANG_TC',4,'manpakhong','manpakhong','2017-03-30 20:07:44','2017-03-30 20:07:44','						'),(41,'2017-04-04 12:24:11','Project Management Process Groups','Initiating Process Group - Those processes performed to define a new project or a new phase of an existing project by obtaining authorization to start the project or phase.\n\nPlanning Prcess Group - Those processes required to establish the scope of the project, refine the objectives and define the course of action required to attain the objectives that the project was undertaken to achieve.\n\nExecuting Process Group - Those processes performed to complete the work defined in the project management plan to satisfy the project specifications.\n\nMonitoring and Controlling Process Group - Those processes required to track, review, and regulate the progress and performance of the project; identify any areas in which changes to the plan are required; and initiate the corresponing changes.\n\nClosing Process Group - Those process performed to finalize all activities across all Process Groups to formally close the project or phase.\n\nProcess Groups Interact in a Phase or Project','<p><img src=\"../images/uploads/blogs/projectManagementProcessGroups20170404_171148_000000.jpg\" alt=\"Project Management Process Groups Diagram\" width=\"932\" height=\"456\" /></p>\n<p>Initiating Process Group - Those processes performed to define a new project or a new phase of an existing project by obtaining authorization to start the project or phase.</p>\n<p>Planning Prcess Group - Those processes required to establish the scope of the project, refine the objectives and define the course of action required to attain the objectives that the project was undertaken to achieve.</p>\n<p>Executing Process Group - Those processes performed to complete the work defined in the project management plan to satisfy the project specifications.</p>\n<p>Monitoring and Controlling Process Group - Those processes required to track, review, and regulate the progress and performance of the project; identify any areas in which changes to the plan are required; and initiate the corresponing changes.</p>\n<p>Closing Process Group - Those process performed to finalize all activities across all Process Groups to formally close the project or phase.</p>\n<p><img src=\"../images/uploads/blogs/processGroupsInteractInPhaseOrProject20170404_171637_000000.jpg\" alt=\"Process groups and its time relationships with others\" width=\"901\" height=\"502\" /></p>\n<p>Process Groups Interact in a Phase or Project</p>','LANG_EN',51,'manpakhong','manpakhong','2017-04-04 16:24:11','2017-04-04 16:24:11','						'),(42,'2017-04-04 15:50:29','Project Management Process Groups Chart','Project Management Process Groups Chart\n\n\n\n','<p>Project Management Process Groups Chart</p>\n<p><img src=\"../images/uploads/blogs/pmpProcessGroupsChart20170404_204421_000000.png\" alt=\"Project Management Process Groups Chart\" width=\"768\" height=\"1024\" /></p>','LANG_EN',51,'manpakhong','manpakhong','2017-04-04 19:50:29','2017-04-04 19:50:29','						'),(43,'2017-04-04 16:06:01','The relationship between knowledge areas and process groups','\n','<p><img src=\"../images/uploads/blogs/relationKnowledgeAreasAndProcessGroups20170404_210002_000000.jpg\" alt=\"The relationship between knowledge areas and process groups\" width=\"1353\" height=\"812\" /></p>','LANG_EN',51,'manpakhong','manpakhong','2017-04-04 20:06:01','2017-04-04 20:06:01','						'),(44,'2017-04-06 07:40:14','charcoal drawing','\r\n\r\n\r\ncharcoal drawing\r\n\r\n  ','<p>&nbsp;</p>\n<p>charcoal drawing</p>\n<p><img src=\"../images/uploads/blogs/10150455_10203418276161405_75586979_n20170406_122937_000000.jpg\" alt=\"\" width=\"290\" height=\"290\" />&nbsp; <img src=\"../images/uploads/blogs/10150766_10203418274561365_1230167139_n20170406_122839_000000.jpg\" alt=\"\" width=\"221\" height=\"300\" /></p>','LANG_TC',1,'emilywong','emilywong','2017-04-06 11:40:14','2017-04-06 11:40:14','						'),(45,'2017-04-07 01:08:57','股票基礎 Lesson 5 手寫筆記','page 1\n\n\n\npage 2\n\n\n\npage 3\n\n\n\npage 4\n\n\n\npage 5\n\n\n\npage 6\n\n\n','<p>page 1</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149152605916220170407_060003_000000.png\" alt=\"stock lesson 5 page 1\" width=\"768\" height=\"960\" /></p>\n<p>page 2</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149152607252620170407_060106_000000.png\" alt=\"stock lesson 5 page 2\" width=\"768\" height=\"960\" /></p>\n<p>page 3</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149152608086620170407_060140_000000.png\" alt=\"stock lesson 5 page 3\" width=\"768\" height=\"960\" /></p>\n<p>page 4</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149152608911520170407_060223_000000.png\" alt=\"stock lesson 5 page 4\" width=\"768\" height=\"960\" /></p>\n<p>page 5</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149152610046320170407_060254_000000.png\" alt=\"stock lesson 5 page 5\" width=\"768\" height=\"960\" /></p>\n<p>page 6</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149152610989320170407_060320_000000.png\" alt=\"stock lesson 5 page 6\" width=\"768\" height=\"960\" /></p>','LANG_TC',4,'manpakhong','manpakhong','2017-04-07 05:08:57','2017-04-07 05:08:57','						'),(46,'2017-04-11 03:15:26','繁簡體常用錯的日本字','page 1\n\npage 2','<p>page 1</p>\n<p><img src=\"../images/uploads/blogs/chi_jap_simp_120170411_111413_000000.png\" alt=\"wrong wording 1\" width=\"768\" height=\"960\" /></p>\n<p>page 2</p>\n<p><img src=\"../images/uploads/blogs/chi_jap_simp_220170411_111506_000000.png\" alt=\"wrong wording 2\" width=\"768\" height=\"960\" /></p>','LANG_TC',521,'manpakhong','manpakhong','2017-04-10 19:15:26','2017-04-10 19:15:26','						'),(47,'2017-04-11 03:18:44','常見錯別字','page 1\n\npage 2','<p>page 1</p>\n<p><img src=\"../images/uploads/blogs/chi_wrong_120170411_111809_000000.png\" alt=\"wrong wording 1\" width=\"768\" height=\"960\" /></p>\n<p>page 2</p>\n<p><img src=\"../images/uploads/blogs/chi_wrong_220170411_111814_000000.png\" alt=\"wrong wording 2\" width=\"768\" height=\"960\" /></p>','LANG_TC',521,'manpakhong','manpakhong','2017-04-10 19:18:44','2017-04-10 19:18:44','						'),(48,'2017-04-11 03:20:08','練習錯別字','page 1\n\npage 2\n\npage 3','<p>page 1</p>\n<p><img src=\"../images/uploads/blogs/chi_wrong_320170411_111904_000000.png\" alt=\"wrong wording 3\" width=\"768\" height=\"960\" /></p>\n<p>page 2</p>\n<p><img src=\"../images/uploads/blogs/chi_wrong_420170411_111909_000000.png\" alt=\"wrong wording 4\" width=\"768\" height=\"960\" /></p>\n<p>page 3</p>\n<p><img src=\"../images/uploads/blogs/chi_wrong_520170411_111914_000000.png\" alt=\"wrong wording 5\" width=\"768\" height=\"960\" /></p>','LANG_TC',521,'manpakhong','manpakhong','2017-04-10 19:20:08','2017-04-10 19:20:08','						'),(49,'2017-04-13 08:30:31','垃圾人定律','','<p><img src=\"../images/uploads/blogs/17886896_10212417153527715_1686932781_o20170413_162854_000000.png\" alt=\"垃圾人定律\" width=\"508\" height=\"902\" /></p>','LANG_TC',1,'emilywong','emilywong','2017-04-13 00:30:31','2017-04-13 00:30:31','						'),(50,'2017-04-13 16:17:52','別走近窗邊',' ','<p><img src=\"../images/uploads/blogs/17902741_10212428010399130_1948630983_o20170414_001023_000000.png\" alt=\"別走近窗邊\" width=\"444\" height=\"790\" />&nbsp;<img src=\"../images/uploads/blogs/17917039_10212428009959119_404825702_o20170414_001241_000000.png\" alt=\"別走近窗邊\" width=\"444\" height=\"789\" /></p>','LANG_TC',1,'emilywong','emilywong','2017-04-13 08:17:52','2017-04-13 08:17:52','						'),(51,'2017-04-14 01:02:05','股票基礎 Lesson 6 手寫筆記','page 1\n\n\n\n\n\npage 2\n\n\n\n\n\npage 3\n\n\n\n\n\npage 4\n\n\n\n','<p>page 1</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149213084022520170414_085932_000000.png\" alt=\"stock lesson 6 page 1\" width=\"768\" height=\"960\" /></p>\n<p>page 2</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149213087997320170414_085936_000000.png\" alt=\"stock lesson 6 page 2\" width=\"768\" height=\"960\" /></p>\n<p>page 3</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149213088862520170414_085938_000000.png\" alt=\"stock lesson 6 page 3\" width=\"768\" height=\"960\" /></p>\n<p>page 4</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149213090184720170414_085941_000000.png\" alt=\"stock lesson 6 page 4\" width=\"768\" height=\"960\" /></p>','LANG_TC',4,'manpakhong','manpakhong','2017-04-13 17:02:05','2017-04-13 17:02:05','						'),(52,'2017-04-16 09:02:54','真人真事','','<p><img src=\"../images/uploads/blogs/17968677_10212455478525816_585854683_o20170416_170217_000000.png\" alt=\"真人真事\" width=\"337\" height=\"600\" /></p>','LANG_TC',1,'emilywong','emilywong','2017-04-16 01:02:54','2017-04-16 01:02:54','						'),(54,'2017-04-16 09:27:34','催眠 ','','<p><img src=\"../images/uploads/blogs/17968797_10212455831174632_1177233444_o20170416_172614_000000.png\" alt=\"催眠1\" width=\"337\" height=\"600\" /><img src=\"../images/uploads/blogs/17975999_10212455831054629_412869603_o20170416_172715_000000.png\" alt=\"催眠2\" width=\"337\" height=\"600\" /></p>','LANG_TC',1,'emilywong','emilywong','2017-04-16 01:27:34','2017-04-16 01:27:34','						'),(55,'2017-04-18 11:12:39','妥瑞症','','<p><img src=\"../images/uploads/blogs/18049903_10212474571123119_2122048409_o20170418_191235_000000.png\" alt=\"妥瑞症\" width=\"450\" height=\"800\" /></p>','LANG_TC',1,'emilywong','emilywong','2017-04-18 03:12:39','2017-04-18 03:12:39','						'),(56,'2017-04-21 17:25:48',' 中國連環殺手','','<p><img src=\"../images/uploads/blogs/18110004_10212505671420607_1521790291_o20170422_012226_000000.png\" alt=\"連環殺手\" width=\"396\" height=\"704\" /><img src=\"../images/uploads/blogs/17968932_10212505671100599_287169481_o20170422_012431_000000.png\" alt=\"連環殺手\" width=\"394\" height=\"700\" /><img src=\"../images/uploads/blogs/18109919_10212505670580586_790125602_o20170422_012558_000000.png\" alt=\"連環殺手\" width=\"394\" height=\"700\" /></p>','LANG_TC',1,'emilywong','emilywong','2017-04-21 09:25:48','2017-04-21 09:25:48','						'),(57,'2017-04-22 16:40:37','股票基礎 Lesson 7 手寫筆記','page 1\n\n\n\npage 2\n\n\n\npage 3\n\n\n\npage 4\n\n\n\npage 5\n\n\n\n\n','<p>page 1</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149287850241320170423_003529_000000.png\" alt=\"stock l7 1\" width=\"768\" height=\"960\" /></p>\n<p>page 2</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149287850735020170423_003713_000000.png\" alt=\"stock l7 2\" width=\"768\" height=\"960\" /></p>\n<p>page 3</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149287851263020170423_003913_000000.png\" alt=\"stock l7 3\" width=\"768\" height=\"960\" /></p>\n<p>page 4</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149287851869320170423_004010_000000.png\" alt=\"stock l7 4\" width=\"768\" height=\"960\" /></p>\n<p>page 5</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149287852397320170423_004059_000000.png\" alt=\"stock l7 5\" width=\"768\" height=\"960\" /></p>\n<p>&nbsp;</p>','LANG_TC',4,'manpakhong','manpakhong','2017-04-22 08:40:37','2017-04-22 08:40:37','						'),(59,'2017-04-26 09:56:08','Paper Quilling','Paper Quilling Finishing\r\n\r\n\r\n\r\nQuilling Progesses\r\n\r\n ','<p>Paper Quilling Finishing</p>\n<p><img src=\"../images/uploads/blogs/18118518_10212522463800406_192720674013569107_n20170423_234639_000000.jpg\" alt=\"Finishing\" width=\"375\" height=\"500\" /></p>\n<p>Quilling Progesses</p>\n<p><img src=\"../images/uploads/blogs/18118732_10212522465640452_6849201854558881268_n20170423_234752_000000.jpg\" alt=\"progess 1\" width=\"399\" height=\"299\" /><img src=\"../images/uploads/blogs/18034041_10212522465160440_8538990057438329232_n20170423_234902_000000.jpg\" alt=\"progess 2\" width=\"225\" height=\"300\" /><img src=\"../images/uploads/blogs/17992059_10212522465000436_2136937357514206087_n20170423_235036_000000.jpg\" alt=\"progess 3\" width=\"400\" height=\"300\" />&nbsp;<img src=\"../images/uploads/blogs/17952890_10212522464760430_8957687321983987816_n20170423_235613_000000.jpg\" alt=\"progess 7\" width=\"225\" height=\"300\" /></p>\n<p><img src=\"../images/uploads/blogs/18010137_10212522464120414_1731874145139423963_n20170423_235125_000000.jpg\" alt=\"progess 4\" width=\"400\" height=\"300\" /><img src=\"../images/uploads/blogs/18056901_10212522464440422_5519178233032406986_n20170423_235210_000000.jpg\" alt=\"progess 5\" width=\"400\" height=\"300\" /></p>\n<p><img src=\"../images/uploads/blogs/17990941_10212522464000411_3646611713995724240_n20170423_235309_000000.jpg\" alt=\"progress 6\" width=\"225\" height=\"300\" /></p>','LANG_TC',1,'emilywong','emilywong','2017-04-26 01:56:08','2017-04-26 01:56:08','						'),(60,'2017-04-28 00:37:01','股票基礎 Lesson 8 手寫筆記','page 1\n\n\n\npage 2\n\n\n\npage 3\n\n\n\npage 4\n\n\n\npage 5\n\n\n','<p>page 1</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149330211267620170428_083630_000000.png\" alt=\"stock_8_1\" width=\"768\" height=\"960\" /></p>\n<p>page 2</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149330212499620170428_083700_000000.png\" alt=\"stock_8_2\" width=\"768\" height=\"960\" /></p>\n<p>page 3</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149330213657120170428_083721_000000.png\" alt=\"stock_8_3\" width=\"768\" height=\"960\" /></p>\n<p>page 4</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149330214494320170428_083748_000000.png\" alt=\"stock_8_4\" width=\"768\" height=\"960\" /></p>\n<p>page 5</p>\n<p><img src=\"../images/uploads/blogs/snapshot_149330215343020170428_083811_000000.png\" alt=\"stock_8_5\" width=\"768\" height=\"960\" /></p>','LANG_TC',4,'manpakhong','manpakhong','2017-04-27 16:37:01','2017-04-27 16:37:01','						');
/*!40000 ALTER TABLE `cmn_blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `cmn_category`
--

DROP TABLE IF EXISTS `cmn_category`;
/*!50001 DROP VIEW IF EXISTS `cmn_category`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `cmn_category` (
  `id` tinyint NOT NULL,
  `menu_id` tinyint NOT NULL,
  `seq` tinyint NOT NULL,
  `lv` tinyint NOT NULL,
  `lv_menu_en` tinyint NOT NULL,
  `lv_menu_tc` tinyint NOT NULL,
  `lv_parent_menu_id` tinyint NOT NULL,
  `is_shown` tinyint NOT NULL,
  `is_enabled` tinyint NOT NULL,
  `is_category` tinyint NOT NULL,
  `url` tinyint NOT NULL,
  `created_by` tinyint NOT NULL,
  `updated_by` tinyint NOT NULL,
  `created_date` tinyint NOT NULL,
  `updated_date` tinyint NOT NULL,
  `remarks` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `cmn_code`
--

DROP TABLE IF EXISTS `cmn_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmn_code` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `desc_en` varchar(255) DEFAULT NULL,
  `desc_tc` varchar(255) DEFAULT NULL,
  `code_type` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmn_code`
--

LOCK TABLES `cmn_code` WRITE;
/*!40000 ALTER TABLE `cmn_code` DISABLE KEYS */;
INSERT INTO `cmn_code` VALUES (1,'LANG_EN','Eng.','英文','language','manpakhong','manpakhong','2017-02-03 09:05:48','2017-02-03 09:05:52',NULL),(2,'LANG_TC','T.Chi.','繁體中文','language','manpakhong','manpakhong','2017-02-03 09:05:50','2017-02-03 09:05:53',NULL),(3,'MOVIE_CLASS_I','Level I','I 級','movie_type','manpakhong','manpakhong','2017-04-07 14:37:51','2017-04-07 14:37:53',NULL),(4,'MOVIE_CLASS_II_A','Level II A','IIa 級','movie_type','manpakhong','manpakhong','2017-04-07 14:41:04','2017-04-07 14:41:07',NULL),(5,'MOVIE_CLASS_II_B','Level II B','IIb 級','movie_type','manpakhong','manpakhong','2017-04-07 14:41:09','2017-04-07 14:41:11',NULL),(6,'MOVIE_CLASS_III','Level III','III 級','movie_type','manpakhong','manpakhong','2017-04-07 14:41:13','2017-04-07 14:41:15',NULL),(7,'MOVIE_CLASS_IV','Level IV','IV 級','movie_type','manpakhong','manpakhong','2017-04-07 14:41:17','2017-04-07 14:41:19',NULL);
/*!40000 ALTER TABLE `cmn_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cmn_menu`
--

DROP TABLE IF EXISTS `cmn_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmn_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) unsigned DEFAULT NULL,
  `seq` int(11) unsigned DEFAULT NULL,
  `lv` int(11) unsigned DEFAULT NULL,
  `lv_menu_en` varchar(255) DEFAULT NULL,
  `lv_menu_tc` varchar(255) DEFAULT NULL,
  `lv_parent_menu_id` int(11) unsigned DEFAULT NULL,
  `is_shown` bit(1) DEFAULT NULL,
  `is_enabled` bit(1) DEFAULT NULL,
  `is_category` bit(1) DEFAULT b'1',
  `url` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmn_menu`
--

LOCK TABLES `cmn_menu` WRITE;
/*!40000 ALTER TABLE `cmn_menu` DISABLE KEYS */;
INSERT INTO `cmn_menu` VALUES (1,1,1,0,'Blog','博客',NULL,'','','','blog_page.php?menu_id=1','manpakhong','manpakhong','2017-01-16 02:44:03','2017-01-16 02:44:44',NULL),(2,2,2,0,'Knowledge','知識',NULL,'','','','blog_page.php?menu_id=2','manpakhong','manpakhong','2017-01-16 02:47:24','2017-01-16 02:47:28',NULL),(3,21,1,1,'Music','音樂',2,'','','','blog_page.php?menu_id=21','manpakhong','manpakhong','2017-01-16 02:52:25','2017-01-16 02:52:29',NULL),(4,22,2,1,'Divine','命算',2,'','','','blog_page.php?menu_id=22','manpakhong','manpakhong','2017-01-16 15:55:20','2017-01-16 15:55:25',NULL),(5,23,3,1,'Technology','科技',2,'','','','blog_page.php?menu_id=23','manpakhong','manpakhong','2017-01-16 02:56:28','2017-01-16 02:56:31',NULL),(6,24,4,1,'Philosophy','哲學',2,'','','','blog_page.php?menu_id=24','manpakhong','manpakhong','2017-01-16 02:57:06','2017-01-16 02:57:09',NULL),(9,3,5,0,'Others','其他',NULL,'','','','blog_page.php?menu_id=3','manpakhong','manpakhong','2017-01-24 07:22:31','2017-01-24 07:22:34',NULL),(12,221,1,2,'Classic','古典',21,'','','','blog_page.php?menu_id=221','manpakhong','manpakhong','2017-01-27 04:19:50','2017-01-27 04:19:52',NULL),(13,4,3,0,'Stock','股票',NULL,'','','','blog_page.php?menu_id=4','manpakhong','manpakhong','2017-03-10 21:06:11','2017-03-10 21:06:13',NULL),(14,5,4,0,'Exams','考試',NULL,'','','','blog_page.php?menu_id=5','manpakhong','manpakhong','2017-03-10 21:07:48','2017-03-10 21:07:51',NULL),(15,51,1,1,'PMP','項目管理',5,'','','','blog_page.php?menu_id=51','manpakhong','manpakhong','2017-03-10 21:08:36','2017-03-10 21:08:39',NULL),(16,52,2,1,'CRE','公務員綜合招聘考試',5,'','','','blog_page.php?menu_id=52','manpakhong','manpakhong','2017-04-10 01:15:28','2017-04-10 01:15:31',NULL),(17,521,1,2,'Chinese Usage','中文運用',52,'','','','blog_page.php?menu_id=521','manpakhong','manpakhong','2017-04-10 01:18:09','2017-04-10 01:18:12',NULL),(18,522,2,2,'English Usage','英語運用',52,'','','','blog_page.php?menu_id=522','manpakhong','manpakhong','2017-04-10 01:19:03','2017-04-10 01:19:07',NULL);
/*!40000 ALTER TABLE `cmn_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cmn_menubar`
--

DROP TABLE IF EXISTS `cmn_menubar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmn_menubar` (
  `sid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seq` int(11) unsigned NOT NULL,
  `lv` int(11) unsigned NOT NULL,
  `lv_text_en` varchar(255) DEFAULT NULL,
  `lv_text_tc` varchar(255) DEFAULT NULL,
  `up_lv_sid` varchar(255) DEFAULT NULL,
  `is_shown` tinyint(1) NOT NULL DEFAULT '1',
  `is_netvigated` tinyint(1) NOT NULL DEFAULT '1',
  `url` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` mediumtext,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmn_menubar`
--

LOCK TABLES `cmn_menubar` WRITE;
/*!40000 ALTER TABLE `cmn_menubar` DISABLE KEYS */;
INSERT INTO `cmn_menubar` VALUES (1,1,0,'Music','音樂',NULL,1,1,NULL,'2013-12-10 02:13:27','2013-12-09 18:13:28',NULL);
/*!40000 ALTER TABLE `cmn_menubar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cmn_movie`
--

DROP TABLE IF EXISTS `cmn_movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmn_movie` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `movie_name_en` varchar(255) DEFAULT NULL,
  `movie_name_tc` varchar(255) DEFAULT NULL,
  `movie_type_id` int(11) unsigned DEFAULT NULL,
  `class_code` varchar(255) DEFAULT NULL,
  `movie_pic_1` varchar(255) DEFAULT NULL,
  `movie_pic_2` varchar(255) DEFAULT NULL,
  `movie_trailor` varchar(500) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmn_movie`
--

LOCK TABLES `cmn_movie` WRITE;
/*!40000 ALTER TABLE `cmn_movie` DISABLE KEYS */;
INSERT INTO `cmn_movie` VALUES (1,NULL,'地獄解碼',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(2,NULL,'S8 驚世檔案',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(3,NULL,'藍白紅三部曲 之 紅',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(4,NULL,'貓咪去哪兒',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(5,NULL,'喪屍末日戰',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(6,NULL,'逆時空狙擊',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(7,NULL,'舞出真我 2',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(8,NULL,'死亡習作：咒怨森林',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(9,NULL,'身後戀事',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(10,NULL,'藍白紅三部曲 之 白',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(11,NULL,'洋腸派對',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(12,NULL,'藍白紅三部曲 之 藍',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(13,NULL,'歌舞青春',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(14,NULL,'奇蹟補習社',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(15,NULL,'歌舞青春2',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(16,NULL,'舞出真我 3',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(17,NULL,'舞出真我 5',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(18,NULL,'耶路撒冷的女兒',NULL,NULL,NULL,NULL,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL);
/*!40000 ALTER TABLE `cmn_movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cmn_movie_type`
--

DROP TABLE IF EXISTS `cmn_movie_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmn_movie_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `movie_type_id` int(11) unsigned DEFAULT NULL,
  `movie_type_desc_en` varchar(255) DEFAULT NULL,
  `movie_type_desc_tc` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmn_movie_type`
--

LOCK TABLES `cmn_movie_type` WRITE;
/*!40000 ALTER TABLE `cmn_movie_type` DISABLE KEYS */;
INSERT INTO `cmn_movie_type` VALUES (1,1,'Action','動作','manpakhong','manpakhong','2017-04-07 14:18:53','2017-04-07 14:19:13',NULL),(2,2,'Adventure','冒險','manpakhong','manpakhong','2017-04-07 14:19:21','2017-04-04 14:19:24',NULL),(3,3,'Comedy','喜劇','manpakhong','manpakhong','2017-04-07 14:19:30','2017-04-05 14:19:33',NULL),(4,4,'Crime & Gangster','罪惡及黑幫','manpakhong','manpakhong','2017-04-07 14:19:36','2017-04-07 14:19:38',NULL),(5,5,'Drama','舞台劇','manpakhong','manpakhong','2017-04-07 14:19:41','2017-04-07 14:19:43',NULL),(6,6,'Epics/ Historical','紀錄/歷史','manpakhong','manpakhong','2017-04-07 14:19:48','2017-04-07 14:19:50',NULL),(7,7,'Horror','驚嚇','manpakhong','manpakhong','2017-04-07 14:19:53','2017-04-07 14:19:55',NULL),(8,8,'Musicals/ Dance','音樂/舞蹈','manpakhong','manpakhong','2017-04-07 14:19:58','2017-04-07 14:20:00',NULL),(9,9,'Science Fiction','科幻','manpakhong','manpakhong','2017-04-07 14:20:02','2017-04-07 14:20:04',NULL),(10,10,'War','戰爭','manpakhong','manpakhong','2017-04-07 14:20:08','2017-04-07 14:20:10',NULL),(11,11,'Westerns','西部','manpakhong','manpakhong','2017-04-07 14:20:13','2017-04-07 14:20:15',NULL);
/*!40000 ALTER TABLE `cmn_movie_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cmn_movie_waiting`
--

DROP TABLE IF EXISTS `cmn_movie_waiting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmn_movie_waiting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) unsigned DEFAULT NULL,
  `waiting_seq` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmn_movie_waiting`
--

LOCK TABLES `cmn_movie_waiting` WRITE;
/*!40000 ALTER TABLE `cmn_movie_waiting` DISABLE KEYS */;
INSERT INTO `cmn_movie_waiting` VALUES (1,1,1,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL),(2,2,2,NULL,'manpakhong','manpakhong','2017-04-28 02:49:45','2017-04-28 02:49:45',NULL);
/*!40000 ALTER TABLE `cmn_movie_waiting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cmn_pic`
--

DROP TABLE IF EXISTS `cmn_pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmn_pic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `file_description` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmn_pic`
--

LOCK TABLES `cmn_pic` WRITE;
/*!40000 ALTER TABLE `cmn_pic` DISABLE KEYS */;
/*!40000 ALTER TABLE `cmn_pic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cmn_user`
--

DROP TABLE IF EXISTS `cmn_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmn_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_full_name_en` varchar(255) DEFAULT NULL,
  `user_full_name_tc` varchar(255) DEFAULT NULL,
  `is_activated` bit(1) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmn_user`
--

LOCK TABLES `cmn_user` WRITE;
/*!40000 ALTER TABLE `cmn_user` DISABLE KEYS */;
INSERT INTO `cmn_user` VALUES (1,'emilywong','8814598ae53893d16d5e4352d2b5fa08','Emily Wong','Emily Wong','','manpakhong','manpakhong','2017-01-31 11:43:09','2017-01-31 11:47:59','blog writer'),(2,'manpakhong','2e7654dbd40cd59c79787533ef2c981b','Dave Man','Dave Man','','manpakhong','manpakhong','2017-01-31 11:53:25','2017-01-31 11:53:28','system owner'),(3,'rexwind','e89a58fb2af83fd56cddbdbaf7661d18','Rex Hui','Rex Hui','','manpakhong','manpakhong','2017-03-10 14:33:38','2017-03-10 14:33:42','blog writer'),(4,'keithcheng','37cbca4e833ff89bd4b4555dfdd74fd9','Keith Cheng','Keith Cheng','','manpakhong','manpakhong','2017-04-22 04:51:42','2017-04-22 04:51:44','blog writer');
/*!40000 ALTER TABLE `cmn_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cmn_user_preferences`
--

DROP TABLE IF EXISTS `cmn_user_preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cmn_user_preferences` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_login_id` varchar(255) DEFAULT NULL,
  `default_language_code` varchar(255) DEFAULT NULL,
  `default_page` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cmn_user_preferences`
--

LOCK TABLES `cmn_user_preferences` WRITE;
/*!40000 ALTER TABLE `cmn_user_preferences` DISABLE KEYS */;
INSERT INTO `cmn_user_preferences` VALUES (1,'emilywong','LANG_TC',NULL,'manpakhong','manpakhong','2017-02-06 07:38:49','2017-02-06 07:38:52',NULL);
/*!40000 ALTER TABLE `cmn_user_preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knw_blog`
--

DROP TABLE IF EXISTS `knw_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `knw_blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knw_blog`
--

LOCK TABLES `knw_blog` WRITE;
/*!40000 ALTER TABLE `knw_blog` DISABLE KEYS */;
INSERT INTO `knw_blog` VALUES (1,'mph\'s Blog','2015-12-09 15:09:00','2015-12-09 07:09:02',NULL);
/*!40000 ALTER TABLE `knw_blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knw_dlog`
--

DROP TABLE IF EXISTS `knw_dlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `knw_dlog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) unsigned DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` text,
  `content_cm` text,
  `type` varchar(255) DEFAULT NULL,
  `writer` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_knw_dlog_knw_blog_id` (`blog_id`),
  CONSTRAINT `FK_knw_dlog_knw_blog_id` FOREIGN KEY (`blog_id`) REFERENCES `knw_blog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knw_dlog`
--

LOCK TABLES `knw_dlog` WRITE;
/*!40000 ALTER TABLE `knw_dlog` DISABLE KEYS */;
INSERT INTO `knw_dlog` VALUES (1,1,'生果','保加利亞失明女預言家萬加（Baba Vanga）在1996年以85歲高齡逝世，但她一生充滿傳奇，傳在生前曾作出美國911恐怖襲擊、南亞海嘯等預測，最近更盛傳原來她亦曾預言極端組織「伊斯蘭國」（IS）誕生，在IS恐襲陰霾下，她的預言再成全球熱話。','保加利亞失明女預言家萬加（Baba Vanga）在1996年以85歲高齡逝世，但她一生充滿傳奇，傳在生前曾作出美國911恐怖襲擊、南亞海嘯等預測，最近更盛傳原來她亦曾預言極端組織「伊斯蘭國」（IS）誕生，在IS恐襲陰霾下，她的預言再成全球熱話。',NULL,NULL,'2015-09-04 00:41:52','2015-09-03 16:41:53',NULL,NULL,'remarks'),(2,1,'佩萊格裡諾·恩尼蒂 - 時間機器','1925年10月13日，佩萊格裡諾·恩尼蒂出生在羅馬附近，16歲便進入了威尼斯的本篤會修道院。此後他一直為這個修道院服務，直到69歲去世。\r\n　　\r\n　　早在20世紀60年代，年輕的布律納就認識了恩尼蒂神父。神父告訴布律納，他從10年前（也就是20世紀50年代）開始研制“時間機器”，有12名世界頂級科學家給予了他協助。這個神秘的“時間機器”被稱為“永久盔甲”，人們能夠靠它回到過去。根據恩尼蒂的解釋，“時間機器”內裝有電子射線管和一系列的控制裝置，更為神奇的是，它能定位和跟蹤特定人物。恩尼蒂表示，“時間機器”還有對過去發生的事件進行記錄、接收音波和譯碼等功能。\r\n　　\r\n　　利用這個“時間機器”，恩尼蒂多次進行了時空旅行。2009年4月15日，布律納在法國一家報刊上刊登了耶穌被釘死在十字架上的照片，據說這張照片便是恩尼蒂1972年5月2日回到過去時拍下的。這頓時引起了法國上下的廣泛爭論。據布律納聲稱，恩尼蒂還到過公元前169年的羅馬，看了一場拉丁詩篇演出。在法國電視台的采訪節目中，布律納坦言，他曾在恩尼蒂去世前幾個月見過這名神父。恩尼蒂告訴布律納，他和健在的幾名制造“時間機器”的科學家舉行過秘密會談，他們一致同意毀掉這個“永久盔甲”，以免發生時空混亂，釀成大禍。於是，“時間機器”在1994年被拆除。\r\n　　\r\n　　很多人懷疑布律納是在說謊。然而，初步調查顯示恩尼蒂是一名令人尊敬的神父，他在科學領域確實很有天賦，曾窮畢生精力研究時間的奧秘，還寫過一本名為《魔鬼的喜好》的書。1994年4月8日，恩尼蒂神父逝世於意大利威尼斯，這正好是布律納宣稱“時間機器”被拆除的那一年。\r\n　　\r\n　　伊朗科學家發明時光機預測未來\r\n　　\r\n　　伊朗科學家阿裡·拉茲希宣稱自己發明出名為“Aryayek時間旅行機”的時光機器，並已經在伊朗官方機構戰略發明中心注冊專利。 ','1925年10月13日，佩萊格裡諾·恩尼蒂出生在羅馬附近，16歲便進入了威尼斯的本篤會修道院。此後他一直為這個修道院服務，直到69歲去世。\r\n　　\r\n　　早在20世紀60年代，年輕的布律納就認識了恩尼蒂神父。神父告訴布律納，他從10年前（也就是20世紀50年代）開始研制“時間機器”，有12名世界頂級科學家給予了他協助。這個神秘的“時間機器”被稱為“永久盔甲”，人們能夠靠它回到過去。根據恩尼蒂的解釋，“時間機器”內裝有電子射線管和一系列的控制裝置，更為神奇的是，它能定位和跟蹤特定人物。恩尼蒂表示，“時間機器”還有對過去發生的事件進行記錄、接收音波和譯碼等功能。\r\n　　\r\n　　利用這個“時間機器”，恩尼蒂多次進行了時空旅行。2009年4月15日，布律納在法國一家報刊上刊登了耶穌被釘死在十字架上的照片，據說這張照片便是恩尼蒂1972年5月2日回到過去時拍下的。這頓時引起了法國上下的廣泛爭論。據布律納聲稱，恩尼蒂還到過公元前169年的羅馬，看了一場拉丁詩篇演出。在法國電視台的采訪節目中，布律納坦言，他曾在恩尼蒂去世前幾個月見過這名神父。恩尼蒂告訴布律納，他和健在的幾名制造“時間機器”的科學家舉行過秘密會談，他們一致同意毀掉這個“永久盔甲”，以免發生時空混亂，釀成大禍。於是，“時間機器”在1994年被拆除。\r\n　　\r\n　　很多人懷疑布律納是在說謊。然而，初步調查顯示恩尼蒂是一名令人尊敬的神父，他在科學領域確實很有天賦，曾窮畢生精力研究時間的奧秘，還寫過一本名為《魔鬼的喜好》的書。1994年4月8日，恩尼蒂神父逝世於意大利威尼斯，這正好是布律納宣稱“時間機器”被拆除的那一年。\r\n　　\r\n　　伊朗科學家發明時光機預測未來\r\n　　\r\n　　伊朗科學家阿裡·拉茲希宣稱自己發明出名為“Aryayek時間旅行機”的時光機器，並已經在伊朗官方機構戰略發明中心注冊專利。 ',NULL,NULL,'2015-12-16 00:53:13','2015-12-15 16:53:14',NULL,NULL,NULL);
/*!40000 ALTER TABLE `knw_dlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knw_keyword`
--

DROP TABLE IF EXISTS `knw_keyword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `knw_keyword` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knw_keyword`
--

LOCK TABLES `knw_keyword` WRITE;
/*!40000 ALTER TABLE `knw_keyword` DISABLE KEYS */;
/*!40000 ALTER TABLE `knw_keyword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knw_knowledge`
--

DROP TABLE IF EXISTS `knw_knowledge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `knw_knowledge` (
  `sid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seq` bigint(20) DEFAULT NULL,
  `lv` int(11) DEFAULT NULL,
  `knowledge_en` varchar(255) DEFAULT NULL,
  `knowledge_tc` varchar(255) DEFAULT NULL,
  `up_lv_sid` bigint(20) unsigned DEFAULT NULL,
  `is_shown` bit(1) DEFAULT NULL,
  `is_netvigated` bit(1) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knw_knowledge`
--

LOCK TABLES `knw_knowledge` WRITE;
/*!40000 ALTER TABLE `knw_knowledge` DISABLE KEYS */;
INSERT INTO `knw_knowledge` VALUES (1,1,0,'Music','音樂',NULL,'','',NULL,'2013-12-10 02:14:58','2013-12-09 18:14:59',NULL,NULL),(2,2,0,'Philosophy','哲學',NULL,'','',NULL,'2013-12-10 02:16:13','2013-12-09 18:16:14',NULL,NULL),(3,3,0,'Information Technology','資訊科技',NULL,'','',NULL,NULL,'2013-12-09 18:17:08',NULL,NULL),(4,4,1,'Under Music','under music',1,'','',NULL,NULL,'2016-12-29 14:30:34',NULL,NULL);
/*!40000 ALTER TABLE `knw_knowledge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knw_user`
--

DROP TABLE IF EXISTS `knw_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `knw_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knw_user`
--

LOCK TABLES `knw_user` WRITE;
/*!40000 ALTER TABLE `knw_user` DISABLE KEYS */;
INSERT INTO `knw_user` VALUES (1,'manpakhong','4eca18d652154f7519ff7388ec43dca0','Man','Pak Hong, Dave','2015-12-26 01:22:06','2015-12-26 01:22:08','remarks'),(2,'administrator','4eca18d652154f7519ff7388ec43dca0',NULL,NULL,'2016-01-06 23:25:44','2016-01-06 23:25:45',NULL);
/*!40000 ALTER TABLE `knw_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `cmn_category`
--

/*!50001 DROP TABLE IF EXISTS `cmn_category`*/;
/*!50001 DROP VIEW IF EXISTS `cmn_category`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cmn_category` AS select `cmn_menu`.`id` AS `id`,`cmn_menu`.`menu_id` AS `menu_id`,`cmn_menu`.`seq` AS `seq`,`cmn_menu`.`lv` AS `lv`,`cmn_menu`.`lv_menu_en` AS `lv_menu_en`,`cmn_menu`.`lv_menu_tc` AS `lv_menu_tc`,`cmn_menu`.`lv_parent_menu_id` AS `lv_parent_menu_id`,`cmn_menu`.`is_shown` AS `is_shown`,`cmn_menu`.`is_enabled` AS `is_enabled`,`cmn_menu`.`is_category` AS `is_category`,`cmn_menu`.`url` AS `url`,`cmn_menu`.`created_by` AS `created_by`,`cmn_menu`.`updated_by` AS `updated_by`,`cmn_menu`.`created_date` AS `created_date`,`cmn_menu`.`updated_date` AS `updated_date`,`cmn_menu`.`remarks` AS `remarks` from `cmn_menu` where (`cmn_menu`.`is_category` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-28 10:59:33
