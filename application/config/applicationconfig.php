<?php

defined('SYSPATH') or die('No direct script access.');
return array(
    "cache" => array(
        "driver" => 'apc', //选择使用何种缓存组件
        "is_open" => TRUE, //是否开启缓存 TRUE开启|FALSE关闭
    ),
    "up_img" => array(//上传图片设置
        "dir" => "C://", //图片上传的总路径
        "max_size" => 1048, //图片大小最大值 单位kb
        "max_width" => 1048, //图片宽度最大值 单位px
        "max_height" => 768, //图片高度最大值 单位px
        "type" => "jpg,jpeg,png,bmp,gif", //允许上传的图片类型，多个用“,”分隔
        "watermark_path" => "D:\project\exp-cms\assets\admin\img\logo.png", //图片水印路径
        "watermark_position" => 9, //图片水印位置 1上左 |2上中|3上右|4中左 |5中中|6中右|7下左 |8下中|9下右
        "watermark_opacity" => 70, //图片水印透明度
        "watermark_status" => TRUE, //是否使用图片水印 TRUE使用 FALSE不使用
        "watermark_border_space" => 10, //水印与边框距离 单位：px
    ),
    "up_file" => array(//上传文件设置
        "dir" => "C://", //文件上传的总路径
        "max_size" => 2048, //图片上传的总路径 单位kb
        "type" => "jpg,jpeg,png,bmp,gif,rar,txt,doc,pdf,xml,7zip,zip,", //允许上传的文件类型，多个用“,”分隔
    ),
    "user"=>array(
      "default_avatar" =>"",//默认用户头像路径
    ),
);
?>