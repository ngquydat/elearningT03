<?php
class User extends AppModel{
	var $name='User';
	public $primaryKey='userid';
	public function beforeSave($options = array()) {

		if(isset($this->data['User']['password'])) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		if(isset($this->data['User']['initialpassword'])) {
			$this->data['User']['initialpassword'] = AuthComponent::password($this->data['User']['initialpassword']);
		}
		if(isset($this->data['User']['verifycode'])) {
			$this->data['User']['verifycode'] = AuthComponent::password($this->data['User']['verifycode']);
		}
		if(isset($this->data['User']['initialverifycode'])) {
			$this->data['User']['initialverifycode'] = AuthComponent::password($this->data['User']['initialverifycode']);
		}
		if(isset($this->data['User']['secretquestion'])) {
			$this->data['User']['secretquestion'] = AuthComponent::password($this->data['User']['secretquestion']);
		}
		return true;

	}
	var $hasOne=array(
		"Student"=>array(
			'className'=>'Student',
			'foreignKey'=>'userid',
			'dependent'=>true
			),
		"Teacher"=>array(
			'className'=>'Teacher',
			'foreignKey'=>'userid',
			'dependent'=>true
			),
		"Admin"=>array(
			'className'=>'Admin',
			'foreignKey'=>'userid',
			'dependent'=>true
			),
		"Adminip"=>array(
			'className'=>'Adminip',
			'foreignKey'=>'userid',
			'dependent'=>true
			)
		);
	var $hasMany=array(
		"Studentlearnlecture"=>array(
			'className'=>'Studentlearnlecture',
			'foreignKey'=>'userid',
			'dependent'=>true
			),
		"Lecture"=>array(
			'className'=>'Lecture',
			'foreignKey'=>'userid',
			'dependent'=>true
			),
		);
	/********************************validation********************************************************/
	
	var $validate = array(
		'username' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'ユーザ名はアルファベットと数字のみです'
				),
			'between' => array(
				'rule' => array('between', 3, 15),
				'message' => 'ユーザ名は5から15文字の間です'
				)
			),
		'name' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'ユーザ名はアルファベットと数字のみです'
				),
			'between' => array(
				'rule' => array('between', 3, 15),
				'message' => 'ユーザ名は5から15文字の間です'
				)
			),
		'birthday' => array(
			'rule'       => 'date',
			'allowEmpty' => false,
			'message' =>'生年月日のフォーマットは正しくないです'
			/*'date' => array(
				'allowEmpty' => false,
				'required' => false,
				'message' =>'生年月日のフォーマットは正しくないです'
				)*/

		),
		'address' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'

			),

		'phonenumber' => array(
			'alphaNumeric' => array(
				'rule' => 'decimal',
				'message' => '携帯電話は数字のみです'
				)

			),
		//change_password
		'input1' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'

			),
		//change_password
		'input3' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'

			),

		//change_verify_code
		'question' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'

			),


		//change_verify_code
		'answer' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'

			),


		'secretquestion' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'

			),


		'verifycode' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'

			),

		'password2' => array(
			'rule' => array('minLength', '8'),
			'message' => 'パスワードは8文字以上です'
			),
		
		'password' => array(
			'rule' => array('minLength', '8'),
			'message' => 'パスワードは8文字以上です'
			)
		);	

/******************************************************************************************/
}
?>