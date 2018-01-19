<?php

namespace Baijunyao\LaravelPrint;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;

class PrintServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        VarDumper::setHandler(function ($var) use($toArray) {
            $cloner = new VarCloner();
            $dumper = 'cli' === PHP_SAPI ? new CliDumper() : new HtmlDumper();
            $hint = '';

            if (is_object($var) && in_array(get_parent_class($var), ['Illuminate\Support\Collection', 'App\Models\Base'])) {
                // 把一些集合转成数组形式来查看
                $hint = '<pre>下面是一个使用->toArray()方法转成的数组</pre>';
                $var = $var->toArray();
            }

            if (is_object($var) && in_array(get_class($var), ['Maatwebsite\Excel\Readers\LaravelExcelReader'])) {
                // 把一些集合转成数组形式来查看
                $var = $var->toArray();
            }

            $dumper->setStyles([
                'default' => 'background-color:#18171B; color:#FF8400; line-height:1.2em; font:13px Menlo, Monaco, Consolas, monospace; word-wrap: break-word; white-space: pre-wrap; position:relative; z-index:99999; word-break: break-all',
                'num' => 'font-weight:bold; color:#1299DA',
                'const' => 'font-weight:bold',
                'str' => 'font-weight:bold; color:#56DB3A',
                'note' => 'color:#1299DA',
                'ref' => 'color:#A0A0A0',
                'public' => 'color:#FFFFFF',
                'protected' => 'color:#FFFFFF',
                'private' => 'color:#FFFFFF',
                'meta' => 'color:#B729D9',
                'key' => 'color:#56DB3A',
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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
