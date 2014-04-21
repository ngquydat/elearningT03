<?php if(isset($data)){ ?>
<div class="list_lecture">
  <ul class="nav nav-pills nav-stacked">
    <li> 
    </li>
    <li><?pHp echo $this->Form->button("導入",array('type' => 'button','onclick' => "showme('describer')","class"=>"mybutton"));?>
    </li> 
    <li><?pHp echo $this->Form->button("ドキュメント",array('type' => 'button','onclick' => "showme('files')","class"=>"mybutton"));?>

    </li>
    <li><?pHp echo $this->Html->link("テスト",array('controller' => 'tests','action' => "view", $data['Lecture']['lectureid']));?>

    </li>
    <?php if(!strcmp($this->Session->read('userid'), $data['Lecture']['userid'])){?>
    <li>
      <?php
      echo $this->Form->button("学生リスト",array('type' => 'button','onclick' => "showme('studentList')","class"=>"mybutton"));
      ?>
    </li>
    <?php } ?>
  </ul>
</div>
<?php } 
else echo "データがありません"; ?>
<script type="text/javascript">
function showme(i) 
{ 
  var divid = document.getElementById(i);
  var divclass = document.getElementsByClassName("hidediv");
  for(var i=0;i<divclass.length;i++){
    divclass[i].style.display = 'none';
  }
  divid.style.display = 'block';
};
</script>
