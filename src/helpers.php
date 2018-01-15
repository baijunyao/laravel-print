<?php

if (!function_exists('p')) {
    // 传递数据以易于阅读的样式格式化后输出
    function p($data, $toArray = true)
    {
        $hint = '';
        if (is_object($data) && in_array(get_parent_class($data), ['Illuminate\Support\Collection', 'App\Models\Base']) && $toArray) {
            $hint = '<div style="padding-top: 40px;font-size: 14px;color: #999;">下面一个用 ->toArray() 转成数组的 Collection</div>';
            $data = $data->toArray();
        }

        if (is_object($data) && in_array(get_class($data), ['Maatwebsite\Excel\Readers\LaravelExcelReader']) && $toArray) {
            $hint = '<div style="padding-top: 40px;font-size: 14px;color: #999;">下面一个用 ->toArray() 转成数组的 Collection</div>';
            $data = $data->toArray();
        }

        if (is_object($data) && in_array(get_class($data), ['Illuminate\Database\Eloquent\Builder'])) {
            $hint = '<div style="padding-top: 40px;font-size: 14px;color: #999;">下面一个用 ->toArray() 转成数组的 Collection</div>';
            $data = $data->toArray();
        }

        http_response_code(500);
        echo $hint;
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