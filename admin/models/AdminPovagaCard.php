<?php
/*
 *  Заказы  карточки культуры паркования
 * */

class admin_povaga_card extends AdminTable
{
	public $SORT = 'done ASC, id DESC';
	public $IMG_NUM = 0;
	public $ECHO_NAME = 'tel';
    
	public $NAME="Культура паркования";
	public $NAME2="карточка";
	
	function __construct()
	{
		$this->fld=array(
			new Field("tel","Телефон",1),
			new Field("address","Адрес",1),
			new Field("name","Имя",1, ['showInList'=>1]),
			new Field("email","Email",1, ['showInList'=>1, 'inputWidthInList'=>300]),
			new Field("osago_want","Хочу ОСАГО",6, ['showInList'=>1, 'editInList'=>1]),
                        new Field("osago_expires","Дата окончания ОСАГО",1),
                        new Field("price","Цена",1, array('showInList'=>1)),
                        new Field("paid","Оплачен",6, ['showInList'=>1]),
                        new Field("done","Обработан",6, ['showInList'=>1, 'editInList'=>1]),
                        new Field("crt","Дата создания",5, array('showInList'=>1)),
			new Field("creation_date","Date of creation",4),
		);
	}
        
        function show_crt($row) {
		return date('d.m.Y H:i', $row['creation_date']);
	}
};


