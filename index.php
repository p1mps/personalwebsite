<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<title>p1mps's homepage</title> 
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <meta name="google-site-verification" content="Cr66Pvu17TPdWbZ9xHgDkAGDarpnNfuiTpjNLyx_kMI" />
    <meta name="keywords" content="hacking,programming,university,web,developing" />
    <meta name="description" content="A computer science's student contact page" />

    <link rel="stylesheet" type="text/css" href="style.css"> 
    
    <script type="text/javascript" src="scripts/prototype.js"></script> 
    <script type="text/javascript" src="scripts/asd.js"></script>
    <script type="text/javascript" src="scripts/utility.js"></script> 
    
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"> 
  </head> 
  
  <body onload="init();">

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12258388-2");
pageTracker._trackPageview();
} catch(err) {}</script>

    <div id="header">

<script type="text/javascript">
//<![CDATA[
	document.write('<s'+'cript type="text/javascript" src="http://ad.altervista.org/js.ad/size=468X60/r='+new Date().getTime()+'"><\/s'+'cript>');

		       //]]>
  </script>

</div>

<div id="twitter">
	<h1>My twitter <a href="http://twitter.com/p1mps">@p1mps</a></h1>
 	
</div>



    <div id="container">  
      




<div id="menu1">
			 <ul>
			 <li><a href="index.php?section=blog">Blog</a></li>
			 <li><a href="index.php?section=about">About me</a></li>
			 <li><a href="index.php?section=projects">Projects</a></li>
			 <li><a href="index.php?section=links">Links</a></li>
			 <li><a href="index.php?section=files">My files</a></li>
	  
			 </ul>
        
	
			 <div id="currentTime">
	  
			 </div>
	
			 <div id="banner">
			 <a href="http://www.archlinux.org/">
			 <img id="arch" src="images/archlinux.png"/>
			 </a>
			 <a href="http://www.linux.org/">
			 <img id="arch" src="images/linuxuser.png"/>
			 </a>
			 </div>
			 </div>
      

			 <div id="content">
	
			 <?php

	   



			 $url = $_SERVER["PHP_SELF"];
$section = $_GET['section'];
switch($section){
case "blog":
  //blog section
  $xml = simplexml_load_file('data/blog.xml');	
  
  foreach($xml->post as $post){
    echo "<div class=post><div class=title>";
    echo $post->title;
    echo "</div><div class=date>";
    echo $post->date;
    echo "</div>";
    echo $post->content;      
    echo "</div>";     
    
  }
  echo "</div>";	
  
  break;

case "about":
  $xml = simplexml_load_file('data/about.xml');  
  echo "<img src='images/avatar.jpg' class=avatar><br>";
  echo $xml->title;
  echo "<div class=contentAbout>";
  echo $xml->about;
  echo "</div>";
  echo "</div>";

  break;

case "projects":
  $xml = simplexml_load_file('data/projects.xml');  	
  echo "Projects page";
  foreach($xml->project as $project){
    echo "<div class=project>";
    echo "<div class=name>";
    echo $project->name;
    echo "</div><br><div class=desc>";
    echo $project->abstract;
    echo "<br><br> url:";
    echo "<a href=";
    echo $project->url;
    echo ">";
    echo $project->url;
    echo " </a>";
    echo "</div></div>";
  }
  echo "</div>";
  break;

case "links":
  $xml = simplexml_load_file('data/links.xml');  
  echo "<div class='links'>";
  echo "Some useftul and interesting links:";
  echo "<br><br>";
  echo "<ul>";
  foreach($xml->link as $link){
    echo  "<li>";
    echo  "<a href='";
    echo  $link;
    echo  "' target='_blank' ";
						     
    echo  ">";
    echo $link;
    echo "</a>";
    echo $link->about;
    echo  "<br>";
    echo  "</li>";

  }
  echo "</div>";
  echo "</div>";
  break;
case "files":
  $xml = simplexml_load_file('data/myFile.xml');  
  echo "<div class='links'>";
  echo "<br><br>";
  echo "<ul>";

  foreach ($xml->category as $category){ 
    echo $category;
    foreach ($category->file as $file){
	    

      echo   "<li>";
      echo   "<a href='";
      echo   $file->location;
      echo   "'>";
      echo   $file;
      echo   "</a>";
	      
      echo   "<br>";
      echo   "</li>";

    }
  }	
  echo "</div>";
  echo "</div>";
  break;
default:
	     
  //blog section
  $xml = simplexml_load_file('data/blog.xml');	
	    
  foreach($xml->post as $post){
    echo "<div class=post><div class=title>";
    echo $post->title;
    echo "</div><div class=date>";
    echo $post->date;
    echo "</div>";
    echo $post->content;      
    echo "</div>";     
	       
  }
  echo "</div>";	
  break;
}

include 'sendmail.php';
?>	

<div class="bannerVerticale">
  </div>	

	
  <!--li genero-->
  <div id="footer">
  </div>

  <div>

  </div>
    
      
      

    


    
  </body>


  </html>
