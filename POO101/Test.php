<?php
    require "./StrUtils.php";

    class Test extends \PHPUnit\Framework\TestCase {

         public function testItalic(){
            $this->assertEquals($str->italic(), "<i>". $str->getStr() ."</i>");
        }
         public function testBold(){
                $this->assertEquals($mystr->bold(), "<strong>". $mystr->getStr() ."</strong>");
        }
        public function testUnderline(){
            $this->assertEquals($mystr->underline(), "<i>". $mystr->getStr() ."</i>");
        } 
        public function testCapitalize(){
            $this->assertEquals($mystr->capitalize(), "<big>". $mystr->getStr() ."</big>");
        }       
}

