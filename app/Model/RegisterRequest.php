<?php
class Registerrequest extends AppModel{
	public $name='Registerrequest';
	public $primaryKey='registerrequestid';



	/*********************validate********************************/
	var $validate = array(
		'username' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'ユーザ名はアルファベットと数字のみです'
				),
			'between' => array(
				'rule' => array('between', 5, 15),
				'message' => 'ユーザ名は5から15文字の間です'
				)
			),
		'name' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください',

			),
		'phonenumber' => array(
			'alphaNumeric' => array(
				'rule' => 'decimal',
				'required' => true,
				'message' => '携帯電話は数字のみです'
				)

			),
		'address' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'

			),
		'bankaccountinfo' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'アルファベットと数字のみです'
				)
			),
		'creditcardinfo' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'アルファベットと数字のみです'
				)
			),
		'birthday' => array(
			'rule'       => 'date',
			'required'   => true,
			'allowEmpty' => false,
			'message' =>'生年月日のフォーマットは正しくないです'
			/*'date' => array(
				'allowEmpty' => false,
				'required' => false,
				'message' =>'生年月日のフォーマットは正しくないです'
				)*/

			),
		'secretquestion' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'

			),
		'initialverifycode' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'

			),
		'password' => array(
			/*'between' => array(
				'rule' => array('minLength', '8'),
				'message' => 'ユーザ名は5から15文字の間です'
				)*/
			'rule' => array('minLength', '8'),
			'message' => 'パスワードは8文字以上です'

			),
		'password2' => array(
			'rule' => array('minLength', '8'),
			'message' => 'パスワードは8文字以上です'
			
			)
		);



/***************************************************************/
}
?>