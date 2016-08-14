<?php

namespace App\Controllers;

use App\Components\App\App;
use App\Components\Auth\Auth;
use App\Components\Flash\Flash;
use App\Components\Internationalization\Internationalizator;
use App\Components\Validator\Validator;
use App\Models\User;

class AvatarController extends BaseController
{
    public function getUpload()
    {
        $targetDir = App::path() . "/public/img/";
        $time = microtime(true);
        $relPath = "/img/" . $time .basename($this->request->files()["fileToUpload"]["name"]);
        $fullPath = $targetDir . $time .basename($this->request->files()["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($fullPath, PATHINFO_EXTENSION);

        if(isset($_POST["submit"])) {
            $check = getimagesize($this->request->files()["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                Flash::set('errors', ['fileToUpload' => ['File is not an image.']]);
                $this->request->back();

                $uploadOk = 0;
            }
        }

        if (file_exists($fullPath)) {
            Flash::set('errors', ['fileToUpload' => ['File already exists.']]);
            $this->request->back();
            $uploadOk = 0;
        }

        if ($this->request->files()["fileToUpload"]["size"] > 500000) {
            Flash::set('errors', ['fileToUpload' => ['File is too large.']]);
            $this->request->back();
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            Flash::set('errors', ['fileToUpload' => ['Only JPG, JPEG, PNG & GIF files are allowed.']]);
            $this->request->back();
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            Flash::set('errors', ['fileToUpload' => ['File was not uploaded']]);
            $this->request->back();

        } else {
            if (move_uploaded_file($this->request->files()["fileToUpload"]["tmp_name"], $fullPath)) {
                User::setAvatar(Auth::getAutUser()['email'], $relPath);
                $this->request->back();
            } else {
                Flash::set('errors', ['fileToUpload' => ['There was an error uploading your file.']]);
                $this->request->back();
            }
        }
    }
}