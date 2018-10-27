<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Config;

class Zupload extends Controller
{	
	public $maxSize=2097152;
	public $ext='jpg,png,gif';

	public function image(Request $request){
		$file=$request->file('file');

		/*$result=$this->validate(['file'=>$file],['file'=>'require|image|fileSize:'.$this->maxSize],['file.require'=>'请选择图片','file.image'=>'必须是图片','file.fileSize'=>'图片大小不能超过2M'.$this->maxSize]);
		if($result !== true){
			return json_encode(['code'=>0,'msg'=>$result,'pic'=>'']);
		}*/

		$info = $file->validate(['size'=>$this->maxSize,'ext'=>$this->ext])->move( '../public/uploads');
	    if($info){
	        $data['image']=$info->getSaveName();
	   		return json_encode($data);
	    }else{
	        // 上传失败获取错误信息
	        echo $file->getError();
	    }



	}

	public function del(){
		$img=input('post.img');
		if(empty($img)){
			return 0;
		}
		return del_file($img);
	}
}