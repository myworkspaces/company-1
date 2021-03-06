<?php
	import("ORG.Util.Page");
	class CommonService{
		//默认值
// 		protected $default=array('condition'=>"",'page'=>1,'pageSize'=>DEFAULT_PAGE_SIZE);
		protected $default=array('condition'=>"",'page'=>1,'pageSize'=>1);//测试分页方便
		
		public function setDefault($key,$value){
			$this->default[$key]=$value;
		}
		/**
		 * 
		 * 总条数
		 * @param array $options
		 */
		public function count($options){
			return 0;
		}
		/**
		 * 
		 * 分页页码
		 * @param array $options
		 */
		public function showPage($options){
			!isset($options['condition']) && $options['condition']=$this->default['condition'];
			!isset($options['page']) && $options['page']=$this->default['page'];
			!isset($options['pageSize']) && $options['pageSize']=$this->default['pageSize'];
			$count=$this->count($options);
			$page=new Page($count,$options['pageSize']);
			$theme='%first% %upPage% %linkPage% %downPage% %end%';
			$page->setConfig("theme", $theme);
// 			$page->setConfig("first","<< first");
// 			$page->setConfig("prev","< prev");
// 			$page->setConfig("next","next >");
// 			$page->setConfig("last","last >>");
			$show=$page->show();
			return $show;
		}
	}
?>