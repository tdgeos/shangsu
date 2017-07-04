<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

/**
 * @purpose 天空数据操作控制器
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice
 * 
 * @createDate 2009.4.25
 * @modified 2009.4.25
 * 
 */

class Controller_SkyCp_Class extends Common_Global_Class 
{
	function Controller_SkyCp_Class()
	{
		parent::Common_Global_Class();
		
		$className = $this->loadClass( 'Model_SkyItem' );
		$_ENV['skyItemModel'] = new $className( $this->db(), $this->config['db']['tablePrefix'] );
		
		$className = $this->loadClass( 'Model_Reply' );
		$_ENV['replyModel'] = new $className( $this->db(), $this->config['db']['tablePrefix'] );
		
		$className = $this->loadClass( 'Model_Broadcast' );
		$_ENV['broadcastModel'] = new $className( $this->db(), $this->config['db']['tablePrefix'] );
		
	}
	
	function indexAction(){}
	
	//删除一条天空数据
	function deleteItemAction()
	{
		$userinfo = $this->checkLogin();
		
		if( empty( $userinfo ) )
		$this->dataReturn( '您没有登录，无法删除天空内容', 'failed' );
		
		$itemId = intval( $this->get['itemId'] );
		
		if( $itemId <= 0 )
		$this->dataReturn( '参数不足,无法执行该操作', 'failed' );
		
		if( !$item = $_ENV['skyItemModel']->getone( $itemId ) )
		$this->dataReturn( '删除失败,数据可能已经被管理员删除', 'failed' );
		
		if( $item['uid'] != $userinfo['uid'] )
		$this->dataReturn( 'Access Denied.', 'failed' );
		
		if( $_ENV['skyItemModel']->delete( $itemId ) == 0 )
		{
			$this->dataReturn( '删除失败，数据可能已经被管理员删除', 'failed' );
		}
		else
		{
			$_ENV['replyModel']->delReply( $itemId );
		}
		
		$this->dataReturn( '操作成功' );
		
	}
	
	//顶一下
	function diggItemAction()
	{
		
		$userinfo = $this->checkLogin();
		
		if( empty( $userinfo ) )
		$this->dataReturn( '您没有登录，不能执行该操作', 'failed' );
		
		$itemId = intval( $this->get['itemId'] );
		if( $itemId <= 0 )
		$this->dataReturn( '参数不足,无法执行该操作', 'failed' );
		
		if( !$item = $_ENV['skyItemModel']->getone( $itemId ) )
		$this->dataReturn( '操作失败，数据可能已经被管理员删除', 'failed' );
		
		if( $_ENV['skyItemModel']->updateDiggNum( $itemId ) == 0 )
		$this->dataReturn( '操作失败，数据可能已经被管理员删除', 'failed' );
		
		if( $this->config['diggItemAddFeed'] == 1 )
		{
			$diggArray = $this->cookie( 'flexsns-sky-digg' );
			
			if( is_array( $diggArray ) && !empty( $diggArray ) )
			{
				$diggNums = array_count_values( $diggArray );
				if( $diggNums[$itemId] >= $this->config['flash']['maxDiggPertime']  )
				$this->dataReturn( '一条数据只能被顶'.$this->config['flash']['maxDiggPertime'].'次', 'failed' );
			}
				
			$diggArray[] = $itemId;
			$this->cookie( 'flexsns-sky-digg', $diggArray, 86400*24 );
			
			$subjectLink = $this->config['flash']['skyUrl'].'/?index-index/itemId-'.$itemId;
			
			$spaceUrl = $this->config['flash']['spaceUrl'];
			
			if( $this->config['showUserInfo'] == 1 )
			{
				$subjectSearchArray = array( '{fromuser}', '{touser}' );
				$subjectReplaceArray[] = '<a href="'.$spaceUrl.$userinfo['uid'].'" target="_blank">'.$userinfo['username'].'</a>&nbsp;';
				$subjectReplaceArray[] = '<a href="space.php?uid='.$spaceUrl.$item['uid'].'" target="_blank">'.$item['account'].'</a>&nbsp;';
				
				$subject = str_replace( $subjectSearchArray, $subjectReplaceArray, $this->config['feedDiggItemTitle'] );
				
				$_ENV['multipleObj']->addFeed( $userinfo['uid'], $userinfo['username'], $subjectLink, $subject, $subjectLink, $item['content'] );
				
				unset( $subject, $subjectSearchArray, $subjectReplaceArray );
			}
			
			
			$subjectSearchArray = array( '{fromuser}', '{touser}' );
			$subjectReplaceArray[] = '<a href="'.$spaceUrl.$userinfo['uid'].'" target="_blank">'.$userinfo['username'].'</a>&nbsp;';
			$subjectReplaceArray[] = '你的';
			$subject = str_replace( $subjectSearchArray, $subjectReplaceArray, $this->config['feedDiggItemTitle'] );
			
			$subject .= '&nbsp;(<a href="'.$subjectLink.'" target="_blank" >查看</a>)';
			
			$_ENV['multipleObj']->addNote( $item['uid'], $item['account'], $subject );
		}
		
		
		$this->dataReturn( '操作成功' );
		
	}
	
