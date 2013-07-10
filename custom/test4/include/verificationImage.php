<?php  
/** 
*  Verification Code Class 
* 
*  Used to anti-spam base at PHP GD Lib 
*  @author Eric,<wangyingei@yeah.net> 
*  @version 1.0 
*  @copyright  Ereesoft Inc. 2009 
*  @update 2009-05-14 22:32:05 
*  @example 
*      session_start(); 
*      $vcode = new Vcode(); 
*      $vcode->setLength(5); 
*      $_SESSION['vcode'] = $vcode->paint();// To be encrypted by MD5 
*/
ini_set('display_error','off');  
class Vcode{  
    /** 
     *  @var $width The width of the image,auto Calculated ��֤ͼƬ��ȣ������Զ����� 
     */  
    private $width;  
    /** 
     *  @var $height Image height ��֤ͼƬ�߶� 
     */  
    private $height;  
    /** 
     *  @var $length Verification Code lenght ��֤�볤�� 
     */  
    private $length;  
    /** 
     *  @var $bgColor Image background color default random ��֤ͼƬ����ɫ 
     */  
    private $bgColor;  
    /** 
     *  @var $fontColor The text color ��֤����ɫ 
     */  
    private $fontColor;  
    /** 
     *  @var $dotNoise The number of noise ������� 
     */  
    private $dotNoise;  
    /** 
     *  @var $lineNoise The number of noise lines ���������� 
     */  
    private $lineNoise;  
    /** 
     *  @var $im image resource GDͼ�������Դ 
     */  
    private $im;  
      
