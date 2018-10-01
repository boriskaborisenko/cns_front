<?php
/*
 *  Статьи
 * */

class admin_post extends AdminTable
{
	public $TABLE = 'post';
        public $SORT = 'sort ASC';
	public $IMG_SIZE = 150;
	public $IMG_RESIZE_TYPE = 2;
	public $IMG_BIG_SIZE = 600;
	public $IMG_BIG_VSIZE = 315;
	public $IMG_NUM = 1;
	public $ECHO_NAME = 'title';
        public $RUBS_NO_UNDER=1;    
        public $FIELD_UNDER = 'parent_id';
	public $NAME="Статьи";
	public $NAME2="статью";
	
	public $MULTI_LANG = 1;
	
	function __construct()
	{
		$this->fld=array(
			new Field("alias","Alias",1),
			new Field("title","Заголовок",1, array('multiLang'=>1)),
                        new Field("description","Описание",2, array('multiLang'=>1)),
                        new Field("text","Текст",2, array('multiLang'=>1)),
                        new Field("pub_date","Дата",13),
                        new Field("parent_id","Принадлежит категории", 9, array(
				'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'post_categories', 'valsFromCategory'=>-1, 
				'valsEchoField'=>'title')),                    
			new Field("hide","Не відображати",6, array('showInList'=>1)),
			new Field("sort","SORT",4),
			new Field("creation_time","Date of creation",4),
			new Field("update_time","Date of update",4),
		);
        

	}
	

}

/*
 *  Категории статей
 * */

class admin_post_categories extends AdminTable
{
	public $TABLE = 'post_categories';
        public $SORT = 'sort ASC';
	public $IMG_SIZE = 100;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 250;
	public $IMG_BIG_VSIZE = 250;
	public $IMG_NUM = 0;
	public $ECHO_NAME = 'title';
        
        public $FIELD_UNDER = 'parent_id';
	public $NAME="Категории";
	public $NAME2="категорию";
	
	public $MULTI_LANG = 1;
	
	function __construct()
	{
		$this->fld=array(
			new Field("alias","Alias",1),
			new Field("title","Заголовок",1, array('multiLang'=>1)),
                        new Field("text","Текст",2, array('multiLang'=>1)),
                        new Field("parent_id","Принадлежит категории", 9, array(
				'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'post_categories', 'valsFromCategory'=>-1, 
				'valsEchoField'=>'title')),
			new Field("sort","SORT",4),
			new Field("creation_time","Date of creation",4),
			new Field("update_time","Date of update",4),
		);
	}
}
