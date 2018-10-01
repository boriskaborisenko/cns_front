<?php
/*
 *  Настройки пользователя
 * */

class admin_user_settings extends AdminTable
{
	public $SORT = 'id ASC';
	public $TABLE = 'user_settings';
	public $ECHO_NAME = 'name';
    
	public $NAME = "Настройки пользователя";
	public $NAME2 = "настройку";
	
	public $MULTI_LANG = 1;
	
	function __construct()
	{
		$this->fld[] = new Field("alias","Alias",1);
		$this->fld[] = new Field("name","Наименование",1);
		$this->fld[] = new Field("name_lang","Наименование (разное для языков)",1, array('multiLang'=>1));
		$this->fld[] = new Field("value","Текстовое поле",1);
		$this->fld[] = new Field("value_lang","Текстовое поле (разное для языков)",1, array('multiLang'=>1));
		$this->fld[] = new Field("text","Текстовое поле с автоформатированием",2);
		$this->fld[] = new Field("text_lang","Текстовое поле с автоформатированием (разное для языков)",2, array('multiLang'=>1));
		$this->fld[] = new Field("status","Статус активности",6, array('showInList'=>1));
		$this->fld[] = new Field("sort","SORT",4);
		$this->fld[] = new Field("creation_time","Date of creation",4);
		$this->fld[] = new Field("update_time","Date of update",4);
	}
};


?>
