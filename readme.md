### 介绍
laravel 中有个 `dump` 可以用来打印数据；  
![](https://baijunyao.com/uploads/article/20180513/5af85d1c7c9c7.jpg)  
但是也存在这很多的不便利；  
咱一条一条来吐槽哈；  
撒气爱子：  
1. 打印出来的数据默认是折叠的；
![](https://baijunyao.com/uploads/article/20180513/5af85d2738091.jpg)  
我打印数据果断是要看具体内容的；  
然鹅这还需要我们手动层层点开；  
想想也是心累；  
2. 打印模型时展示了太多的属性；  
![](https://baijunyao.com/uploads/article/20180513/5af85d30bec33.jpg)  
当我们一层一层的剥开它的心后；
终于才能在 `attributes` 中找到我们想要的数据；  
那么多的属性堆在这；  
给的再多不如懂我；  
看看也是眼累；   
3. chrome 调试 ajax 的时候不能正常展示打印的样式；  

于是 laravel-print 横空出世；  
无图言* ；  
![](https://baijunyao.com/uploads/article/20180513/5af85d39b420a.jpg)  
默认以数组的形式展示数据；  
默认展开数据；  
调试面板下的 Network 中的 Preview 完美展示；  

### 安装使用
好了下面进入安装使用环节；
```bash
composer require baijunyao/laravel-print
```
需要打印的时候使用 `p($data)` 代替 `dump($data)`;  
使用 `pd($data)` 代替 `dd($data)`;  

### 文章
[开源项目系列之laravel-print以简洁的方式打印数据](https://baijunyao.com/article/152)

## 链接
- 博客：https://baijunyao.com  
- github：https://github.com/baijunyao/laravel-print  
- gitee：https://gitee.com/baijunyao/laravel-print  
