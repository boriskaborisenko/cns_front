<?php
/*
 *  Страховые компании
 * */

class admin_companies extends AdminTable
{
    public $SORT = 'sort ASC';
	public $IMG_SIZE = 80;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 120;
	public $IMG_BIG_VSIZE = 120;
	public $IMG_NUM = 1;
	public $ECHO_NAME = 'name';
    
	public $NAME="Страховые компании";
	public $NAME2="компанию";
	
	public $MULTI_LANG = 1;
	
	function __construct()
	{
		$this->fld=array(
			new Field("alias","Alias (заповнювати не обов`язково)",1),
			new Field("name","Заголовок",1, array('multiLang'=>1)),
                        new Field("api_id","Api ID",4),
			new Field("api_alias","API alias",1, array('showInList'=>1)),
            new Field("rating","Рейтинг",0, array('showInList'=>1, 'editInList'=>1)),
                        new Field("text","Текст",2, array('multiLang'=>1)),
			
			new Field("hide","Не відображати",6, array('showInList'=>1)),
			new Field("sort","SORT",4),
			new Field("creation_time","Date of creation",4),
			new Field("update_time","Date of update",4),
		);
        

	}
	

};


/*
 *  Продукты
 * */

class admin_products extends AdminTable
{
	public $TABLE = 'products';
        public $SORT = 'sort ASC';
	public $IMG_SIZE = 100;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 320;
	public $IMG_BIG_VSIZE = 110;
	public $IMG_NUM = 1;
	public $ECHO_NAME = 'name';
    public $RUBS_NO_UNDER=1;    
        public $FIELD_UNDER = 'parent_id';
	public $NAME="Продукты";
	public $NAME2="продукт";
	
	public $MULTI_LANG = 1;
	
	function __construct()
	{
		$this->fld=array(
			new Field("alias","Alias (заповнювати не обов`язково)",1),
			new Field("name","Заголовок",1, array('multiLang'=>1)),
                        new Field("api_id","Api ID",4),
			new Field("api_alias","API alias",1, array('showInList'=>1)),
                        new Field("text","Текст",2, array('multiLang'=>1)),
                        new Field("parent_id","Принадлежит категории", 9, array(
				'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'services', 'valsFromCategory'=>-1, 
				'valsEchoField'=>'name')),                    
			new Field("hide","Не відображати",6, array('showInList'=>1)),
			new Field("sort","SORT",4),
			new Field("creation_time","Date of creation",4),
			new Field("update_time","Date of update",4),
		);
        

	}
	

};


/*
 *  Примеры договоров
 * */

class admin_contracts_examples extends AdminTable
{
    public $SORT = 'id DESC';
	public $ECHO_NAME = 'name';
        
    public $FIELD_UNDER = 'product_id';
	public $NAME="Примеры договоров";
	public $NAME2="договор";
	public $RUBS_NO_UNDER=1;
	
	public $MULTI_LANG = 1;
	
	function __construct()
	{
		$this->fld=array(
			new Field("name","Название",1, array('multiLang'=>1)),
                        new Field("api_id","Api ID",4),
			new Field("product_id","Продукт", 9, array(
	'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'products', 'valsFromCategory'=>null, 
	'valsEchoField'=>'name')),               
			new Field("company_id","Страховая компания", 9, array(
	'showInList'=>1, 'editInList'=>0, 'valsFromTable'=>'companies', 'valsFromCategory'=>null, 
	'valsEchoField'=>'name')),               
			new Field("hide","Не відображати",6, array('showInList'=>1)),
			new Field("filename","FILE",4),
			new Field("format","PDF file",4),
			new Field("creation_time","Date of creation",4),
			new Field("update_time","Date of update",4),
		);
        

	}
	

};

class admin_stocks extends AdminTable
{
    public $SORT = 'sort DESC';
    public $ECHO_NAME = 'name';
    
    public $IMG_SIZE = 100;
    public $IMG_RESIZE_TYPE = 2;
    public $IMG_BIG_SIZE = 544;
    public $IMG_BIG_VSIZE = 200;
    public $IMG_NUM = 1;

    public $NAME="Спец предложения";
    public $NAME2="акцию";

    public $MULTI_LANG = 1;

    function __construct()
    {
            $this->fld=array(
                    new Field("alias","Alias",1),             
                    new Field("name","Название",1, array('multiLang'=>1)),             
                    new Field("company_id","Страховая компания", 9, array(
    'showInList'=>1, 'editInList'=>0, 'valsFromTable'=>'companies', 'valsFromCategory'=>null, 
    'valsEchoField'=>'name')),               
                    new Field("hide","Не відображати",6, array('showInList'=>1)),
                    new Field("short_text","Краткий анонс",1, array('multiLang'=>1)),
                    new Field("text","Текст",2, array('multiLang'=>1)),
                    new Field("url_to","URL",1), 
                    new Field("sort","SORT",4),
                    new Field("creation_time","Date of creation",4),
                    new Field("update_time","Date of update",4),
            );


    }
        
    function afterAdd($row) {
        if (empty($row['alias'])) {
					
            $qup = "UPDATE stocks SET alias = '"
            . preg_replace('![^\w\d\-]*!','',strtolower(Translit($row['name_1']))) 
            ."' WHERE id = " . $row['id'];
            pdoExec($qup);
        }
    }
    
    function afterEdit($row) {
        if (empty($row['alias'])) {

            $qup = "UPDATE stocks SET alias = '" 
            . preg_replace('![^\w\d\-]*!','',strtolower(Translit($row['name_1'])))."-{$row['id']}" 
            ."' WHERE id = " . $row['id'];
            pdoExec($qup);
        }
    }
	

};

/*
 *  Услуги (категории)
 * */

class admin_services extends AdminTable
{
	public $TABLE = 'services';
        public $SORT = 'sort ASC';
	public $IMG_SIZE = 100;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 250;
	public $IMG_BIG_VSIZE = 250;
	public $IMG_NUM = 0;
	public $ECHO_NAME = 'name';
        
        public $FIELD_UNDER = 'parent_id';
	public $NAME="Услуги";
	public $NAME2="услугу";
	
	public $MULTI_LANG = 1;
	
	function __construct()
	{
		$this->fld=array(
			new Field("alias","Alias (заповнювати не обов`язково)",1),
			new Field("name","Заголовок",1, array('multiLang'=>1)),
                        new Field("text","Текст",2, array('multiLang'=>1)),
                        new Field("parent_id","Принадлежит категории", 9, array(
				'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'services', 'valsFromCategory'=>-1, 
				'valsEchoField'=>'name')),
			new Field("sort","SORT",4),
			new Field("creation_time","Date of creation",4),
			new Field("update_time","Date of update",4),
		);
	}
};
