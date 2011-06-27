<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Real Estate - Hoa Phuong</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/blog_phi_template.css" />
	<link rel="stylesheet" type="text/css" href="../css/template1.css" />
	<link rel="stylesheet" type="text/css" href="../css/SpryTabbedPanels.css" />
	<script type="text/javascript" src="../js/utilities.js"></script>
	<script type="text/javascript" src="../js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.8.9.custom.min.js"></script>
</head>
<body>
	<div id="container">
<!-- Top : Menu -->
<!-- InstanceBeginEditable name="top" -->

<div id="top">
  <div class="menu"> 
  	<a href="index.php">Trang chủ </a> 
    | 
    <a href="blog.php?uid=1 ">
       Trang cá nhân</a> 
        | 
    <a href="blog.php?view=friends">Bạn bè</a>    | 
    <a href="blog.php?view=albums">Album ảnh</a>    | 
    <a href="blog.php?view=blog">Viết Blog</a>
        </div>
  <div class="AccInfo">
  	    <div class="editAcc">| <a href="index.php?do=change_password">Đổi mật khẩu</a>
    	| 
   	 	<a href="index.php?do=logout">Thoát</a> </div>
   	 <div class="name">Chào <a href="blog.php?uid=1"> 
     		administrator </a></div>
	  </div>
</div>
<!-- InstanceEndEditable -->
<!-- End Top : Menu --> 
   
<div id="Mid">
	<div id="menuwrapper">
 			<script language="javascript">
	$(document).ready(function ()
	{	
		$("#textSearch").keyup(function ()
		{
			var str = document.getElementById("textSearch").value;
			if ( str.length &gt; 0)
			{
				var serverURL = "modules/blog_modules/forms/livesearch.php";
				serverURL = serverURL +"?name="+ encodeURI(str);	
				serverURL = serverURL +"&amp;sid="+Math.random();
				$("#livesearch").load(serverURL);
			}
		});
		
		$("#textSearch").focus(function ()
		{
			var str = document.getElementById("textSearch").value;
			if ( str.length &gt; 0)
			{
				var serverURL = "modules/blog_modules/forms/livesearch.php";
				serverURL = serverURL +"?name="+ encodeURI(str);	
				serverURL = serverURL +"&amp;sid="+Math.random();
				$("#livesearch").load(serverURL);
			}
		});
		
		/*$("#textSearch").blur(function ()
		{
			document.getElementById('livesearch').innerHTML = "";
		});*/
	});

</script>

<div id="jquery-live-search-example">
<form id="frmSearch" method="get" action="">
<div class="search">
	<input type="text" autocomplete="off" onfocus="this.value=='Tìm kiếm'?this.value='':''" value="Tìm kiếm" class="input" id="textSearch" name="textSearch">
    <input type="submit" value=" " class="icon_search">
    <div style="border-top:1px solid #666666" id="livesearch"></div>
</div>
</form>
</div>    </div>
 	<!-- InstanceBeginEditable name="EditRegion8" -->
    <div class="Content">
      <div class="accName">
        <div class="flAcc"><strong>
        
administrator        </strong></div>
                	<div class="frAcc">Truy cập lần cuối: <span class="datetime">
        	1 giờ trước            </span></div>
		        <br class="clr">
      </div>
    </div>
 	<!-- InstanceEndEditable -->
 	<div class="mainContent">
   		<div class="cMain">
        	<!-- Left -->
        	<!-- InstanceBeginEditable name="Left" -->
            <div class="ColLefts">
        	<!-- Left -->

<script language="javascript">

	$(document).ready(function ()
	{
		$("#editAvatar").click (function ()
		{
			$("#menuEditAvatar").css("display","block");
		});
		
		$("#exitEditAvatar").click (function ()
		{
			$("#menuEditAvatar").css("display","none");
		});
		
		$("#uploadAvatar").click (function ()
		{
			var url = "modules/blog_modules/forms/upload_avatar.php";
			$("#menuEditAvatar").css("display","none");
			$.post(url,{}, function(data){$("#dialogLink").html(data);},"html");
	
		});	
		
		$("#chooseAvatar").click (function ()
		{
			var url = "modules/blog_modules/forms/choose_avatar.php";
			$("#menuEditAvatar").css("display","none");
			$.post(url,{}, function(data){$("#dialogLink").html(data);},"html");
		});		
	});
