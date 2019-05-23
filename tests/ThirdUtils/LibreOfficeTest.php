<?php
namespace HuoUtils\Test\ThirdUtils;
use App\Lib\Common\ThirdUtils\LibreOffice;
use Tests\TestCase;

/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/2/12
 * Time: 18:11
 */
trait LibreOfficeTest {

    protected $output_pdf_dir;
    protected $word_path;

    public function testHasInstalled()
    {
        $this->initParams();
        $this->assertTrue( LibreOffice::hasInstalled());

    }


    public function testWordToPdf()
    {
        $this->initParams();
        LibreOffice::wordToPdf($this->word_path,$this->output_pdf_dir);
        self::assertFileExists($this->pdfPath());

    }

    protected function pdfPath()
    {
        $pathinfo = pathinfo($this->word_path);
        return $this->output_pdf_dir . $pathinfo['filename'] . ".pdf";
    }

    protected function initParams()
    {
        $this->word_path = base_path("tests/storage/res/wordToPdfDemo".rand(1,4).".docx");
        $this->output_pdf_dir = base_path("tests/storage/output/");

    }



















}