	//回复
	function replyAction()
	{
		
		$userinfo = $this->checkLogin();
		
		if( empty( $userinfo ) )
		$this->dataReturn( '您没有登录，不能执行该操作', 'failed' );
		
	
		$lastReplyTime = $this->session( 'replyItemTime' );
		$lastReplyTime =  $lastReplyTime[0];
		
		if( $lastReplyTime + $this->config['reply']['postTimeLimit'] > $this->config['nowtime'] )
		{
			$this->dataReturn( '两次回复的时间间隔不能短于30秒', 'failed' );
		}
	
		$itemId = intval( $this->post['itemId'] );
		$content = $this->post['content'];
		
		if( $itemId <= 0 )
		$this->dataReturn( '参数不足,无法执行该操作', 'failed' );
		
		if( !$item = $_ENV['skyItemModel']->getone( $itemId ) )
		$this->dataReturn( '回复失败,数据可能已经被管理员删除', 'failed' );
		
		if( !$this->checkLength( $content, $this->config['reply']['minLength'], $this->config['reply']['maxLength'] ) )
		$this->dataReturn( '回复内容字数应该在'.$this->config['reply']['minLength'].'-'.$this->config['reply']['maxLength'].'个字符之间', 'failed' );
		
		if( !$replyId = $_ENV['replyModel']->newReply( $itemId, $userinfo['uid'], $userinfo['username'], $content, $this->config['nowtime']  ) )
		{
			$this->dataReturn( '未知的错误', 'failed' );
		}
		elseif( $this->config['replyItemAddFeed'] == 1 )
		{
			$subjectLink =$this->config['flash']['skyUrl'].'/?index-index/itemId-'.$itemId.'/replyId-'.$replyId;
			
			$spaceUrl = $this->config['flash']['spaceUrl'];
			
			if( $this->config['showUserInfo'] == 1 )
			{
				$subjectSearchArray = array( '{fromuser}', '{touser}' );
				$subjectReplaceArray[] = '<a href="'.$spaceUrl.$userinfo['uid'].'" target="_blank">'.$userinfo['username'].'</a>&nbsp;';
				$subjectReplaceArray[] = '<a href="space.php?uid='.$spaceUrl.$item['uid'].'" target="_blank">'.$item['account'].'</a>&nbsp;';
				
				$subject = str_replace( $subjectSearchArray, $subjectReplaceArray, $this->config['feedReplyItemTitle'] );
				
				$_ENV['multipleObj']->addFeed( $userinfo['uid'], $userinfo['username'], $subjectLink, $subject, $subjectLink, $item['content'] );
				
				unset( $subject, $subjectSearchArray, $subjectReplaceArray );
			}
			
			$subjectSearchArray = array( '{fromuser}', '{touser}' );
			$subjectReplaceArray[] = '<a href="'.$spaceUrl.$userinfo['uid'].'" target="_blank">'.$userinfo['username'].'</a>&nbsp;';
			$subjectReplaceArray[] = '你的';
			$subject = str_replace( $subjectSearchArray, $subjectReplaceArray, $this->config['feedReplyItemTitle'] );
			
			$subject .= '&nbsp;(<a href="'.$subjectLink.'" target="_blank" >查看</a>)';
			
			$_ENV['multipleObj']->addNote( $item['uid'], $item['account'], $subject );
		}
		
		$_ENV['skyItemModel']->updateReplyNum( $itemId );
		$this->session( 'replyItemTime', array( $this->config['nowtime'] ) );
		$this->dataReturn( '回复成功' );
		
	}
	
