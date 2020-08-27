<?php
interface CloudServiceSDK
{
    /**
     * 上傳檔案
     */
    public function put($file_path, $file);

    /**
     * 回傳檔案
     */
    public function get($file_path);

    /**
     * 刪除檔案
     */
    public function delete($file_path);

    /**
     * 複製檔案
     */
    public function copy($origin_path, $target_path);
}

class AWSSDK
{
    public function put($file_path, $file)
    {
        echo 'AWS S3 uploading file';
    }

    public function get($file_path)
    {
        return 'https://www.mitdub.com/style/official/images/fb/fb.png';
    }

    public function remove($file_path)
    {
        echo 'AWS S3 deleting file';
    }

    public function copy($origin_path, $target_path)
    {
        echo 'AWS S3 clone file' . $origin_path . ' to ' . $target_path;
    }
}

class AWSAdapter implements CloudServiceSDK
{
    private $AWSSDK;

    public function __construct(AWSSDK $AWSSDK)
    {
        $this->AWSSDK = $AWSSDK;
    }

    public function put($file_path, $file)
    {
        $this->AWSSDK->put($file_path, $file);
    }

    public function get($file_path)
    {
        $this->AWSSDK->get($file_path);
    }

    public function delete($file_path)
    {
        $this->AWSSDK->delete($file_path);
    }

    public function copy($origin, $target)
    {
        $this->AWSSDK->copy($origin, $target);
    }
}

class AzureSDK
{
    public function createBlob($file_path, $file)
    {
        echo 'Azure Blob uploading file';
    }

    public function getBlobUrl($file_path)
    {
        return 'https://www.titan-tech.com.tw/style/official/images/fb/fb.png';
    }

    public function deleteBlob($file_path)
    {
        echo 'Azure Blob deleting file';
    }

    public function cloneBlob($origin_path, $target_path)
    {
        $origin_image = $this->getBlobUrl($origin_path);
        $this->createBlob($target_path, $origin_image);
        echo 'Azure Blob clone file' . $origin_path . ' to ' . $target_path;
    }
}

class AzureAdapter implements CloudServiceSDK
{
    private $Azure;

    public function __construct(AzureSDK $Azure)
    {
        $this->Azure = $AWSSDK;
    }

    public function put($file_path, $file)
    {
        $this->Azure->createBlob($file_path, $file);
    }

    public function get($file_path)
    {
        $this->Azure->getBlobUrl($file_path);
    }

    public function delete($file_path)
    {
        $this->Azure->deleteBlob($file_path);
    }

    public function copy($origin, $target)
    {
        $this->Azure->cloneBlob($origin, $target);
    }
}

class GCPSDK
{

    public function uploadFile($file_path, $file)
    {
        echo 'GCP uploading file';
    }

    public function getUrl($file_path)
    {
        return 'https://www.titan-tech.com.tw/style/official/images/fb/fb.png';
    }

    public function deleteObject($file_path)
    {
        echo 'GCP deleting file';
    }

    public function copyObject($origin_path, $target_path)
    {
        echo 'GCP clone file' . $origin_path . ' to ' . $target_path;
    }
}

class GCPAdapter implements CloudServiceSDK
{
    private $GCP;

    public function __construct(GCPSDK $GCP)
    {
        $this->GCP = $GCP;
    }

    public function put($file_path, $file)
    {
        $this->GCP->uploadFile($file_path, $file);
    }

    public function get($file_path)
    {
        $this->GCP->getUrl($file_path);
    }

    public function delete($file_path)
    {
        $this->GCP->deleteObject($file_path);
    }

    public function copy($origin, $target)
    {
        $this->GCP->copyObject($origin, $target);
    }
}

class CloudStorageService
{

    private $cloudSDK;

    public function __construct()
    {
        //可以改用工廠模式產生Adapter Class
        $FileSystemClass = config('app.file_system');
        $this->cloudSDK = new $FileSystemClass;
    }

    public function uploadFile($path, $file)
    {
        $this->cloudSDK->put($path, $file);
    }

    public function getFile($path)
    {
        return $this->cloudSDK->get($path);
    }

    public function removeFile($file_path)
    {
        $this->cloudSDK->delete($file_path);
    }

    public function copyFile($origin_path, $target_path)
    {
        $this->cloudSDK->copy($file_path);
    }
}


//實例化
$CloudStorageService = new CloudStorageService();

$CloudStorageService->uploadFile();
$CloudStorageService->getFile();
$CloudStorageService->copyFile();
$CloudStorageService->removeFile();