    /** 
     *  void Vcode::Vcode() 
     * 
     *  The constructor 
     */  
    public function Vcode(){  
        $this->dotNoise = 20;//��ʼ���������  
        $this->lineNoise = 2;//��ʼ������������  
    }  
     /** 
     *  void Vcode::setLength(integer $length) 
     * 
     *  Set Verification Code length 
     *  @access public 
     *  @param integer $length; 
     *  @return void 
     */  
    public function setLength($length){  
        $this->length = $length;  
    }  
    /** 
     *  void Vcode::setBgColor(string $bgColor) 
     * 
     *  Set background color of the Verification Image 
     *  @access public 
     *  @param string $bgColor e.g.: #ffffff;����ֱ��ʹ��css��д�е�16����д���������ɼ�д 
     *  @return void 
     */  
    public function setBgColor($bgColor){  
        $this->bgColor = sscanf($bgColor, '#%2x%2x%2x');  
    }  
    /** 
     *  void Vcode::setFontColor(string $fontgColor) 
     * 
     *  Set text color of the Verification Image 
     *  @access public 
     *  @param string $fontColor e.g.: #ffffff;����ֱ��ʹ��css��д�е�16����д���������ɼ�д 
     *  @return void 
     */  
    public function setFontColor($fontColor){  
        $this->fontColor = sscanf($fontColor, '#%2x%2x%2x');  
    }  
    /** 
     *  void Vcode::setDotNoise(integer $num) 
     * 
     *  How many noise dots want to draw 
     *  @access public 
     *  @param integer $num Too much will lower performance 
     *  @return void 
     */  
    public function setDotNoise($num){  
        $this->dotNoise = $num;//�ֶ�������������󣬻Ḳ�ǳ�ʼ����  
    }  
    /** 
     *  void Vcode::setLineNoise(integer $num) 
     * 
     *  How many noise lines want to draw 
     *  @access public 
     *  @param integer $num Too much will lower performance 
     *  @return void 
     */  
    public function setLineNoise($num){  
        $this->lineNoise = $num;//�ֶ����ø����������󣬻Ḳ�ǳ�ʼ����  
    }  
    /** 
     *  String Vcode::randString() 
     * 
     *  Create Random characters ��������ַ��� 
     *  @access private 
     *  @return String 
     */  
    private function randString(){  
        $string = strtoupper(md5(microtime().mt_rand(0,9)));  
        return substr($string, 0, $this->length);  
    }  
    /** 
     *  void Vcode::drawDot() 
     * 
     *  Draw dots noise �����ƶ��������������㣬�����ɫҲ��� 
     *  @access private 
     */  
    private function drawDot(){  
        for($i=0; $i<$this->dotNoise; $i++){  
            $color = imagecolorallocate($this->im,  
                                        mt_rand(0,255),  
                                        mt_rand(0,255),  
                                        mt_rand(0,255));//���������ɫ  
            imagesetpixel($this->im,  
                            mt_rand(0,$this->width),  
                            mt_rand(0,$this->height),  
                            $color);//��������ɵ������ϻ����  
        }  
    }  
    /** 
     *  void Vcode::drawLine() 
     * 
     *  Draw line noise �����ɫ����������� 
     *  @access private 
     */  
    private function drawLine(){  
        for($i=0; $i<$this->lineNoise; $i++){  
            $color = imagecolorallocate($this->im,  
                                        mt_rand(0,255),  
                                        mt_rand(0,255),  
                                        mt_rand(0,255));//���������ɫ  
            imageline($this->im,  
                        mt_rand(0,$this->width),  
                        mt_rand(0,$this->height),  
                        mt_rand(0,$this->width),  
                        mt_rand(0,$this->height),  
                        $color);//��������ɵ������ϻ�������  
        }  
    }  
    /** 
     *  String Vcode::paint() 
     * 
     *  Create image and output 
     *  @access public 
     *  @return string  The Verification Code to be encrypted by MD5 
     */  
    public function paint(){  
      
        if(empty($this->length)) $this->length = 4;//��֤��Ĭ�ϳ���Ϊ4  
          
        $this->width =  $this->length*20+4 ;//������֤ͼƬ���  
        $this->height = 25;//�ƶ���֤��ͼƬ�߶�  
        $this->im = imagecreate($this->width, $this->height);//��������  
          
        if(empty($this->bgColor) || empty($this->fontColor)){//���û������ǰ��ɫ�ͱ���ɫ��ȫ�����  
            //����ǰ��ɫ�ͱ���ɫ���ڽӽ�������ɫ��0-130���������Χ��ǰ��ɫ��131-255���ֿ�  
            imagecolorallocate( $this->im,  
                                mt_rand(200,255),  
                                mt_rand(200,255),  
                                mt_rand(200,255));  
                                  
            $randString = $this->randString();  
              
            for($i=0; $i<$this->length; $i++){  
                $fontColor = imagecolorallocate($this->im,  
                                                mt_rand(0,100),  
                                                mt_rand(0,100),  
                                                mt_rand(0,100));  
                imagestring($this->im, 5,  
                            $i*20+4,  
                            mt_rand(0,10),  
                            $randString{$i},  
                            $fontColor);  
                            //������֤���ַ��߶���������ⱻOCR  
            }  
              
        } else {//��������˱���ɫ��ǰ��ɫ����ʹ�������ɫ  
          
            imagecolorallocate( $this->im,  
                                $this->bgColor[0],  
                                $this->bgColor[1],  
                                $this->bgColor[2]);  
            $randString = $this->randString();  
            $fontColor = imagecolorallocate($this->im,  
                                            $this->fontColor[0],  
                                            $this->fontColor[1],  
                                            $this->fontColor[2]);  
            for($i=0;$i<$this->length;$i++){  
                imagestring($this->im, 3,  
                            $i*10+8,  
                            mt_rand(0,8),  
                            $randString{$i},  
                            $fontColor);//ÿ����֤���ַ��߶���Ȼ���  
            }  
              
        }  
          
        $this->drawDot();//�������  
        $this->drawLine();//���Ƹ�����  
        imagepng($this->im);  
  
//        imagepng($this->im,"checkImage.png");  
        imagedestroy($this->im);  
        return md5($randString);//����MD5���ܺ����֤�룬��ֱ�ӷ���session          
    }  
}  
    session_start();  
    $vcode = new Vcode();  
    $vcode->setLength(4);  
    $_SESSION['vcode']=$vcode->paint();// To be encrypted by MD5   
?>  