</script>
<div class="leftCol">
	<div class="bAvatar marginMain"> 	
		<img width="180" border="0" title="" alt="" src="../images/7586065.jpg">
         			<div class="icon_edit">
			<a id="editAvatar" href="#">
            <img width="12" height="12" border="0" alt="Edit" src="../images/zme_iconedit.gif">Đổi</a>						
   		     <div style="display:none" id="menuEditAvatar" class="menu_edit_avatar">
            	<div class="menu_content">
               <a title="Tải ảnh lên" id="uploadAvatar" href="#">Tải ảnh lên</a>
               <a title="Chọn ảnh từ album" id="chooseAvatar" href="#">
               Chọn ảnh từ album</a>
               <a id="exitEditAvatar" href="#">Đóng</a>
                </div>
            </div>
            </div>
            <br class="clr">
        
    	        
	</div>
    
        
	<div class="tubach">
    	<div class="titleMain bgTitle">
		<h1>Tự bạch</h1>
     
     </div>
	<div class="boderMain">
		<div class="info">Đẹp trai vô đối.</div>
       
	<br class="clr">
	</div>
	</div>
        
	<div class="marginMain boderMain">
	<div class="titleMain bgTitle">
		<h1>Thông tin cá nhân</h1>	
	</div>
	<div class="info">
        <p>Giới tính:</p>
        <p class="info_text">Nam</p>
        <p>Ngày sinh:</p>
        <p class="info_text">ngày 5 tháng 5 năm 1988</p>
   <!--     <p>Tình trạng</p>
        <p class="info_text"></p>-->
    </div>
    </div>
      			
    <div class="marginMain boderMain">
    <div class="titleMain bgTitle">
        <h1>Bình luận nhanh</h1>
        </div>
        
        
        



<div class="info" id="quickComment">
		
        <script language="javascript">
			
			function Trim(sString)
			{
				while (sString.substring(0,1) == ' ')
				{
					sString = sString.substring(1, sString.length);
				}
				while (sString.substring(sString.length-1, sString.length) == ' ')
				{
					sString = sString.substring(0,sString.length-1);
				}
				return sString;
			}

			$(document).ready(function ()
			{
				$("#frmQuickComment").submit (function ()
				{
					return false;
				});
				
				$("#btComment").click (function ()
				{
					if(Trim($("#txtComment").attr("value"))=="")
						return;
					var serverURL = "modules/blog_modules/post_quick_comment.php";
					var data = $("#frmQuickComment").serialize() + "&amp;btComment=" + "Bình luận";
					$("#quickComment").load(serverURL,data);
				});
			});
		</script>
        <form id="frmQuickComment" name="frmQuickComment" method="post" action="">
        <textarea cols="18" id="txtComment" name="txtComment"></textarea>
        <input type="image" value="Bình luận" src="../images/btComment.jpg" id="btComment" name="btComment">
        <input type="hidden" value="1" id="uid" name="uid">
  </form>
<br>
</div>




<br class="clr">			
</div>
</div>
            </div>
        	<!-- InstanceEndEditable -->
        	<!--End  Left -->
            <!-- Mid -->
          <div class="ColMids">
          	<div style="display:none" id="dialogLink"></div>
       	    
<script language="javascript">
	$(document).ready(function ()
	{
		$("#frmEditStatus").submit(function ()
		{
			return false;
		});
		
		$("#btn_Cment").click(function()
		{
			var serverURL = "modules/blog_modules/mid_status.php";
			var data =$("#frmEditStatus").serialize() + "&amp;btn_Cment=" + "Lưu";	
			$("#status").load(serverURL,data);
		});		
		
	});
</script>