	//获取回复内容
	function getReplyAction()
	{
		$this->get['perpage'] = intval( $this->get['perpage'] );
		$this->get['itemId'] = intval( $this->get['itemId'] );
		
		$this->get['perpage'] = $this->get['perpage'] == 0 ? $this->get['perpage'] = 30 : $this->get['perpage'] ;
		
		$this->get['perpage'] = min( 100, $this->get['perpage'] );
		$this->get['perpage'] = max( 1, $this->get['perpage'] );
		
		$itemId = $this->get['itemId'];
		
		if( $itemId <= 0 )
		$this->dataReturn( '参数不足,无法执行该操作', 'failed' );
		
		$replysNums = $_ENV['replyModel']->replysNums( $itemId );
		
		list( $sqlStart, $perpage, $totalPage ) = $this->pages( './index.php?skycp-getReply/itemId-'.$itemId.'-', $replysNums, $this->get['perpage'] );
		
		$replys =  $_ENV['replyModel']->replys( $itemId, $sqlStart, $perpage );
		
		$this->xmlHeader();
		
		if( !empty( $replys ) )
		{
			echo '<replys pageNums="'.$totalPage.'" replysNums="'.$replysNums.'">'."\n";
			
			$xml = '';
			
			foreach ( $replys as $value )
			{
				$xml .='<reply
				author="'.$value['account'].'" 
				authorUid="'.$value['uid'].'" 
				authorHead="'.$_ENV['multipleObj']->useravatar( $value['uid'], true, 'big' ).'" 
				dateline="'.$this->dateFormat( $value['dateline'], 'date' ).'" >'.$value['content'].'</reply>'."\n";
			}
			
			echo $xml;
			
			echo '</replys>';
			
		}
		else
		{
			echo '<replys pageNums="0" replysNums="0">'."\n";
			
			echo '</replys>';
		}
	}
	
	//获取天空内容
	function itemsAction()
	{
		$this->get['perpage'] = intval( $this->get['perpage'] );
		$this->get['itemId'] = intval( $this->get['itemId'] );
		
		$this->get['perpage'] = $this->get['perpage'] == 0 ? $this->get['perpage'] = $this->config['item']['maxItems'] : $this->get['perpage'] ;
		
		$this->get['perpage'] = min( $this->config['item']['maxItems'], $this->get['perpage'] );
		$this->get['perpage'] = max( 1, $this->get['perpage'] );
		
		$itemId = $this->get['itemId'];
		
		$this->get['perpage'] = $itemId > 0 ? $this->get['perpage'] - 1 : $this->get['perpage'];
		
		$itemNums = $_ENV['skyItemModel']->itemsNums( $itemId );
		
		list( $sqlStart, $perpage, $totalPage ) = $this->pages( './index.php?skycp-items/', $itemNums, $this->get['perpage'] );
		
		$items =  $_ENV['skyItemModel']->items( $sqlStart, $perpage, $itemId );
		
		if( empty( $items ) )
		$items = array();
		
		if( $itemId > 0)
		{
			$focusItem = $_ENV['skyItemModel']->getone( $itemId );
			if( !empty( $focusItem ) )
			{
				$items[] = $focusItem;
			}
			else
			{
				$items[] = array( 'account'=>'system', 'uid'=>0, 'itemid'=>0, 'dateline'=>$this->config['nowtime'], 'digg'=>0, 'reply'=>0, 'content'=>'抱歉,出错了,数据不存在' );
			}
		}
		
		$hotItems =  $_ENV['skyItemModel']->items( 0, 5, 0, ' digg DESC ' );
		$this->_items( $items, $totalPage, $itemNums, $hotItems );
	}

