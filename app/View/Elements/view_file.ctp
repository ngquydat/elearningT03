<?php 
	//input= file
if(isset($File)){
	$format = explode(".", $File['title']);
	if(isset($format[1])){
		if(strcmp($format[1], "mp3") == 0 || strcmp($format[1], "wav") == 0 ||strcmp($format[1], "MP3") == 0 || strcmp($format[1], "WAV") == 0){
			echo '<audio controls>
			<source src="'.$File['storelink'].'" type="audio/mpeg">
			あなたのブラウザはこのファイルタイプをサポートしません.
			</audio>
			';
		}
		if(strcmp($format[1], "mp4") == 0 || strcmp($format[1], "flv") == 0 || strcmp($format[1], "WAV") == 0 || strcmp($format[1], "MP4") == 0 || strcmp($format[1], "FLV") == 0){
			echo '<video width="700" height="400" controls>
			<source src="'.$File['storelink'].'" type="video/mp4">
			</video>';

		}
		if(strcmp($format[1], "pdf") == 0 || strcmp($format[1], "PDF") == 0 ){
			echo "<object height='600px' width='700px' type='application/pdf' data=".$File['storelink'].">
			<p>ブラウザはPDFサポートしない場合、表示されるものです <a href=".$File['storelink'].">ダウンロード<b>".$File['title']."</b>.</a></p>
			</object>";
		}
		if(strcmp($format[1], "jpg") == 0 || strcmp($format[1], "gif") == 0 || strcmp($format[1], "png") == 0 ||strcmp($format[1], "JPG") == 0 || strcmp($format[1], "GIF") == 0 || strcmp($format[1], "PNG") == 0){
			echo $this->Html->image($File['storelink'], array('fullBase' => true));
		}
	}
}
?>