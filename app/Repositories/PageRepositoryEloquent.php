<?php

namespace App\Repositories;

use App\Models\Page;
use App\Models\PageBlock;
use App\Validators\PageValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PageRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PageRepositoryEloquent extends BaseRepository implements PageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Page::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return PageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable()
    {
        return $this->model->select('*')->withTranslation();
    }

    public function create(array $input)
    {
        $input['active'] = !empty($input['active']) ? 1 : 0;

        $model = $this->model->create($input);

        if (!empty($input['blocks'])) {
            $this->createBlocks($model, $input['blocks']);
        }

        if (!empty($input['metadata'])) {
            $model->metaCreateOrUpdate($input['metadata']);
        }

        return $model;
    }

    public function update(array $input, $id)
    {
        $input['active'] = !empty($input['active']) ? 1 : 0;

        $model = $this->model->findOrFail($id);

        $model->update($input);

        // insert new block
        if (!empty($input['blocks'])) {
            $this->createBlocks($model, $input['blocks']);
        }

        //update old block
        if (!empty($input['old_blocks'])) {
            $this->updateBlocks($model, $input['old_blocks']);
        }

        if (!empty($input['metadata'])) {
            $model->metaCreateOrUpdate($input['metadata']);
        }

        if (!empty($input['delete_blocks'])) {
            $this->deleteBlocks($model, $input['delete_blocks']);
        }

        return $model;
    }

    public function delete($id)
    {
        $model = $this->model->findOrFail($id);

        //delete metadata
        $model->meta()->delete();

        foreach ($model->blocks as $block) {
            $block->deleteMe();
        }

        //delete
        $model->delete();
    }

    private function createBlocks($model, $blocks)
    {
        foreach ($blocks as $value) {
            $value['page_id'] = $model->id;
            $block = $model->blocks()->create($value);

            // Insert multi photo
            if (in_array(PageBlock::TYPE_MULTI_PHOTOS, $block->decode_types)) {
                if (!empty($value['photos'])) {
                    $block->createMedia($value['photos']);
                }
            }
        }
    }

    private function updateBlocks($model, $blocks)
    {
        foreach ($blocks as $key => $value) {
            if (!empty($value['is_change'])) { // update if change
                $block = $model->blocks()->where('page_block.id', $key)->firstOrFail();
                $block->update($value);

                // Insert multi photo
                if (in_array(PageBlock::TYPE_MULTI_PHOTOS, $block->decode_types)) {

                    if (!empty($value['photos'])) {
                        $block->createMedia($value['photos']);
                    }

                    if (!empty($value['delete_photos'])) {
                        $block->deleteMedias($value['delete_photos']);
                    }
                }
            }
        }
    }

    private function deleteBlocks($model, array $ids)
    {
        $blocks = $model->blocks()->whereIn('page_block.id', $ids)->get();

        foreach ($blocks as $key => $block) {
            if (!$block->parent_id) {
                foreach ($block->children as $rs) {
                    $rs->deleteMe();
                }
            }

            $block->deleteMe();
        }
    }

    public function findBySlug($slug, array $with = ['translations', 'blocks.translations', 'meta'])
    {
        $locale = \App::getLocale();
        return $this->model->active()->requiredTranslation()
            ->whereTranslation('slug', $slug, $locale)
            ->with($with)
            ->firstOrFail();
    }

    public function listPagesByGroupCode($group_code)
    {
        return $this->model->where('group_code', $group_code)
            ->active()
            ->requiredTranslation()
            ->withTranslation()
            ->orderBy('position', 'asc')
            ->get();
    }
}