<div id="status" class="status">
<form onsubmit="return false;" id="frmEditStatus" name="frmEditStatus" method="post" action="">
        <div class="box_comment marginComment">
					<div class="topbox_comment"><img width="1" height="1" alt=" " src="images/space.gif"></div>
					<div class="info_comment">
					<div class="typeCment">
						<div class="top_typeCment"><img width="1" height="1" alt=" " src="images/space.gif"></div>
						<div class="info_typeCment">
			   			 	<textarea onfocus="this.value=='Bạn đang nghĩ gì ?'?this.value='':''" class="input" id="txtStatus" name="txtStatus">Bạn đang nghĩ gì ?</textarea>
				 			<input type="button" value="Chia sẻ" id="btn_Cment" class="btn_Cment">
                        <br class="clr">   				
						</div>
					<div class="btm_typeCment"><img width="1" height="1" alt=" " src="images/space.gif"></div>
					</div>
					</div>
					<div class="btmbox_comment"><img width="1" height="1" alt=" " src="images/space.gif"></div>
		    </div>
</form>
</div>
                     
&nbsp;  

<script language="javascript">
	$(document).ready (function ()
	{
		$("#btWallArea").click (function ()
		{
			var url = "modules/blog_modules/mid_all_entries.php?uid=1";
			$("#midContentArea").load (url);
		});
		
		$("#btInfoArea").click (function ()
		{
			var url = "modules/blog_modules/mid_information.php?uid=1";
			$("#midContentArea").load (url);
		});
		
		$("#btAlbumArea").click (function ()
		{
			var url = "modules/blog_modules/show_albums.php?uid=1";
			$("#midContentArea").load (url);
		});
		
		$("#btFriendArea").click (function ()
		{
			var url = "modules/blog_modules/show_list_friends.php?uid=1";
			$("#midContentArea").load (url);
		});
	});
</script>          
<div class="TabbedPanels" id="TabbedPanels1">
  <ul class="TabbedPanelsTabGroup">
    <li tabindex="0" id="btWallArea" class="TabbedPanelsTab">Tường</li>
<li tabindex="0" id="btInfoArea" class="TabbedPanelsTab">Thông tin</li>    <li tabindex="0" id="btAlbumArea" class="TabbedPanelsTab">Album ảnh</li>
    <li tabindex="0" id="btFriendArea" class="TabbedPanelsTab">Bạn bè</li>
  </ul>
	<br class="clr">
    <div id="midContentArea">
    <!-- InstanceBeginEditable name="midContent" -->
    
    <div class="txtProfile">



		
<div class="entry_top"></div><div class="entry"><div class="update"><a href="modules/blog_modules/delete_entry.php?uid=1&amp;entry_id=43"><img width="12" height="12" border="0" alt="Delete" src="../images/xoaicon.png">xoá</a></div><div class="update"><a href="blog.php?view=update&amp;uid=1&amp;entry_id=43"><img width="12" height="12" border="0" alt="Edit" src="../images/zme_iconedit.gif">sửa</a></div><h1> <a href="blog.php?uid=1&amp;entry_id=43">Trailer phim Bẫy Rồng Phần 1</a> </h1><p class="noteBlog"> Được viết lúc  15:30:22 ngày 23/12/2009</p>  Film này nghe đồn chém gió dữ lắm!...<p><a href="blog.php?uid=1&amp;entry_id=43">Chi tiết</a></p></div><div class="entry_bottom"></div>    </div>
    <div style="overflow: hidden; clear: both;" class="txtProfile">
<div class="entry_top"></div><div class="entry"><div class="update"><a href="modules/blog_modules/delete_entry.php?uid=1&amp;entry_id=44"><img width="12" height="12" border="0" alt="Delete" src="../images/xoaicon.png">xoá</a></div><div class="update"><a href="blog.php?view=update&amp;uid=1&amp;entry_id=44"><img width="12" height="12" border="0" alt="Edit" src="../images/zme_iconedit.gif">sửa</a></div><h1> <a href="blog.php?uid=1&amp;entry_id=44">Test slide show &amp; nhạc</a> </h1><p class="noteBlog"> Được viết lúc  11:37:57 ngày 21/12/2009</p>  Test slide show  và nhạc trong blog nào...<p><a href="blog.php?uid=1&amp;entry_id=44">Chi tiết</a></p></div><div class="entry_bottom"></div>    </div>
    <div style="overflow: hidden; clear: both;" class="txtProfile">
