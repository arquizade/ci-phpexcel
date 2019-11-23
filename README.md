# Codeigniter + PHPExcel

How to Generate Excel File in Codeigniter using PHPExcel

> This code was originally written by [[Webslesson](https://www.webslesson.info/2017/04/generate-excel-file-in-codeigniter-using-phpexcel.html).](https://www.webslesson.info/2017/04/generate-excel-file-in-codeigniter-using-phpexcel.html)

## Versions

Application used for creating the system.

|                |Developer|Version #|
|----------------|-------------------------------|-----------------------------|
|CodeIgniter|`EllisLab`            |`3.2.0`          |
|PHPExcel |`PHPOffice`            |`1.8.1`           |
|PHP |`PHP`            |`5.6`           |


# Steps
Steps:
1. Download PhpExcel File on this link https://github.com/PHPOffice/PHPExcel
2. Extract the file and open the ./Classes folder
3. Inside the ./Classes/ folder copy ./PHPExcel folder and PHPExcel.php file
4. Paste the file inside your codeigniter app ./application/libraries/ folder
5. The next steps will be creating of php files..

## Create files and folders

 **application/libraries/Excel.php** 
 

    <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    
    require_once('PHPExcel.php');
    
    class Excel extends PHPExcel
    {
    	public function __construct()
    	{
    		parent::__construct();
    	}
    }

    
 **application/libraries/IOFactory.php** 

    <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    
    require_once('PHPExcel/IOFactory.php');
    
    class IOFactory extends PHPExcel_IOFactory
    {
    	public function __construct()
    	{
    		parent::__construct();
    	}
    }


 **application/controllers/Excel_export.php** 

    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Report extends CI_Controller {
    	public function __construct()
    	{
    		parent::__construct();
    		$this->load->library("excel");
    
    	}
    	public function index()
    	{
    		$object = new PHPExcel();
    		$object->setActiveSheetIndex(0);
    
    		$object->getActiveSheet()->setCellValueByColumnAndRow(0, 2, 'Sample Text');
    
    		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
    		header('Content-Type: application/vnd.ms-excel');
    		header('Content-Disposition: attachment;filename="Employee Data.xls"');
    		$object_writer->save('php://output');
    	}
    
    }

> :) Thanks!