<?php
/*
 *  Баннеры
 * */

class admin_banners extends AdminTable
{
	public $SORT = 'banners.sort DESC';
	public $TABLE = 'banners';
	public $IMG_SIZE = 100;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 1920;
	public $IMG_BIG_VSIZE = 475;
	public $IMG_NUM = 1;
	public $ECHO_NAME = 'title';
    
   // public $FIELD_UNDER = 'parent_id';
	public $NAME = "Банери";
	public $NAME2 = "банер";
	
	public $MULTI_LANG = 1;
	public $USE_TAGS = 0;
	
	function __construct()
	{
		$this->fld=array(
			new Field("alias","Alias",1),
			new Field("title","Заголовок",1, array('multiLang'=>1)),
			//new Field("background_url","Фон",1),
			new Field("href_url","Url",1, array('multiLang'=>1)),
            new Field("text","Текст",2, array('multiLang'=>1)),
			new Field("sort","SORT",4),
			new Field("status","Публікувати",6, array('showInList'=>1, 'editInList'=>1)),
			new Field("creation_time","Date of creation",4),
			new Field("update_time","Date of update",4),
		);       
	}

	

};

?>
