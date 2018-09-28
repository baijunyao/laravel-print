<?php

use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Illuminate\Support\Collection;
use App\Models\Base;
use Maatwebsite\Excel\Readers\LaravelExcelReader;

if (!function_exists('p')) {
    // 传递数据以易于阅读的样式格式化后输出
    function p($data, $toArray = true)
    {
        if (app()->runningInConsole()) {
            return dump($data);
        }

        VarDumper::setHandler(function ($var) use($toArray) {
            $cloner = new VarCloner();
            $dumper = new HtmlDumper();
            $hint = '';

            // 需要转成数组的类
            $collect = [
                Collection::class,
                Base::class,
                LaravelExcelReader::class
            ];

            if (is_object($var) && $toArray) {
                $className = get_class($var);
                $parentClassName = get_parent_class($var);
                if (in_array($className, $collect) || in_array($parentClassName, $collect)) {
                    // 把集合转成数组形式查看
                    $hint = '<pre>下面是一个使用->toArray()方法转成的数组</pre>';
                    $var = $var->toArray();
                }
            }

            $dumper->setStyles([
                'default' => 'background-color:#18171B; color:#FF8400; line-height:1.2em; font-size:14px; font-family:Microsoft Yahei; word-wrap: break-word; white-space: pre-wrap; position:relative; z-index:9999; word-break: break-all',
                'num' => 'font-weight:bold; color:#1299DA',
                'const' => 'font-weight:bold',
                'str' => 'color:#56DB3A; font-family:Microsoft Yahei;',
                'note' => 'color:#1299DA; font-family:Microsoft Yahei;',
                'ref' => 'color:#A0A0A0',
                'public' => 'color:#FFFFFF',
                'protected' => 'color:#FFFFFF',
                'private' => 'color:#FFFFFF',
                'meta' => 'color:#B729D9',
                'key' => 'color:#56DB3A; font-family:Microsoft Yahei',
                'index' => 'color:#1299DA',
                'ellipsis' => 'color:#FF8400',
            ]);
            $dumper->setDisplayOptions([
                    'maxDepth' => 3,
                ]);
            $dumper->setDumpBoundaries(
                $hint.'</pre><pre class=sf-dump id=%s data-indent-pad="%s">',
                '</pre><script>Sfdump(%s)</script>'
            );
            $dumper->dump($cloner->cloneVar($var));
        });
        // 设置response为500以处理ajax下无法预览结构的问题
        http_response_code(500);
        dump($data);
    }
}

if (!function_exists('pd')) {
    // 传递数据以易于阅读的样式格式化后输出并die掉
    function pd($data, $toArray = true)
    {
        p($data, $toArray);die;
    }
}