<?php


namespace QEEMA\lib\traits;

trait Helper
{
    use InputFilter;
    use JsonFuncions;
    use Auth;
    use Encription;
    use Mailing;

    public function redirect($page){
        session_write_close();
        header('Location: '.$page);
        exit();
    }

    public function fromBin($int)
    {
        $count = 0;
        $decr = 0;
        while($int !== 0)
        {
            $num = $int%10;
            $int = (int)floor($int / 10);

            $decr += $num * 2**$count++;
        }

        return $decr;
    }

    public function toBin($int)
    {
        $decr = 0;
        while($int !== 0)
        {
            $num = $int%2;
            $int = (int)floor($int / 2);

            $decr = ($decr*10) + $num;
        }

        return $decr.'';
    }

    public function randText($num)
    {
        return str_split(str_shuffle('absdefghijklmnopqrstuvwxyz1234567890'),$num)[0];
    }

    public static function randName($num)
    {
        return str_split(str_shuffle('absdefghijklmnopqrstuvwxyz1234567890'),$num)[0];
    }

    public function extractVideoId($str)
    {
        if (preg_match('/[a-z0-9_-]{11}/i', $str, $matches)) {
            return $matches[0];
        }

        return false;
    }
}
