<?php
	session_start ();
	include ("../DAO/config.php");

?>

<?php 
 	
	
	include("../include/header.php");
?>
                    <div style="width: 986px; height: 529px; background-color: rgb(65, 65,
 65);" id="homeslide">
                        <embed type="application/x-shockwave-flash" src="../images/home.swf" id="mymovie"
                            name="mymovie" bgcolor="#000000" quality="high" loop="true" wmode="transparent"
                            width="986" height="529"></div>

                    <script>
	var fo2 = new FlashObject("../images/home.swf", "mymovie", "986", "529", "6", "#000000"); 
	//var fo2 =new FlashObject("images/Intro.swf", "mymovie", "1018", "760", "6", "#000000"); 
	fo2.addParam("loop", "true"); 
	fo2.addParam("wmode", "transparent"); 
	fo2.write("homeslide"); </script>
<?php
    include("../include/footer.php");
?>