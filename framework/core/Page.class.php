<?php
namespace framework\core;
	class Page{
		public $count;//总条数
		public $listRows; //每页显示多少条
		public $pagesum; //总页数
		public $pagenow; //当前页
		public $page_var="page";
		public $offset;
		public function __construct($count,$listRows){
			$this->count=$count;
			$this->listRows=$listRows;
			$this->pagesum=ceil($this->count/$this->listRows);
			$this->setPageNow();
			$this->offset=($this->pagenow-1)*$this->listRows;

				
		}
		//处理当前页
		public function setPageNow(){

			$this->pagenow=isset($_GET[$this->page_var])?intval($_GET[$this->page_var]):1;
			if($this->pagenow < 1) $this->pagenow=1;
			if($this->pagenow > $this->pagesum && $this->pagesum!=0) $this->pagenow = $this->pagesum;
			echo $this->pagenow;
		}
		//展示分页码
		public function show(){
			$str='<nav aria-label="Page navigation">';
			$str.='<ul class="pagination">';
			$str.='<li>'; 
			$str.='<a href="'.$this->pageUrl($this->pagenow-1).'" aria-label="Previous">';
			$str.='<span aria-hidden="true">&laquo;</span>';
			$str.='</a>';
			$str.='</li>';
			if($this->pagesum < 5){
				$start=1;
				$end=$this->pagesum;
			}else{
				if($this->pagenow<=3){
					$start=1;
					$end=5;
				}
				if($this->pagenow>=$this->pagesum-2){
					$start=$this->pagesum-4;
					$end=$this->pagesum;
				}
				if($this->pagenow>3&&$this->pagenow<$this->pagesum-2){
					$start=$this->pagenow-2;
					$end=$this->pagenow+2;
				}
			}
			for($i=$start;$i<=$end;$i++){
				if($this->pagenow==$i){
					$str.='<li class="disabled"><a href="javascript:void(0)">'.$i.'</a></li>';
				}else{
					$str.='<li><a href="'.$this->pageUrl($i).'">'.$i.'</a></li>';
				}
				
			}

			$str.='<li>';
			$str.='<a href="'.$this->pageUrl($this->pagenow+1).'" aria-label="Next">';
			$str.='<span aria-hidden="true">&raquo;</span>';
			$str.='</a></li></ul></nav>';
			return $str;
		}
		//处理分页的地址
		public function pageUrl($p){
			$url=url();
			$_GET[$this->page_var]=$p;
			return $url."?".urldecode(http_build_query($_GET));
		}
	}
?>