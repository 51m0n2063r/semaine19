<?php       
    class StrUtils{

        private $str; 
        public function __construct($value = "Hello world"){
            $this->str = $value;
        }

        public function bold(){
            return "<strong>".$this->str."</strong>"; 
        }
        public function italic(){
            return "<i>".$this->str."</i>";
        }
        public function underline(){
            return "<u>".$this->str."</u>";
        }
        public function capitalize(){
            return "<big>".$this->str."</big>";
        }
        public function uglify(){
          $init = $this->str;
         $this->str = $this->bold();
         $this->str = $this->italic();
         $this->str = $this->underline();
         $this->str = $this->capitalize();
         $result = $this->str;
         $this->str = $init;

         return $result;
        }  


    }
   
?>