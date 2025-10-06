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
    
    
    
    class chassiPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`chassi`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('id_produto');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('roda_traseira');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('roda_dianteira');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('pneu_traseiro');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('pneu_dianteiro');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('freio_traseiro');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('freio_dianteiro');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('susp_traseira');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('susp_dianteira');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('tipo_chassi');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('tipo_roda');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('balanca');
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
            $grid->SearchControl = new SimpleSearch('chassissearch', $this->dataset,
                array('id', 'id_produto_descricao', 'roda_traseira', 'roda_dianteira', 'pneu_traseiro', 'pneu_dianteiro', 'freio_traseiro', 'freio_dianteiro', 'susp_traseira', 'susp_dianteira', 'tipo_chassi', 'tipo_roda', 'balanca'),
                array($this->RenderText('Id'), $this->RenderText('Produto'), $this->RenderText('Roda Traseira'), $this->RenderText('Roda Dianteira'), $this->RenderText('Pneu Traseiro (diâmetro)'), $this->RenderText('Pneu Dianteiro (diâmetro)'), $this->RenderText('Freio Traseiro (diâmetro)'), $this->RenderText('Freio Dianteiro (diâmetro)'), $this->RenderText('Suspensão Traseira (Curso)'), $this->RenderText('Suspensão Dianteira (Curso)'), $this->RenderText('Tipo Chassi'), $this->RenderText('Tipo Roda'), $this->RenderText('Balança')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('chassiasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
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
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('roda_traseira', $this->RenderText('Roda Traseira')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('roda_dianteira', $this->RenderText('Roda Dianteira')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('pneu_traseiro', $this->RenderText('Pneu Traseiro (diâmetro)')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('pneu_dianteiro', $this->RenderText('Pneu Dianteiro (diâmetro)')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('freio_traseiro', $this->RenderText('Freio Traseiro (diâmetro)')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('freio_dianteiro', $this->RenderText('Freio Dianteiro (diâmetro)')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('susp_traseira', $this->RenderText('Suspensão Traseira (Curso)')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('susp_dianteira', $this->RenderText('Suspensão Dianteira (Curso)')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('tipo_chassi', $this->RenderText('Tipo Chassi')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('tipo_roda', $this->RenderText('Tipo Roda')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('balanca', $this->RenderText('Balança')));
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
            // View column for roda_traseira field
            //
            $column = new TextViewColumn('roda_traseira', 'Roda Traseira', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_roda_traseira_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for roda_dianteira field
            //
            $column = new TextViewColumn('roda_dianteira', 'Roda Dianteira', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_roda_dianteira_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for pneu_traseiro field
            //
            $column = new TextViewColumn('pneu_traseiro', 'Pneu Traseiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_pneu_traseiro_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for pneu_dianteiro field
            //
            $column = new TextViewColumn('pneu_dianteiro', 'Pneu Dianteiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_pneu_dianteiro_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for freio_traseiro field
            //
            $column = new TextViewColumn('freio_traseiro', 'Freio Traseiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_freio_traseiro_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for freio_dianteiro field
            //
            $column = new TextViewColumn('freio_dianteiro', 'Freio Dianteiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_freio_dianteiro_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for susp_traseira field
            //
            $column = new TextViewColumn('susp_traseira', 'Suspensão Traseira (Curso)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_susp_traseira_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for susp_dianteira field
            //
            $column = new TextViewColumn('susp_dianteira', 'Suspensão Dianteira (Curso)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_susp_dianteira_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tipo_chassi field
            //
            $column = new TextViewColumn('tipo_chassi', 'Tipo Chassi', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_tipo_chassi_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tipo_roda field
            //
            $column = new TextViewColumn('tipo_roda', 'Tipo Roda', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_tipo_roda_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for balanca field
            //
            $column = new TextViewColumn('balanca', 'Balança', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_balanca_handler_list');
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
            // View column for roda_traseira field
            //
            $column = new TextViewColumn('roda_traseira', 'Roda Traseira', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_roda_traseira_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for roda_dianteira field
            //
            $column = new TextViewColumn('roda_dianteira', 'Roda Dianteira', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_roda_dianteira_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for pneu_traseiro field
            //
            $column = new TextViewColumn('pneu_traseiro', 'Pneu Traseiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_pneu_traseiro_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for pneu_dianteiro field
            //
            $column = new TextViewColumn('pneu_dianteiro', 'Pneu Dianteiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_pneu_dianteiro_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for freio_traseiro field
            //
            $column = new TextViewColumn('freio_traseiro', 'Freio Traseiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_freio_traseiro_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for freio_dianteiro field
            //
            $column = new TextViewColumn('freio_dianteiro', 'Freio Dianteiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_freio_dianteiro_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for susp_traseira field
            //
            $column = new TextViewColumn('susp_traseira', 'Suspensão Traseira (Curso)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_susp_traseira_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for susp_dianteira field
            //
            $column = new TextViewColumn('susp_dianteira', 'Suspensão Dianteira (Curso)', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_susp_dianteira_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tipo_chassi field
            //
            $column = new TextViewColumn('tipo_chassi', 'Tipo Chassi', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_tipo_chassi_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tipo_roda field
            //
            $column = new TextViewColumn('tipo_roda', 'Tipo Roda', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_tipo_roda_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for balanca field
            //
            $column = new TextViewColumn('balanca', 'Balança', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('chassiGrid_balanca_handler_view');
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
            // Edit column for roda_traseira field
            //
            $editor = new TextAreaEdit('roda_traseira_edit', 50, 8);
            $editColumn = new CustomEditColumn('Roda Traseira', 'roda_traseira', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for roda_dianteira field
            //
            $editor = new TextAreaEdit('roda_dianteira_edit', 50, 8);
            $editColumn = new CustomEditColumn('Roda Dianteira', 'roda_dianteira', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for pneu_traseiro field
            //
            $editor = new TextAreaEdit('pneu_traseiro_edit', 50, 8);
            $editColumn = new CustomEditColumn('Pneu Traseiro (diâmetro)', 'pneu_traseiro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for pneu_dianteiro field
            //
            $editor = new TextAreaEdit('pneu_dianteiro_edit', 50, 8);
            $editColumn = new CustomEditColumn('Pneu Dianteiro (diâmetro)', 'pneu_dianteiro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for freio_traseiro field
            //
            $editor = new TextAreaEdit('freio_traseiro_edit', 50, 8);
            $editColumn = new CustomEditColumn('Freio Traseiro (diâmetro)', 'freio_traseiro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for freio_dianteiro field
            //
            $editor = new TextAreaEdit('freio_dianteiro_edit', 50, 8);
            $editColumn = new CustomEditColumn('Freio Dianteiro (diâmetro)', 'freio_dianteiro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for susp_traseira field
            //
            $editor = new TextAreaEdit('susp_traseira_edit', 50, 8);
            $editColumn = new CustomEditColumn('Suspensão Traseira (Curso)', 'susp_traseira', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for susp_dianteira field
            //
            $editor = new TextAreaEdit('susp_dianteira_edit', 50, 8);
            $editColumn = new CustomEditColumn('Suspensão Dianteira (Curso)', 'susp_dianteira', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for tipo_chassi field
            //
            $editor = new TextAreaEdit('tipo_chassi_edit', 50, 8);
            $editColumn = new CustomEditColumn('Tipo Chassi', 'tipo_chassi', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for tipo_roda field
            //
            $editor = new TextAreaEdit('tipo_roda_edit', 50, 8);
            $editColumn = new CustomEditColumn('Tipo Roda', 'tipo_roda', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for balanca field
            //
            $editor = new TextAreaEdit('balanca_edit', 50, 8);
            $editColumn = new CustomEditColumn('Balança', 'balanca', $editor, $this->dataset);
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
            // Edit column for roda_traseira field
            //
            $editor = new TextAreaEdit('roda_traseira_edit', 50, 8);
            $editColumn = new CustomEditColumn('Roda Traseira', 'roda_traseira', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for roda_dianteira field
            //
            $editor = new TextAreaEdit('roda_dianteira_edit', 50, 8);
            $editColumn = new CustomEditColumn('Roda Dianteira', 'roda_dianteira', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for pneu_traseiro field
            //
            $editor = new TextAreaEdit('pneu_traseiro_edit', 50, 8);
            $editColumn = new CustomEditColumn('Pneu Traseiro (diâmetro)', 'pneu_traseiro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for pneu_dianteiro field
            //
            $editor = new TextAreaEdit('pneu_dianteiro_edit', 50, 8);
            $editColumn = new CustomEditColumn('Pneu Dianteiro (diâmetro)', 'pneu_dianteiro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for freio_traseiro field
            //
            $editor = new TextAreaEdit('freio_traseiro_edit', 50, 8);
            $editColumn = new CustomEditColumn('Freio Traseiro (diâmetro)', 'freio_traseiro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for freio_dianteiro field
            //
            $editor = new TextAreaEdit('freio_dianteiro_edit', 50, 8);
            $editColumn = new CustomEditColumn('Freio Dianteiro (diâmetro)', 'freio_dianteiro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for susp_traseira field
            //
            $editor = new TextAreaEdit('susp_traseira_edit', 50, 8);
            $editColumn = new CustomEditColumn('Suspensão Traseira (Curso)', 'susp_traseira', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for susp_dianteira field
            //
            $editor = new TextAreaEdit('susp_dianteira_edit', 50, 8);
            $editColumn = new CustomEditColumn('Suspensão Dianteira (Curso)', 'susp_dianteira', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for tipo_chassi field
            //
            $editor = new TextAreaEdit('tipo_chassi_edit', 50, 8);
            $editColumn = new CustomEditColumn('Tipo Chassi', 'tipo_chassi', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for tipo_roda field
            //
            $editor = new TextAreaEdit('tipo_roda_edit', 50, 8);
            $editColumn = new CustomEditColumn('Tipo Roda', 'tipo_roda', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for balanca field
            //
            $editor = new TextAreaEdit('balanca_edit', 50, 8);
            $editColumn = new CustomEditColumn('Balança', 'balanca', $editor, $this->dataset);
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
            // View column for roda_traseira field
            //
            $column = new TextViewColumn('roda_traseira', 'Roda Traseira', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for roda_dianteira field
            //
            $column = new TextViewColumn('roda_dianteira', 'Roda Dianteira', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for pneu_traseiro field
            //
            $column = new TextViewColumn('pneu_traseiro', 'Pneu Traseiro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for pneu_dianteiro field
            //
            $column = new TextViewColumn('pneu_dianteiro', 'Pneu Dianteiro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for freio_traseiro field
            //
            $column = new TextViewColumn('freio_traseiro', 'Freio Traseiro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for freio_dianteiro field
            //
            $column = new TextViewColumn('freio_dianteiro', 'Freio Dianteiro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for susp_traseira field
            //
            $column = new TextViewColumn('susp_traseira', 'Susp Traseira', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for susp_dianteira field
            //
            $column = new TextViewColumn('susp_dianteira', 'Susp Dianteira', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for tipo_chassi field
            //
            $column = new TextViewColumn('tipo_chassi', 'Tipo Chassi', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for tipo_roda field
            //
            $column = new TextViewColumn('tipo_roda', 'Tipo Roda', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for balanca field
            //
            $column = new TextViewColumn('balanca', 'Balanca', $this->dataset);
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
            // View column for roda_traseira field
            //
            $column = new TextViewColumn('roda_traseira', 'Roda Traseira', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for roda_dianteira field
            //
            $column = new TextViewColumn('roda_dianteira', 'Roda Dianteira', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for pneu_traseiro field
            //
            $column = new TextViewColumn('pneu_traseiro', 'Pneu Traseiro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for pneu_dianteiro field
            //
            $column = new TextViewColumn('pneu_dianteiro', 'Pneu Dianteiro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for freio_traseiro field
            //
            $column = new TextViewColumn('freio_traseiro', 'Freio Traseiro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for freio_dianteiro field
            //
            $column = new TextViewColumn('freio_dianteiro', 'Freio Dianteiro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for susp_traseira field
            //
            $column = new TextViewColumn('susp_traseira', 'Susp Traseira', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for susp_dianteira field
            //
            $column = new TextViewColumn('susp_dianteira', 'Susp Dianteira', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for tipo_chassi field
            //
            $column = new TextViewColumn('tipo_chassi', 'Tipo Chassi', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for tipo_roda field
            //
            $column = new TextViewColumn('tipo_roda', 'Tipo Roda', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for balanca field
            //
            $column = new TextViewColumn('balanca', 'Balanca', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'chassi_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'chassiGrid');
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
            // View column for roda_traseira field
            //
            $column = new TextViewColumn('roda_traseira', 'Roda Traseira', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_roda_traseira_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for roda_dianteira field
            //
            $column = new TextViewColumn('roda_dianteira', 'Roda Dianteira', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_roda_dianteira_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for pneu_traseiro field
            //
            $column = new TextViewColumn('pneu_traseiro', 'Pneu Traseiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_pneu_traseiro_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for pneu_dianteiro field
            //
            $column = new TextViewColumn('pneu_dianteiro', 'Pneu Dianteiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_pneu_dianteiro_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for freio_traseiro field
            //
            $column = new TextViewColumn('freio_traseiro', 'Freio Traseiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_freio_traseiro_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for freio_dianteiro field
            //
            $column = new TextViewColumn('freio_dianteiro', 'Freio Dianteiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_freio_dianteiro_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for susp_traseira field
            //
            $column = new TextViewColumn('susp_traseira', 'Suspensão Traseira (Curso)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_susp_traseira_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for susp_dianteira field
            //
            $column = new TextViewColumn('susp_dianteira', 'Suspensão Dianteira (Curso)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_susp_dianteira_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for tipo_chassi field
            //
            $column = new TextViewColumn('tipo_chassi', 'Tipo Chassi', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_tipo_chassi_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for tipo_roda field
            //
            $column = new TextViewColumn('tipo_roda', 'Tipo Roda', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_tipo_roda_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for balanca field
            //
            $column = new TextViewColumn('balanca', 'Balança', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_balanca_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for roda_traseira field
            //
            $column = new TextViewColumn('roda_traseira', 'Roda Traseira', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_roda_traseira_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for roda_dianteira field
            //
            $column = new TextViewColumn('roda_dianteira', 'Roda Dianteira', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_roda_dianteira_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for pneu_traseiro field
            //
            $column = new TextViewColumn('pneu_traseiro', 'Pneu Traseiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_pneu_traseiro_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for pneu_dianteiro field
            //
            $column = new TextViewColumn('pneu_dianteiro', 'Pneu Dianteiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_pneu_dianteiro_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for freio_traseiro field
            //
            $column = new TextViewColumn('freio_traseiro', 'Freio Traseiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_freio_traseiro_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for freio_dianteiro field
            //
            $column = new TextViewColumn('freio_dianteiro', 'Freio Dianteiro (diâmetro)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_freio_dianteiro_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for susp_traseira field
            //
            $column = new TextViewColumn('susp_traseira', 'Suspensão Traseira (Curso)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_susp_traseira_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for susp_dianteira field
            //
            $column = new TextViewColumn('susp_dianteira', 'Suspensão Dianteira (Curso)', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_susp_dianteira_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for tipo_chassi field
            //
            $column = new TextViewColumn('tipo_chassi', 'Tipo Chassi', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_tipo_chassi_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for tipo_roda field
            //
            $column = new TextViewColumn('tipo_roda', 'Tipo Roda', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_tipo_roda_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for balanca field
            //
            $column = new TextViewColumn('balanca', 'Balança', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'chassiGrid_balanca_handler_view', $column);
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
        $Page = new chassiPage("chassi.php", "chassi", GetCurrentUserGrantForDataSource("chassi"), 'UTF-8');
        $Page->SetShortCaption('Chassi');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Chassi');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("chassi"));
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
	
