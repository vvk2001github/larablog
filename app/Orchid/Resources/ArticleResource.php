<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Filters\DefaultSorted;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class ArticleResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Article::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('descr')
                ->title('Заголовок')
                ->placeholder('Заголовок')
                ->help('Заголовок'),

            SimpleMDE::make('content')
                ->toolbar(["text", "color", "header", "list", "format", "media"]),

            CheckBox::make('published')
                ->title('Опубликовано')
                ->placeholder('Опубликовано')
                ->help('Опубликовано')
                ->sendTrueOrFalse()

        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id')->sort(),

            TD::make('descr','Заголовок')->sort()->filter(),

            TD::make('published', 'Опубликовано')->sort(),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('descr', 'Заголовок'),
            Sight::make('content', 'Текст'),
            Sight::make('published', 'Опубликовано')->render(function($e) {return $e->published ? 'Да' : 'Нет';})

        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            new DefaultSorted('id', 'asc'),
        ];
    }

    public static function permission(): ?string
    {
        return 'private-article-resource';
    }
}
