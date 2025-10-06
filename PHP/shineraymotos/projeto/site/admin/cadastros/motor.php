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
    
    
    
    class motorPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`motor`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('id_produto');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('relacao');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('diametro');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('cilindrada');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('tipo');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('cambio');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('embreagem');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('partida');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('transmissao');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('alimentacao');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('torque');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('potencia');
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
            $grid->SearchControl = new SimpleSearch('motorssearch', $this->dataset,
                array('id', 'id_produto_descricao', 'relacao', 'diametro', 'cilindrada', 'tipo', 'cambio', 'embreagem', 'partida', 'transmissao', 'alimentacao', 'torque', 'potencia'),
                array($this->RenderText('Id'), $this->RenderText('Produto'), $this->RenderText('Relação de compressão'), $this->RenderText('Diâmetro X Curso'), $this->RenderText('Cilindrada'), $this->RenderText('Tipo de motor'), $this->RenderText('Câmbio'), $this->RenderText('Embreagem'), $this->RenderText('Sistema de partida'), $this->RenderText('Transmissão'), $this->RenderText('Alimentação'), $this->RenderText('Torque máximo'), $this->RenderText('Potência máxima')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('motorasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
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
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('relacao', $this->RenderText('Relação de compressão')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('diametro', $this->RenderText('Diâmetro X Curso')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('cilindrada', $this->RenderText('Cilindrada')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('tipo', $this->RenderText('Tipo de motor')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('cambio', $this->RenderText('Câmbio')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('embreagem', $this->RenderText('Embreagem')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('partida', $this->RenderText('Sistema de partida')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('transmissao', $this->RenderText('Transmissão')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('alimentacao', $this->RenderText('Alimentação')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('torque', $this->RenderText('Torque máximo')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('potencia', $this->RenderText('Potência máxima')));
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
            // View column for relacao field
            //
            $column = new TextViewColumn('relacao', 'Relação de compressão', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_relacao_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for diametro field
            //
            $column = new TextViewColumn('diametro', 'Diâmetro X Curso', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_diametro_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for cilindrada field
            //
            $column = new TextViewColumn('cilindrada', 'Cilindrada', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_cilindrada_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tipo field
            //
            $column = new TextViewColumn('tipo', 'Tipo de motor', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_tipo_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for cambio field
            //
            $column = new TextViewColumn('cambio', 'Câmbio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_cambio_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for embreagem field
            //
            $column = new TextViewColumn('embreagem', 'Embreagem', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_embreagem_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for partida field
            //
            $column = new TextViewColumn('partida', 'Sistema de partida', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_partida_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for transmissao field
            //
            $column = new TextViewColumn('transmissao', 'Transmissão', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_transmissao_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for alimentacao field
            //
            $column = new TextViewColumn('alimentacao', 'Alimentação', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_alimentacao_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for torque field
            //
            $column = new TextViewColumn('torque', 'Torque máximo', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_torque_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for potencia field
            //
            $column = new TextViewColumn('potencia', 'Potência máxima', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_potencia_handler_list');
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
            // View column for relacao field
            //
            $column = new TextViewColumn('relacao', 'Relação de compressão', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_relacao_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for diametro field
            //
            $column = new TextViewColumn('diametro', 'Diâmetro X Curso', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_diametro_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for cilindrada field
            //
            $column = new TextViewColumn('cilindrada', 'Cilindrada', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_cilindrada_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tipo field
            //
            $column = new TextViewColumn('tipo', 'Tipo de motor', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_tipo_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for cambio field
            //
            $column = new TextViewColumn('cambio', 'Câmbio', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_cambio_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for embreagem field
            //
            $column = new TextViewColumn('embreagem', 'Embreagem', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_embreagem_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for partida field
            //
            $column = new TextViewColumn('partida', 'Sistema de partida', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_partida_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for transmissao field
            //
            $column = new TextViewColumn('transmissao', 'Transmissão', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_transmissao_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for alimentacao field
            //
            $column = new TextViewColumn('alimentacao', 'Alimentação', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_alimentacao_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for torque field
            //
            $column = new TextViewColumn('torque', 'Torque máximo', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_torque_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for potencia field
            //
            $column = new TextViewColumn('potencia', 'Potência máxima', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('motorGrid_potencia_handler_view');
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
            // Edit column for relacao field
            //
            $editor = new TextAreaEdit('relacao_edit', 50, 8);
            $editColumn = new CustomEditColumn('Relação de compressão', 'relacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for diametro field
            //
            $editor = new TextAreaEdit('diametro_edit', 50, 8);
            $editColumn = new CustomEditColumn('Diâmetro X Curso', 'diametro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for cilindrada field
            //
            $editor = new TextAreaEdit('cilindrada_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cilindrada', 'cilindrada', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for tipo field
            //
            $editor = new TextAreaEdit('tipo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Tipo de motor', 'tipo', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for cambio field
            //
            $editor = new TextAreaEdit('cambio_edit', 50, 8);
            $editColumn = new CustomEditColumn('Câmbio', 'cambio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for embreagem field
            //
            $editor = new TextAreaEdit('embreagem_edit', 50, 8);
            $editColumn = new CustomEditColumn('Embreagem', 'embreagem', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for partida field
            //
            $editor = new TextAreaEdit('partida_edit', 50, 8);
            $editColumn = new CustomEditColumn('Sistema de partida', 'partida', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for transmissao field
            //
            $editor = new TextAreaEdit('transmissao_edit', 50, 8);
            $editColumn = new CustomEditColumn('Transmissão', 'transmissao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for alimentacao field
            //
            $editor = new TextAreaEdit('alimentacao_edit', 50, 8);
            $editColumn = new CustomEditColumn('Alimentação', 'alimentacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for torque field
            //
            $editor = new TextAreaEdit('torque_edit', 50, 8);
            $editColumn = new CustomEditColumn('Torque máximo', 'torque', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for potencia field
            //
            $editor = new TextAreaEdit('potencia_edit', 50, 8);
            $editColumn = new CustomEditColumn('Potência máxima', 'potencia', $editor, $this->dataset);
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
            // Edit column for relacao field
            //
            $editor = new TextAreaEdit('relacao_edit', 50, 8);
            $editColumn = new CustomEditColumn('Relação de compressão', 'relacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for diametro field
            //
            $editor = new TextAreaEdit('diametro_edit', 50, 8);
            $editColumn = new CustomEditColumn('Diâmetro X Curso', 'diametro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for cilindrada field
            //
            $editor = new TextAreaEdit('cilindrada_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cilindrada', 'cilindrada', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for tipo field
            //
            $editor = new TextAreaEdit('tipo_edit', 50, 8);
            $editColumn = new CustomEditColumn('Tipo de motor', 'tipo', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for cambio field
            //
            $editor = new TextAreaEdit('cambio_edit', 50, 8);
            $editColumn = new CustomEditColumn('Câmbio', 'cambio', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for embreagem field
            //
            $editor = new TextAreaEdit('embreagem_edit', 50, 8);
            $editColumn = new CustomEditColumn('Embreagem', 'embreagem', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for partida field
            //
            $editor = new TextAreaEdit('partida_edit', 50, 8);
            $editColumn = new CustomEditColumn('Sistema de partida', 'partida', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for transmissao field
            //
            $editor = new TextAreaEdit('transmissao_edit', 50, 8);
            $editColumn = new CustomEditColumn('Transmissão', 'transmissao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for alimentacao field
            //
            $editor = new TextAreaEdit('alimentacao_edit', 50, 8);
            $editColumn = new CustomEditColumn('Alimentação', 'alimentacao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for torque field
            //
            $editor = new TextAreaEdit('torque_edit', 50, 8);
            $editColumn = new CustomEditColumn('Torque máximo', 'torque', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for potencia field
            //
            $editor = new TextAreaEdit('potencia_edit', 50, 8);
            $editColumn = new CustomEditColumn('Potência máxima', 'potencia', $editor, $this->dataset);
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
            // View column for relacao field
            //
            $column = new TextViewColumn('relacao', 'Relacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for diametro field
            //
            $column = new TextViewColumn('diametro', 'Diametro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for cilindrada field
            //
            $column = new TextViewColumn('cilindrada', 'Cilindrada', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for tipo field
            //
            $column = new TextViewColumn('tipo', 'Tipo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for cambio field
            //
            $column = new TextViewColumn('cambio', 'Cambio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for embreagem field
            //
            $column = new TextViewColumn('embreagem', 'Embreagem', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for partida field
            //
            $column = new TextViewColumn('partida', 'Partida', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for transmissao field
            //
            $column = new TextViewColumn('transmissao', 'Transmissao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for alimentacao field
            //
            $column = new TextViewColumn('alimentacao', 'Alimentacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for torque field
            //
            $column = new TextViewColumn('torque', 'Torque', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for potencia field
            //
            $column = new TextViewColumn('potencia', 'Potencia', $this->dataset);
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
            // View column for relacao field
            //
            $column = new TextViewColumn('relacao', 'Relacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for diametro field
            //
            $column = new TextViewColumn('diametro', 'Diametro', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for cilindrada field
            //
            $column = new TextViewColumn('cilindrada', 'Cilindrada', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for tipo field
            //
            $column = new TextViewColumn('tipo', 'Tipo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for cambio field
            //
            $column = new TextViewColumn('cambio', 'Cambio', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for embreagem field
            //
            $column = new TextViewColumn('embreagem', 'Embreagem', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for partida field
            //
            $column = new TextViewColumn('partida', 'Partida', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for transmissao field
            //
            $column = new TextViewColumn('transmissao', 'Transmissao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for alimentacao field
            //
            $column = new TextViewColumn('alimentacao', 'Alimentacao', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for torque field
            //
            $column = new TextViewColumn('torque', 'Torque', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for potencia field
            //
            $column = new TextViewColumn('potencia', 'Potencia', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'motor_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'motorGrid');
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
            // View column for relacao field
            //
            $column = new TextViewColumn('relacao', 'Relação de compressão', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_relacao_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for diametro field
            //
            $column = new TextViewColumn('diametro', 'Diâmetro X Curso', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_diametro_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for cilindrada field
            //
            $column = new TextViewColumn('cilindrada', 'Cilindrada', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_cilindrada_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for tipo field
            //
            $column = new TextViewColumn('tipo', 'Tipo de motor', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_tipo_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for cambio field
            //
            $column = new TextViewColumn('cambio', 'Câmbio', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_cambio_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for embreagem field
            //
            $column = new TextViewColumn('embreagem', 'Embreagem', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_embreagem_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for partida field
            //
            $column = new TextViewColumn('partida', 'Sistema de partida', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_partida_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for transmissao field
            //
            $column = new TextViewColumn('transmissao', 'Transmissão', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_transmissao_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for alimentacao field
            //
            $column = new TextViewColumn('alimentacao', 'Alimentação', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_alimentacao_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for torque field
            //
            $column = new TextViewColumn('torque', 'Torque máximo', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_torque_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for potencia field
            //
            $column = new TextViewColumn('potencia', 'Potência máxima', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_potencia_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for relacao field
            //
            $column = new TextViewColumn('relacao', 'Relação de compressão', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_relacao_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for diametro field
            //
            $column = new TextViewColumn('diametro', 'Diâmetro X Curso', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_diametro_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for cilindrada field
            //
            $column = new TextViewColumn('cilindrada', 'Cilindrada', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_cilindrada_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for tipo field
            //
            $column = new TextViewColumn('tipo', 'Tipo de motor', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_tipo_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for cambio field
            //
            $column = new TextViewColumn('cambio', 'Câmbio', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_cambio_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for embreagem field
            //
            $column = new TextViewColumn('embreagem', 'Embreagem', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_embreagem_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for partida field
            //
            $column = new TextViewColumn('partida', 'Sistema de partida', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_partida_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for transmissao field
            //
            $column = new TextViewColumn('transmissao', 'Transmissão', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_transmissao_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for alimentacao field
            //
            $column = new TextViewColumn('alimentacao', 'Alimentação', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_alimentacao_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for torque field
            //
            $column = new TextViewColumn('torque', 'Torque máximo', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_torque_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for potencia field
            //
            $column = new TextViewColumn('potencia', 'Potência máxima', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'motorGrid_potencia_handler_view', $column);
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
        $Page = new motorPage("motor.php", "motor", GetCurrentUserGrantForDataSource("motor"), 'UTF-8');
        $Page->SetShortCaption('Motor');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Motor');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("motor"));
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
	
