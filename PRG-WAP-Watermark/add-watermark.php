<?php
class Watermarker
{
    public $imgPath;
    public $img;
    public $wtmImg;
    public $wtmText;
    public $fontUrl;
    public $font;
    public $fontSize;

    // "Konfig"
    public function __construct()
    {
        header("Content-type: image/jpeg");
        $this->imgPath = $_FILES["fileToUpload"]["name"];
        $this->img = imagecreatefromjpeg($this->imgPath);
        $this->wtmImg = imagecreatefrompng('watermark.png');
        $this->wtmText = "Antonín\nVojtěch";
        $this->fontUrl = 'http://tonyyhoserver.kvalitne.cz/OpenSans-Light.ttf';
        $this->file_name = basename($this->fontUrl);
        $this->fontSize = 48;
    }

    // Get souřadnice X z obrázku na vstupu
    public function getX($inputImage)
    {
        $x = (imagesx($inputImage) / 2);
        return $x;
    }
    // Get souřadnice Y z obrázku na vstupu
    public function getY($inputImage)
    {
        $y = (imagesy($inputImage) / 2);
        return $y;
    }

    // Přidání vodoznaku pomocí předem připraveného .png souboru
    public function wtmAdderImgMode()
    {
        imagecopy(
            $this->img,
            $this->wtmImg,
            $this->getX($this->wtmImg),
            $this->getY($this->wtmImg),
            0,
            0,
            imagesx($this->wtmImg),
            imagesy($this->wtmImg)
        );
        imagejpeg($this->img);
        imagejpeg($this->img, basename($this->imgPath, ".jpg") . '-with-watermark.jpg');
        imagedestroy($this->img);
    }

    // Přidání vodoznaku pomocí textu
    public function wtmAdderTextMode()
    {
        $text_box = imagettfbbox($this->fontSize, 0, $this->file_name, $this->wtmText);
        $text_width = $text_box[2] - $text_box[0];
        $color = imagecolorallocatealpha($this->img, 255, 255, 255, 70);
        file_put_contents($this->file_name, file_get_contents($this->fontUrl));
        imagettftext(
            $this->img,
            $this->fontSize,
            0,
            $this->getX($this->img) - ($text_width / 2),
            $this->getY($this->img) - ($this->fontSize / 2),
            $color,
            $this->file_name,
            $this->wtmText
        );
        imagejpeg($this->img);
        imagejpeg($this->img, basename($this->imgPath, ".jpg") . '-with-watermark-textmode.jpg');
        imagedestroy($this->img);
    }
}

// Vytvoření objektu, volání funkcí
$object = new Watermarker();
if (isset($_POST['submitImgMode'])) {
    $object->wtmAdderImgMode();
} elseif (isset($_POST['submitTextMode'])) {
    $object->wtmAdderTextMode();
}
