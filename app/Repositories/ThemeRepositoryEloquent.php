<?php

namespace App\Repositories;

class ThemeRepositoryEloquent implements ThemeRepository
{
    private $path = 'resources/views/themes';

    public function load($arr = 0)
    {
        $root_path = base_path($this->path);

        $files = \File::files($root_path);

        $files = array_filter($files, function ($item) {
            return strpos($item, '.blade.php');
        });

        if($arr){
            return $this->loadToArray($files);
        }
        return $files;
    }

    public function loadToArray($files)
    {
        $cl = collect($files)->all();
        $data = [];
        foreach ($cl as $rs) {
            $file_name = $rs->getFilename();
            $file_name = str_replace('.blade.php', '', $file_name);
            $data[$file_name] = fileNameFromPath($file_name);
        }
        return $data;
    }

    public function find($filename)
    {
        $root_path = base_path($this->path);
        $file_path = $root_path . '/' . $filename . '.blade.php';
        if (\File::exists($file_path)) {
            $content = \File::get($file_path);
            return (object)[
                'filename' => $filename,
                'name' => fileNameFromPath($filename),
                'content' => $content,
                'filepath' => $file_path,
            ];
        }
        abort(404);
    }

    public function create(array $input)
    {
        $input['name'] = trim($input['name']);
        $root_path = base_path($this->path);
        $file_path = $root_path . '/' . str_slug($input['name']) . '.blade.php';
        $content = $input['content'];
        if (!\File::isDirectory($root_path)) {
            \File::makeDirectory($root_path, 0777, true);
        }
        \File::put($file_path, $content);
    }

    public function update(array $input, $filename)
    {
        $root_path = base_path($this->path);
        $file_path = $root_path . '/' . $filename . '.blade.php';
        if (\File::exists($file_path)) {
            $content = $input['content'];
            \File::put($file_path, $content);
        }
    }

    public function delete($filename)
    {
        $root_path = base_path($this->path);
        $file_path = $root_path . '/' . $filename . '.blade.php';
        $delete_file_path = $root_path . '/' . $filename . '_' . date("Y_m_d_H_i_s") . ".deleted";

        if (\File::exists($file_path)) {
            \File::copy($file_path, $delete_file_path);
            \File::delete($file_path);
        }
    }
}
