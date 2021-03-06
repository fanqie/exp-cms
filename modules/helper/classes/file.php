<?php

/* * *
 * 控制器中action的工具包
 */

class File extends Kohana_File {
    /*     * ***
     * 判断文件夹路径是否存在 如果不存在则创建缺失路径
     * @$path <string> 文件路径 每层路径使用“\”来分隔
     * @return <string> 返回创建完成的路径
     */

    public static function path_mkdirs($path) {
        $file_boxs = explode("/", $path);
        // echo
        $path = "";
        foreach ($file_boxs as $key => $file_box) {
            //过滤空路径
            if ($file_box == "/") {
                continue;
            } else {
                $path = $path . $file_box . "\\";
                $file_boxs[$key] = substr($path, 0, strlen($path) - 1);
            }
        }
        $exists_flag = array();
      
        $count = 0;
        for ($i = count($file_boxs) - 1; $i >= 0; $i--) {
            if (!file_exists($file_boxs[$i])) {
                $exists_flag[$count++] = $file_boxs[$i];
            } else {
                break;
            }
        }

        for ($i = (count($exists_flag) - 1); $i >= 0; $i--) {
            if (strpos($exists_flag[$i], ".") != 0) {
                $config_file = substr($exists_flag[$i], 0, strlen($exists_flag[$i]) - 1);
                $fp = fopen($exists_flag[$i], "a+");
                fclose($fp);
            } else {
                mkdir($exists_flag[$i]);
            }
        }
        return $path;
    }

    /**     * ****
     * 创建或者增加内容
     * @param $file_path string 文件所处的全路径
     * @param $content string 需要追加的内容
     * @param $WRITER_TYPE 写入类型 请参照php核心 fopen参数$mode的说明
     * @return 
     */
    public static function create_or_add($file_path, $content=NULL,$WRITER_TYPE="a+") {
        if($content==NULL){//如果没有内容则不在尝试创建或写入文件
            return;
        }
        $file_path = File::path_mkdirs($file_path);
        $file_path = str_replace("/", "\\", $file_path);
        $file_path = substr($file_path, 0, strlen($file_path) - 1);
        $fp = fopen($file_path, $WRITER_TYPE);
        $content = $content . " ;\n";
        fwrite($fp, $content);
        fclose($fp);
    }

}

?>
