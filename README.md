
## 安装

### 环境要求

* PHP >= 7.0
* swoole >= 1.8.9

### 安装


1、composer

```
composer require kcloze/bot
```

2、git

```
git clone https://github.com/HanSon/vbot.git
cd vbot
composer install
```

然后执行``` php src/start.php ``` 

PS:运行后二维码将保存于设置的缓存目录，命名为qr.png，控制台也会显示二维码，扫描即可（linux用户请确保已经打开ANSI COLOR）

*警告！执行前请先查看`src/Robot.php`的代码，注释掉你认为不需要的代码，避免对其他人好友造成困扰*

**请在terminal运行！请在terminal运行！请在terminal运行！**

## 体验

<img src="https://ws2.sinaimg.cn/large/685b97a1gy1fdordpa0cgj20e80e811z.jpg" height="320">

扫码后，验证输入“上山打老虎”即可自动加为好友并且拉入vbot群。

vbot并非24小时执行，有时会因为开发调试等原因暂停功能。如果碰巧遇到关闭情况，可加Q群 492548647 了解开放时间。执行后发送“拉我”即可自动邀请进群。

vbot示例源码为 https://github.com/HanSon/vbot/blob/master/example/index.php


## 文档

详细文档在[wiki](https://github.com/HanSon/vbot/wiki)中

### 小DEMO

[红包提醒](https://github.com/HanSon/vbot/blob/master/example/hongbao.php)

[轰炸消息到某群名](https://github.com/HanSon/vbot/blob/master/example/group.php)

[消息转发](https://github.com/HanSon/vbot/blob/master/example/forward.php)

[自定义处理器](https://github.com/HanSon/vbot/blob/master/example/custom.php)

[一键拜年](https://github.com/HanSon/vbot/blob/master/example/bainian.php)

[聊天操作](https://github.com/HanSon/vbot/blob/master/example/contact.php)


### 基本使用

```
// 图灵API自动回复
require_once __DIR__ . './../vendor/autoload.php';

use Hanson\Vbot\Foundation\Vbot;
use Hanson\Vbot\Message\Entity\Message;
use Hanson\Vbot\Message\Entity\Text;

$robot = new Vbot([
    'tmp' => '/path/to/tmp/', # 用于生成登录二维码以及文件保存
    'debug' => true # 用于是否输出用户组的json
]);

// 图灵自动回复
function reply($str){
    return http()->post('http://www.tuling123.com/openapi/api', [
        'key' => '1dce02aef026258eff69635a06b0ab7d',
        'info' => $str
    ], true)['text'];

}

$robot->server->setMessageHandler(function($message){
    // 文字信息
    if ($message instanceof Text) {
        /** @var $message Text */
        // 联系人自动回复
        if ($message->fromType === 'Contact') {
            return reply($message->content);
            // 群组@我回复
        } elseif ($message->fromType === 'Group' && $message->isAt) {
            return reply($message->content);
        }
    }
});

$robot->server->run();

```

## to do list

- [x] 消息处理
  - [x] 文字
  - [x] 图片
  - [x] 语音
  - [x] 位置
  - [x] 视频
  - [x] 撤回
  - [x] 表情
  - [x] 红包
  - [x] 转账
  - [x] 名片
  - [x] 好友验证
  - [x] 分享
  - [x] 公众号推送
  - [x] 新好友
  - [x] 群变动（增加成员，移除成员，更改群名）
  - [x] 小程序
  
- [x] 消息存储
  - [x] 语音
  - [x] 图片
  - [x] 视频
  - [x] 表情

- [x] 消息发送
  - [x] 发送文字
  - [x] 发送图片
  - [x] 发送表情
  - [x] 发送视频

- [x] 群操作
  - [x] 创建群
  - [x] 把某人踢出群
  - [x] 邀请好友加入群
  - [x] 修改群名称
  
- [x] 好友操作
  - [x] 给好友添加备注
  - [x] 通过好友验证

- [x] 聊天窗口操作
  - [x] 置顶聊天会话
  - [x] 取消聊天会话指定
  
- [ ] 命令行操作信息发送

## to do list
- 文件下载偶尔失败
- 登录cookie免扫码
- 队列监听

## 参考项目

[hanson/vbot](https://github.com/HanSon/vbot)


## 感谢

[hanson/vbot](https://github.com/HanSon/vbot)

