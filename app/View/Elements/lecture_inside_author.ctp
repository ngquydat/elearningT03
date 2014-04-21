<div class="lecture-inside-author">
	<?pHp
	if(isset($data)){
		echo $this->Html->div(array("class"=>"vote"),
			$this->Html->image('vote_author.png').
			$this->Html->div(array("class"=>"author"),$this->Html->link($data['User']['username'],array('controller' => "users", "action"=>"user_view_teacher",$data['User']['userid']),
				array("escape"=>false))).
			$this->Html->para(null,"筆者：",array("class"=>"p")));
	}else echo "データがありません";
	?>
</div>