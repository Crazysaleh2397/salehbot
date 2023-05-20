<?php
ob_start();
define('API_KEY','Your Token');
$admin =  236120584;
$admin2 = 198985878;
function save($filename,$TXTdata){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function ping($host, $port, $timeout) { 
  $tB = microtime(true); 
  $fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
  if (!$fP) { return "down"; } 
  $tA = microtime(true); 
  return round((($tA - $tB) * 1000), 0)." ms"; 
}
$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$number = str_word_count($text);
$numper = strlen($text);
$name = $update->message->from->first_name;
$from_username = $update->message->from->username;
$USERNAME = $update->message->from->username;
$LASTNAME = $update->message->from->last_name;
$FIRSTNAME = $update->message->from->first_name;
$USERID = $update->message->from->id;
$fromid = $update->callback_query->message->from->id;
$title = $update->message->chat->title;
$chattype = $update->message->chat->type;
$messageid = $update->callback_query->message->message_id;
$data_id = $update->callback_query->id;
$reply_msgid = $update->message->reply_to_message->message_id;
$contact =  $update->message->contact;
$txt = $update->callback_query->message->text;
$reply = $update->message->reply_to_message;
$replyid = $update->message->reply_to_message->from->id;
$replyf = $reply->forward_from;
$reply_fromid2 = $update->message->reply_to_message->forward_from->id;
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$from_username = $update->message->from->username;
$from_first = $update->message->from->first_name;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$title2 = $update->callback_query->message->chat->title;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
$text = $update->message->text;
$reply_username = $update->message->reply_to_message->from->username;
$reply_userid = $update->message->reply_to_message->from->id;
$message_id = $update->message->message_id;
$stickerid = $update->message->sticker->file_id;
$videoid = $update->message->video->file_id;
$voiceid = $update->message->voice->file_id;
$fileid = $update->message->document->file_id;
$photo = $update->message->photo;
$photoid = $photo[count($photo)-1]->file_id;
$musicid = $update->message->audio->file_id;
$sticker_id = $update->message->sticker->file_id;
$video_id = $update->message->video->file_id;
$voice_id = $update->message->voice->file_id;
$file_id = $update->message->document->file_id;
$music_id = $update->message->audio->file_id;
$photo2_id = $update->message->photo[2]->file_id;
$photo1_id = $update->message->photo[1]->file_id;
$photo0_id = $update->message->photo[0]->file_id;
$caption = $update->message->caption;
$s5 = $update->message->forward_from->id;
$cde = time();
$type = $update->message->chat->type;
$type2 = $update->callback_query->message->chat->type;
$code = md5("$cde$from_id");
$command = file_get_contents("data/$from_id/command.txt");
$stats = file_get_contents("data/all.txt");
function SendMessage($chatid,$text,$message_id,$parsmde,$disable_web_page_preview,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
        'reply_to_message_id'=>$message_id,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}
function SendMessage2($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}
function ForwardMessage($chatid,$from_chat,$message_id){
	bot('ForwardMessage',[
	'chat_id'=>$chatid,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
	}
function SendPhoto($chatid,$photo,$keyboard,$caption){
	bot('SendPhoto',[
	'chat_id'=>$chatid,
	'photo'=>$photo,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
function SendAudio($chatid,$audio,$keyboard,$caption,$sazande,$title){
	bot('SendAudio',[
	'chat_id'=>$chatid,
	'audio'=>$audio,
	'caption'=>$caption,
	'performer'=>$sazande,
	'title'=>$title,
	'reply_markup'=>$keyboard
	]);
	}
function SendDocument($chatid,$document,$keyboard,$caption){
	bot('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
function SendSticker($chatid,$sticker,$keyboard){
	bot('SendSticker',[
	'chat_id'=>$chatid,
	'sticker'=>$sticker,
	'reply_markup'=>$keyboard
	]);
	}
function SendVideo($chatid,$video,$keyboard,$duration){
	bot('SendVideo',[
	'chat_id'=>$chatid,
	'video'=>$video,
	'duration'=>$duration,
	'reply_markup'=>$keyboard
	]);
	}
function SendVoice($chatid,$voice,$keyboard,$caption){
	bot('SendVoice',[
	'chat_id'=>$chatid,
	'voice'=>$voice,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
function SendContact($chatid,$first_name,$phone_number,$keyboard){
	bot('SendContact',[
	'chat_id'=>$chatid,
	'first_name'=>$first_name,
	'phone_number'=>$phone_number,
	'reply_markup'=>$keyboard
	]);
	}
function SendChatAction($chatid,$action){
	bot('sendChatAction',[
	'chat_id'=>$chatid,
	'action'=>$action
	]);
	}
function KickChatMember($chatid,$user_id){
	bot('kickChatMember',[
	'chat_id'=>$chatid,
	'user_id'=>$user_id
	]);
	}
function LeaveChat($chatid){
	bot('LeaveChat',[
	'chat_id'=>$chatid
	]);
	}
function GetChat($chatid){
	bot('GetChat',[
	'chat_id'=>$chatid
	]);
	}
function GetChatMembersCount($chatid){
	bot('getChatMembersCount',[
	'chat_id'=>$chatid
	]);
	}
function GetChatMember($chatid,$userid){
	$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
	$tch = $truechannel->result->status;
	return $tch;
	}
function AnswerCallbackQuery($callback_query_id,$text,$show_alert){
	bot('answerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$text,
		'show_alert'=>$show_alert
    ]);
	}
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
	 bot('editMessagetext',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'text'=>$text,
    'parse_mode'=>$parse_mode,
	'disable_web_page_preview'=>$disable_web_page_preview,
    'reply_markup'=>$keyboard
	]);
	}
function EditMessageCaption($chat_id,$message_id,$caption,$keyboard,$inline_message_id){
	 bot('editMessageCaption',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'caption'=>$caption,
    'reply_markup'=>$keyboard,
	'inline_message_id'=>$inline_message_id
	]);
	}
$button_remove = json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true]);
$start_key = json_encode(['keyboard'=>[
[['text'=>'گرفتن پینگ سایت']],
],'resize_keyboard'=>false]);
$true = GetChatMember("@hackgm",$from_id);
if($true != 'member' && $true != 'creator' && $true != 'administrator'){
	SendMessage($chat_id,"برایه استفاده از ربات باید در کانال تیم عضو شوید!\nJoin us -> @hackgm",$message_id,"html","true",$button_remove);
}
elseif($text == '/start' and $type == "private"){
	if(!file_exists("data/$from_id/command.txt")){
		mkdir("data");
		mkdir("data/$from_id");
		save("data/$from_id/command.txt","null");
                save("data/all.txt","$stats\n$from_id");
		SendMessage($chat_id,"درود به ربات پینگر خوشومدی!\n-> @$from_username",$message_id,"MarkDown","true",$start_key);
	}else{
		save("data/$from_id/command.txt","null");
		SendMessage($chat_id,"درود دوباره !",$message_id,"MarkDown","true",$start_key);
	}
}
elseif($text == 'گرفتن پینگ سایت' and $type == 'private'){
	save("data/$from_id/command.txt","getping");
	SendMessage($chat_id,"لطفا ادرس سایت مورد نظر را با (www.) بفرستید!",$message_id,"html","true",$button_remove);
}
elseif($command == 'getping'){
	if(stripos($text,"www.") !== false){
		$ping = ping("$text", 80, 10);
		bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"پینگ سایت ($text)",
		'reply_to_message_id'=>$message_id,
		'reply_markup'=>json_encode(['inline_keyboard'=>[
		[['text'=>"$ping",'callback_data'=>'ping']],
		[['text'=>'Channel','url'=>'https://t.me/hackgm']],
                [['text'=>'Creator','url'=>'https://t.me/hackgm']],
		],'resize_keyboard'=>false])
                ]);
		save("data/$from_id/command.txt","null");
                sendMessage($chat_id,"لطفا یک گزینه را انتخاب کنید!",$message_id,"html","true",$start_key);
	}else{
		SendMessage($chat_id,"لطفا ادرس سایت را با www. بفرستید!");
	}
}
elseif(strpos($text,"/sendtoall") !== false){
        if($from_id == $admin || $from_id == $admin2){
	$payam = str_replace("/sendtoall ","",$text);
	$all = file_get_contents("data/all.txt");
	$membersidd= explode("\n",$all);
	for($y=0;$y<count($membersidd);$y++){
		SendMessage($membersidd[$y],"$payam");
	}
}
}
elseif(strpos($text,"/stats") !== false){
  if($from_id == $admin || $from_id == $admin2){
 $tedad = file_get_contents("data/all.txt");
 $exp = explode("\n",$tedad);
 $amar = count($exp)-1;
 SendMessage($chat_id,"تعداد کل کاربران ربات : ".$amar."",$message_id,"html","true",$button_remove);
}
}
?>