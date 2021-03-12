<?php

namespace App\Observers;

use App\Models\MainCategory;

class MainCategoryObserve
{
    /**
     * Handle the MainCategor "created" event.
     *
     * @param  \App\Models\MainCategor  $mainCategor
     * @return void
     */
    public function created(MainCategory $mainCategor)
    {
        //
    }

    /**
     * Handle the MainCategor "updated" event.
     *
     * @param  \App\Models\MainCategor  $mainCategor
     * @return void
     */
    public function updated(MainCategory $mainCategory)
    {

        $mainCategory-> supcategory()->update(['active' => $mainCategory -> active]);
    }

    /**
     * Handle the MainCategor "deleted" event.
     *
     * @param  \App\Models\MainCategor  $mainCategor
     * @return void
     */
    public function deleted(MainCategory $MainCategory)
    {
        $MainCategory->supcategory()->delete();
    }

    /**
     * Handle the MainCategor "restored" event.
     *
     * @param  \App\Models\MainCategor  $mainCategor
     * @return void
     */
    public function restored(MainCategory $MainCategory)
    {

    }

    /**
     * Handle the MainCategor "force deleted" event.
     *
     * @param  \App\Models\MainCategor  $mainCategor
     * @return void
     */
    public function forceDeleted(MainCategor $mainCategor)
    {
        //
    }
}
