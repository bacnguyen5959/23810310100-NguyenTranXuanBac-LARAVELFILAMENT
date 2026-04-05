<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextInput::make('name')
                        ->label('Tên danh mục')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (string $state, $set) {
                            $set('slug', Str::slug($state));
                        }),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),

                    Textarea::make('description')
                        ->label('Mô tả')
                        ->rows(3)
                        ->columnSpanFull(),

                    Toggle::make('is_visible')
                        ->label('Hiển thị')
                        ->default(true),
                ])->columns(2),
            ]);
    }
}
