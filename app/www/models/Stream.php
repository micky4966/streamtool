<?php
class Stream extends Streamtool {

    public function category()
    {
        return $this->hasOne('Category', 'id', 'cat_id');
    }

    public function transcode()
    {
        return $this->hasOne('Transcode', 'id', 'trans_id');
    }

    public function getStatusLabelAttribute()
    {
        $return = [];
        $return['label'] = 'danger';
        $return['text'] = '<i class="fas fa-stop-circle"></i> STOPPED';

        if ($this->status == '1') {
            $return['label'] = 'success';
            $return['text'] = '<i class="fas fa-circle-notch fa-spin"></i> RUNNING';
        } else if ($this->status == '2') {
            $return['label'] = 'danger';
            $return['text'] = '<i class="fas fa-exclamation-circle"></i> ERROR';
        }

        return $return;
    }
}