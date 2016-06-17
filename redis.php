<?php

hash(哈希表)
HMSET：
HMSET key field value [field value ...]

同时将多个 field-value (域-值)对设置到哈希表 key 中。

此命令会覆盖哈希表中已存在的域。

如果 key 不存在，一个空哈希表被创建并执行 HMSET 操作。

可用版本：
>= 2.0.0
时间复杂度：
O(N)， N 为 field-value 对的数量。
返回值：
如果命令执行成功，返回 OK 。
当 key 不是哈希表(hash)类型时，返回一个错误。
redis> HMSET website google www.google.com yahoo www.yahoo.com
OK

redis> HGET website google
"www.google.com"

redis> HGET website yahoo
"www.yahoo.com"

结尾语：有点类似于对象，一个键值可以存多个数据 


HGETALL
HGETALL key

返回哈希表 key 中，所有的域和值。

在返回值里，紧跟每个域名(field name)之后是域的值(value)，所以返回值的长度是哈希表大小的两倍。

可用版本：
>= 2.0.0
时间复杂度：
O(N)， N 为哈希表的大小。
返回值：
以列表形式返回哈希表的域和域的值。
若 key 不存在，返回空列表。
redis> HSET people jack "Jack Sparrow"
(integer) 1

redis> HSET people gump "Forrest Gump"
(integer) 1

redis> HGETALL people
1) "jack"          # 域
2) "Jack Sparrow"  # 值
3) "gump"
4) "Forrest Gump"


HKEYS
HKEYS key

返回哈希表 key 中的所有域。

可用版本：
>= 2.0.0
时间复杂度：
O(N)， N 为哈希表的大小。
返回值：
一个包含哈希表中所有域的表。
当 key 不存在时，返回一个空表。
# 哈希表非空

redis> HMSET website google www.google.com yahoo www.yahoo.com
OK

redis> HKEYS website
1) "google"
2) "yahoo"


# 空哈希表/key不存在

redis> EXISTS fake_key
(integer) 0

redis> HKEYS fake_key
(empty list or set)