<?php
/*
 *  Промокоды
 * */

class admin_promocode extends AdminTable
{
	public $SORT = 'id ASC';
	public $TABLE = 'promocode';
	public $ECHO_NAME = 'alias';
    
	public $NAME = "Промокоды";
	public $NAME2 = "промокод";
	
	public $MULTI_LANG = 0;
	
	function __construct()
	{
		$this->fld[] = new Field("alias","Promocode",1);
		$this->fld[] = new Field("math_operation","Математическая операция(+ или -)",1);
                $this->fld[] = new Field("value","Значение",1);
		$this->fld[] = new Field("status","Статус",6, array('showInList'=>1));
		$this->fld[] = new Field("nochange_status","Не менять статус",6);
                $this->fld[] = new Field("price_limit","Ограничение на срабатывание промокода (0 - без ограничений)",1);
		$this->fld[] = new Field("expiration","Срок действия",13);
                $this->fld[] = new Field("order_id","ID заказа",5);
                $this->fld[] = new Field("product_id","Продукт", 9, array(
				'showInList'=>1, 'editInList'=>0, 'valsFromTable'=>'products', 'valsFromCategory'=>NULL, 
				'valsEchoField'=>'name'));
                $this->fld[] = new Field("sort","SORT",4);
		$this->fld[] = new Field("creation_time","Date of creation",4);
		$this->fld[] = new Field("update_time","Date of update",4);
	}
};


?>
