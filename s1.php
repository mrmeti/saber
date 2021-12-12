<?php


#Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (file_exists("config.php"))
{
    require_once ("config.php");
}
else
{
    #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!defined("ADMINS"))
    {
        define("ADMINS", [477779110]);
    }
}
#Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!file_exists("jdf.php"))
{
    die("Jdf File");
}
else
{
    require ("jdf.php");
}
ini_set('memory_limit', -1);
ini_set('max_execution_time', -1);
date_default_timezone_set("Asia/Tehran");
#Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!\file_exists('madeline.php'))
{
    \copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
require_once ('madeline.php');
use danog\MadelineProto\API;
use Amp\Http\Client\HttpClientBuilder;
use Amp\Http\Client\HttpException;
use Amp\Http\Client\Request;
use Amp\Http\Client\Response;
use danog\MadelineProto\EventHandler;
use danog\MadelineProto\Exception;
use danog\MadelineProto\Logger;
use danog\MadelineProto\RPCErrorException;
use danog\MadelineProto\Loop\Generic\GenericLoop;
class MrPoKeR extends EventHandler
{
    public function onStart()
    {
        try
        {
            yield$this
                ->channels
                ->joinChannel(['channel' => "@harim88888"]);
        }
        catch(\Throwable $e)
        {
            unset($e);
        }
        #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!\file_exists("manager.json"))
        {
            touch("manager.json");
            $array = [];
            $array['enemylist'] = [];
            $array['foshlist'] = [];
            $array['history'] = [];
            $array['userlist'] = [];
            $array['typing'] = "off";
            $array['bio'] = "off";
            $array['bot'] = "on";
            $array['reply'] = "on";
            $array['name'] = "off";
            yieldAmp\File\put("manager.json", json_encode($array));
        }
        else
        {
            $sq = $this;
            $Loop = new GenericLoop($this, function () use ($sq)
            {
                $manager = json_decode(yieldAmp\File\get('manager.json') , true);
                $fonts = [["Ѳ", "１", "❷", "➂", "４", "５", "６", "７", "８", "❾"], ["【0】", "【1】", "【2】", "【3】", "【4】", "【5】", "【6】", "【7】", "【8】", "【9】"], ["『0』", "『1』", "『2』", "『3』", "『4』", "『5』", "『6』", "『7』", "『8』", "『9』"], ["░0", "░1", "░2", "░3", "░4", "░5", "░6", "░7", "░8", "░9"], ["[̲̅0⃣]", "[̲̅1⃣]", "[̲̅2⃣]", "[̲̅3⃣]", "[̲̅4⃣]", "[̲̅5⃣]", "[̲̅6⃣]", "[̲̅7⃣]", "[̲̅8⃣]", "[̲̅9⃣]"], ["0", "҉1", "҉2", "҉3", "҉4", "҉5", "҉6", "҉7", "҉8", "҉9҉"], ["░0", "░۱", "░۲", "░۳", "░۴", "░۵", "░۶", "░۷", "░۸", "░۹"], ["0", "❶", "❷", "❸", "❹", "❺", "❻", "❼", "❽", "❾"],

                ["⁰", "¹", "²", "'³", "'⁴", "⁵", "⁶", "⁷", "'⁸", "⁹"]];
                $time2 = str_replace(range(0, 9) , $fonts[array_rand($fonts) ], date("H:i"));
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($manager['name'] == "on")
                {
                    yield$sq
                        ->account
                        ->updateProfile(['last_name' => "$time2"]);
                }
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($manager['bio'] == "on")
                {
                    yield$sq
                        ->account
                        ->updateProfile(['about' => "𖤍𖤓 $time2 ᴛᴏᴅᴀʏ ɪs ♥ " . jdate("l", time()) . " ♡ " . jdate("Y/m/d", time()) . " ●ʰᵃʳᶦᵐᵉˢʰᵏᵍ●"]);
                }
                return 60;
            }
            , 'Timer');
            $Loop->start();
        }

    }
    public function getidbyuser($id)
    {
        try
        {
            $get = yield$this->getFullInfo($id);
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (isset($get['User']['id']))
            {
                return $get['User']['id'];
            }
            return "❎ERROR Id";
        }
        catch(\Throwable $e)
        {
            return $e->getMessage();
        }
    }
    public function getmsg($chat_id, $id)
    {
        #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($chat_id > 0)
        {
            $m = yield$this
                ->messages
                ->getMessages(['peer' => $chat_id, 'id' => [$id]]);
            return $m;
            unset($m);
        }
        $m = yield$this
            ->channels
            ->getMessages(['channel' => $chat_id, 'id' => [$id]]);
        return $m;
        unset($m);
    }
    private function getAllGroups($ty = "chats")
    {
        $dialog = yield$this->getDialogs();
        $list = [];
        foreach ($dialog as $id)
        {
            try
            {
                $type = yield$this->getInfo($id);
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($ty == "chats")
                {
                    #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ((isset($type['type'])) && ($type['type'] == "supergroup" or $type['type'] == "chat"))
                    {
                        $list[] = $id;
                    }
                }
                else#Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($ty == 'users')
                {
                    #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ((isset($type['type'])) && ($type['type'] == "user"))
                    {
                        $list[] = $id;
                    }
                }
                else
                {
                    #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ((isset($type['type'])) && ($type['type'] == "channel"))
                    {
                        $list[] = $id;
                    }
                }
            }
            catch(RPCErrorException $e)
            {
                unset($e);
                continue;
            }
            catch(Exception $e)
            {
                unset($e);
                continue;
            }
        }
        return $list;
        unset($list);
    }
    public function onUpdateNewChannelMessage($update)
    {
        yield$this->onUpdateNewMessage($update);
    }

    public function getReportPeers()
    {
        return ['harim8888'];
    }
    final public function filePutContents(string $fileName, string $contents)
    {
        return yieldAmp\File\put($fileName, $contents);
    }
    private function getContents(string $path)
    {
        #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (file_exists($path))
        {
            return yieldAmp\File\get($path);
        }
        return yieldAmp\File\get($path);
    }
    public function save($filename, array $data)
    {
        $file = yieldAmp\File\open($filename, "w");
        yield$file->write(json_encode($data));
        yield$file->close();
        unset($file);
    }
    public function onUpdateNewMessage($update)
    {

        #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($update['message']['date'] < time() - 60)
        {
            return;
        }
        $message = isset($update['message']['message']) ? $update['message']['message'] : null;
        $mid = isset($update['message']['id']) ? $update['message']['id'] : null;
        $from_id = isset($update['message']['from_id']['user_id']) ? $update['message']['from_id']['user_id'] : null;
        try
        {
            //start
            $manager = json_decode(yield$this->getContents('manager.json') , true);
            $get_info = yield$this->getInfo($update);
            $peer = $get_info['bot_api_id'];

            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^(run)\s+(.+)$/is", $message, $match) && in_array($from_id, ADMINS))
            {
                try
                {
                    ob_start();
                    eval($match[2] . '');
                    $run = ob_get_contents();
                    ob_end_clean();
                }
                catch(Exception $e)
                {
                    $run = $e->getMessage() . PHP_EOL . "Line :" . $e->getLine();
                }
                catch(ParseError $e)
                {
                    $run = $e->getMessage() . PHP_EOL . "Line :" . $e->getLine();
                }
                catch(FatalError $e)
                {
                    $run = $e->getMessage() . PHP_EOL . "Line :" . $e->getLine();
                }
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "Code :\n`" . $match[2] . "`\nResult : \n" . strip_tags($run) . "\n"]);
                unset($run);
                return;
            }
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($message == "ping" && in_array($from_id, ADMINS))
            {
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "online", 'reply_to_msg_id' => $mid]);
                return;
            }
            ///botonoff
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^bot (on|off)/", $message, $m) && in_array($from_id, ADMINS))
            {
                $manager['bot'] = $m[1];
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "ربات با موفقیت " . str_replace(["on", "off"], ["فعال", "غیرفعال"], $m[1]) . " شد", 'reply_to_msg_id' => $mid]);
                return;
            }
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($manager['bot'] == "off")
            {
                return;
            }
            ///endbotonoff
            ////reply_to_msg_id
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^reply (on|off)/", $message, $m) && in_array($from_id, ADMINS))
            {
                $manager['reply'] = $m[1];
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "ریپلی با موفقیت " . str_replace(["on", "off"], ["فعال", "غیرفعال"], $m[1]) . " شد", 'reply_to_msg_id' => $mid]);
                return;
            }
            ////reply_to_msg_id
            //startGetaid
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^id[\s]?([a-zA-Z0-9\_\@]+)?/", $message, $m) && in_array($from_id, ADMINS))
            {
                $id = "";
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (empty($m[1]))
                {
                    #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (isset($update['message']['reply_to']['reply_to_msg_id']))
                    {
                        $getmsg = yield$this->getmsg($peer, $update['message']['reply_to']['reply_to_msg_id']);
                        #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (isset($getmsg['messages'][0]['from_id']['user_id']) or isset($getmsg['messages'][0]['peer_id']['user_id']))
                        {

                            $id = isset($getmsg['messages'][0]['from_id']['user_id']) ? $getmsg['messages'][0]['from_id']['user_id'] : $getmsg['messages'][0]['peer_id']['user_id'];;
                        }
                        else
                        {
                            yield$this
                                ->messages
                                ->sendMessage(['peer' => $peer, 'message' => "Error Reply", 'reply_to_msg_id' => $mid]);
                            return;
                        }
                    }
                    else
                    {
                        #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($get_info['type'] == "user")
                        {
                            $id = $peer;
                        }
                        else
                        {
                            yield$this
                                ->messages
                                ->sendMessage(['peer' => $peer, 'message' => "Error Get Info", 'reply_to_msg_id' => $mid]);
                            return;
                        }
                    }
                }
                else
                {
                    $get = yield$this->getidbyuser($m[1]);
                    #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!is_numeric($get))
                    {
                        yield$this
                            ->messages
                            ->sendMessage(['peer' => $peer, 'message' => $get, 'reply_to_msg_id' => $mid]);
                        return;
                    }
                    $id = $get;
                }
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "ایدی : $id", 'reply_to_msg_id' => $mid]);
                return;
            }

            //endGetId
            ///enemyPart
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^cleanall|^حریم بپاک|^پاکسازی/", $message) && in_array($from_id, ADMINS))
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!yield$this->isSuperGroup($peer))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "این دستور فقط برای سوپرگروه است", 'reply_to_msg_id' => $mid]);
                    return;
                }
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'reply_to_msg_id' => $mid, 'message' => "حریم درحال پاکسازی پیامها𖤍࿐", 'parse_mode' => 'markdown', 'disable_web_page_preview' => true]);
                $array = range($mid, 1);
                $chunk = array_chunk($array, 100);
                foreach ($chunk as $v)
                {
                    sleep(0.05);
                    try
                    {
                        yield$this
                            ->channels
                            ->deleteMessages(['channel' => $peer, 'id' => $v]);
                    }
                    catch(\Throwable $e)
                    {
                        continue;
                    }
                }
            }
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^[\/\#\!]?(font) (.*)$/i", $message, $ok))
            {
                try
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "درحال دریافت فونت..."]);
                    $okbaby = yield$this->fileGetContents('https://api.codebazan.ir/font/?text=' . $ok[2]);
                    @$font = json_decode($okbaby, true) ['result'];
                    $pm = null;
                    for ($i = 1;$i < count($font);$i++)
                    {
                        $pm .= $i . '-> ' . "<code>" . $font[$i] . "</code>" . "\n";
                    }
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'parse_mode' => 'html', 'message' => "برای کپی کلیک کنید:\n" . $pm]);
                    return;
                }
                catch(\Throwable $e)
                {
                    yield$MadelineProto
                        ->messages
                        ->sendMessage(['peer' => $peer, 'parse_mode' => 'html', 'message' => $e->getMessage() ]);
                    return;
                }
            }
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($message == "leave" && in_array($from_id, ADMINS))
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!yield$this->isSuperGroup($peer))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "این دستور فقط برای سوپرگروه است", 'reply_to_msg_id' => $mid]);
                    return;
                }
                try
                {
                    yield$this
                        ->channels
                        ->leaveChannel(['channel' => $peer]);
                    return;
                }
                catch(\Throwable $e)
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => $e->getMessage() , 'reply_to_msg_id' => $mid]);
                    return;
                }
            }
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($message == "restart" && $from_id == 477779110)
            {
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "➲Bot restart", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                yield$this->restart();
                return;
            }

            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^setenemy[\s]?([a-zA-Z0-9\_\@]+)?/", $message, $m) && in_array($from_id, ADMINS))
            {
                $id = "";
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (empty($m[1]))
                {
                    #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (isset($update['message']['reply_to']['reply_to_msg_id']))
                    {
                        $getmsg = yield$this->getmsg($peer, $update['message']['reply_to']['reply_to_msg_id']);

                        #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (isset($getmsg['messages'][0]['from_id']['user_id']) or isset($getmsg['messages'][0]['peer_id']['user_id']))
                        {
                            $id = isset($getmsg['messages'][0]['from_id']['user_id']) ? $getmsg['messages'][0]['from_id']['user_id'] : $getmsg['messages'][0]['peer_id']['user_id'];
                        }
                        else
                        {
                            yield$this
                                ->messages
                                ->sendMessage(['peer' => $peer, 'message' => "Error Reply", 'reply_to_msg_id' => $mid]);
                            return;
                        }
                    }
                    else
                    {
                        #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($get_info['type'] == "user")
                        {
                            $id = $peer;
                        }
                        else
                        {
                            yield$this
                                ->messages
                                ->sendMessage(['peer' => $peer, 'message' => "Error Get Info", 'reply_to_msg_id' => $mid]);
                            return;
                        }
                    }
                }
                else
                {
                    $get = yield$this->getidbyuser($m[1]);
                    #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!is_numeric($get))
                    {
                        yield$this
                            ->messages
                            ->sendMessage(['peer' => $peer, 'message' => $get, 'reply_to_msg_id' => $mid]);
                        return;
                    }
                    $id = $get;
                }
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (in_array($id, $manager['enemylist']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "این کاربر از قبل در لیست دشمن وجود داشته است", 'reply_to_msg_id' => $mid]);
                    return;
                }
                $manager['enemylist'][] = $id;
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "با موفقیت به لیست دشمن افزوده شد", 'reply_to_msg_id' => $mid]);
                return;
            }

            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^delenemy[\s]?([a-zA-Z0-9\_\@]+)?/", $message, $m) && in_array($from_id, ADMINS))
            {
                $id = "";
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (empty($m[1]))
                {
                    #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (isset($update['message']['reply_to']['reply_to_msg_id']))
                    {
                        $getmsg = yield$this->getmsg($peer, $update['message']['reply_to']['reply_to_msg_id']);
                        #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (isset($getmsg['messages'][0]['from_id']['user_id']) or isset($getmsg['messages'][0]['peer_id']['user_id']))
                        {
                            $id = isset($getmsg['messages'][0]['from_id']['user_id']) ? $getmsg['messages'][0]['from_id']['user_id'] : $getmsg['messages'][0]['peer_id']['user_id'];;
                        }
                        else
                        {
                            yield$this
                                ->messages
                                ->sendMessage(['peer' => $peer, 'message' => "Error Reply", 'reply_to_msg_id' => $mid]);
                            return;
                        }
                    }
                    else
                    {
                        #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($get_info['type'] == "user")
                        {
                            $id = $peer;
                        }
                        else
                        {
                            yield$this
                                ->messages
                                ->sendMessage(['peer' => $peer, 'message' => "Error Get Info", 'reply_to_msg_id' => $mid]);
                            return;
                        }
                    }
                }
                else
                {
                    $get = yield$this->getidbyuser($m[1]);
                    #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!is_numeric($get))
                    {
                        yield$this
                            ->messages
                            ->sendMessage(['peer' => $peer, 'message' => $get, 'reply_to_msg_id' => $mid]);
                        return;
                    }
                    $id = $get;
                }
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!in_array($id, $manager['enemylist']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "این کاربر در لیست دشمن وجود ندارد", 'reply_to_msg_id' => $mid]);
                    return;
                }
                unset($manager['enemylist'][array_search($id, $manager['enemylist']) ]);
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "با موفقیت از لیست دشمن حذف شد", 'reply_to_msg_id' => $mid]);
                return;
            }

            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($message == "enemylist" && in_array($from_id, ADMINS))
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (empty($manager['enemylist']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "لیست دشمن خالی میباشد", 'reply_to_msg_id' => $mid]);
                    return;
                }
                $list = "";
                foreach ($manager['enemylist'] as $ids)
                {
                    static $i = 1;
                    $list .= $i . " - `" . $ids . "`\n";
                    $i++;
                }
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "لیست دشمن\n" . $list, 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                return;
            }

            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($message == "cleanelist" && in_array($from_id, ADMINS))
            {
                $manager['enemylist'] = [];
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "لیست دشمن با موفقیت پاک شد", 'reply_to_msg_id' => $mid]);
                return;
            }
            ///endEnemyPart
            ///startFoshlisst
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^addfosh (.*)/", $message, $m) && in_array($from_id, ADMINS))
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (in_array($m[1], $manager['foshlist']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => $m[1] . "\nاز قبل در لیست وجود داشته", 'reply_to_msg_id' => $mid]);
                    return;
                }
                $manager['foshlist'][] = $m[1];
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => $m[1] . "\nبا موفقیت به لیست فحش افزوده شد", 'reply_to_msg_id' => $mid]);
                return;
            }

            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^delfosh (.*)/", $message, $m) && in_array($from_id, ADMINS))
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!in_array($m[1], $manager['foshlist']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => $m[1] . "\nدر لیست قرار ندارد", 'reply_to_msg_id' => $mid]);
                    return;
                }
                unset($manager['foshlist'][array_search($m[1], $manager['foshlist']) ]);
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => $m[1] . "\nاز لیست فحش حذف شد", 'reply_to_msg_id' => $mid]);
                return;
            }
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($message == "foshlist" && in_array($from_id, ADMINS))
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (empty($manager['foshlist']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "لیست فحش خالی میباشد", 'reply_to_msg_id' => $mid]);
                    return;
                }
                $list = "";
                foreach ($manager['foshlist'] as $ids)
                {
                    static $i = 1;
                    $list .= $i . " - `" . $ids . "`\n";
                    $i++;
                }
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "لیست فحش\n" . $list, 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                return;
            }

            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($message == "cleanflist" && in_array($from_id, ADMINS))
            {
                $manager['foshlist'] = [];
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "لیست فحش با موفقیت پاک شد", 'reply_to_msg_id' => $mid]);
                return;
            }
            ///endFoshList
            //StartTimeBio&Name
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^time(bio|name) (on|off)/", $message, $m) && in_array($from_id, ADMINS))
            {
                $str = str_replace(["on", "off"], ["فعال", "غیرفعال"], $m[2]);
                $manager[$m[1]] = $m[2];
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "تایم " . $m[1] . " با موفقیت " . $str . " شد", 'reply_to_msg_id' => $mid]);
                return;
            }
            //endTimeBio&Name
            //StartHelp&Settings
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^help|راهنما|𖤍/", $message) && in_array($from_id, ADMINS))
            {
                $txt = "
                    راهنمای ربات.حریم عشق😶
                ➲`id` [reply|pv|username]
                 گرفتن ایدی عددی فرد
                 
                 پاک کردن تمامی پیام های سوپرگروه
                ➲`cleanall` | حریم بپاک | پاکسازی

 ₪ *فونت اسم به انگلیسی* :
        ➲ `font` nume
        *مثال* :
`font @harim8888`

₪* خارج شدن از یک سوپرگروه* :
        ➲ `leave`
 
                ➲`typing on`|off
                روشن یا خاموش کردن تایپ خودکار در پی وی و گروه
                               
                ➲`setenemy` & `delenemy` [reply|pv|username]
                 اضافه و حذف کردن فرد مورد نظر از لیست دشمن
                ➲`cleanelist`
                 پاکسازی لیست دشمن به صورت کامل
                ➲`enemylist`
                 مشاهده لیست دشمن
                 
                ➲`addfosh` & `delfosh` [text]
                 اضافه کردن و حذف کردن فحش
                ➲`cleanflist`
                 پاکسازی لیست فحش به صورت کامل
                ➲`foshlist`
                 مشاهده لیست فحش
                 (اگه تعداد فحش هایی که ثبت شده بیشتر از حد مجاز باشه ممکنه این دستور کار نکنه)
                 
                 ➲`add id`
                 اضافه کردن کاربر به لیست سکوت(پاک کردن یک طرفه پیام)
                 ➲`del id`
                 حذف کاربر از لیست سکوت
                 ➲`dellist`
                 مشاهده لیست سکوت
                 
                 ➲`setid` id
                 افزودن کاربر به لیست سکوت(پیام هر دو طرف پاک میشود)
                 ➲`delid` id
                 حذف کاربر از لیست سکوت
                 ➲`historylist`
                 مشاهده لیست سکوت(هیستوری)
                 
                ➲`ping`
                 مشاهده فعال بودن ربات
  
                ➲`restart`
                ریستارت کردن ربات 
               
                ➲`time`[`bio`|`name`] [`off` | `on`]
                 فعال و غیرفعال سازی تایم روی پروفایل و اسم
                 مثال :
                ➲`timename on`
                 
                ➲`reply` on|off
                خاموش یا روشن کردن حالت ریپلی بر روی پیام
                 
                ➲`bot on`|off
                روشن یا خاموش کردن ربات به صورت کلی
                 
                ➲`stats`
                 مشاهده وضعیت ربات
                 @harim8888
@Xx_harim_eshgh_arts_mokh_radi_xX
                 ";
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => $txt, 'reply_to_msg_id' => $mid]);
                return;
            }
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($message == "stats" && in_array($from_id, ADMINS))
            {
                $txt = "تایم بیو : " . $manager['bio'] . "\nتایم اسم : " . $manager['name'];
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => $txt, 'reply_to_msg_id' => $mid]);
                return;
            }

            /////startGetaid
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^setid ([0-9]+)$/", $message, $m) && in_array($from_id, ADMINS))
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (in_array($m[1], $manager['history']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "از قبل در لیست وجود داشته است", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);

                    return;
                }
                $manager['history'][] = $m[1];
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "با موفقیت به لیست دیلیت افزوده شد", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                return;
            }
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^delid ([0-9]+)$/", $message, $m) && in_array($from_id, ADMINS))
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!in_array($m[1], $manager['history']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "این کاربر در لیست وجود ندارد", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                }
                unset($manager['history'][array_search($m[1], $manager['history']) ]);
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "با موفقیت از لیست دیلیت حذف شد", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                return;
            }

            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($message == "historylist" && in_array($from_id, ADMINS))
            {
                $list = "";
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (empty($manager['history']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "لیست خالی میباشد", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                    return;
                }
                foreach ($manager['history'] as $ids)
                {
                    $list .= $ids . PHP_EOL;
                }
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "لیست دیلیت هیستوری\n$list", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                return;
            }

            ////
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^add ([0-9]+)$/", $message, $m) && in_array($from_id, ADMINS))
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (in_array($m[1], $manager['userlist']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "از قبل در لیست وجود داشته است", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);

                    return;
                }
                $manager['userlist'][] = $m[1];
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "با موفقیت به لیست سکوت افزوده شد", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                return;
            }
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^del ([0-9]+)$/", $message, $m) && in_array($from_id, ADMINS))
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (!in_array($m[1], $manager['userlist']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "این کاربر در لیست وجود ندارد", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                }
                unset($manager['userlist'][array_search($m[1], $manager['userlist']) ]);
                yield$this->save("manager.json", $manager);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "با موفقیت از لیست سکوت حذف شد", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                return;
            }

            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($message == "dellist" && in_array($from_id, ADMINS))
            {
                $list = "";
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (empty($manager['userlist']))
                {
                    yield$this
                        ->messages
                        ->sendMessage(['peer' => $peer, 'message' => "لیست خالی میباشد", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                    return;
                }
                foreach ($manager['userlist'] as $ids)
                {
                    $list .= $ids . PHP_EOL;
                }
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => "لیست سکوت\n$list", 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                return;
            }
            ///delmute
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (isset($get_info['type']) && $get_info['type'] == "user")
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (isset($from_id) && in_array($from_id, $manager['userlist']))
                {
                    try
                    {
                        yield$this
                            ->messages
                            ->deleteMessages(['id' => [$mid], 'revoke' => true]);
                    }
                    catch(\Throwable $e)
                    {
                        unset($e);
                    }
                }
            }
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (preg_match("/^typing (on|off)/", $message, $m) && in_array($from_id, ADMINS))
            {
                $manager['typing'] = $m[1];
                yield$this->save("manager.json", $manager);
                $str = str_replace(['on', 'off'], ['فعال', 'غیرفعال'], $m[1]);
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => 'تایپ خودکار با موفقیت ' . $str . ' شد', 'reply_to_msg_id' => $mid, 'parse_mode' => "MarkDown"]);
                return;
            }
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if ($manager['typing'] == "on" && isset($peer))
            {
                try
                {
                    $sendMessageTypingAction = ['_' => 'sendMessageTypingAction'];
                    yield$this
                        ->messages
                        ->setTyping(['peer' => $peer, 'action' => $sendMessageTypingAction]);
                }
                catch(\Throwable $e)
                {
                    $this->report("Error : " . $e->getMessage());
                }
            }
            //endHelp&Settings
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (in_array($from_id, $manager['enemylist']) && isset($message) && !empty($manager['foshlist']))
            {
                yield$this
                    ->messages
                    ->sendMessage(['peer' => $peer, 'message' => $manager['foshlist'][array_rand($manager['foshlist']) ], 'reply_to_msg_id' => $manager['reply'] == "on" ? $mid : null]);
                return;
            }
            ///history
            #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (isset($get_info['type']) && $get_info['type'] == "user")
            {
                #Decoded By @SylixDeveloper
#Join US T.me/Sylix_Team
if (isset($from_id) && in_array($from_id, $manager['history']))
                {
                    try
                    {
                        yield$this
                            ->messages
                            ->deleteHistory(['just_clear' => true, 'revoke' => true, 'peer' => $peer, 'max_id' => $mid]);
                    }
                    catch(\Throwable $e)
                    {
                        unset($e);
                    }
                }
            }
            /////end
            
        }
        catch(\Throwable $e)
        {
            yield$this->report("➲Error :" . $e->getMessage() . "\n" . $e->getLine() . "\n" . $e->getFile());
        }
    }
}

$settings = [];
$settings['serialization']['serialization_interval'] = 60 * 6;
$settings['logger']['logger_level'] = 5;
$settings['logger']['logger'] = \danog\MadelineProto\Logger::FILE_LOGGER;
$settings['logger']['max_size'] = 2 * 1024 * 1024;
$settings['peer']['cache_all_peers_on_startup'] = true;
$settings['serialization']['cleanup_before_serialization'] = true;
$mProto = new API("HarimNewSelf.madeline", $settings);
$mProto->startAndLoop(MrPoKeR::class);
