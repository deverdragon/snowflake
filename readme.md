# qianlong hyperf mongodb pool

```
composer require qianlong/snowflake
```


# 使用案例

引入类
**Qianlong\SnowFlake\SnowFlake** 
```php
use Qianlong\SnowFlake\SnowFlake;
echo SnowFlake::createId();
```

#### **tips:** 
EPOCH 开始时间可自行修改为比当前晚的时间，一经启用请勿再修改
