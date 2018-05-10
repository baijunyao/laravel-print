# laravel-print

### 为什么使用
在 laravel 中使用 `dump` 函数来打印数据是很强大的；    
但是也存在这很多的不便利；  
撒气爱子：  
1. 打印出来的数据默认是折叠的；
2. 打印模型时展示了太多的属性；
3. 新版 chrome 调试 ajax 的时候不能正常展示打印的样式；  

于是 laravel-print 横空出世；  
无图言* ；  
直接来两张图对比下；  

dump：  
![dump](https://lccdn.phphub.org/uploads/images/201805/10/5820/ceFKmi0T3I.png?imageView2/2/w/1240/h/0)

laravel-print：  
![laravel-print](https://lccdn.phphub.org/uploads/images/201805/10/5820/Bvt8DSNfUs.png?imageView2/2/w/1240/h/0)

### 安装使用
```bash
composer require baijunyao/laravel-print
```

需要打印的时候使用 `p($data)` 代替 `dump($data)`;  
使用 `pd($data)` 代替 `dd($data)`;  
为了回答问题先凑个简单的说明更详细的等我抽空写篇文章；
