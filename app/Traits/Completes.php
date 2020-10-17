<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait Completes {

    public function complete(){
        $this->completed_at = now();
    }

    public function incomplete() {
        $this->completed_at = null;
    }

}
