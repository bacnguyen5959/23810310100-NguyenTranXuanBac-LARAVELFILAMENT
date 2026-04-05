<?php

namespace App\Filament\Resources\Products\Tables;

use App\Models\Category;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Ảnh')
                    ->square(),

                TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Danh mục')
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Giá')
                    ->formatStateUsing(fn ($state) =>
                        number_format((float)$state, 0, ',', '.') . ' ₫'
                    )
                    ->sortable(),

                TextColumn::make('stock_quantity')
                    ->label('Tồn kho')
                    ->sortable(),

                TextColumn::make('warranty_period')
                    ->label('Bảo hành')
                    ->formatStateUsing(fn ($state) =>
                        $state > 0 ? "{$state} tháng" : 'Không BH'
                    ),

                TextColumn::make('status')
                    ->label('Trạng thái')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'draft'        => 'warning',
                        'published'    => 'success',
                        'out_of_stock' => 'danger',
                        default        => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'draft'        => 'Bản nháp',
                        'published'    => 'Đã đăng',
                        'out_of_stock' => 'Hết hàng',
                        default        => $state,
                    }),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Lọc theo danh mục')
                    ->options(Category::pluck('name', 'id')),

                SelectFilter::make('status')
                    ->label('Lọc theo trạng thái')
                    ->options([
                        'draft'        => 'Bản nháp',
                        'published'    => 'Đã đăng',
                        'out_of_stock' => 'Hết hàng',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
