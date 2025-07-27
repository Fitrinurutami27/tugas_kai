<?php
namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ClubResource\Pages;
use App\Models\Club;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class ClubResource extends Resource
{
    protected static ?string $model = Club::class;
    protected static ?string $navigationIcon = 'heroicon-o-flag';

    protected static ?string $navigationLabel = 'Club Football';
    protected static ?string $pluralLabel = 'Club Football';
    protected static ?string $modelLabel = 'Club';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_club')->required(),
            Forms\Components\TextInput::make('tahun_berdiri')->required()->numeric(),
            Forms\Components\TextInput::make('negara')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama_club')->searchable(),
            Tables\Columns\TextColumn::make('tahun_berdiri'),
            Tables\Columns\TextColumn::make('negara'),
        ])
        ->actions([Tables\Actions\EditAction::make()])
        ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClubs::route('/'),
            'create' => Pages\CreateClub::route('/create'),
            'edit' => Pages\EditClub::route('/{record}/edit'),
        ];
    }
}
