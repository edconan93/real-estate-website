<?php 

/** 
 * Simple excel generating from PHP5 
 * 
 * @package Utilities 
 * @license http://www.opensource.org/licenses/mit-license.php 
 * @author Oliver Schwarz <oliver.schwarz@gmail.com> 
 * @version 1.0 
 */ 

/** 
 * Generating excel documents on-the-fly from PHP5 
 *  
 * Uses the excel XML-specification to generate a native 
 * XML document, readable/processable by excel. 
 *  
 * @package Utilities 
 * @subpackage Excel 
 * @author Oliver Schwarz <oliver.schwarz@vaicon.de> 
 * @version 1.1 
 *  
 * @todo Issue #4: Internet Explorer 7 does not work well with the given header 
 * @todo Add option to give out first line as header (bold text) 
 * @todo Add option to give out last line as footer (bold text) 
 * @todo Add option to write to file 
 */ 
class TableCell
{
    private $styleID;
    private $dataType;
    private $data;
    public function __construct($_styleID=null,$_data)
    {
        $this->styleID=$_styleID;
        
        $this->data=$_data;
        if(is_numeric($_data))
            $this->dataType="Number";
        else 
            $this->dataType="String";
    }
    public function getCell()
    {
        $str="";
        if($this->styleID==null)
            $str.='<Cell><Data ss:Type="'.$this->dataType.'">'.$this->data.'</Data></Cell>';
        else
            $str.='<Cell ss:StyleID="'.$this->styleID.'"><Data ss:Type="'.$this->dataType.'">'.$this->data.'</Data></Cell>';
        return $str;
    }
}
class TableRow
{
    private $cellArray=array();
    private $height=null;
    public function __construct($_height=null)
    {
        $this->height=$_height;
    }
    public function addCell($cell)//add a table cell to row
    {
        array_push($this->cellArray,$cell);
    }
    public function getRow()
    {
        $str="";
        $str.='<Row';
        if($this->height!=null)
            $str.=' ss:Height="'.$this->height.'"';
        $str.=">";
        foreach ($this->cellArray as $cell) 
             $str.=$cell->getCell();
        $str.="</Row>\n";
        return $str;
    }
}
class TableColumHeaderItem
{
    private $width;
    private $data;
    public function __construct($_width=null,$_data)
    {
        $this->width=$_width;
        $this->data=$_data;
    }
    public function setWidth($_width)
    {
        $this->width=$_width;
    }
    public function setData($_data)
    {
        $this->data=$_data;
    }
    public function getData()
    {
        return $this->data;
    }
    public function getWidth()
    {
        return $this->width;
    }
}
class TableHeaderColumn
{
    private $headerItems=array();
    private $height;
    public function __construct($height=null,$arrayData)
    {
        foreach($arrayData as $item)
        {
            $headerItem=new TableColumHeaderItem(null,$item);
            $this->addItem($headerItem);
        }
    }
    public function addItem($item)
    {
        array_push($this->headerItems,$item);
    }
    public function setHeight($_heght)
    {
        $this->height=$_heght;
    }
    public function setColumnWidth($index,$width)
    {
        if($index>=count($this->headerItems))
            return false;
        $this->headerItems[$index]->setWidth($width);
    }
    public function gettableHeaderColumn()
    {
        //write tag column;
        $str="";
        for($i=0;$i<count($this->headerItems);$i++)
        {
            if($this->headerItems[$i]->getWidth()!=null)
                $str.='<Column ss:Index="'.($i+1).'" ss:AutoFitWidth="0" ss:Width="'.$this->headerItems[$i]->getWidth().'"/>';
        }
        return $str;
    }
    public function getTableColumnData()
    {
        //write data
        $str='<Row';
        if($this->height!=null)
            $str.=' ss:Height="'.$this->height.'"';
        $str.=">";
        foreach ($this->headerItems as $cell) 
             $str.='<Cell ss:StyleID="s58"><Data ss:Type="String">'.$cell->getData().'</Data></Cell>';
        $str.="</Row>\n";
        return $str;
    }
}
class Excel_XML 
{ 

    /** 
     * Header (of document) 
     * @var string 
     */ 
        private $header = "<?xml version=\"1.0\" encoding=\"%s\"?\>\n<Workbook xmlns=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns:ss=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:html=\"http://www.w3.org/TR/REC-html40\">"; 

        /** 
         * Footer (of document) 
         * @var string 
         */ 
        private $footer = "</Workbook>"; 
        private $tableColumnHeader;
        /** 
         * Lines to output in the excel document 
         * @var array 
         */ 
        private $lines=array();
        private $tableRows = array(); 

        /** 
         * Used encoding 
         * @var string 
         */ 
        private $sEncoding; 
        private $title;
        /** 
         * Convert variable types 
         * @var boolean 
         */ 
        private $bConvertTypes; 
         
        /** 
         * Worksheet title 
         * @var string 
         */ 
        private $sWorksheetTitle; 
        /** 
         * Constructor 
         *  
         * The constructor allows the setting of some additional 
         * parameters so that the library may be configured to 
         * one's needs. 
         *  
         * On converting types: 
         * When set to true, the library tries to identify the type of 
         * the variable value and set the field specification for Excel 
         * accordingly. Be careful with article numbers or postcodes 
         * starting with a '0' (zero)! 
         *  
         * @param string $sEncoding Encoding to be used (defaults to UTF-8) 
         * @param boolean $bConvertTypes Convert variables to field specification 
         * @param string $sWorksheetTitle Title for the worksheet 
         */ 
        public function __construct($sEncoding = 'UTF-8', $bConvertTypes = false, $sWorksheetTitle = 'Table1') 
        { 
                $this->bConvertTypes = $bConvertTypes; 
            $this->setEncoding($sEncoding); 
            $this->setWorksheetTitle($sWorksheetTitle); 
        } 
         
