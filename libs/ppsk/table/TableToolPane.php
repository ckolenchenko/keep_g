<?php
class TableToolPane extends PPane{
	const _toolPaneWidth	= 98;
	const _toolPaneHeigth	= 25;

	public function __construct( $Owner ){
		$this->mName	= $Owner->mName.'_TableToolPane';

		$this->mWidth	= self::_toolPaneWidth;
		$this->mHeigth	= self::_toolPaneHeigth;

		parent::__construct( $this );
	}
//______________________________________________________________________________

	public function __get( $property ){
		if( property_exists( 'TableToolPane', $property )){
			return $this->$property;
		}else{
			return parent::__get( $property )  ;
		}
	}
//______________________________________________________________________________

	public function __set( $property, $value=NULL ){
		if( 'mButtons' == $property ){
			$this->adjustButtons( $value );
		}elseif( property_exists( 'TableToolPane', $property )){
			$this->$property = $value;
		}else{
			parent::__set( $property, $value );
		}
	}
//______________________________________________________________________________

	private function adjustButtons( $buttons ){
		foreach( $buttons as $type => &$button ){
			$button['name']		= 'btn_'.$type.$this->mName;
			$button['css_dis']	= ( !isset( $button['css_dis'] )) ? 'PPSK_'.$type.'RowBtnDisabled' : $button['css_dis'];
			$button['css_act']	= ( !isset( $button['css_act'] )) ? 'PPSK_'.$type.'RowBtnEnabled' : $button['css_act'];
			$button['css_ovr']	= ( !isset( $button['css_ovr'] )) ? 'PPSK_'.$type.'RowBtnOver' : $button['css_ovr'];
			$button['css_dwn']	= ( !isset( $button['css_dwn'] )) ? 'PPSK_'.$type.'RowBtnDown' : $button['css_dwn'];
		}
		parent::__set( 'mButtons', $buttons );
	}
//______________________________________________________________________________

	public function initHtmlView( $view = '' ){

		$view	=
'<div class="PPSK_simple_pane table_tool_pane" '.
	'style="width:'.$this->mWidth.'px;'.
		'height:'.$this->mHeigth.'px;'.
		'background-color:'.$this->mBkgClr.';'.
		'border-color:'.$this->mBrdClr.';"'.
'>'.

		$this->getInnerHtmlContent().
'</div>';

		parent:: initHtmlView( $view );
	}
//______________________________________________________________________________

}//	Class end