	//获取某用户天空内容
	function userItemsAction()
	{
		$userinfo = $this->checkLogin();
		
		if( $this->config['showUserInfo'] == 0 && $userinfo['uid'] != $this->get['uid'] )
		{
			$this->message( '读取数据失败', '当前设置不允许查询用户数据', 'failed' );
		}
		
		$this->get['perpage'] = intval( $this->get['perpage'] );
		$this->get['itemId'] = intval( $this->get['itemId'] );
		$this->get['uid'] = intval( $this->get['uid'] );
		
		$this->get['perpage'] = $this->get['perpage'] == 0 ? $this->get['perpage'] = $this->config['item']['maxItems'] : $this->get['perpage'] ;
		
		$this->get['perpage'] = min( $this->config['item']['maxItems'], $this->get['perpage'] );
		$this->get['perpage'] = max( 1, $this->get['perpage'] );
		
		$itemId = $this->get['itemId'];
		$uid = $this->get['uid'];
		
		$this->get['perpage'] = $itemId > 0 ? $this->get['perpage'] - 1 : $this->get['perpage'];
		
		$itemNums = $_ENV['skyItemModel']->userItemsNums( $uid );
		
		list( $sqlStart, $perpage, $totalPage ) = $this->pages( './index.php?skycp-items/', $itemNums, $this->get['perpage'] );
		
		$items =  $_ENV['skyItemModel']->userItems( $uid, $sqlStart, $perpage );
		
		if( empty( $items ) )
		$items = array();
		
		if( $itemId > 0)
		{
			$focusItem = $_ENV['skyItemModel']->getone( $itemId );
			if( !empty( $focusItem ) )
			{
				$items[] = $focusItem;
			}
			else
			{
				$items[] = array( 'account'=>'system', 'uid'=>0, 'itemid'=>0, 'dateline'=>$this->config['nowtime'], 'digg'=>0, 'reply'=>0, 'content'=>'抱歉,出错了,数据不存在' );
			}
		}
		
		$this->_items( $items, $totalPage, $itemNums );
	}
	
	//输出天空数据xml
	function _items( $items, $totalPage, $itemNums, $hotItems = array() )
	{
	
		$this->xmlHeader();
		
		if( !empty( $items ) )
		{
			echo '<items pageNums="'.$totalPage.'" itemsNums="'.$itemNums.'" nowDate="'.$this->dateFormat( $this->config['nowtime'] ).'" >'."\n";
			
			$xml = '';
			
			if( $this->config['showUserInfo'] == 1 )
			{
				foreach ( $items as $value )
				{
					$value['content'] = str_replace( '+', '[@plus@]', $value['content'] );
					$value['account'] = urlencode( $this->d2s( $value['account'] ) );
					$value['content'] = urlencode( $value['content'] );
					$value['content'] = str_replace( '+', '%20', $value['content'] );
					$value['content'] = str_replace( '%5B%40plus%40%5D', '+', $value['content'] );
					
					$xml .='<item
					author="'.$value['account'].'" 
					authorUid="'.$value['uid'].'" 
					clickto="itemId-'.$value['itemid'].'" 
					authorHead="'.$_ENV['multipleObj']->useravatar( $value['uid'], true, 'small' ).'" 
					itemId="'.$value['itemid'].'" 
					dateline="'.$this->dateFormat( $value['dateline'], 'date' ).'" 
					digg="'.$value['digg'].'" 
					reply="'.$value['reply'].'" 
					copy="复制地址" 
					view="查看" 
					deleted="删除" 
					>'.$value['content'].'</item>'."\n";
				}
				
				if( !empty( $hotItems ) )
				{
					foreach ( $hotItems as $value )
					{
						$value['content'] = str_replace( '+', '[@plus@]', $value['content'] );
						$value['account'] = urlencode( $this->d2s( $value['account'] ) );
						$value['content'] = urlencode( $value['content'] );
						$value['content'] = str_replace( '+', '%20', $value['content'] );
						$value['content'] = str_replace( '%5B%40plus%40%5D', '+', $value['content'] );
						
						$xml .='<hotitem
						author="'.$value['account'].'" 
						authorUid="'.$value['uid'].'" 
						clickto="itemId-'.$value['itemid'].'" 
						authorHead="'.$_ENV['multipleObj']->useravatar( $value['uid'], true, 'small' ).'" 
						itemId="'.$value['itemid'].'" 
						dateline="'.$this->dateFormat( $value['dateline'], 'date' ).'" 
						digg="'.$value['digg'].'" 
						reply="'.$value['reply'].'" 
						copy="复制地址" 
						view="查看" 
						deleted="删除" 
						>'.$value['content'].'</hotitem>'."\n";
					}
				}
				
			}
			else
			{
				foreach ( $items as $value )
				{
					$value['content'] = str_replace( '+', '[@plus@]', $value['content'] );
					$value['account'] = urlencode( $this->d2s( $value['account'] ) );
					$value['content'] = urlencode( $value['content'] );
					$value['content'] = str_replace( '+', '%20', $value['content'] );
					$value['content'] = str_replace( '%5B%40plus%40%5D', '+', $value['content'] );
					
					$xml .='<item
					author="匿名" 
					authorUid="0" 
					clickto="itemId-'.$value['itemid'].'" 
					authorHead="./sky/anonymous.gif" 
					itemId="'.$value['itemid'].'" 
					dateline="'.$this->dateFormat( $value['dateline'], 'date' ).'" 
					digg="'.$value['digg'].'" 
					reply="'.$value['reply'].'" 
					copy="复制地址" 
					view="查看" 
					deleted="删除" 
					>'.$value['content'].'</item>'."\n";
				}
				
				if( !empty( $hotItems ) )
				{
					foreach ( $hotItems as $value )
					{
						$value['content'] = str_replace( '+', '[@plus@]', $value['content'] );
						$value['account'] = urlencode( $this->d2s( $value['account'] ) );
						$value['content'] = urlencode( $value['content'] );
						$value['content'] = str_replace( '+', '%20', $value['content'] );
						$value['content'] = str_replace( '%5B%40plus%40%5D', '+', $value['content'] );
						
						$xml .='<hotitem
						author="匿名" 
						authorUid="0" 
						clickto="itemId-'.$value['itemid'].'" 
						authorHead="./sky/anonymous.gif" 
						itemId="'.$value['itemid'].'" 
						dateline="'.$this->dateFormat( $value['dateline'], 'date' ).'" 
						digg="'.$value['digg'].'" 
						reply="'.$value['reply'].'" 
						copy="复制地址" 
						view="查看" 
						deleted="删除" 
						>'.$value['content'].'</hotitem>'."\n";
					}
					
				}
			}
			
			echo $xml;
			
			echo '</items>';
			
		}
		else
		{
			echo '<items pageNums="0" itemsNums="0" nowDate="'.$this->dateFormat( $this->config['nowtime'] ).'">'."\n";
			
			echo '</items>';
		}
	}
	
