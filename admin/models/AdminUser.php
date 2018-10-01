<?php
class admin_user extends AdminTable
{

    public $TABLE = 'user';
    public $SORT = 'name asc';
    public $NAME = 'Пользователи сайта';
	public $NAME2 = 'пользователя';
    //public $FIELD_UNDER = 'group_id';
   
    function __construct() {
        $this->fld = array(new Field("username","Логин",1),
        new Field("password_hash","Хэш-код пароля",1),
        //new Field("auth_key","Код авторизации",1),
        //new Field("passwd_rec","Код восстановления пароля",3),
        new Field("email","E-mail",1, array('showInList'=>1)),
		//new Field("deny_scripts","Закрытые скрипты (через запятую)",1),
		//new Field("deny_tables","Закрытые таблицы (через запятую)",1),
		//new Field("group_id", "Находится в группе", 9, array('showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'admins_groups', 'valsFromCategory'=>-1, 'valsEchoField'=>'name')),
        new Field("creation_time", "Date of creation", 4)
        );
    }

    function addSpFields($row, $under) {
     global $TABLE_ADMINS, $HTPASS_ADDRR;
		echo "<script language=\"JavaScript\" type=\"text/javascript\">
		function gethash(inp) {
            if (inp!='') {
                word = document.getElementById(inp).value;
            } else {
            word = 0;
        }

		$.ajax({
		  type: \"GET\",
		  url: '/content/signup',
		  data: 'pass='+word,
		  success: function(data) {
		  $('#password_hash').val(data);
		  }
		 });
		}</script>";
		 echo '<br/><br/><div id="md5" style="border: 1px #CCC;">
		 <strong>Введите новый пароль: </strong> <input name="cpass" type="text" id="cpass" value=""> <a href="javascript:gethash(\'cpass\')"><u>вставить Хэш в поле пароля</u></a>
		 </div>';
    }
};
?>
