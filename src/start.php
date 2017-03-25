<?php

/*
 * This file is part of PHP CS Fixer.
 * (c) kcloze <pei.greet@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

date_default_timezone_set('Asia/Shanghai');

require __DIR__ . '/../vendor/autoload.php';

$config = [

    'logPath'   => __DIR__ . '/../log',
    'debug'     => true,
    'params'    => [
        //图灵机器人key
        'tulingKey'=> '0c75d147ffcd4191a237649f838e4f45',
        'nickName' => 'web开发',
        //管理员微信号
        'adminAlias'=> 'kcloze',
        //暗号
        'cipher'    => '666',
    ],

];

//启动
$process = new Kcloze\Bot\Process();
$process->start($config);
