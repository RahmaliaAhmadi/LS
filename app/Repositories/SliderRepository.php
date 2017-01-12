<?php

namespace App\Repositories;

use DB;
use App\Models\Slider;

class SliderRepository extends BaseRepository
{
    /**
     * The Role instance.
     *
     * @var \App\Models\Slider
     */
    protected $slider;

    /**
     * Create a new UserRepository instance.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\Role $role
     * @return void
     */
    public function __construct(Slider $slider)
    {
        $this->model = $slider;        
    }
  
  /**
     * Get contacts collection.
     *
     * @return Illuminate\Support\Collection
     */
    public function getAllSlides()
    {
        return $this->model->latest()->get();
    }
}
