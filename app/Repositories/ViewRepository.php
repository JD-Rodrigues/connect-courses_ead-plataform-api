<?php

namespace App\Repositories;
use App\Models\Traits\GetAuthUserTrait;
use App\Models\View;

class ViewRepository
{
    use GetAuthUserTrait;
    
    public function createNewView(array $data) {
       try {
            $user = auth()->user();
            $lessonJustViewed = $user->views()->where('lesson_id', $data['lesson_id'])->first();

            if($lessonJustViewed){
               $lessonJustViewed->update(
                    ['quant' => $lessonJustViewed->quant +1]
               );
            }else{
               auth()->user()->views()->create(['lesson_id'=>$data['lesson_id']]);
            }

            return response('Visualização contabilizada!', 201);

       } catch (\Throwable $th) {
            return $th->getMessage();
       }
    }

}