<div class="entry_top"></div><div class="entry"><div class="update"><a href="modules/blog_modules/delete_entry.php?uid=1&amp;entry_id=2"><img width="12" height="12" border="0" alt="Delete" src="../images/xoaicon.png">xoá</a></div><div class="update"><a href="blog.php?view=update&amp;uid=1&amp;entry_id=2"><img width="12" height="12" border="0" alt="Edit" src="../images/zme_iconedit.gif">sửa</a></div><h1> <a href="blog.php?uid=1&amp;entry_id=2">blog thời khủng hoảng</a> </h1><p class="noteBlog"> Được viết lúc  22:41:26 ngày 5/12/2009</p>Hô hô, xĩn lỗi b�  kon, koko đang ở trên mây chưa đáp xún hạ giới được nhưng b�  con coi chừng , đi chơi hay bất cứ ở đâu cũng fai ngó trên đầu kẻo tui đạp trúng, he he. Dạo n� y tui bị điên, nên hơi khùng khủng, chác l�  tại khủng hoảng t� i chính trên thế giới ảnh hưởng, tui hứa sẽ bình thường trở lại, có ai thầm thương trộm nhớ tui thì cứ giữ đó tui sẽ đáp lại sau, hố hố,,,,,,,,,,...<p><a href="blog.php?uid=1&amp;entry_id=2">Chi tiết</a></p></div><div class="entry_bottom"></div>    </div>
    <div style="overflow: hidden; clear: both;" class="txtProfile">
<div class="entry_top"></div><div class="entry"><div class="update"><a href="modules/blog_modules/delete_entry.php?uid=1&amp;entry_id=1"><img width="12" height="12" border="0" alt="Delete" src="../images/xoaicon.png">xoá</a></div><div class="update"><a href="blog.php?view=update&amp;uid=1&amp;entry_id=1"><img width="12" height="12" border="0" alt="Edit" src="../images/zme_iconedit.gif">sửa</a></div><h1> <a href="blog.php?uid=1&amp;entry_id=1">Người "đẹp"!</a> </h1><p class="noteBlog"> Được viết lúc  22:38:08 ngày 5/12/2009</p>Với Bờm, Blog chỉ l�  nơi chia sẻ cảm xúc, chiêm nghiệm v�  trải lòng. Để thấy cuộc sống nhẹ nh� ng hơn. Đơn giản vậy thôi. Tuy nhiên, có những vấn đề bức xúc không của riêng ai, Bờm cũng nghĩ nhiều, cũng muốn viết muốn trình b� y cho bõ... cái gì đó. Nhưng nhận thấy một kẻ được gọi v�  tự công nhận l�  "Bờm" như mình thì viết ra chắc th� nh... nhảm nhí mất. Thôi thì ta cứ cầm ...<p><a href="blog.php?uid=1&amp;entry_id=1">Chi tiết</a></p></div><div class="entry_bottom"></div>    </div>
    <div style="overflow: hidden; clear: both;" class="txtProfile">
	</div>


       
         	
	<!-- InstanceEndEditable -->  
    </div>
  </div> 
</div>

            <!-- End Mid -->
              <!-- Right -->
              <!-- InstanceBeginEditable name="EditRegion4" -->
		<div class="ColRights">	
        	

<div id="rightNewNotifications" class="bgColRights marginMain">
	
<script language="javascript">
	$(document).ready (function ()
	{
		$("#viewAllMail").click (function ()
		{
			var url = "modules/blog_modules/forms/show_notifications.php";
			$("#dialogLink").load(url); 
		});
	});
</script>		
  	<div class="top_table"></div>
 	<div class="infoblog">
       	<h1>Thư đến</h1>
        <span class="notiMakeFriend"> <a id="viewAllMail" href="#">2 lời mời kết bạn </a></span>           
  	</div>
