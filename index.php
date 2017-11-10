<?php
include("config.php");
include("header.html");
include("navbar.php");
include("function.php");

if(!empty($_POST['text']))
{
if(strlen($_POST['text'])<1000)
{
echo 'Your article is very short. Maybe try expanding it?<br>';
}
else if(strlen($_POST['text'])>5000)
{
echo 'Your article is very long. Can you try to shorten it or divide it into parts?<br>';
}
else
{
echo 'The length of the article is good<br>';
}

$have_graphics = substr_count($_POST['text'], '.png') + substr_count($_POST['text'], '.jpg') +  substr_count($_POST['text'], '.gif');

if(empty($have_graphics))
{
echo 'Your text has no graphics (or I have not found them). To get better text you should add some (eg from Wikipedia)<br>';
}

$file = explode(PHP_EOL, $_POST['text']);


$i=0;
$skipper=1;
echo '<table border="!"><tr><td>';
echoup('<div class="text-justify">');
foreach($file as $file2)
{
    
if($skipper==1)
{
    
if((($file2[0]!="h" or $file2[1]!="t") or ($file2[2]!="t" or $file2[3]!="p")) and !empty(trim($file2[0]))) 
{	
echoup('<b>'.trim($file2).'</b>');

$skipper=0;
}
else {
echoup(trim($file2));	
}


}
else {
    
if($file2[0]=="#")
{
$h_num = substr_count($file2, '#');
echoup('<center><h'.$h_num.'>'.str_replace("#", "", $file2).'</h'.$h_num.'></center><hr>');
}
else {
echoup($file2);	
}


}

$i++;
}

echoup('</div>');
echo '</td></tr></table>';



}
else
{
echo '<form method="POST">
<textarea name="text" placeholder="Insert your text here"></textarea>
<button class="btn" >Send!</button>
</form>';
}


include("footer.html");
?>