<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    Grid::make(1)->schema([
                        Section::make('Thông tin cơ bản')->schema([
                            TextInput::make('name')
                                ->label('Tên sản phẩm')
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

                            RichEditor::make('description')
                                ->label('Mô tả sản phẩm')
                                ->columnSpanFull()
                                ->toolbarButtons([
                                    'bold', 'italic', 'underline',
                                    'bulletList', 'orderedList',
                                    'h2', 'h3', 'link',
                                ]),
                        ])->columns(2),

                        Section::make('Giá & Kho hàng')->schema([
                            TextInput::make('price')
                                ->label('Giá (VNĐ)')
                                ->required()
                                ->numeric()
                                ->minValue(0)
                                ->prefix('₫'),

                            TextInput::make('stock_quantity')
                                ->label('Số lượng tồn kho')
                                ->required()
                                ->integer()
                                ->minValue(0),

                            TextInput::make('warranty_period')
                                ->label('Bảo hành (tháng)')
                                ->integer()
                                ->minValue(0)
                                ->default(0)
                                ->suffix('tháng')
                                ->helperText('Nhập 0 nếu không có bảo hành'),
                        ])->columns(3),
                    ])->columnSpan(2),

                    Grid::make(1)->schema([
                        Section::make('Trạng thái')->schema([
                            Select::make('status')
                                ->label('Trạng thái')
                                ->options([
                                    'draft'        => 'Bản nháp',
                                    'published'    => 'Đã đăng',
                                    'out_of_stock' => 'Hết hàng',
                                ])
                                ->required()
                                ->default('draft'),

                            Select::make('category_id')
                                ->label('Danh mục')
                                ->options(Category::where('is_visible', true)->pluck('name', 'id'))
                                ->required()
                                ->searchable(),
                        ]),

                        Section::make('Ảnh đại diện')->schema([
                            FileUpload::make('image_path')
                                ->label('Ảnh sản phẩm')
                                ->image()
                                ->directory('products')
                                ->maxSize(2048),
                        ]),
                    ])->columnSpan(1),
                ]),
            ]);
    }
}
