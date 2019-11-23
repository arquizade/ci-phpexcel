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

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */