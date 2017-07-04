<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('admin/header');
?>
			
<div class="main_main">

	<form action="./index.php?admin-saveConfig/config-adminpw" method="post" id="adminpwConfigForm" >
	<!-- 管理员密码配置  -->
	<div class="listFormBlock">
		
		<ul class="changeTab">
			<li class="tab" id="adminpwConfig" >
				<a href="javascript:void(0);">设定后台管理员密码<span class="infoText"></span></a>
			</li>
		</ul>
		
		<div class="listFormContainer" id="adminpwConfigValue"  style="display:none">
		
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">旧密码</a>
				</li>
				<li class="listFormValue">
					<input type="password" value="" class="inputText" id="adminPassword" name="adminOldPassword" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">新密码</a>
				</li>
				<li class="listFormValue">
					<input type="password" value="" class="inputText" id="adminPassword" name="adminPassword" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">确认密码</a>
				</li>
				<li class="listFormValue">
					<input type="password" value="" class="inputText" id="adminPasswordRe" name="adminPasswordRe" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="提交更改" id="adminpwConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
			
		</div>
	</div>
	<!-- 管理员密码配置结束  -->
	</form>
	
	<form action="./index.php?admin-saveConfig/config-important" method="post" id="importantConfigForm" >
	<!-- 重要配置  -->
	<div class="listFormBlock">
		
		<ul class="changeTab">
			<li class="tab" id="importantConfig" >
				<a href="javascript:void(0);">系统重要配置<span class="infoText"></span></a>
			</li>
		</ul>
		
		<div class="listFormContainer" id="importantConfigValue"  style="display:none">
		
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">时区设置</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['timezone'];?>" class="inputText" id="timezone" name="timezone" />
				</li>
				<li class="listFormInfo">
				当前服务器时间：<?php echo $this->view->date;?>,填入服务器与实际时间的小时差值
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="提交更改" id="importantConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
			
		</div>
	</div>
	<!-- 重要配置结束  -->
	</form>
	
	<form action="./index.php?admin-saveConfig/config-sound" method="post" id="soundConfigForm" >
	<!-- 音乐配置  -->
	<div class="listFormBlock">
		
		<ul class="changeTab">
			<li class="tab" id="soundConfig" >
				<a href="javascript:void(0);">音乐设置<span class="infoText"></span></a>
			</li>
		</ul>
		
		<div class="listFormContainer" id="soundConfigValue"  style="display:none">
		
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">sky白天音乐</a>
				</li>
				<li class="listFormValue">
					<textarea rows="2" cols="70" name="daySound"><?php echo implode( "\n", $this->config['flash']['daySound'] );?></textarea>
				</li>
				<li class="listFormInfo">
				每行一个音乐地址
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">sky夜晚音乐</a>
				</li>
				<li class="listFormValue">
					<textarea rows="2" cols="70" name="nightSound"><?php echo implode( "\n", $this->config['flash']['nightSound'] );?></textarea>
				</li>
				<li class="listFormInfo">
				每行一个音乐地址
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);" class="warning" >注意</a>
				</li>
				<li class="listFormValue">
					请使用您服务器上的音乐(一般情况下其他服务器的音乐文件您的sky无权限访问)
				</li>
				<li class="listFormInfo">
					每行一个音乐地址,sky会随机播放其中的音乐
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="提交更改" id="soundConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
			
		</div>
	</div>
	<!-- 音乐配置结束  -->
	</form>
	
	<form action="./index.php?admin-saveConfig/config-skin" method="post" id="skinConfigForm" >
	<!-- skin配置  -->
	<div class="listFormBlock">
		
		<ul class="changeTab">
			<li class="tab" id="skinConfig" >
				<a href="javascript:void(0);">皮肤设置<span class="infoText"></span></a>
			</li>
		</ul>
		
		<div class="listFormContainer" id="skinConfigValue"  style="display:none">
		
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">皮肤选择</a>
				</li>
				<li class="listFormValue">
					
					<select name="skin">
					<?php foreach ( $this->view->skin as $value ){?>
						<option <?php if( $this->config['flash']['skin'] == $value ){ ?>selected="selected"<?php }?>value="<?php echo $value;?>"><?php echo $value;?></option>
					<?php }?>
					</select>
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">是否显示用户名</a>
				</li>
				<li class="listFormValue">
					<select name="showUserInfo">
					<option <?php if( $this->config['showUserInfo'] == 1 ){?>selected="selected" <?php }?>value="1">是</option>
					<option <?php if( $this->config['showUserInfo'] == 0 ){?>selected="selected" <?php }?>value="0">否</option>
					</select>
				</li>
				<li class="listFormInfo">
					当不希望星星显示发布者个人资料时,请选择“否”,回复及顶星星不受影响
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">使用真实头像</a>
				</li>
				<li class="listFormValue">
					<select name="useRealAvatar">
					<option <?php if( $this->config['useRealAvatar'] == 1 ){?>selected="selected" <?php }?>value="1">是</option>
					<option <?php if( $this->config['useRealAvatar'] == 0 ){?>selected="selected" <?php }?>value="0">否</option>
					</select>
				</li>
				<li class="listFormInfo">
					仅在您的其他应用开启了真实头像时方可启用该设置,否则头像会无法显示
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="提交更改" id="skinConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
			
		</div>
	</div>
	</form>
	
	<form action="./index.php?admin-saveConfig/config-feed" method="post" id="feedConfigForm" >
	<!-- 数据推送配置  -->
	<div class="listFormBlock">
		
		<ul class="changeTab">
			<li class="tab" id="feedConfig" >
				<a href="javascript:void(0);">数据推送<span class="infoText"></span></a>
			</li>
		</ul>
		
		<div class="listFormContainer" id="feedConfigValue"  style="display:none">
		
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">新星星是否推送</a>
				</li>
				<li class="listFormValue">
					<select name="newItemAddFeed">
					<option <?php if( $this->config['newItemAddFeed'] == 1 ){?>selected="selected" <?php }?>value="1">是</option>
					<option <?php if( $this->config['newItemAddFeed'] == 0 ){?>selected="selected" <?php }?>value="0">否</option>
					</select>
				</li>
				<li class="listFormInfo">
				即新发布星星时,是否推送到其他系统,显示更新信息
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">新星星推送标题</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['feedNewItemTitle'];?>" class="inputText" name="feedNewItemTitle" />
				</li>
				<li class="listFormInfo">
				{fromuser}代表发星星的用户
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">顶星星是否推送</a>
				</li>
				<li class="listFormValue">
					<select name="diggItemAddFeed">
					<option <?php if( $this->config['diggItemAddFeed'] == 1 ){?>selected="selected" <?php }?>value="1">是</option>
					<option <?php if( $this->config['diggItemAddFeed'] == 0 ){?>selected="selected" <?php }?>value="0">否</option>
					</select>
				</li>
				<li class="listFormInfo">
				即星星被顶时,是否通知用户及产生更新信息
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">顶星星推送标题</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['feedDiggItemTitle'];?>" class="inputText" name="feedDiggItemTitle" />
				</li>
				<li class="listFormInfo">
				{fromuser}代表顶星星的用户，{touser}代表星星所有者
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">回复星星是否推送</a>
				</li>
				<li class="listFormValue">
					<select name="replyItemAddFeed">
					<option <?php if( $this->config['replyItemAddFeed'] == 1 ){?>selected="selected" <?php }?>value="1">是</option>
					<option <?php if( $this->config['replyItemAddFeed'] == 0 ){?>selected="selected" <?php }?>value="0">否</option>
					</select>
				</li>
				<li class="listFormInfo">
				即星星被回复时,是否通知用户及产生更新信息
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">回复星星推送标题</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['feedReplyItemTitle'];?>" class="inputText" name="feedReplyItemTitle" />
				</li>
				<li class="listFormInfo">
				{fromuser}代表回复星星的用户，{touser}代表星星所有者
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="提交更改" id="feedConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
		</div>
	</div>
	<!-- 数据推送结束 -->
	</form>
	
	<form action="./index.php?admin-saveConfig/config-common" method="post" id="commonConfigForm" >
	<!-- 综合配置  -->
	<div class="listFormBlock">
		
		<ul class="changeTab">
			<li class="tab" id="commonConfig" >
				<a href="javascript:void(0);">综合配置<span class="infoText"></span></a>
			</li>
		</ul>
		
		<div class="listFormContainer" id="commonConfigValue"  style="display:none">
		
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">左侧操作面板显示</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['flash']['leftPanelStatus'];?>" class="inputText" name="leftPanelStatus" />
				</li>
				<li class="listFormInfo">
				设置为“0”代表不显示,“1”代表一直显示,大于“1”的数字表示只显示多少秒就消失。
				</li>
			</ul>
		
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">浏览器标题</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['browserTitle'];?>" class="inputText" name="browserTitle" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">每次显示的星星颗数</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['item']['maxItems'];?>" class="inputText" name="maxItems" />
				</li>
				<li class="listFormInfo">
					即显示在sky上的星星个数,建议不要超过100颗,否则用户可能会觉得卡
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">自动填充星星</a>
				</li>
				<li class="listFormValue">
					<select name="autoFillItem">
					<option <?php if( $this->config['flash']['autoFillItem'] == 0 ){?>selected="selected" <?php }?>value="0">关闭</option>
					<option <?php if( $this->config['flash']['autoFillItem'] == 1 ){?>selected="selected" <?php }?>value="1">开启</option>
					</select>
				</li>
				<li class="listFormInfo">
				刚架设sky时,sky会显得很空,您可以设置此值,让sky自行填充星星。
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">默认星星内容</a>
				</li>
				<li class="listFormValue">
					<textarea rows="2" cols="30" name="defaultContent"><?php echo $this->config['flash']['defaultContent'];?></textarea>
				</li>
				<li class="listFormInfo">
				当开启自动填充星星选项时,自动填充的星星内容显示此设置的值
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">顶部广播显示的条数</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['broadcastNum'];?>" class="inputText" name="broadcastNum" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">广播循环次数</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['flash']['skyBroadcastLoop'];?>" class="inputText" name="skyBroadcastLoop" />
				</li>
				<li class="listFormInfo">
					顶部广播有数据时,将根据此值循环,循环结束后广播将消失
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">每条广播显示的时间(秒)</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['flash']['skyBroadcastTimer'];?>" class="inputText" name="skyBroadcastTimer" />
				</li>
				<li class="listFormInfo">
					即单条广播信息停留显示的时间
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">星星每次被顶的次数上限</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['flash']['maxDiggPertime'];?>" class="inputText" name="maxDiggPertime" />
				</li>
				<li class="listFormInfo">
				建议不要超过1次,否则开启顶星星推送时,会产生重复的推送信息
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">是否显示排错信息</a>
				</li>
				<li class="listFormValue">
					<select name="debugMode">
					<option <?php if( $this->config['debugMode'] == 0 ){?>selected="selected" <?php }?>value="0">关闭</option>
					<option <?php if( $this->config['debugMode'] == 1 ){?>selected="selected" <?php }?>value="1">开启</option>
					</select>
				</li>
				<li class="listFormInfo">
					当天空发生异常时,请打开排错,然后复制信息提交到<a href="http://www.flexsns.com" class="highLightA" target="_blank">flexsns</a>寻求帮助
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="提交更改" id="commonConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
		</div>
	</div>
	<!-- 综合配置 结束 -->
	</form>
	
	<form action="./index.php?admin-saveConfig/config-link" method="post" id="linkConfigForm" >
	<!-- 链接配置 -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" id="linkConfig" >
				<a href="javascript:void(0);">链接配置<span class="infoText"></span></a>
			</li>
		</ul>
		<div class="listFormContainer" id="linkConfigValue"  style="display:none">
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">sky-URL地址</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['flash']['skyUrl'];?>" class="inputText" name="skyUrl" />
				</li>
				<li class="listFormInfo">
				关键。末尾不要加'/'。
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">用户空间地址</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['flash']['spaceUrl'];?>" class="inputText" name="spaceUrl" />
				</li>
				<li class="listFormInfo">
				关键。如填入“space.php?uid=“,末尾uid留空即可,程序会补齐
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">新用户注册地址</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['flash']['regUrl'];?>" class="inputText" name="regUrl" />
				</li>
				<li class="listFormInfo">
				用户点击sky左侧面板的“注册”按钮,将跳转到此处设定的url。
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">网站地址</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['flash']['websiteUrl'];?>" class="inputText" name="websiteUrl" />
				</li>
				<li class="listFormInfo">
				方便用户返回网站首页
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="提交更改" id="linkConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
		</div>
	</div>
	<!-- 链接配置 结束 -->
	</form>
			
	<form action="./index.php?admin-saveConfig/config-db" method="post" id="dbConfigForm" >
	<!-- 数据库配置 -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" id="dbConfig" >
				<a href="javascript:void(0);">数据库配置<span class="infoText"></span></a>
			</li>
		</ul>
		<div class="listFormContainer" id="dbConfigValue"  style="display:none">
		
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">数据库主机</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['db']['host'];?>" class="inputText" name="dbHost" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">用户名</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['db']['user'];?>" class="inputText" name="dbUser" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">密码</a>
				</li>
				<li class="listFormValue">
					<input type="password" value="" class="inputText" name="dbPassword" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">数据库名</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['db']['dbName'];?>" class="inputText" name="dbName" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">表名前缀</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['db']['tablePrefix'];?>" class="inputText" name="dbTablePrefix" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="提交更改" id="dbConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
		</div>
	</div>
	<!-- 数据库配置 结束 -->
	</form>
	
	<form action="./index.php?admin-saveConfig/config-cookieSession" method="post" id="cookieSessionConfigForm" >
	<!-- cookie-session配置 -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" id="cookieSessionConfig" >
				<a href="javascript:void(0);">cookie-session相关配置<span class="infoText"></span></a>
			</li>
		</ul>
		<div class="listFormContainer" id="cookieSessionConfigValue"  style="display:none">
		
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">用户信息cookie名</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['userCookieName'];?>" class="inputText" name="userCookieName" />
				</li>
				<li class="listFormInfo">
					您可以使用默认,此处提供设置是为了避免与其他系统的cookie冲突
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">cookie作用域</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['cookieDomain'];?>" class="inputText" name="cookieDomain" />
				</li>
				<li class="listFormInfo">
					一般情况下留空即可
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">cookie作用路径</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['cookiePath'];?>" class="inputText" name="cookiePath" />
				</li>
				<li class="listFormInfo">
					一般情况下输入'/',则cookie对整个站点有效
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">session名</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['userSessionName'];?>" class="inputText" name="userSessionName" />
				</li>
				<li class="listFormInfo">
					您可以使用默认,此处提供设置是为了避免与其他系统的session冲突
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">数据加密密钥</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['authKey'];?>" class="inputText" name="authKey" />
				</li>
				<li class="listFormInfo">
					存储于cookie和session中的数据经过加密处理,须根据此值才能解密
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="提交更改" id="cookieSessionConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
		</div>
	</div>
	<!-- cookie-session配置 结束  -->
	</form>
	
	<form action="./index.php?admin-saveConfig/config-skyPost" method="post" id="skyPostConfigForm" >
	<!-- sky数据发送相关配置  -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" id="skyPostConfig" >
				<a href="javascript:void(0);">sky数据发送相关配置<span class="infoText"></span></a>
			</li>
		</ul>
		<div class="listFormContainer" id="skyPostConfigValue"  style="display:none">
		
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">两次发送星星的间隔时间(秒)</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['item']['postTimeLimit'];?>" class="inputText" name="itemPostTimeLimit" />
				</li>
				<li class="listFormInfo">
					防止恶意发送数据
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">星星内容最多可输入的字数</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['item']['maxLength'];?>" class="inputText" name="itemMaxLength" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">星星内容最少可输入的字数</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['item']['minLength'];?>" class="inputText" name="itemMinLength" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">两次回复的时间间隔(秒)</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['reply']['postTimeLimit'];?>" class="inputText" name="replyPostTimeLimit" />
				</li>
				<li class="listFormInfo">
					防止恶意回复
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">回复内容最多可输入的字数</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['reply']['maxLength'];?>" class="inputText" name="replyMaxLength" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">回复内容最少可输入的字数</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['reply']['minLength'];?>" class="inputText" name="replyMinLength" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="提交更改" id="skyPostConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
		</div>
	</div>
	<!-- sky数据发送相关配置 结束 -->
	</form>
</div>
<script type="text/javascript" src="./view/javascripts/pagebind/admin.config.js"></script>
<?php
$this->template('admin/footer');
?>