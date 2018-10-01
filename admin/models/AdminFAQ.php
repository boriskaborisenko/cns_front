<?php
/*
 *  FAQ
 * */

class admin_faq extends AdminTable
{
	public $TABLE = 'faq';
        public $SORT = 'sort ASC';
	public $ECHO_NAME = 'title';
	public $NAME="FAQ";
	public $NAME2="faq";
	
	public $MULTI_LANG = 1;
	
	function __construct()
	{
		$this->fld=array(
			new Field("alias","Alias",1),
			new Field("title","Заголовок",1, array('multiLang'=>1)),
                        new Field("text","Текст",2, array('multiLang'=>1)),
                        new Field("product_id","Продукт", 9, array(
				'showInList'=>1, 'editInList'=>0, 'valsFromTable'=>'products', 'valsFromCategory'=>NULL, 
				'valsEchoField'=>'name')),                    
			new Field("hide","Не відображати",6, array('showInList'=>1)),
			new Field("sort","SORT",4),
			new Field("creation_time","Date of creation",4),
			new Field("update_time","Date of update",4),
		);
	}
}