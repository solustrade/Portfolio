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
    
    
    
    class bannerPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`banner`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new BlobField('image1');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new BlobField('image2');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new BlobField('image3');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new BlobField('image4');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new BlobField('image5');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new BlobField('image6');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new BlobField('image7');
            $this->dataset->AddField($field, false);
            $field = new BlobField('image8');
            $this->dataset->AddField($field, false);
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
            $grid->SearchControl = new SimpleSearch('bannerssearch', $this->dataset,
                array('id', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6'),
                array($this->RenderText('Id'), $this->RenderText('Slide 1'), $this->RenderText('Slide 2'), $this->RenderText('Slide 3'), $this->RenderText('Slide 4'), $this->RenderText('Slide 5'), $this->RenderText('Slide 6')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('bannerasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->setTimerInterval(1000);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('id', $this->RenderText('Id')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateBlobSearchInput('image1', $this->RenderText('Slide 1')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateBlobSearchInput('image2', $this->RenderText('Slide 2')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateBlobSearchInput('image3', $this->RenderText('Slide 3')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateBlobSearchInput('image4', $this->RenderText('Slide 4')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateBlobSearchInput('image5', $this->RenderText('Slide 5')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateBlobSearchInput('image6', $this->RenderText('Slide 6')));
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
            // View column for image1 field
            //
            $column = new TextViewColumn('image1', 'Slide 1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image1_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for image2 field
            //
            $column = new TextViewColumn('image2', 'Slide 2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image2_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for image3 field
            //
            $column = new TextViewColumn('image3', 'Slide 3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image3_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for image4 field
            //
            $column = new TextViewColumn('image4', 'Slide 4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image4_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for image5 field
            //
            $column = new TextViewColumn('image5', 'Slide 5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image5_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for image6 field
            //
            $column = new TextViewColumn('image6', 'Slide 6', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image6_handler_list');
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for image1 field
            //
            $column = new TextViewColumn('image1', 'Slide 1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image1_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for image2 field
            //
            $column = new TextViewColumn('image2', 'Slide 2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image2_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for image3 field
            //
            $column = new TextViewColumn('image3', 'Slide 3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image3_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for image4 field
            //
            $column = new TextViewColumn('image4', 'Slide 4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image4_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for image5 field
            //
            $column = new TextViewColumn('image5', 'Slide 5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image5_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for image6 field
            //
            $column = new TextViewColumn('image6', 'Slide 6', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bannerGrid_image6_handler_view');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for image1 field
            //
            $editor = new ImageUploader('image1_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 1', 'image1', $editor, $this->dataset, false, false, 'bannerGrid_image1_handler_edit');
            $editColumn->SetImageFilter(new NullFilter());
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for image2 field
            //
            $editor = new ImageUploader('image2_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 2', 'image2', $editor, $this->dataset, false, false, 'bannerGrid_image2_handler_edit');
            $editColumn->SetImageFilter(new NullFilter());
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for image3 field
            //
            $editor = new ImageUploader('image3_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 3', 'image3', $editor, $this->dataset, false, false, 'bannerGrid_image3_handler_edit');
            $editColumn->SetImageFilter(new NullFilter());
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for image4 field
            //
            $editor = new ImageUploader('image4_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 4', 'image4', $editor, $this->dataset, false, false, 'bannerGrid_image4_handler_edit');
            $editColumn->SetImageFilter(new NullFilter());
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for image5 field
            //
            $editor = new ImageUploader('image5_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 5', 'image5', $editor, $this->dataset, false, false, 'bannerGrid_image5_handler_edit');
            $editColumn->SetImageFilter(new NullFilter());
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for image6 field
            //
            $editor = new ImageUploader('image6_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 6', 'image6', $editor, $this->dataset, false, false, 'bannerGrid_image6_handler_edit');
            $editColumn->SetImageFilter(new NullFilter());
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for image1 field
            //
            $editor = new ImageUploader('image1_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 1', 'image1', $editor, $this->dataset, false, false, 'bannerGrid_image1_handler_insert');
            $editColumn->SetImageFilter(new NullFilter());
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for image2 field
            //
            $editor = new ImageUploader('image2_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 2', 'image2', $editor, $this->dataset, false, false, 'bannerGrid_image2_handler_insert');
            $editColumn->SetImageFilter(new NullFilter());
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for image3 field
            //
            $editor = new ImageUploader('image3_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 3', 'image3', $editor, $this->dataset, false, false, 'bannerGrid_image3_handler_insert');
            $editColumn->SetImageFilter(new NullFilter());
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for image4 field
            //
            $editor = new ImageUploader('image4_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 4', 'image4', $editor, $this->dataset, false, false, 'bannerGrid_image4_handler_insert');
            $editColumn->SetImageFilter(new NullFilter());
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for image5 field
            //
            $editor = new ImageUploader('image5_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 5', 'image5', $editor, $this->dataset, false, false, 'bannerGrid_image5_handler_insert');
            $editColumn->SetImageFilter(new NullFilter());
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for image6 field
            //
            $editor = new ImageUploader('image6_edit');
            $editor->SetShowImage(true);
            $editColumn = new FileUploadingColumn('Slide 6', 'image6', $editor, $this->dataset, false, false, 'bannerGrid_image6_handler_insert');
            $editColumn->SetImageFilter(new NullFilter());
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
            // View column for image1 field
            //
            $column = new TextViewColumn('image1', 'Image1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for image2 field
            //
            $column = new TextViewColumn('image2', 'Image2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for image3 field
            //
            $column = new TextViewColumn('image3', 'Image3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for image4 field
            //
            $column = new TextViewColumn('image4', 'Image4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for image5 field
            //
            $column = new TextViewColumn('image5', 'Image5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for image6 field
            //
            $column = new TextViewColumn('image6', 'Image6', $this->dataset);
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
            // View column for image1 field
            //
            $column = new TextViewColumn('image1', 'Image1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for image2 field
            //
            $column = new TextViewColumn('image2', 'Image2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for image3 field
            //
            $column = new TextViewColumn('image3', 'Image3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for image4 field
            //
            $column = new TextViewColumn('image4', 'Image4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for image5 field
            //
            $column = new TextViewColumn('image5', 'Image5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for image6 field
            //
            $column = new TextViewColumn('image6', 'Image6', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'banner_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'bannerGrid');
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(false);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            
            $result->SetHighlightRowAtHover(true);
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
            // View column for image1 field
            //
            $column = new TextViewColumn('image1', 'Slide 1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image1_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for image2 field
            //
            $column = new TextViewColumn('image2', 'Slide 2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image2_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for image3 field
            //
            $column = new TextViewColumn('image3', 'Slide 3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image3_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for image4 field
            //
            $column = new TextViewColumn('image4', 'Slide 4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image4_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for image5 field
            //
            $column = new TextViewColumn('image5', 'Slide 5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image5_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for image6 field
            //
            $column = new TextViewColumn('image6', 'Slide 6', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image6_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for image1 field
            //
            $column = new TextViewColumn('image1', 'Slide 1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image1_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for image2 field
            //
            $column = new TextViewColumn('image2', 'Slide 2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image2_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for image3 field
            //
            $column = new TextViewColumn('image3', 'Slide 3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image3_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for image4 field
            //
            $column = new TextViewColumn('image4', 'Slide 4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image4_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for image5 field
            //
            $column = new TextViewColumn('image5', 'Slide 5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image5_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for image6 field
            //
            $column = new TextViewColumn('image6', 'Slide 6', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bannerGrid_image6_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image1', 'bannerGrid_image1_handler_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image2', 'bannerGrid_image2_handler_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image3', 'bannerGrid_image3_handler_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image4', 'bannerGrid_image4_handler_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image5', 'bannerGrid_image5_handler_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image6', 'bannerGrid_image6_handler_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image1', 'bannerGrid_image1_handler_insert', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image2', 'bannerGrid_image2_handler_insert', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image3', 'bannerGrid_image3_handler_insert', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image4', 'bannerGrid_image4_handler_insert', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image5', 'bannerGrid_image5_handler_insert', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image6', 'bannerGrid_image6_handler_insert', new NullFilter());
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
        $Page = new bannerPage("banner.php", "banner", GetCurrentUserGrantForDataSource("banner"), 'UTF-8');
        $Page->SetShortCaption('Banner');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Banner');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("banner"));
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
	
