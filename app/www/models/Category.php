<?php
class Category extends Streamtool {

    public function streams()
    {
        return $this->hasMany('Stream', 'cat_id', 'id');
    }
}