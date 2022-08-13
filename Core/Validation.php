<?php

namespace App\Core;

class Validation
{
    public array $errors = [];
    public array $rules;

    public function validate(): array
    {
        foreach ($this->rules as $attribute => $rules) {

            foreach ($rules as $condition) {

                if (is_array($condition)) {
                    $method = $condition[0];
                    $attribute = $condition['matchParam'];
                } else {
                    $method = $condition;
                }

                $this->$method($attribute);
            }
        }
        return $this->errors;
    }

    private function required(string $param): bool
    {
        if (!array_key_exists($param, $this->data)) {
            $this->errors[$param] = [$param . ' is required...!'];
            return false;
        }
        return true;
    }

    private function username(string $param): bool
    {
        if (preg_match("/^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/", trim($this->data[$param]))) {
            return true;
        }
        $this->errors['username'] = 'username must be at least 8 to 20 characters and do not start or end with \'_\'!';
        return false;
    }

    private function password(string $param): bool
    {
        if (preg_match("/[0-9]{5}/", trim($this->data[$param]))) {
            return true;
        }
        $this->errors['password'] = 'password must be at least 8 characters contain alphabet and number and start with alphabet!';
        return false;
    }

    private function matchParam(string $param): bool
    {
        if (trim($this->data['confirm' . ucfirst($param)]) === trim($this->data[$param])) {
            return true;
        }
        $this->errors['confirm' . ucfirst($param)] = "confirm $param doesn't similar to $param!";
        return false;
    }

    private function patient(string $param): bool
    {
        if ($this->data['role'] == 'patient') {
            return true;
        }
        $this->errors['role'][] = 'please first login as patient';
        return false;
    }

    private function name(string $param): bool
    {
        if (preg_match("/^[\x{0600}-\x{06FF}\s\w]*$/u", trim($this->data[$param]))) {
            return true;
        }
        $this->errors[$param] = $param . ' must be at least two characters and start with alphabet';
        return false;
    }

    private function email(string $param): bool
    {
        if (filter_var(trim($this->data[$param]), FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        $this->errors[$param] = 'enter valid email!';
        return false;
    }

    private function visit_time(string $param): bool
    {
        $status = true;

        foreach ($this->data[$param] as $key => $day) {
            foreach ($day as $meridiem => $value) {
                if (!empty($value) && !preg_match("/^(0?[1-9]|1[0-2]):[0-5][0-9]\-(0?[1-9]|1[0-9]):[0-5][0-9]$/", $value)) {
                    $this->errors[] = "$key($meridiem) in invalid format";
                    $status = false;
                }
            }
        }

        return $status;
    }

    public function avatar(string $param)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file-upload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $error = '';

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $error .= "File is an image - " . $check["mime"] . ".";
            } else {
                $error .= "File is not an image.";
            }
        }

        // Check file size
        if ($_FILES["file-upload"]["size"] > 500000) {
            $error .= "Sorry, your file is too large.";
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
        if (!empty($error)) {
            $this->errors[] = $error;
        }
    }

    public function setRules(array $data)
    {
        $this->rules = $data;
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }
}