<?php

namespace Events;

use Workerman\Connection\ConnectionInterface;
use Workerman\Worker;

/**
 * workerman 写法事件处理
 * Class WorkerManEvents
 * @package Events
 */
class WorkerManEvents
{
    /**
     * worker进程启动执行事件
     * @param Worker $worker
     */
    public static function onWorkerStart(Worker $worker)
    {
        // 避免在此处做死循环
        // 会导致整个进程卡死在这里
        // 无法进程后续的业务处理
        // 其他的基本一样
        // 有需要可以单独写个文件跑死循环业务
    }

    /**
     * worker进程结束执行事件
     * @param Worker $worker worker对象
     */
    public static function onWorkerStop(Worker $worker)
    {
    }

    /**
     * worker进程重启事件
     * @param Worker $worker
     */
    public static function onWorkerReload(Worker $worker)
    {
    }

    /**
     * 当客户端连接上gateway进程时(TCP三次握手完毕时)触发的回调函数。
     * @param ConnectionInterface $connection 客户端链接实例对象
     */
    public static function onConnect(ConnectionInterface $connection)
    {
        $connection->send('链接成功');
    }

    /**
     * 服务端消息接收事件
     * @param ConnectionInterface $connection 用户链接对象
     * @param string $data 用户发送数据
     */
    public static function onMessage(ConnectionInterface $connection, string $data)
    {
        $connection->send('客户端数据: ' . $data);
    }

    /**
     * 客户端链接关闭事件 极端情况下不会触发 请维护好心跳
     * @param ConnectionInterface $connection 客户端链接实例
     */
    public static function onClose(ConnectionInterface $connection)
    {
        // 此处在 服务端关闭客户端链接的时候也会触发
    }

    /**
     * 错处无法 客户端
     * @param ConnectionInterface $connection 客户端链接
     * @param int $code 错误代码
     * @param string $message 错误信息
     */
    public static function onError(ConnectionInterface $connection, $code, $message)
    {
    }

    /**
     * 发送数据缓冲区已满时触发
     * @param ConnectionInterface $connection 客户端链接
     */
    public static function onBufferFull(ConnectionInterface $connection)
    {
    }

    /**
     * 缓冲区数据发送完时触发
     * @param ConnectionInterface $connection 客户端链接
     */
    public static function onBufferDrain(ConnectionInterface $connection)
    {
    }
}