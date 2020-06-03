<?php

namespace Events;

use ReflectionClass;
use ReflectionException;
use ReflectionProperty;
use Workerman\Worker;

/**
 * 事件绑定
 * Class EventBind
 * @package Events
 */
class EventBind
{
    /**
     * 事件绑定
     * @param Worker $worker Worker对象
     * @throws ReflectionException
     */
    public static function eventBind(Worker $worker)
    {
        // 获取反射对象
        $mark = new ReflectionClass(Worker::class);

        // 获取类所有属性
        $properties = $mark->getProperties(ReflectionProperty::IS_PUBLIC);

        // 循环执行事件回调绑定
        foreach ($properties as $property) {
            // 判断事件类是否存在相应方法
            if (method_exists(WorkerManEvents::class, $property->getName())) {
                // 对象事件绑定至对应回调
                $worker->{$property->getName()} = [WorkerManEvents::class, $property->getName()];
            }
        }
    }
}