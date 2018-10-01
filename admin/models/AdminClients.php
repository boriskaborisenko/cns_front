<?php
/*
 *  Наши клиенты
 * */

class admin_clients extends AdminTable
{

    public $SORT = 'sort DESC';
	public $IMG_SIZE = 240;
	public $IMG_VSIZE = 240;
	public $IMG_RESIZE_TYPE = 5;
	
	public $IMG_BIG_SIZE = 480;
	public $IMG_BIG_VSIZE = 480;
	public $IMG_NUM = 1;
	public $ECHO_NAME = 'name';
    
	public $NAME="Наши клиенты";
	public $NAME2="клиента";
	
	public $MULTI_LANG = 1;

	
	function __construct()
	{
		$this->fld=array(
			new Field("alias","Alias (заполнять не обязательно)",1),
			new Field("name","Заголовок",1, array('multiLang'=>1)),		
			new Field("link","Ссылка",1),		
			new Field("sort","SORT",4),
			new Field("creation_time","Date of creation",4),
			new Field("update_time","Date of update",4),
		);
        

	}
    
    
    function afterAdd($row) {
        
        if (empty($row['alias'])) {
			
			$qup = "UPDATE clients SET alias = '" . Translit($row['name_1'])."' WHERE id = " . $row['id'];
			pdoExec($qup);
		}
    }
	

};

?>
