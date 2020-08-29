# component-creater

```
composer create-project hewo/common
```

### Enum使用

定义枚举类所需

+ 必须
   + 继承 ```\Hewo\Common\Enum\AbstractEnum``` 类
   + 使用 ```\Hyperf\Constants\Annotation\Constants ``` 注解
   + 定义常量, 常量名必须大写
+ 可选
   + 在常量上添加注解
   + 在添加lei


示例枚举类：

```
<?php
namespace App\Enum;

use Hewo\Common\Enum\AbstractEnum;
use Hyperf\Constants\Annotation\Constants;

/**
 * Class ResultCode
 * @package App\Domain\Authorization\Enum
 * @Constants 使用hyperf框架constant组件注解搜集注解内容
 * @method string message() 获取常量message注解值,通过类注释辅助IDE识别开发
 * @method int value() 获取常量值
 * @method static ResultCode success() 
 * @method static ResultCode failed()
 */
class ResultCode extends AbstractEnum
{
    /**
     * @Message("成功")
     */
    public const SUCCESS = 1;
}
```

获取枚举实例：

```
ResultCode::success();
```

获取枚举message注解值
```
$instance = ResultCode::success(); // 获取注解实例
$message = $instance->message(); // result:"成功" 获取success枚举实例的Message注解
```

