<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */


    include_once dirname(__FILE__) . '/' . 'components/utils/check_utils.php';
    CheckPHPVersion();
    CheckTemplatesCacheFolderIsExistsAndWritable();


    include_once dirname(__FILE__) . '/' . 'phpgen_settings.php';
    include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page.php';


    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthorizationStrategy()->ApplyIdentityToConnectionOptions($result);
        return $result;
    }

    
    // OnGlobalBeforePageExecute event handler
    
    
    // OnBeforePageExecute event handler
    
    
    
    class capacidadesPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`capacidades`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('id_produto');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('oleo_amort');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('farol');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('bateria');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('ignicao');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('oleo_motor');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('tanque');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('id_produto', 'produtos', new IntegerField('id', null, null, true), new StringField('descricao', 'id_produto_descricao', 'id_produto_descricao_produtos'), 'id_produto_descricao_produtos');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        public function GetPageList()
        {
            $currentPageCaption = $this->GetShortCaption();
            $result = new PageList($this);
            $result->AddGroup($this->RenderText('Default'));
            if (GetCurrentUserGrantForDataSource('produtos')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Produtos'), 'produtos.php', $this->RenderText('Produtos'), $currentPageCaption == $this->RenderText('Produtos'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('motor')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Motor'), 'motor.php', $this->RenderText('Motor'), $currentPageCaption == $this->RenderText('Motor'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('capacidades')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Capacidades'), 'capacidades.php', $this->RenderText('Capacidades'), $currentPageCaption == $this->RenderText('Capacidades'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('chassi')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Chassi'), 'chassi.php', $this->RenderText('Chassi'), $currentPageCaption == $this->RenderText('Chassi'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('dimensoes')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Dimensoes'), 'dimensoes.php', $this->RenderText('Dimensoes'), $currentPageCaption == $this->RenderText('Dimensoes'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('atributos')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Atributos'), 'atributos.php', $this->RenderText('Atributos'), $currentPageCaption == $this->RenderText('Atributos'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('manual')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Manual'), 'manual.php', $this->RenderText('Manual'), $currentPageCaption == $this->RenderText('Manual'), false, $this->RenderText('Default')));
            if (GetCurrentUserGrantForDataSource('banner')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Banner'), 'banner.php', $this->RenderText('Banner'), $currentPageCaption == $this->RenderText('Banner'), false, $this->RenderText('Default')));
            
            if ( HasAdminPage() && GetApplication()->HasAdminGrantForCurrentUser() ) {
              $result->AddGroup('Admin area');
              $result->AddPage(new PageLink($this->GetLocalizerCaptions()->GetMessageString('AdminPage'), 'phpgen_admin.php', $this->GetLocalizerCaptions()->GetMessageString('AdminPage'), false, false, 'Admin area'));
            }
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function CreateGridSearchControl(Grid $grid)
        {
            $grid->UseFilter = true;
            $grid->SearchControl = new SimpleSearch('capacidadesssearch', $this->dataset,
                array('id', 'id_produto_descricao', 'oleo_amort', 'farol', 'bateria', 'ignicao', 'oleo_motor', 'tanque'),
                array($this->RenderText('Id'), $this->RenderText('Produto'), $this->RenderText('Óleo amortecedor'), $this->RenderText('Farol'), $this->RenderText('Bateria'), $this->RenderText('Ignição'), $this->RenderText('Óleo motor (total)'), $this->RenderText('Tanque combustível')),
                array(
                    '=' => $this->GetLocalizerCaptions()->GetMessageString('equals'),
                    '<>' => $this->GetLocalizerCaptions()->GetMessageString('doesNotEquals'),
                    '<' => $this->GetLocalizerCaptions()->GetMessageString('isLessThan'),
                    '<=' => $this->GetLocalizerCaptions()->GetMessageString('isLessThanOrEqualsTo'),
                    '>' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThan'),
                    '>=' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThanOrEqualsTo'),
                    'ILIKE' => $this->GetLocalizerCaptions()->GetMessageString('Like'),
                    'STARTS' => $this->GetLocalizerCaptions()->GetMessageString('StartsWith'),
                    'ENDS' => $this->GetLocalizerCaptions()->GetMessageString('EndsWith'),
                    'CONTAINS' => $this->GetLocalizerCaptions()->GetMessageString('Contains')
                    ), $this->GetLocalizerCaptions(), $this, 'CONTAINS'
                );
        }
    
        protected function CreateGridAdvancedSearchControl(Grid $grid)
        {
            $this->AdvancedSearchControl = new AdvancedSearchControl('capacidadesasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('id', $this->RenderText('Id')));
            
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`produtos`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('tipo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('descricao');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('preco1');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('preco2');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('foto');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('descricao', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('id_produto', $this->RenderText('Produto'), $lookupDataset, 'id', 'descricao', false, 8));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('oleo_amort', $this->RenderText('Óleo amortecedor')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('farol', $this->RenderText('Farol')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('bateria', $this->RenderText('Bateria')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('ignicao', $this->RenderText('Ignição')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('oleo_motor', $this->RenderText('Óleo motor (total)')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('tanque', $this->RenderText('Tanque combustível')));
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actionsBandName = 'actions';
            $grid->AddBandToBegin($actionsBandName, $this->GetLocalizerCaptions()->GetMessageString('Actions'), true);
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
            }
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->OnShow->AddListener('ShowDeleteButtonHandler', $this);
            $column->SetAdditionalAttribute("data-modal-delete", "true");
            $column->SetAdditionalAttribute("data-delete-handler-name", $this->GetModalGridDeleteHandler());
            }
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
            }
        }
    
        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for descricao field
            //
            $column = new TextViewColumn('id_produto_descricao', 'Produto', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for oleo_amort field
            //
            $column = new TextViewColumn('oleo_amort', 'Óleo amortecedor', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_oleo_amort_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for farol field
            //
            $column = new TextViewColumn('farol', 'Farol', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_farol_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for bateria field
            //
            $column = new TextViewColumn('bateria', 'Bateria', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_bateria_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for ignicao field
            //
            $column = new TextViewColumn('ignicao', 'Ignição', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_ignicao_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for oleo_motor field
            //
            $column = new TextViewColumn('oleo_motor', 'Óleo motor (total)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_oleo_motor_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tanque field
            //
            $column = new TextViewColumn('tanque', 'Tanque combustível', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_tanque_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for descricao field
            //
            $column = new TextViewColumn('id_produto_descricao', 'Produto', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for oleo_amort field
            //
            $column = new TextViewColumn('oleo_amort', 'Óleo amortecedor', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_oleo_amort_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for farol field
            //
            $column = new TextViewColumn('farol', 'Farol', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_farol_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for bateria field
            //
            $column = new TextViewColumn('bateria', 'Bateria', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_bateria_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ignicao field
            //
            $column = new TextViewColumn('ignicao', 'Ignição', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_ignicao_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for oleo_motor field
            //
            $column = new TextViewColumn('oleo_motor', 'Óleo motor (total)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_oleo_motor_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tanque field
            //
            $column = new TextViewColumn('tanque', 'Tanque combustível', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('capacidadesGrid_tanque_handler_view');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for id_produto field
            //
            $editor = new ComboBox('id_produto_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`produtos`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('tipo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('descricao');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('preco1');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('preco2');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('foto');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('descricao', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Produto', 
                'id_produto', 
                $editor, 
                $this->dataset, 'id', 'descricao', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for oleo_amort field
            //
            $editor = new TextAreaEdit('oleo_amort_edit', 50, 8);
            $editColumn = new CustomEditColumn('Óleo amortecedor', 'oleo_amort', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for farol field
            //
            $editor = new TextAreaEdit('farol_edit', 50, 8);
            $editColumn = new CustomEditColumn('Farol', 'farol', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for bateria field
            //
            $editor = new TextAreaEdit('bateria_edit', 50, 8);
            $editColumn = new CustomEditColumn('Bateria', 'bateria', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ignicao field
            //
            $editor = new TextAreaEdit('ignicao_edit', 50, 8);
            $editColumn = new CustomEditColumn('Ignição', 'ignicao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for oleo_motor field
            //
            $editor = new TextAreaEdit('oleo_motor_edit', 50, 8);
            $editColumn = new CustomEditColumn('Óleo motor (total)', 'oleo_motor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for tanque field
            //
            $editor = new TextAreaEdit('tanque_edit', 50, 8);
            $editColumn = new CustomEditColumn('Tanque combustível', 'tanque', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for id_produto field
            //
            $editor = new ComboBox('id_produto_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`produtos`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('tipo');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('descricao');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('preco1');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('preco2');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('foto');
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('descricao', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Produto', 
                'id_produto', 
                $editor, 
                $this->dataset, 'id', 'descricao', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for oleo_amort field
            //
            $editor = new TextAreaEdit('oleo_amort_edit', 50, 8);
            $editColumn = new CustomEditColumn('Óleo amortecedor', 'oleo_amort', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for farol field
            //
            $editor = new TextAreaEdit('farol_edit', 50, 8);
            $editColumn = new CustomEditColumn('Farol', 'farol', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for bateria field
            //
            $editor = new TextAreaEdit('bateria_edit', 50, 8);
            $editColumn = new CustomEditColumn('Bateria', 'bateria', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ignicao field
            //
            $editor = new TextAreaEdit('ignicao_edit', 50, 8);
            $editColumn = new CustomEditColumn('Ignição', 'ignicao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for oleo_motor field
            //
            $editor = new TextAreaEdit('oleo_motor_edit', 50, 8);
            $editColumn = new CustomEditColumn('Óleo motor (total)', 'oleo_motor', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for tanque field
            //
            $editor = new TextAreaEdit('tanque_edit', 50, 8);
            $editColumn = new CustomEditColumn('Tanque combustível', 'tanque', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $grid->SetShowAddButton(true);
                $grid->SetShowInlineAddButton(false);
            }
            else
            {
                $grid->SetShowInlineAddButton(false);
                $grid->SetShowAddButton(false);
            }
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for id field
            //
            $column = new TextViewColumn('id', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for descricao field
            //
            $column = new TextViewColumn('id_produto_descricao', 'Produto', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for oleo_amort field
            //
            $column = new TextViewColumn('oleo_amort', 'Oleo Amort', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for farol field
            //
            $column = new TextViewColumn('farol', 'Farol', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for bateria field
            //
            $column = new TextViewColumn('bateria', 'Bateria', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ignicao field
            //
            $column = new TextViewColumn('ignicao', 'Ignicao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for oleo_motor field
            //
            $column = new TextViewColumn('oleo_motor', 'Oleo Motor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for tanque field
            //
            $column = new TextViewColumn('tanque', 'Tanque', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for id field
            //
            $column = new TextViewColumn('id', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for descricao field
            //
            $column = new TextViewColumn('id_produto_descricao', 'Produto', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for oleo_amort field
            //
            $column = new TextViewColumn('oleo_amort', 'Oleo Amort', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for farol field
            //
            $column = new TextViewColumn('farol', 'Farol', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for bateria field
            //
            $column = new TextViewColumn('bateria', 'Bateria', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ignicao field
            //
            $column = new TextViewColumn('ignicao', 'Ignicao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for oleo_motor field
            //
            $column = new TextViewColumn('oleo_motor', 'Oleo Motor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for tanque field
            //
            $column = new TextViewColumn('tanque', 'Tanque', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        public function ShowEditButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasEditGrant($this->GetDataset());
        }
        public function ShowDeleteButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasDeleteGrant($this->GetDataset());
        }
        
        public function GetModalGridDeleteHandler() { return 'capacidades_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'capacidadesGrid');
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(false);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->CreateGridSearchControl($result);
            $this->CreateGridAdvancedSearchControl($result);
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
    
            $this->SetShowPageList(true);
            $this->SetHidePageListByDefault(false);
            $this->SetExportToExcelAvailable(false);
            $this->SetExportToWordAvailable(false);
            $this->SetExportToXmlAvailable(false);
            $this->SetExportToCsvAvailable(false);
            $this->SetExportToPdfAvailable(false);
            $this->SetPrinterFriendlyAvailable(false);
            $this->SetSimpleSearchAvailable(true);
            $this->SetAdvancedSearchAvailable(false);
            $this->SetFilterRowAvailable(false);
            $this->SetVisualEffectsEnabled(false);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
    
            //
            // Http Handlers
            //
            //
            // View column for oleo_amort field
            //
            $column = new TextViewColumn('oleo_amort', 'Óleo amortecedor', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_oleo_amort_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for farol field
            //
            $column = new TextViewColumn('farol', 'Farol', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_farol_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for bateria field
            //
            $column = new TextViewColumn('bateria', 'Bateria', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_bateria_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for ignicao field
            //
            $column = new TextViewColumn('ignicao', 'Ignição', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_ignicao_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for oleo_motor field
            //
            $column = new TextViewColumn('oleo_motor', 'Óleo motor (total)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_oleo_motor_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for tanque field
            //
            $column = new TextViewColumn('tanque', 'Tanque combustível', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_tanque_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for oleo_amort field
            //
            $column = new TextViewColumn('oleo_amort', 'Óleo amortecedor', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_oleo_amort_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for farol field
            //
            $column = new TextViewColumn('farol', 'Farol', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_farol_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for bateria field
            //
            $column = new TextViewColumn('bateria', 'Bateria', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_bateria_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for ignicao field
            //
            $column = new TextViewColumn('ignicao', 'Ignição', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_ignicao_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for oleo_motor field
            //
            $column = new TextViewColumn('oleo_motor', 'Óleo motor (total)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_oleo_motor_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for tanque field
            //
            $column = new TextViewColumn('tanque', 'Tanque combustível', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'capacidadesGrid_tanque_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            return $result;
        }
        
        public function OpenAdvancedSearchByDefault()
        {
            return false;
        }
    
        protected function DoGetGridHeader()
        {
            return '';
        }
    }



    try
    {
        $Page = new capacidadesPage("capacidades.php", "capacidades", GetCurrentUserGrantForDataSource("capacidades"), 'UTF-8');
        $Page->SetShortCaption('Capacidades');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Capacidades');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("capacidades"));
        GetApplication()->SetEnableLessRunTimeCompile(GetEnableLessFilesRunTimeCompilation());
        GetApplication()->SetCanUserChangeOwnPassword(
            !function_exists('CanUserChangeOwnPassword') || CanUserChangeOwnPassword());
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e->getMessage());
    }
	
