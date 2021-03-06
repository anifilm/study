<?php

namespace App;

use File;

use Illuminate\Database\Eloquent\Model;

class Documentation extends Model {
    public function get($file = 'documentation.md') {
        $content = File::get($this->path($file));

        return $this->replaceLinks($content);
    }

    public function image($file) {
        return \Image::make($this->path($file, 'docs/images'));
    }

    protected function path($file) {
        $file = ends_with($file, ['.md', '.png']) ? $file : $file . '.md';
        $path = base_path('docs' . DIRECTORY_SEPARATOR . $file);

        if (!File::exists($path)) {
            abort(404, '요청하신 파일이 없습니다.');
        }

        return $path;
    }

    protected function replaceLinks($content) {
        return str_replace('/docs/{{version}}', '/docs', $content);
    }

    public function etag($file) {
        $lastModified = File::lastModified($this->path($file, 'docs/images'));

        return md5($file . $lastModified);
    }
}
