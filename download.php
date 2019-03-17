<?php
    require './inc/config.inc.php';
    $html = <<<html
    <?xml version="1.0"?>
    <?mso-application progid="Excel.Sheet"?>
    <Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
     xmlns:o="urn:schemas-microsoft-com:office:office"
     xmlns:x="urn:schemas-microsoft-com:office:excel"
     xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
     xmlns:html="http://www.w3.org/TR/REC-html40">
     <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
      <LastAuthor>Usuario</LastAuthor>
      <LastSaved>2019-03-17T00:35:27Z</LastSaved>
      <Version>16.00</Version>
     </DocumentProperties>
     <OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">
      <AllowPNG/>
     </OfficeDocumentSettings>
     <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">
      <WindowHeight>7545</WindowHeight>
      <WindowWidth>20490</WindowWidth>
      <WindowTopX>32767</WindowTopX>
      <WindowTopY>32767</WindowTopY>
      <ProtectStructure>False</ProtectStructure>
      <ProtectWindows>False</ProtectWindows>
     </ExcelWorkbook>
     <Styles>
      <Style ss:ID="Default" ss:Name="Normal">
       <Alignment ss:Vertical="Bottom"/>
       <Borders/>
       <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"/>
       <Interior/>
       <NumberFormat/>
       <Protection/>
      </Style>
      <Style ss:ID="s68">
       <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
       <Font ss:FontName="Arial" x:Family="Swiss"/>
      </Style>
      <Style ss:ID="s70">
       <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
       <Borders>
        <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
       </Borders>
       <Font ss:FontName="Arial" x:Family="Swiss"/>
      </Style>
      <Style ss:ID="s74">
       <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
       <Borders>
        <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
       </Borders>
       <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="14" ss:Bold="1"/>
      </Style>
      <Style ss:ID="s77">
       <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
       <Borders>
        <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
       </Borders>
       <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="11" ss:Bold="1"/>
      </Style>
      <Style ss:ID="s78">
       <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
       <Borders>
        <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
       </Borders>
       <Font ss:FontName="Arial" x:Family="Swiss"/>
       <NumberFormat ss:Format="Short Date"/>
      </Style>
      <Style ss:ID="s79">
       <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
       <Font ss:FontName="Arial" x:Family="Swiss" ss:Underline="Single"/>
      </Style>
     </Styles>
