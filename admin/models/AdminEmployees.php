<?php
/*
 *  Сотрудники
 * */

class admin_employees extends AdminTable
{

    public $SORT = 'sort DESC';
    public $IMG_SIZE = 77;
    public $IMG_VSIZE = 77;
    public $IMG_RESIZE_TYPE = 5;

    public $IMG_BIG_SIZE = 480;
    public $IMG_BIG_VSIZE = 480;
    public $IMG_NUM = 1;
    public $ECHO_NAME = 'position';

    public $NAME="Сотрудники";
    public $NAME2="сотрудника";

    public $MULTI_LANG = 1;

    function __construct()
    {
        $this->fld=array(
            new Field("alias","Alias (заполнять не обязательно)",1),
            new Field("name","ФИО сотрудника",1, array('multiLang'=>1)),		
            new Field("email","Email",1),		
            new Field("show_contacts_page","Отображать на странице 'О нас'",6,array('showInList'=>1,'editInList'=>1)),		
            new Field("position","Должность",1, array('multiLang'=>1)),		
            new Field("text","Текст",2, array('multiLang'=>1)),		
            new Field("sort","SORT",4),
            new Field("creation_time","Date of creation",4),
            new Field("update_time","Date of update",4),
        );
    }
    
    
    function afterAdd($row) {
        if (empty($row['alias'])) {
            $qup = "UPDATE employees SET alias = '" . Translit($row['name_1'])."' WHERE id = " . $row['id'];
            pdoExec($qup);
        }
    }
    
    function afterEdit($row) {
        if (empty($row['alias'])) {
            $qup = "UPDATE employees SET alias = '" . Translit($row['name_1'])."' WHERE id = " . $row['id'];
            pdoExec($qup);
        }
    }
};