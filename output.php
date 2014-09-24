<?php

$data = array(
	array('name'=>'Tom','age'=>61,'date'=>'2014-09-24 12:00:00'),
	array('name'=>'Mark','age'=>25,'date'=>'2014-09-23 11:00:00'),
	array('name'=>'Lucy','age'=>43,'date'=>'2014-09-22 10:00:00'),
);

$title = array(
	'姓名',
	'age',
	'时间',
);

exportexcel($data,$title);

die();

/**
 * 导出excel
 * @param array $data 数据集
 * @param array $title 标题集
 * @param string $filename 导出的excel文件名
 */
function exportexcel($data=array(),$title=array(),$filename='report'){
	header("Content-type:application/vnd.ms-excel");
	header("Content-Disposition:filename=".$filename.".xls");
	//导出xls 开始
	if (!empty($title))
	{
		foreach ($title as $k => $v)
		{
			$title[$k] = iconv("UTF-8", "GBK",$v);
		}
		$title = implode("\t", $title);
		echo "$title\n";
	}
	if (!empty($data))
	{
		foreach($data as $key=>$val)
		{
			foreach ($val as $ck => $cv)
			{
				$data[$key][$ck] = iconv("UTF-8", "GBK", $cv);
			}
			$data[$key] = implode("\t", $data[$key]);

		}
		echo implode("\n",$data);
	}
}