<?php
/*
 *  SEO тексты
 * */


class admin_seo extends AdminTable
{

	public $SORT = 'alias ASC';
	public $ECHO_NAME = 'alias';
    
	public $NAME="SEO тексты";
	public $NAME2="страницу";
	
	public $MULTI_LANG = 1;
	
        public $IMG_SIZE = 100;
	public $IMG_RESIZE_TYPE = 1;
	public $IMG_BIG_SIZE = 1200;
	public $IMG_BIG_VSIZE = 630;
	public $IMG_NUM = 1;
        
	function __construct()
	{
		$this->fld=array(
			new Field("alias","URL (/osago/)",1),
			new Field("title","TITLE",1, array('multiLang'=>1, 'showInList'=>1)),
                        new Field("description","Description",1, array('multiLang'=>1)),
                        new Field("h1","Заголовок H1",1, array('multiLang'=>1, 'showInList'=>1)),
                        new Field("text_above","Верхняя контентная зона для виджетов",2, array('multiLang'=>1)),
                        new Field("text","Текст",2, array('multiLang'=>1)),
                        new Field("text_under","Нижняя контентная зона для виджетов",2, array('multiLang'=>1)),
			new Field("creation_date","Date of creation",4),
                        new Field("type_og","Open graph type",1, array('multiLang'=>1)),
                        new Field("title_og","Open graph title",1, array('multiLang'=>1)),
                        new Field("description_og","Open graph description",1, array('multiLang'=>1)),
                        new Field("url_og","Open graph url",1, array('multiLang'=>1)),
		);
	}
};
