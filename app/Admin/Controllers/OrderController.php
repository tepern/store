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

        $grid->column('id', __('Номер заказа'));
        $grid->column('customer', __('ФИО покупателя'));
        $grid->column('status', __('Статус заказа'));
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

        $show->field('customer', __('ФИО покупателя'));
        $show->field('status', __('Статус заказа'));
        $show->field('comment', __('Комментарий покупателя'));
        $show->field('created_at', __('Дата создания'));

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
        
        $form->text('customer', __('ФИО покупателя'))->rules('required|string|min:5|max:255');
        $form->select('status', __('Статус заказа'))->options(['new' => 'Новый', 'completed' => 'Выполнен'])->rules('required|string');
        $form->textarea('comment', __('Комментарий покупателя'))->rules('string|max:2000');
        $form->display('created_at', 'Дата создания')->readonly();
        
        return $form;
    }
}
