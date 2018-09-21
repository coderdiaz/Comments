<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function children() {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}
