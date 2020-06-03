<?php

namespace Events;

use GatewayWorker\BusinessWorker;
use GatewayWorker\Lib\Gateway;

/**
 * 事件处理程序
 * Class Events
 * @package Events
 */
class Events
{
    /**
     * worker进程启动执行事件 有多个worker进程就会执行多少次
     * @param BusinessWorker $businessWorker
     */
    public static function onWorkerStart(BusinessWorker $businessWorker)
    {
    }

    /**
     * worker进程结束执行事件
     */
    public static function onWorkerStop()
    {
    }

    /**
     * 当客户端连接上gateway进程时(TCP三次握手完毕时)触发的回调函数。
     * @param string $client_id 客户端唯一标识
     */
    public static function onConnect(string $client_id)
    {
    }

    /**
     * 客户端发来信息
     * @param string $client_id 客户端唯一标识
     * @param string $data 客户端发送数据
     * @throws \Exception
     */
    public static function onMessage(string $client_id, string $data)
    {
        Gateway::sendToAll('滑稽啊');
    }

    /**
     * 客户端链接关闭事件 极端情况下不会触发 请维护好心跳
     * @param string $client_id
     */
    public static function onClose(string $client_id)
    {
    }
}