<?php

namespace App\Presenters;

use Illuminate\Support\Str;

class ActivityLogPresenter
{
    /**
     * 根據類別和ID取得檢視網址
     *
     * @param string|null $type
     * @param int|null $id
     * @return string|null
     */
    public function getModelLink(?string $type, ?int $id): ?string
    {
        if (!$type || !$id) {
            return null;
        }
        // 取得 Model 名稱（如：App\SomeModel → SomeModel）
        $modelName = str_replace(['App\\'], '', $type);
        // 轉換為 kebab case，並加上 .show（如：SomeModel → some-model.show）
        $routeName = Str::kebab($modelName) . '.show';
        // 若該路由存在，直接回傳
        if (\Route::has($routeName)) {
            return link_to_route($routeName, $id, $id);
        }

        return $id;
    }
}
