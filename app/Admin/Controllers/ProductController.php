<?php

namespace App\Admin\Controllers;

use App\Models\Products\Product;
use App\Models\Products\ProductCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('name', __('Название'));
        $grid->column('category.name', __('Категория'));
        $grid->column('price', __('Цена'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Название'));
        $show->field('category.name', __('Категория'));
        $show->field('description', __('Описание'));
        $show->field('price', __('Цена'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());
        $form->select('category_id')->options(ProductCategory::all()->pluck('name','id'));
        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->decimal('price', __('Price'));

        return $form;
    }
}
