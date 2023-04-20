<?php
echo '<h1> Music samples readily available from many sources</h1><br>';
  echo '<h2>Hi speed music files via googledrive</h2></br>';

echo '<ul><li><a href="https://drive.google.com/drive/folders/0B0ITgN7hnWmNaGZiX3lxdm5MM28?resourcekey=0-fEw3pg29yNOJg0_53hr5wQ&usp=sharing">01 - La musique de la Bible reveled</a></li>';
echo '<li><a href="https://drive.google.com/drive/folders/0B0ITgN7hnWmNV2hiSkdoX2psTmc?resourcekey=0-Gh_5x5OvyjpWiP3JuMOo_A&usp=sharing">02 - La musique de la Bible revelee</a></li>';
echo '<li><a href="https://drive.google.com/drive/folders/0B0ITgN7hnWmNMXRwUUdieHk2WFE?resourcekey=0-1ZviL70bb4aWTDp4HsegDA&usp=sharing">03 - La musique de la Bible revelee</a></li>';
echo '<li><a href="https://drive.google.com/drive/folders/0B0ITgN7hnWmNeWNUQWI0bTFXUHM?resourcekey=0-FeU_HsYZoFmt2zJcV5kd-g&usp=sharing">04 - Cantique des cantiques de Salomon</a></li>';
echo '<li><a href="https://drive.google.com/drive/folders/131t6fPwgKg19-JlavEVd_SrY6RmMQV0D?usp=sharing">The Biblical Chant Library 6.0</a></li></ul>';

  
   echo '<h2>Hi speed music files via Skydrive</h2></br>';
  echo '<a href="https://onedrive.live.com/?cid=a3d26982bb8a779b&id=A3D26982BB8A779B%21113">  La musique de la Bible revelee</a></br>';
  

  echo '<h2>Music files from local server</h2></br>';
//path to directory to scan
$directory = "music/";
 
//get all files in specified directory
$files = glob($directory . "*.mp3");
 
//print each file name
foreach($files as $file)
{
 //check to see if the file is a folder/directory
// if(is_dir($file))
 {
//   echo $file;
  echo  '<a href="';
  echo  $file;
  echo '">';
  echo $file;
  echo '</a><br>';
 }
}

  echo '<h2>Music files via torrent</h2></br>';
  echo '<ul><li><a href="La%20musique%20de%20la%20Bible%20revelee.torrent"> mp3 torrent Vol 1 La musique de la Bible\
 revelee</a> <br>';
//echo '<a href="01%20-%20La%20musique%20de%20la%20Bible%20revelee.torrent"> mp3 torrent Vol 1 La musique de la Bible revelee</a> <br>';
  echo '</li><li><a href="02%20-%20La%20musique%20de%20la%20Bible%20revelee%20Vol.%202.torrent"> mp3 torrent Vol 2 La musique de la Bible revelee</a><br>';
  echo '</li><li><a href="03%20-%20La%20musique%20de%20la%20Bible%20revelee%20Vol.%203.torrent"> mp3 torrent Vol 3 La musique de la Bible revelee</a><br>';
  echo '</li><li><a href="04%20-%20Cantique%20des%20cantiques%20de%20Salomon.torrent"> mp3 torrent Cantique des cantiques de Salomon </a><br>';
echo '</li><li><a href="The_Biblical_Chant_Library_6.0.torrent"> The Biblical Chant Library 6.0 </a></li></ul>';
?>


