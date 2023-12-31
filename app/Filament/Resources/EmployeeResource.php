<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Employee;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('country_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('state_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('city_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('department_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('middle_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('zip_code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_birth')
                    ->required(),
                Forms\Components\DatePicker::make('date_hired')
                    ->required()
            ])->columns(3);

            // **Section for TextInput
            // Forms\Components\Section::make('Employee Name')
            //     ->description('Put the employee name details in.')
            //     ->schema([]);

            // **columns textinput
            // schema([])->columns(3);

            // **columnSpanFull
            // ->columnSpanFull(),

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('state_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('department_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zip_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_hired')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),

                // TOGGLEABLE CODE
                // ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                // ** Filter Code 
                // SelectFilter::make('Department')
                // ->relationship('department', 'name')
                // ->searchable()
                // ->preload(),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    // FOR RELATIONSHIP SELECT FIELD
    // Forms\Components\Section::make('Relationships')->schema([
    //     Forms\Components\Select::make('country_id')
    //         ->relationship(name: 'country', titleAttribute: 'name')
    //         ->searchable()
    //         ->preload()
    //         ->live()
    //         ->afterStateUpdated(function (Set $set) {
    //             $set('state_id', null);
    //             $set('city_id', null);
    //         })
    //         ->required(),
    //     Forms\Components\Select::make('state_id')
    //         ->options(fn (Get $get): Collection => State::query()
    //             ->where('country_id', $get('country_id'))
    //             ->pluck('name', 'id'))
    //         ->searchable()
    //         ->preload()
    //         ->live()
    //         ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
    //         ->label('State')
    //         ->required(),
    //     Forms\Components\Select::make('city_id')
    //         ->options(fn (Get $get): Collection => City::query()
    //             ->where('state_id', $get('state_id'))
    //             ->pluck('name', 'id'))
    //         ->searchable()
    //         ->preload()
    //         ->live()
    //         ->label('City')
    //         ->required(),
    //     Forms\Components\Select::make('department_id')
    //         ->relationship(name: 'department', titleAttribute: 'name')
    //         ->searchable()
    //         ->preload()
    //         ->required(),
        
    // ])->columns(2),

    // DATES SELECT FIELD
    // Forms\Components\Section::make('Dates')->schema([
    //     Forms\Components\DatePicker::make('date_of_birth')
    //     ->native(false)
    //     ->required(),
    // Forms\Components\DatePicker::make('date_hired')
    //     ->native(false)
    //     ->required(),
    // ])->columns(2),

    //Toggleable Features for First Name
    // ->toggleable(isToggledHiddenByDefault: true)

    //INFO LIST FOR VIEW ACTION
    // public static function infolist(Infolist $infolist): Infolist
    // {
    //     return $infolist
    //         ->schema([
    //             Section::make('Department Info')
    //                 ->schema([
    //                     **EMPLOYEE FIELDS.
    //                     }),
    //                 ])->columns(2)
    //         ]);
    // }
}
