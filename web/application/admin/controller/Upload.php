<?php
/*
|--------------------------------------------------------------------------
| 图像上传
|--------------------------------------------------------------------------
|
| @author Hana
|
*/
namespace app\admin\controller;
use think\Controller;
use app\common\model\Config as ConfigModel;
class Upload extends \app\admin\controller\Auth
{
	
	public function image() {
		try
		{
			// Create dir
	        $dir  = config('UPLOAD_PATH');
			is_dir($dir) || mkdir($dir, 0777, true);

			$file = request()->file('file');	
			$info = $file->Validate(['ext'=>'jpg,png,jpeg,gif'])->move($dir);

			$image_domain  = ConfigModel::getSetting('image_domain', '');
			$data['image'] = $image_domain .date('Ymd') . DIRECTORY_SEPARATOR. $info->getFilename(); 

			$this->successful('',$data);
		}
		catch (\Exception $e)
		{
            $this->failed($e->getMessage());
		}
	
	}
}