html;
    if (isset($_GET['r']))
    	extract($_GET);

    $filename = null;
    $tabela = null;

    if ($r==1) {
    	$tabela = <<<TBL
        <Worksheet ss:Name="Relatório de Entrada e Saída">
         <Table ss:ExpandedColumnCount="9" ss:StyleID="s68" ss:DefaultRowHeight="18.75">
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="78.75"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="198"/>
          <Column ss:Index="4" ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="84.75"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="164.25"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="215.25"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="61.5"/>
          <Row ss:AutoFitHeight="0" ss:Height="30.75">
           <Cell ss:MergeAcross="8" ss:StyleID="s74"><Data ss:Type="String" StyleID="bold">Registros de entrada e saída</Data></Cell>
          </Row>
          <Row ss:AutoFitHeight="0">
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">RA</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Nome</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Periodo</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Curso</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Email</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Local</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Dia</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Entrada</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Saída</Data></Cell>
          </Row>
TBL;

		$consulta = new RelatorioPdo();
		$dados = $consulta->select();

        foreach($dados as $temp){

			$tabela .= "<Row>
					<Cell ss:StyleID=\"s70\"><Data ss:Type='Number'>{$temp['ra']}</Data></Cell>
					<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['nome']}</Data></Cell>
					<Cell ss:StyleID=\"s70\"><Data ss:Type='Number'>{$temp['periodo']}</Data></Cell>
					<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['curso']}</Data></Cell>
					<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['email']}</Data></Cell>
					<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['local']}</Data></Cell>
					<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['dia']}</Data></Cell>
					<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['entrada']}</Data></Cell>
					<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['saida']}</Data></Cell>
		            </Row>";
		}
        $filename = "Relatório Entrada e saída";
	}

	if($r==2){
        $tabela = <<<TBL
        <Worksheet ss:Name="Relatório de Entrada">
         <Table ss:ExpandedColumnCount="8" ss:StyleID="s68" ss:DefaultRowHeight="18.75">
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="78.75"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="198"/>
          <Column ss:Index="4" ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="84.75"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="164.25"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="215.25"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="61.5"/>
          <Row ss:AutoFitHeight="0" ss:Height="30.75">
           <Cell ss:MergeAcross="7" ss:StyleID="s74"><Data ss:Type="String" StyleID="bold">Registros de entrada</Data></Cell>
          </Row>
          <Row ss:AutoFitHeight="0">
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">RA</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Nome</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Periodo</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Curso</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Email</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Local</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Dia</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Entrada</Data></Cell>
          </Row>
TBL;
		$consulta = new RelatorioPdo();
		$dados = $consulta->selectE();

        foreach($dados as $temp){
            $tabela .= "<Row ss:AutoFitHeight=\"0\">".
					"<Cell ss:StyleID=\"s70\"><Data StyleID='Normal' ss:Type='Number'>{$temp['ra']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data StyleID='Normal' ss:Type='String'>{$temp['nome']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data StyleID='Normal' ss:Type='Number'>{$temp['periodo']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data StyleID='Normal' ss:Type='String'>{$temp['curso']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data StyleID='Normal' ss:Type='String'>{$temp['email']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data StyleID='Normal' ss:Type='String'>{$temp['local']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data StyleID='Normal' ss:Type='String'>{$temp['dia']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data StyleID='Normal' ss:Type='String'>{$temp['hora']}</Data></Cell>".
		            "</Row>";
        }
        $filename = "Relatório Entrada";
	}

	if($r==3){
        $tabela = <<<TBL
        <Worksheet ss:Name="Relatório de Saída">
         <Table ss:ExpandedColumnCount="8" ss:StyleID="s68" ss:DefaultRowHeight="18.75">
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="78.75"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="198"/>
          <Column ss:Index="4" ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="84.75"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="164.25"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="215.25"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="61.5"/>
          <Row ss:AutoFitHeight="0" ss:Height="30.75">
           <Cell ss:MergeAcross="7" ss:StyleID="s74"><Data ss:Type="String" StyleID="bold">Registros de saída</Data></Cell>
          </Row>
          <Row ss:AutoFitHeight="0">
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">RA</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Nome</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Periodo</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Curso</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Email</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Local</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Dia</Data></Cell>
           <Cell ss:StyleID="s77" StyleID="bold"><Data ss:Type="String">Saída</Data></Cell>
          </Row>
TBL;

		$consulta = new RelatorioPdo();
		$dados = $consulta->selectS();

        foreach($dados as $temp){
            $tabela .= "<Row ss:AutoFitHeight=\"0\">".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='Number'>{$temp['ra']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['nome']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='Number'>{$temp['periodo']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['curso']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['email']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['local']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['dia']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['hora']}</Data></Cell>".
		            "</Row>";
        }
        $filename="Relatório de Saída";
	}

	if($r==4){
        $tabela = <<<TBL
        <Worksheet ss:Name="Faltas">
         <Table ss:ExpandedColumnCount="5" ss:StyleID="s68" ss:DefaultRowHeight="18.75">
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="78.75"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="198"/>
          <Column ss:Index="4" ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="84.75"/>
          <Column ss:StyleID="s68" ss:AutoFitWidth="0" ss:Width="164.25"/>
          <Row ss:AutoFitHeight="0" ss:Height="30.75">
           <Cell ss:MergeAcross="4" ss:StyleID="s74"><Data ss:Type="String">Faltas</Data></Cell>
          </Row>
          <Row ss:AutoFitHeight="0">
           <Cell ss:StyleID="s77"><Data ss:Type="String">RA</Data></Cell>
           <Cell ss:StyleID="s77"><Data ss:Type="String">Nome</Data></Cell>
           <Cell ss:StyleID="s77"><Data ss:Type="String">Periodo</Data></Cell>
           <Cell ss:StyleID="s77"><Data ss:Type="String">Curso</Data></Cell>
           <Cell ss:StyleID="s77"><Data ss:Type="String">Email</Data></Cell>
          </Row>
TBL;
		$consulta = new RelatorioPdo();
		$dados = $consulta->selectF();

        foreach($dados as $temp){
            $tabela .= "<Row ss:AutoFitHeight=\"0\">".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='Number'>{$temp['ra']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['nome']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='Number'>{$temp['periodo']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['curso']}</Data></Cell>".
					"<Cell ss:StyleID=\"s70\"><Data ss:Type='String'>{$temp['email']}</Data></Cell>".
		            "</Row>";
		}
		$filename = 'Faltas';
	}

    if(!empty($filename)){
        // Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"$filename.xls\"" );
		header ("Content-Description: PHP Generated Data" );
        $html .= $tabela;
        $html .= <<<tblFinal
        </Table>
        <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
         <PageSetup>
          <Header x:Margin="0.4921259845"/>
          <Footer x:Margin="0.4921259845"/>
          <PageMargins x:Bottom="0.984251969" x:Left="0.78740157499999996"
           x:Right="0.78740157499999996" x:Top="0.984251969"/>
         </PageSetup>
         <Unsynced/>
         <Selected/>
         <Panes>
          <Pane>
           <Number>3</Number>
           <ActiveRow>7</ActiveRow>
           <ActiveCol>1</ActiveCol>
          </Pane>
         </Panes>
         <ProtectObjects>False</ProtectObjects>
         <ProtectScenarios>False</ProtectScenarios>
        </WorksheetOptions>
       </Worksheet>
      </Workbook>
tblFinal;
        echo $html;
    }
