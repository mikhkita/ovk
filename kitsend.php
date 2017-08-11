<?
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$NAME = htmlspecialcharsbx($_POST["name"]);
$PHONE = htmlspecialcharsbx($_POST["phone"]);
$SERVICE = htmlspecialcharsbx($_POST["service"]) == "service-default" ? "*Не выбрано*" : htmlspecialcharsbx($_POST["service"]);
$DATE = htmlspecialcharsbx($_POST["date"]);
$FROM = htmlspecialcharsbx($_POST["time-start"]) == "service-default" ? "*Не выбрано*" : htmlspecialcharsbx($_POST["time-start"]);
$TO = htmlspecialcharsbx($_POST["time-end"]) == "service-default" ? "*Не выбрано*" : htmlspecialcharsbx($_POST["time-end"]);

$arEventFields = array(
	"NAME" => $NAME,
	"PHONE" => $PHONE,
	"SERVICE" => $SERVICE,
	"DATE" => $DATE,
	"FROM" => $FROM,
	"TO" => $TO
);

$filterTags = array(
	"http://128.fo.ru",
	"КЛИЕНТСКИЕ БАЗЫ",
	"prodawez392@gmail.com",
);

$spam = false;

foreach ($_POST as $i => $value)
	foreach ($filterTags as $j => $tag)
		if( mb_strpos($value, $tag, 0, "UTF-8") !== false )
			$spam = true;

if( (isset($_POST["MAIL"]) && $_POST["MAIL"] != "") || $spam ){
		$data = array(
			"DATA" => implode(PHP_EOL, array_map(function($k, $v) { return "$k: $v"; }, array_keys($_POST), $_POST))
		);
		if( CEvent::Send("SPAM", "s1", $data) ){
			echo "1";
		}else{
			echo "0";
		}
	}else{
		$id_mail = CEvent::Send("SEND_REQUEST", "s1", $arEventFields, "N", "", "");
		if(isset($id_mail)){	
			echo "1";
		}else{
			echo "0";
		}
	}
?>