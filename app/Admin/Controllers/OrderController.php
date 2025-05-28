<?php

namespace App\Admin\Controllers;

use App\Models\Products\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('customer', __('ФИО покупателя'));
        $grid->column('status', __('Статус заказа'));
        $grid->column('comment', __('Комментарий покупателя'))->width(200);
        $grid->column('created_at', __('Дата создания'));
        $grid->column('Итоговая цена')->display(function () {
            return $this->amount * $this->product->price;
        });
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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('customer', __('Customer'));
        $show->field('product_id', __('Product id'));
        $show->field('amount', __('Amount'));
        $show->field('status', __('Status'));
        $show->field('comment', __('Comment'));
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
        $form = new Form(new Order());

        $form->text('customer', __('Customer'));
        $form->number('product_id', __('Product id'));
        $form->number('amount', __('Amount'))->default(1);
        $form->select('status', __('Status'))->default('new');
        $form->textarea('comment', __('Comment'));

        return $form;
    }
}
