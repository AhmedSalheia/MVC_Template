<?php

namespace MVC\lib;


class Language
{
    private $_dictionary = [];

    public function load($path,$silance=false){
        $defaultlanguage = DEFAULT_LANG;
        if(isset($_SESSION['lang'])){
            $defaultlanguage = $_SESSION['lang'];
        }
        $langpath = LANG_PATH . $defaultlanguage . DS . str_replace('.', DS, $path) . '.lang.php';

        if (file_exists($langpath)){
            require_once $langpath;

            if (is_array($_) && !empty($_)){
                foreach ($_ as $key => $value){
                    $this->_dictionary[$key] = $value;
                }
            }
        }else if ($silance === false) trigger_error('Sorry The Language File Does Not Exist',E_USER_WARNING);
    }

    public function get(){
        return $this->_dictionary;
    }

    public function unlinkFile($path)
    {
        foreach (SUPPORTED_LANGS as $lang)
        {
            $file = LANG_PATH . $lang . DS . str_replace('.', DS, $path) . '.lang.php';

            if (file_exists($file))
            {
                unlink($file);
            }
        }
    }

    public function addFile($path,$copyFrom)
    {
        foreach (SUPPORTED_LANGS as $lang)
        {
            $tempPath = LANG_PATH . $lang . DS . str_replace('.', DS, $path) . '.lang.php';
            $tempCopyFrom = LANG_PATH . $lang . DS . str_replace('.', DS, $copyFrom) . '.lang.php';

            file_put_contents($tempPath,file_get_contents($tempCopyFrom));
        }
    }

    public function getLangFiles($path)
    {
        $arr = [];

        foreach (SUPPORTED_LANGS as $language)
        {
            $lang = new self();
            $_SESSION['lang'] = $language;
            $lang->load($path,true);

            $arr[$language] = $lang->get();
        }

        return $arr;
    }

    public function updateLangFiles($path,array $arr)
    {
        foreach (SUPPORTED_LANGS as $lang)
        {
            $tempPath = LANG_PATH . $lang . DS . str_replace('.', DS, $path) . '.lang.php';

            if (!file_exists($tempPath) || !isset($arr[$lang])) continue;

            $content = "<?php\n\n";
            foreach ($arr[$lang] as $key => $value)
            {
                $content .= '$_[\''.$key.'\']="'.$value.'";'."\n";
            }
            $fp = fopen($tempPath,'wb');
            fwrite($fp,$content);
            fclose($fp);
        }
    }
}
