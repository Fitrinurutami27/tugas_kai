<?php
namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KaryawanResource\Pages;
use App\Models\Karyawan;
use App\Models\Club;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class KaryawanResource extends Resource
{
    protected static ?string $model = Karyawan::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Karyawan';
    protected static ?string $pluralLabel = 'Karyawan';
    protected static ?string $modelLabel = 'Karyawan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_karyawan')->required(),
            Forms\Components\TextInput::make('umur')->numeric()->required(),
            Forms\Components\Textarea::make('alamat')->required(),
            Forms\Components\TextInput::make('nomor_telepon')->tel()->required(),
            Forms\Components\TextInput::make('jabatan')->required(),
            Forms\Components\Select::make('club_id')
                    ->label('Club Kesukaan')
                    ->options(function () {
                        return \App\Models\Club::all()->mapWithKeys(function ($club) {
                            return [$club->id => $club->nama_club]; 
                        });
                    })
                    ->searchable()
                    ->required(),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama_karyawan')->searchable(),
            Tables\Columns\TextColumn::make('umur'),
            Tables\Columns\TextColumn::make('nomor_telepon'),
            Tables\Columns\TextColumn::make('jabatan'),
            Tables\Columns\TextColumn::make('club.nama_club')->label('Club Kesukaan'),
        ])
        ->actions([Tables\Actions\EditAction::make()])
        ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKaryawans::route('/'),
            'create' => Pages\CreateKaryawan::route('/create'),
            'edit' => Pages\EditKaryawan::route('/{record}/edit'),
        ];
    }
}
