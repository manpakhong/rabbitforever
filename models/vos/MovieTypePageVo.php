<?php
class MovieTypePageVo extends Vo{
    const DATA_CLASS_NAME_MOVIE_TYPE_VO= DATA_CLASS_NAME_MOVIE_TYPE_VO;
    public $movieTypeVo;
    public function __toString(){
        $objectString=NULL;
        $count = 0;
        foreach($this as $key => $value){
            if($count > 0){
                $objString = $objectString . ',';
            }
            $objectString = $objectString . '$key => $value ';
            $count = $count + 1;
        }
        return $objectString;
    }
}
?>