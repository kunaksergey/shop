<?php
namespace common\models;
use core\ActiveRecord;

class Category extends ActiveRecord{

		public function rules(){
			return [
			'parent_id',
			'name'
			];
		}
}