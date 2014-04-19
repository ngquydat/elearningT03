<div class="lecture-inside-vote">
		<?pHp
		// pr($Lecture);
		echo $this->Html->div(array("class"=>"vote"));
		echo $this->Html->image('vote_author.png');
		echo $this->Html->div(array("class"=>"like"),$this->Html->link($this->Html->image('like.png'),array('controller' => 'lectures','action' => 'like',$data['Lecture']['lectureid']),
			array('escape' =>false )));
		echo $this->Html->para(null,count($data['Like'])."いいね",array("class"=>"p"))

		?>

	</div>
</div>