<div class="bot_table"></div>
</div>
<div class="bgColRights marginMain">			
  				<div class="top_table"></div>
 				<div class="infoblog">
                	<h1>Album ảnh</h1>
                    

								<div class="rwPhoto">
                                   <div class="photo"><a href="#">
                                   <img width="75px" border="0" src="0"></a></div>
	                               <div class="namePhoto"><h2><a href=""> 
								   Avatar</a></h2>
								    22:11:14 ngày 5/12/2009</div>
                                   <br class="clr">
                                </div>
                        
                                
                    
            		 <div class="mView">      
                		<span class="fr"><a href="blog.php?uid=1&amp;view=albums">1 album(s)</a></span> </div>
                                            
                </div>
                 <div class="bot_table"></div>
           	 	</div>	
                
                
                <div class="bgColRights marginMain">			
  				<div class="top_table"></div>
                <div class="infoblog">
                					<h1>Bài viết mới</h1>
                    <div class="fl">
					4 bài
                    </div>
                    <div style="font-weight: bold;" class="fr"><a href="/Source/blog.php?uid=1">Xem tất cả</a></div>					<br class="clr">
				<p><a alt="Trailer phim Bẫy Rồng Phần 1" title="Trailer phim Bẫy Rồng Phần 1" href="/Source/blog.php?uid=1&amp;entry_id=43">Trailer phim Bẫy Rồng Phần 1</a></p><p><a alt="Test slide show &amp; nhạc" title="Test slide show &amp; nhạc" href="/Source/blog.php?uid=1&amp;entry_id=44">Test slide show &amp; nhạc</a></p><p><a alt="blog thời khủng hoảng" title="blog thời khủng hoảng" href="/Source/blog.php?uid=1&amp;entry_id=2">blog thời khủng hoảng</a></p><p><a alt="Người &quot;đẹp&quot;!" title="Người &quot;đẹp&quot;!" href="/Source/blog.php?uid=1&amp;entry_id=1">Người "đẹp"!</a></p>					
                </div>
                <div class="bot_table"></div>
                </div>
                
				<div id="rightFriendList" class="bgColRights marginMain">
               <div class="top_table"></div>	
               <div class="infoblog">
               					
					<h1>Danh sách bạn bè</h1>
					<div class="fl">
                    3 bạn</div>
					<div style="font-weight: bold;" class="fr"><a href="blog.php?view=friends">Xem tất cả</a></div>
           			<br class="clr">
                    
					
		<table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody><tr>
								
				<td width="57"> 
                    <div class="avatar_friend"><a href="blog.php?uid=5" title="thangkhobmt">
                   	 	<img width="50" height="50" border="0" src="../images/no_avatar.png">
                    </a></div>
            		<div class="avatar_name_friend"><a href="blog.php?uid=5" title="thangkhobmt">
					thangkho...                    </a></div>
                 </td>
   								
				<td width="57"> 
                    <div class="avatar_friend"><a href="blog.php?uid=6" title="LightMoon0402">
                   	 	<img width="50" height="50" border="0" src="../images/218720mirana_bathing.jpg">
                    </a></div>
            		<div class="avatar_name_friend"><a href="blog.php?uid=6" title="LightMoon0402">
					LightMoo...                    </a></div>
                 </td>
   								
				<td width="57"> 
                    <div class="avatar_friend"><a href="blog.php?uid=7" title="SuperJunior">
                   	 	<img width="50" height="50" border="0" src="../images/909974SuperJunior-1.jpg">
                    </a></div>
            		<div class="avatar_name_friend"><a href="blog.php?uid=7" title="SuperJunior">
					SuperJun...                    </a></div>
                 </td>
   					</tr><tr>  			</tr>
		</tbody></table>
       	</div>		
	<div class="bot_table"></div>
</div>	   </div>
        <!-- InstanceEndEditable -->
              <!-- End Right -->
        </div>
        <br class="clr">
   </div>
</div>
<!-- Footer -->  
<div align="center" id="footer">Copyright &copy; 2009 Jupiter0402<br>
			Web DataBase TH2006/02 - ChickenRun
</div>	
<!-- End Footer -->
</div>
</body>
</html>