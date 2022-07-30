<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AdminEmployeeTable extends PowerGridComponent
{
    use ActionButton;
    //Custom per page values

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */

    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            Exportable::make("_Employees_Info_")
                ->striped()
                ->type(Exportable::TYPE_XLS),
            Header::make()
                ->showSearchInput()
                ->showToggleColumns(),

            // I CHANGED THE VALUE OF SHOW PER PAGE OBJECT (TO SEE THE CHANGES CLICK THE SHOW PER PAGE)
            Footer::make()
                ->showPerPage()
                ->showRecordCount('short'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Employee>
    */
    public function datasource(): Builder
    {
        // THIS IS FOR EMPLOYEE WHO HAS A VALUE OF NULL AT DELETED_AT FIELD(EMPLOYEES TABLE)
        return Employee::query()
            ->join('offices', 'employees.office_id', '=', 'offices.id')
            ->join('detailed_offices', 'employees.detailed_office_id', '=', 'detailed_offices.id')
            ->select('employees.*', 'offices.name as office', 'detailed_offices.name as detailed_office');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }


    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('firstname')
            ->addColumn('middlename')
            ->addColumn('lastname')
            ->addColumn('birthday')
            ->addColumn('home_address')
            ->addColumn('applicant_no')
            ->addColumn('office')
            ->addColumn('division')
            ->addColumn('gsis_no')
            ->addColumn('tin_no')
            ->addColumn('philhealth')
            ->addColumn('detailed_office')
            ->addColumn('created_at_formatted', fn (Employee $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Employee $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('Employee No.', 'employee_no')
                ->searchable()
                ->headerAttribute('text-center')
                ->bodyAttribute('text-center')
                ->sortable(),
            Column::make('Firstname', 'firstname')
                ->searchable()
                ->headerAttribute('text-center')
                ->bodyAttribute('text-center')
                ->sortable(),
            Column::make('Middlename', 'middlename')
                ->searchable()
                ->bodyAttribute('text-center')
                ->headerAttribute('text-center')
                ->sortable(),
            Column::make('Lastname', 'lastname')
                ->searchable()
                ->bodyAttribute('text-center')
                ->headerAttribute('text-center')
                ->sortable(),
            Column::make('Birthday', 'birthday')
                ->bodyAttribute('text-center')
                ->headerAttribute('text-center'),
            Column::make('Home Address', 'home_address')
                ->searchable()
                ->bodyAttribute('text-center')
                ->headerAttribute('text-center'),
            Column::make('Applicant No.', 'applicant_no')
                ->headerAttribute('text-center')
                ->bodyAttribute('text-center'),
            Column::make('Office', 'office')
                ->headerAttribute('text-center')
                ->bodyAttribute('text-center'),
            Column::make('Division', 'division')
                ->headerAttribute('text-center')
                ->bodyAttribute('text-center'),
            Column::make('GSIS No.', 'gsis_no')
                ->headerAttribute('text-center')
                ->bodyAttribute('text-center'),
            Column::make('TIN', 'tin_no')
                ->headerAttribute('text-center')
                ->bodyAttribute('text-center'),
            Column::make('PhilHealth', 'philhealth')
                ->headerAttribute('text-center')
                ->bodyAttribute('text-center'),
            Column::make('Detailed Office', 'detailed_office')
                ->headerAttribute('text-center')
                ->bodyAttribute('text-center'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Employee Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            // GET THE ID OF SPECIFIC EMPLOYEES TO MAKE AN ACTION(EDIT OR REMOVE(MOVE TO ARCHIVE))
            Button::make('edit', 'Edit')
                ->class('bg-primary hover:bg-secondary font-robotoBold cursor-pointer text-white px-3 py-2 m-1 rounded text-sm font-semibold')
                ->route('admin.edit-employee', ['linkToken' => 'link_token', 'id' => 'id']),

            Button::make('qrCode', 'QR Code')
            ->class('bg-primary hover:bg-secondary font-robotoBold cursor-pointer text-white px-3 py-2 m-1 rounded text-sm font-semibold')
            ->openModal('employee-qr-code', ['id' => 'id']),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Employee Action Rules.
     *
     * @return array<int, RuleActions>
     */


    public function actionRules(): array
    {
       return [
            Rule::button('qrCode')
            ->when(fn($model) => $model->employee_no == null)
            ->disable(),

            Rule::rows()
            ->when(function ($model) {
                return $model->employee_no == null;
            })
            ->setAttribute('class', 'bg-red-200'),
        ];
    }
}