	//新建一个天空内容
	function newItemAction()
	{
		$lastPostTime = $this->session( 'postItemTime' );
		$lastPostTime =  $lastPostTime[0];
		
		if(  $lastPostTime + $this->config['item']['postTimeLimit'] > $this->config['nowtime'] )
		{
			$this->dataReturn( '两次发送内容的时间间隔不能短于30秒', 'failed' );
		}
		
		$userinfo = $this->checkLogin();
		
		if( empty( $userinfo ) )
		$this->dataReturn( '您没有登录，无法发送相关内容', 'failed' );
		
	
		$content =  $this->post['content'];
		
		if( !$this->checkLength( $content, $this->config['item']['minLength'], $this->config['item']['maxLength'] ) )
		$this->dataReturn( '内容字数应该在'.$this->config['item']['minLength'].'-'.$this->config['item']['maxLength'].'个字符之间', 'failed' );
		
		$itemId = $_ENV['skyItemModel']->newItem( $content, $userinfo['uid'], $userinfo['username'], $this->config['nowtime'] );
		
		if( $itemId > 0 )
		{
			if( $this->config['newItemAddFeed'] == 1 && $this->config['showUserInfo'] == 1 )
			{
				$subjectLink =$this->config['flash']['skyUrl'].'/?index-index/itemId-'.$itemId;
				
				$spaceUrl = $this->config['flash']['spaceUrl'];
				
				$subjectSearchArray = array( '{fromuser}', '{touser}' );
				$subjectReplaceArray[] = '<a href="'.$spaceUrl.$userinfo['uid'].'" target="_blank">'.$userinfo['username'].'</a>&nbsp;';
				$subjectReplaceArray[] = '';
				
				$subject = str_replace( $subjectSearchArray, $subjectReplaceArray, $this->config['feedNewItemTitle'] );
				
				$_ENV['multipleObj']->addFeed( $userinfo['uid'], $userinfo['username'], $subjectLink, $subject, $subjectLink, $content );
				
			}
			
			$this->session( 'postItemTime', array( $this->config['nowtime'] ) );
			$this->dataReturn( $itemId );
		}
		else
		{
			$this->dataReturn( '系统出错,无法存储您的数据,请稍候再试', 'failed' );
		}
	}
	
	function broadcastAction()
	{
		$broadcasts = $_ENV['broadcastModel']->broadcasts( 0, $this->config['broadcastNum'] );
		$this->xmlHeader();
		
		$xml ='<broadcasts>';
		if( is_array( $broadcasts ) && !empty( $broadcasts ) )
		{
			foreach ( $broadcasts as $value )
			{
				$xml .="<broadcast gourl=\"".urlencode( $value['gourl'] )."\">{$value['content']}</broadcast>";
			}
			
		}
		$xml .='</broadcasts>';
		
		echo $xml;
	}
	
	
}

?>