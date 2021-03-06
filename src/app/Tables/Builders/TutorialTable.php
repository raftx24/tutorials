<?php

namespace LaravelEnso\Tutorials\app\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\app\Contracts\Table;
use LaravelEnso\Tutorials\app\Models\Tutorial;

class TutorialTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/tutorials.json';

    public function query(): Builder
    {
        return Tutorial::selectRaw('
            tutorials.id, permissions.name as permissionName, tutorials.element,
            tutorials.title, tutorials.placement, tutorials.order_index, tutorials.created_at
        ')->join('permissions', 'permissions.id', '=', 'tutorials.permission_id');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
