<?php


class TsvComponent extends Object{

	

	
	

		//called before Controller::beforeFilter()
	function initialize(&$controller, $settings = array()) {
        // saving the controller reference for later use
		$this->controller =& $controller;
	}

    //called after Controller::beforeFilter()
	function startup(&$controller) {
	}

    //called after Controller::beforeRender()
	function beforeRender(&$controller) {
	}

    //called after Controller::render()
	function shutdown(&$controller) {
	}

    //called before Controller::redirect()
	function beforeRedirect(&$controller, $url, $status=null, $exit=true) {
	}

	function redirectSomewhere($value) {
        // utilizing a controller method
	}  



	public function readfile($string)
	{	
		$title=null;
		$subtitle=null; 	

		$ans_content=array();			
		
		$a=array();
					// pr($a);die();

		$ele=array();
		$string;
		$this->layout="user";
		$m=null;
		$n=null;
		$o=null;
		//echo "hoang";
		//$a=new File_test;
		if (FALSE === @fopen($string, 'r')) {
			echo 'the file doesn\'t exists';
			return 0;
		}else {
			$fp = fopen($string, 'r');
			$title=fscanf($fp, "%s\t%s\n");
			$subtitle=fscanf($fp, "%s\t%s\n");
			$title[0]."   aaa  ".$title[1]."<br>";
			$subtitle[0]."   aaa  ".$subtitle[1]."<br>";

			$ele['title']=$title[1];
			$ele['subtitle']=$subtitle[1];

			$qs=fgets($fp,200);

			$i=0;
			$l=0;
			
			while($i!=1)
			{	

				$t=0;
				$ans_content=array();
				while(1)
				{
					$m=null;
					$n=null;
					$o=null;
					$get=fgets($fp,200);
		//echo $qs[0]."hoang";

					if($get[0]=='E')
						$i=1;
					if($get[0]!='Q')
					{
						//echo "ok2<br>";
						break;
					}
					else
					{

						//$point=null;
						//$ans_content=null;
						if($get[5]=='Q')
						{
							$ques_id=$get[2];
							$a['ques_id']=$ques_id;
							$k=strlen($get);
							for($j=8;$j<$k;$j++)
							{
								$m=$m.$get[$j];								
							}						
							
							$a['content']=$m;
							//echo $ques_content.'dkmsssssssssssssssssssssssssss';
							//var_dump($ques_content);
							//$a[1]=$ques_content;
							//echo $k."<br>";
						}
						//echo $get[2]."<br>";
						if($get[5]=='S')	
						{
							$k=strlen($get);
							$a['number_ans']=$get[7]-1;							
							//$a[2]=$ans_id;

							for($j=9;$j<$k;$j++)
							{
								//$get[$j];
								$n=$n.$get[$j];
								
							}
							$ans_content[$t]=(string)$n;
							//pr($ans_content[$t]);
							//echo $ans_content[$ans_id];
							//pr($ans_content[$ans_id]);
							$t++;
						}
						if($get[5]=='K')
						{
							$k=strlen($get);
							$a['correctAnswer']=$get[10];							
							
							for($j=13;$j<$k;$j++)
							{
								$o=$o.$get[$j];
							}
							$a['point']=$o;
							
							//echo $point;
							//$a[5]=$point;
						}

					}				
				}
				$a['answer']=$ans_content;
				//pr($ans_content);
				
				//pr($a);
				$ele['questionsList'][$l] = $a;			
				// $ele[$l]=$a;
				$l++;				
				
			}
			//pr($ele);
			return $ele;	
		}
	}
}