        /** 
         * Set encoding 
         * @param string Encoding type to set 
         */ 
        public function setEncoding($sEncoding) 
        { 
            $this->sEncoding = $sEncoding; 
        } 

        /** 
         * Set worksheet title 
         *  
         * Strips out not allowed characters and trims the 
         * title to a maximum length of 31. 
         *  
         * @param string $title Title for worksheet 
         */ 
        public function setWorksheetTitle ($title) 
        { 
                //$title = preg_replace ("/***91;\\\|:|\/|\?|\*|\***91;|\***93;***93;/", "", $title); 
                $title = substr ($title, 0, 31); 
                $this->sWorksheetTitle = $title; 
        } 

        /** 
         * Add row 
         *  
         * Adds a single row to the document. If set to true, self::bConvertTypes 
         * checks the type of variable and returns the specific field settings 
         * for the cell. 
         *  
         * @param array $array One-dimensional array with row content 
         */ 
        private function addRow ($array) 
        { 
            $cells = ""; 
                foreach ($array as $k => $v): 
                        $type = 'String'; 
                        if ($this->bConvertTypes === true && is_numeric($v)): 
                                $type = 'Number'; 
                        endif; 
                        $v = htmlentities($v, ENT_COMPAT, $this->sEncoding); 
                        $cells .= "<Cell><Data ss:Type=\"$type\">" . $v . "</Data></Cell>\n";  
                endforeach; 
                $this->lines[]= "<Row>\n" . $cells . "</Row>\n"; 
        } 

        /** 
         * Add an array to the document 
         * @param array 2-dimensional array 
         */ 
        public function addArray ($array) 
        { 
                foreach ($array as $k => $v) 
                        $this->addRow ($v); 
        } 
        public function getStyle()
        {
            $str="";
            $str.='
            <Styles>';
            $str.='<Style ss:ID="Default" ss:Name="Normal">
            <Alignment ss:Vertical="Bottom"/>
            <Borders/>
            <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"/>
           <Interior/>
           <NumberFormat/>
           <Protection/>
          </Style>';
          //table title style        
          $str.='<Style ss:ID="s57">
           <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="16" ss:Color="#000000"
            ss:Bold="1"/>
          </Style>';
          //table header style
          $str.=' <Style ss:ID="s58">
            <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
           </Borders>
           <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"
            ss:Bold="1"/>
          </Style>';
          //table data style
          $str.='<Style ss:ID="s59">
           <Borders>
            <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
            <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
           </Borders>
          </Style>';
            $str.='</Styles>';
            return $str;
        }

        /** 
         * Generate the excel file 
         * @param string $filename Name of excel file to generate (...xls) 
         */ 
        public function generateXML ($filename = 'excel-export') 
        { 
                // correct/validate filename 
                //$filename = preg_replace('/***91;^aA-zZ0-9\_\-***93;/', '', $filename); 
         
                // deliver header (as recommended in php manual) 
                header("Content-Type: application/vnd.ms-excel; charset=" . $this->sEncoding); 
                header("Content-Disposition: inline; filename=\"" . $filename . ".xls\""); 

                // print out document to the browser 
                //print the style:
                
                // need to use stripslashes for the **** ">" 
                echo stripslashes (sprintf($this->header, $this->sEncoding)); 
                echo "\n<Worksheet ss:Name=\"" . $this->sWorksheetTitle . "\">\n<Table>\n"; 
                foreach ($this->lines as $line) 
                        echo $line; 

                echo "</Table>\n</Worksheet>\n"; 
                echo $this->footer; 
        } 
        public function setTableHeaderColumn($_header)
        {
            $this->tableColumnHeader=$_header;
        }
        public function addTableRow($row)
        {
            array_push($this->tableRows,$row);
        }
        public function setTile($styleid,$data)
        {
            $this->title=new TableRow(21);
            $cell=new TableCell($styleid,$data);
             $this->title->addCell($cell);
        }
        public function setAutoData($data)
        {
            for($i=0;$i<count($data);$i++)
            {
                $row=new TableRow(null);
                for($j=0;$j<count($data[$i]);$j++)
                {
                    $cell=new TableCell("s59",$data[$i][$j]);
                    $row->addCell($cell);
                }
                $this->addTableRow($row);
            }
        }
        public function getXML($filename = 'excel-export')
        {
            header("Content-Type: application/vnd.ms-excel; charset=" . $this->sEncoding); 
            header("Content-Disposition: inline; filename=\"" . $filename . ".xls\""); 
            echo stripslashes (sprintf($this->header, $this->sEncoding)); 
            echo $this->getStyle();
            echo "\n<Worksheet ss:Name=\"" . $this->sWorksheetTitle . "\">\n<Table>\n"; 
            echo $this->tableColumnHeader->gettableHeaderColumn();
            echo $this->title->getRow();
            echo $this->tableColumnHeader->getTableColumnData();
            foreach($this->tableRows as $row)
            {
                echo $row->getRow();
            }
            echo "</Table>\n</Worksheet>\n"; 
            echo $this->footer; 
        }
} 

?>