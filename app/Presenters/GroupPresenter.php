<?php

namespace App\Presenters;

use App\Transformers\InstituitionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GroupPresenter.
 *
 * @package namespace App\Presenters;
 */
class GroupPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GroupTransformer();
    }
}
