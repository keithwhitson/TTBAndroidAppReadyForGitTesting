<!DOCTYPE html>
<html>
<head>
<title>TTB Bible App Companion</title>
<link rel="shortcut icon" href="favicon.ico"> 
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>

<meta name='viewport' content='width=device-width' initial-scale=1, maximum-scale=1/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>
<div data-role="page" id="home" data-add-back-btn="true">
<div data-role="header" data-inset="true">
<a href="#home" data-inset="true">Home</a>
<a data-role="button" href="#biblebooks" data-inset="true">Bible Books</a>
<h1>TTB Bible App Companion</h1>
</div><!-- /header -->
<div data-role="content">
<div style="text-align:center;margin-bottom:12px" >
Welcome to the app and I hope you enjoy it!
</div>
<div style="text-align:center">
<img src="http://userserve-ak.last.fm/serve/_/157705/Dr+J+Vernon+McGee.jpg" />
</div>
</div><!-- /content -->
<div data-role="footer" data-position="fixed" data-id="myfooter">
<nav data-role="navbar" data-inset="true">
<a data-role="button" href="#" data-rel="back">Back</a>
</nav>
</div><!-- /footer -->
</div><!-- /page -->

<div data-role="page" id="biblebooks" data-inset="true">
<div data-role="header">
<a href="#home">Home</a>
<h1>Bible Books</h1>
</div><!-- /header -->
<div data-role="content">
<?php
require 'connect.php';
$sql = "SELECT distinct book FROM `completedatabase` LIMIT 0, 66 ";
$result = mysqli_query($con,$sql);
echo '<ul data-role="listview" data-inset="true">';
while($row = mysqli_fetch_array($result)){
echo "<li><a href='#biblebookswithpassages' class='biblebooks' id='$row[0]'>$row[0]</a></li>";
}
echo '</ul>';
?>
</div><!-- /content -->
<div data-role="footer" data-position="fixed" data-id="myfooter">
<nav data-role="navbar" data-inset="true">
<a data-role="button" href="#" data-rel="back">Back</a>
</nav>
</div><!-- /footer -->
</div><!-- /page -->
<script>
$(document).on('pageinit', function(){
$('.biblebooks').click(function(){


    var biblebook = $(this).attr('id');
	
	$('#passagebook').html(biblebook);
	
	$.ajax({
        type: "GET",
        url: "getBiblePassage.php",
        data: "book=" + biblebook,
        dataType: "text",
        })
	.done(function( html ) {
    $("#passages").html( html );
	$('.biblepassage').click(function(){
	
		var passage_id= $(this).attr('passage');
		
		
		$.ajax({
			type:"GET",
			url:"getBiblePassageLink.php",
			data: "passage_id=" + passage_id,
			dataType: "text"
		}).done(function(link){
				$('#mp3link').attr('href',link);
				$('.mp3file').attr('src',link);
			}
		);
				
		$.ajax({
			type:"GET",
			url:"getBiblePassageWording.php",
			data: "passage_id=" + passage_id,
			dataType: "text"
		}).done(function(link){
				$('#headertext').html(link);
			}
		);
		
		
		
		$.ajax({
        type: "GET",
        url: "getBiblePassageText.php",
        data: "passage_id=" + passage_id,
        dataType: "text",
        })
		.done(function(data){
		$('#passagetexts').html(data);
		})
	});
	$("#passages").listview("refresh");
  });
});

});

</script>

<div data-role="page" id="biblebookswithpassages">
<div data-role="header" >
<a data-role="button" href="#home">Home</a>
<h1 id="passagebook">Bible Books with Passages</h1>
</div><!-- /header -->
<div data-role="content">
	<ul id="passages" data-role="listview" data-inset="true">
	</ul>
</div><!-- /content -->
<div data-role="footer" data-position="fixed" data-id="myfooter">
<nav data-role="navbar" data-inset="true">
<a data-role="button" href="#" data-rel="back">Back</a>
</nav>
</div><!-- /footer -->
</div><!-- /page -->

<div data-role="page" id="biblebookswithpassagetext">
<div data-role="header">
<a href="#home">Home</a>
<h1 id="headertext">Bible Books with Passage Texts</h1>
</div><!-- /header -->
<div data-role="content">
<div id="passagetexts" data-inset="true">
</div>
<audio controls>
<source class ="mp3file" src="horse.mp3" type="audio/mpeg" style="align:center">
<audio>
</div><!-- /content -->
<div data-role="footer" data-position="fixed" data-id="myfooter">
<nav data-role="navbar" data-inset="true">
<a data-role="button" href="#" data-rel="back">Back</a>
<a data-role="button" href="#" id="mp3link" data-rel="external">MP3 Link</a>
</nav>
</div><!-- /footer -->
</div><!-- /page -->
</body>
</html>