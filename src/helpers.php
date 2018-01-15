<?php

if (!function_exists('p')) {
    // 传递数据以易于阅读的样式格式化后输出
    function p($data, $toArray = true)
    {
        if (is_object($data) && in_array(get_parent_class($data), ['Illuminate\Support\Collection', 'App\Models\Base']) && $toArray) {
            $data = $data->toArray();
        }

        if (is_object($data) && in_array(get_class($data), ['Maatwebsite\Excel\Readers\LaravelExcelReader']) && $toArray) {
            $data = $data->toArray();
        }

        if (is_object($data) && in_array(get_class($data), ['Illuminate\Database\Eloquent\Builder'])) {
            $data = $data->toArray();
        }
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